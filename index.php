<?php
/*
* Copyright (C) 2013 Google Inc.
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
*      http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*/
//  Author: Jenny Murphy - http://google.com/+JennyMurphy

require_once 'config.php';
require_once 'mirror-client.php';
require_once 'google-api-php-client/src/Google_Client.php';
require_once 'google-api-php-client/src/contrib/Google_MirrorService.php';
require_once 'util.php';

$client = get_google_api_client();

// Authenticate if we're not already
if (!isset($_SESSION['userid']) || get_credentials($_SESSION['userid']) == null) {
  header('Location: ' . $base_url . '/oauth2callback.php');
  exit;
} else {
  verify_credentials(get_credentials($_SESSION['userid']));
  $client->setAccessToken(get_credentials($_SESSION['userid']));
}

// A glass service for interacting with the Mirror API
$mirror_service = new Google_MirrorService($client);

// But first, handle POST data from the form (if there is any)
switch ($_POST['operation']) {
  case 'insertItem':
    $new_timeline_item = new Google_TimelineItem();
    $new_timeline_item->setText($_POST['message']);

    $notification = new Google_NotificationConfig();
    $notification->setLevel("DEFAULT");
    $new_timeline_item->setNotification($notification);

    if (isset($_POST['imageUrl']) && isset($_POST['contentType'])) {
      insert_timeline_item($mirror_service, $new_timeline_item,
        $_POST['contentType'], file_get_contents($_POST['imageUrl']));
    } else {
      insert_timeline_item($mirror_service, $new_timeline_item, null, null);
    }

    $message = "Timeline Item inserted!";
    break;
  case 'insertItemWithAction':
    $new_timeline_item = new Google_TimelineItem();
    $new_timeline_item->setText("What did you have for lunch?");

    $notification = new Google_NotificationConfig();
    $notification->setLevel("DEFAULT");
    $new_timeline_item->setNotification($notification);

    $menu_items = array();

    // A couple of built in menu items
    $menu_item = new Google_MenuItem();
    $menu_item->setAction("REPLY");
    array_push($menu_items, $menu_item);

    $menu_item = new Google_MenuItem();
    $menu_item->setAction("READ_ALOUD");
    array_push($menu_items, $menu_item);
    $new_timeline_item->setSpeakableText("What did you eat? Bacon?");

    $menu_item = new Google_MenuItem();
    $menu_item->setAction("SHARE");
    array_push($menu_items, $menu_item);

    // A custom menu item
    $custom_menu_item = new Google_MenuItem();
    $custom_menu_value = new Google_MenuValue();
    $custom_menu_value->setDisplayName("Drill Into");
    $custom_menu_value->setIconUrl($service_base_url . "/static/images/drill.png");

    $custom_menu_item->setValues(array($custom_menu_value));
    $custom_menu_item->setAction("CUSTOM");
    // This is how you identify it on the notification ping
    $custom_menu_item->setId("safe-for-later");
    array_push($menu_items, $custom_menu_item);

    $new_timeline_item->setMenuItems($menu_items);

    insert_timeline_item($mirror_service, $new_timeline_item, null, null);

    $message = "Inserted a timeline item you can reply to";
    break;
  case 'insertTimelineAllUsers':
    $credentials = list_credentials();
    if (count($credentials) > 10) {
      $message = "Found " . count($credentials) . " users. Aborting to save your quota.";
    } else {
      foreach ($credentials as $credential) {
        $user_specific_client = get_google_api_client();
        $user_specific_client->setAccessToken($credential['credentials']);

        $new_timeline_item = new Google_TimelineItem();
        $new_timeline_item->setText("Did you know cats have 167 bones in their tails? Mee-wow!");

        $user_specific_mirror_service = new Google_MirrorService($user_specific_client);

        insert_timeline_item($user_specific_mirror_service, $new_timeline_item, null, null);
      }
      $message = "Sent a cat fact to " . count($credentials) . " users.";
    }
    break;
  case 'insertSubscription':
    $message = subscribe_to_notifications($mirror_service, $_POST['subscriptionId'],
      $_SESSION['userid'], $base_url . "/notify.php");
    break;
  case 'deleteSubscription':
    $message = $mirror_service->subscriptions->delete($_POST['subscriptionId']);
    break;
  case 'insertContact':
    insert_contact($mirror_service, $_POST['id'], $_POST['name'],
        $base_url . "/static/images/chipotle-tube-640x360.jpg");
    $message = "Contact inserted. Enable it on MyGlass.";
    break;
  case 'deleteContact':
    delete_contact($mirror_service, $_POST['id']);
    $message = "Contact deleted.";
    break;
  case 'deleteTimelineItem':
    delete_timeline_item($mirror_service, $_POST['itemId']);
    $message = "A timeline item has been deleted.";
    break;
}

//Load cool stuff to show them.
$timeline = $mirror_service->timeline->listTimeline(array('maxResults'=>'3'));
try {
  $contact = $mirror_service->contacts->get("php-quick-start");
} catch (Exception $e) {
  // no contact found. Meh
  $contact = null;
}
$subscriptions = $mirror_service->subscriptions->listSubscriptions();
$timeline_subscription_exists = false;
$location_subscription_exists = false;
foreach ($subscriptions->getItems() as $subscription) {
  if ($subscription->getId() == 'timeline') {
    $timeline_subscription_exists = true;
  } elseif ($subscription->getId() == 'locations') {
    $location_subscription_exists = true;
  }
}

?>
<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Glassware Starter Project</title>
  <link href="./static/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="./static/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
  <link href="./static/main.css" rel="stylesheet" media="screen">
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="brand" href="#">Glassware Starter Project: PHP Edition</a>
    </div>
  </div>
</div>

<div class="container">

  <?php if ($message != "") { ?>
  <div class="alert alert-info"><?php echo $message; ?> </div>
  <?php } ?>

  <h1>Your Recent Timeline</h1>
  <div class="row">

    <div style="margin-top: 5px;">
      <?php if ($timeline->getItems()) { ?>
        <?php foreach ($timeline->getItems() as $timeline_item) { ?>
        <div class="span4">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th>ID</th>
                <td><?php echo $timeline_item->getId(); ?></td>
              </tr>
              <tr>
                <th>Text</th>
                <td><?php echo htmlspecialchars($timeline_item->getText()); ?></td>
              </tr>
              <tr>
                <th>HTML</th>
                <td><?php echo htmlspecialchars($timeline_item->getHtml()); ?></td>
              </tr>
              <tr>
                <th>Attachments</th>
                <td>
                  <?php
                  if ($timeline_item->getAttachments() != null) {
                    $attachments = $timeline_item->getAttachments();
                    foreach ($attachments as $attachment) { ?>
                        <img src="<?php echo $base_url .
                            '/attachment-proxy.php?timeline_item_id=' .
                            $timeline_item->getId() . '&attachment_id=' .
                            $attachment->getId() ?>" />
                    <?php
                    }
                  }
                  ?>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <form class="form-inline" method="post">
                    <input type="hidden" name="itemId" value="<?php echo $timeline_item->getId(); ?>">
                    <input type="hidden" name="operation" value="deleteTimelineItem">
                    <button class="btn btn-danger btn-block" type="submit">Delete Item</button>
                  </form>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <?php 
        }
      } else { ?>
      <div class="span12">
        <div class="alert alert-info">
          You haven't added any items to your timeline yet. Use the controls
          below to add something!
        </div>
      </div>
      <?php
      } ?>
    </div>
  </div>

  <div class="row">
    <div class="span4">
      <h2>Timeline</h2>

      <p>When you first sign in, this Glassware inserts a welcome message. Use
        these controls to insert more items into your timeline. Learn more about
        the timeline APIs
        <a href="https://developers.google.com/glass/timeline">here</a>.</p>


      <form method="post">
        <input type="hidden" name="operation" value="insertItem">
        <textarea name="message" class="span4">Hello World!</textarea><br/>
        <button class="btn btn-block" type="submit">
          Insert the above message
        </button>
      </form>

      <form method="post">
        <input type="hidden" name="operation" value="insertItem">
        <input type="hidden" name="message" value="Chipotle says hi!">
        <input type="hidden" name="imageUrl" value="<?php echo $base_url .
            "/static/images/chipotle-tube-640x360.jpg" ?>">
        <input type="hidden" name="contentType" value="image/jpeg">

        <button class="btn btn-block" type="submit">Insert a picture
          <img class="button-icon" src="<?php echo $base_url .
             "/static/images/chipotle-tube-640x360.jpg" ?>">
        </button>
      </form>
      <form method="post">
        <input type="hidden" name="operation" value="insertItemWithAction">
        <button class="btn btn-block" type="submit">
          Insert a card you can reply to
        </button>
      </form>
      <hr>
      <form method="post">
        <input type="hidden" name="operation" value="insertTimelineAllUsers">
        <button class="btn btn-block" type="submit">
          Insert a card to all users
        </button>
      </form>
    </div>

  <div class="span4">
    <h2>Contacts</h2>
    <p>By default, this project inserts a single contact that accepts
      all content types. Learn more about contacts
      <a href="https://developers.google.com/glass/contacts">here</a>.</p>

      <?php if ($contact == null) { ?>
      <form method="post">
        <input type="hidden" name="operation" value="insertContact">
        <input type="hidden" name="iconUrl" value="<?php echo $base_url .
            "/static/images/chipotle-tube-640x360.jpg" ?>">
        <input type="hidden" name="name" value="PHP Quick Start">
        <input type="hidden" name="id" value="php-quick-start">
        <button class="btn btn-block btn-success" type="submit">
          Insert PHP Quick Start Contact
        </button>
      </form>
      <?php } else { ?>
      <form method="post">
        <input type="hidden" name="operation" value="deleteContact">
        <input type="hidden" name="id" value="php-quick-start">
        <button class="btn btn-block btn-danger" type="submit">
          Delete PHP Quick Start Contact
        </button>
      </form>
    <?php } ?>
    </div>

    <div class="span4">
      <h2>Subscriptions</h2>

  <p>By default a subscription is inserted for changes to the
    <code>timeline</code> collection. Learn more about subscriptions
    <a href="https://developers.google.com/glass/subscriptions">here</a>.</p>

  <div class="alert alert-info">
    Note: Subscriptions require SSL. They will not work on localhost.
  </div>

  <?php if ($timeline_subscription_exists) { ?>
    <form method="post">
      <input type="hidden" name="subscriptionId" value="timeline">
      <input type="hidden" name="operation" value="deleteSubscription">
      <button class="btn btn-block btn-danger" type="submit">
        Unsubscribe from timeline updates
      </button>
    </form>
  <?php } else { ?>
    <form method="post">
      <input type="hidden" name="operation" value="insertSubscription">
      <input type="hidden" name="subscriptionId" value="timeline">
      <button class="btn btn-block btn-success" type="submit">
        Subscribe to timeline updates
      </button>
    </form>
  <?php } ?>

  <?php if ($location_subscription_exists) { ?>
    <form method="post">
      <input type="hidden" name="subscriptionId" value="locations">
      <input type="hidden" name="operation" value="deleteSubscription">
      <button class="btn btn-block btn-danger" type="submit">
        Unsubscribe from location updates
      </button>
    </form>
  <?php } else { ?>
    <form method="post">
      <input type="hidden" name="operation" value="insertSubscription">
      <input type="hidden" name="subscriptionId" value="locations">
      <button class="btn btn-block btn-success" type="submit">
        Subscribe to location updates
      </button>
    </form>
  <?php } ?>
    </div>
  </div>
</div>

<script
    src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/static/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
