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

// Utility functions for interacting with the Mirror API
// You will probably have to modify and expand this set for your project.
// These were adapted from code samples on the Mirror API reference
// found at https://developers.google.com/glass/v1/reference

require_once 'config.php';
require_once 'google-api-php-client/src/Google_Client.php';
require_once 'google-api-php-client/src/contrib/Google_Oauth2Service.php';

// Returns an unauthenticated service
function get_google_api_client() {
  global $api_client_id, $api_client_secret, $api_simple_key, $base_url;
  // Set your cached access token. Remember to replace $_SESSION with a
  // real database or memcached.
  session_start();

  $client = new Google_Client();

  $client->setUseObjects(true);
  $client->setApplicationName('Google Mirror API PHP Quick Start');

  // These are set in config.php
  $client->setClientId($api_client_id);
  $client->setClientSecret($api_client_secret);
  $client->setRedirectUri($base_url."/oauth2callback.php");

  $client->setScopes(array(
    'https://www.googleapis.com/auth/glass.timeline',
    'https://www.googleapis.com/auth/glass.location',
    'https://www.googleapis.com/auth/userinfo.profile'));

  return $client;
}

/*
 * Verify the credentials. If they're broken, attempt to re-auth
 * This will only work if you haven't printed anything yet (since
 * it uses an HTTP header for the redirect)
 */
function verify_credentials($credentials) {
  // TODO: Use the oauth2.tokeninfo() method instead once it's
  //       exposed by the PHP client library
  global $base_url;

  $client = get_google_api_client();
  $client->setAccessToken($credentials);

  $token_checker = new Google_Oauth2Service($client);
  try {
    $token_checker->userinfo->get();
  } catch (Google_ServiceException $e) {
    if ($e->getCode() == 401) {
      // This user may have disabled the Glassware on MyGlass.
      // Clean up the mess and attempt to re-auth.
      unset($_SESSION['userid']);
      header('Location: ' . $base_url . '/oauth2callback.php');
      exit;
    } else {
      // Let it go...
      throw $e;
    }
  }

}

function insert_timeline_item($service, $timeline_item, $content_type, $attachment)
{
  try {
    $opt_params = array();
    if ($content_type != null && $attachment != null) {
      $opt_params['data'] = $attachment;
      $opt_params['mimeType'] = $content_type;
    }
    return $service->timeline->insert($timeline_item, $opt_params);
  } catch (Exception $e) {
    print 'An error ocurred: ' . $e->getMessage();
    return null;
  }
}

/**
 * Subscribe to notifications for the current user.
 *
 * @param Google_MirrorService $service Authorized Mirror service.
 * @param string $collection Collection to subscribe to (supported
 *                           values are "timeline" and "locations").
 * @param string $user_token Opaque token used by the Service to
 *                          identify the  user the notification pings
 *                          are sent for (recommended).
 * @param string $callback_url URL receiving notification pings (must be HTTPS).
 */
function subscribe_to_notifications($service, $collection, $user_token, $callback_url)
{
  try {
    $subscription = new Google_Subscription();
    $subscription->setCollection($collection);
    $subscription->setUserToken($user_token);
    $subscription->setCallbackUrl($callback_url);
    $service->subscriptions->insert($subscription);
    return "Subscription inserted!";
  } catch (Exception $e) {
    return 'An error occurred: ' . $e->getMessage();
  }
}

function insert_contact($service, $contact_id, $display_name, $icon_url)
{
  try {
    $contact = new Google_Contact();
    $contact->setId($contact_id);
    $contact->setDisplayName($display_name);
    $contact->setImageUrls(array($icon_url));
    return $service->contacts->insert($contact);
  } catch (Exception $e) {
    print 'An error ocurred: ' . $e->getMessage();
    return null;
  }
}

/**
 * Delete a contact for the current user.
 *
 * @param Google_MirrorService $service Authorized Mirror service.
 * @param string $contact_id ID of the Contact to delete.
 */
function delete_contact($service, $contact_id) {
  try {
    $service->contacts->delete($contact_id);
  } catch (Exception $e) {
    print 'An error occurred: ' . $e->getMessage();
  }
}

/**
 * Download an attachment's content.
 *
 * @param string item_id ID of the timeline item the attachment belongs to.
 * @param Google_Attachment $attachment Attachment's metadata.
 * @return string The attachment's content if successful, null otherwise.
 */
function download_attachment($item_id, $attachment) {
  $request = new Google_HttpRequest($attachment->getContentUrl(), 'GET', null, null);
  $httpRequest = Google_Client::$io->authenticatedRequest($request);
  if ($httpRequest->getResponseHttpCode() == 200) {
    return $httpRequest->getResponseBody();
  } else {
    // An error occurred.
    return null;
  }
}

/**
 * Delete a timeline item for the current user.
 *
 * @param Google_MirrorService $service Authorized Mirror service.
 * @param string $item_id ID of the Timeline Item to delete.
 */
function delete_timeline_item($service, $item_id) {
  try {
    $service->timeline->delete($item_id);
  } catch (Exception $e) {
    print 'An error occurred: ' . $e->getMessage();
  }
}

