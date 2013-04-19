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

if($_SERVER['REQUEST_METHOD'] != "POST") {
  http_send_status(400);
  exit();
}

// Parse the request body
$request = json_decode(http_get_request_body());

// A notification has come in. If there's an attached photo, bounce it back
// to the user
$user_id = $request['userToken'];
$access_token = get_credentials($user_id);

$client = get_google_api_client();
$client->setAccessToken($access_token);

// A glass service for interacting with the Mirror API
$mirror_service = new Google_MirrorService($client);

$timeline_item = new Google_TimelineItem();
$timeline_item->setText("Got a notification " . $request);

insertTimelineItem($mirror_service, $timeline_item, null, null);
//TODO: if there's an attached photo, echo it