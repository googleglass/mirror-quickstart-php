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

function insertTimelineItem($service, $timelineItem, $contentType, $attachment)
{
  try {
    $optParams = array();
    if ($contentType != null && $attachment != null) {
      $optParams['data'] = $attachment;
      $optParams['mimeType'] = $contentType;
    }
    return $service->timeline->insert($timelineItem, $optParams);
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
 * @param string $userToken Opaque token used by the Service to
 *                          identify the  user the notification pings
 *                          are sent for (recommended).
 * @param string $callbackUrl URL receiving notification pings (must be HTTPS).
 */
function subscribeToNotifications($service, $collection, $userToken, $callbackUrl)
{
  try {
    $subscription = new Google_Subscription();
    $subscription->setCollection($collection);
    $subscription->setUserToken($userToken);
    $subscription->setCallbackUrl($callbackUrl);
    $service->subscriptions->insert($subscription);
    return "Subscription inserted!";
  } catch (Exception $e) {
    return 'An error occurred: ' . $e->getMessage();
  }
}

function insertContact($service, $contactId, $displayName, $iconUrl)
{
  try {
    $contact = new Google_Contact();
    $contact->setId($contactId);
    $contact->setDisplayName($displayName);
    $contact->setImageUrls(array($iconUrl));
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
 * @param string $contactId ID of the Contact to delete.
 */
function deleteContact($service, $contactId) {
  try {
    $service->contacts->delete($contactId);
  } catch (Exception $e) {
    print 'An error occurred: ' . $e->getMessage();
  }
}

/**
 * Download an attachment's content.
 *
 * @param string $timelineId ID of the timeline item the attachment belongs to.
 * @param Google_Attachment $attachment Attachment's metadata.
 * @return string The attachment's content if successful, null otherwise.
 */
function downloadAttachment($itemId, $attachment) {
  $request = new Google_HttpRequest($attachment['contentUrl'], 'GET', null, null);
  $httpRequest = Google_Client::$io->authenticatedRequest($request);
  if ($httpRequest->getResponseHttpCode() == 200) {
    return $httpRequest->getResponseBody();
  } else {
    // An error occurred.
    return null;
  }
}

