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
require_once 'google-api-php-client/src/contrib/Google_Oauth2Service.php';
require_once 'util.php';

$client = get_google_api_client();

if (isset($_GET['code'])) {
  // Handle step 2 of the OAuth 2.0 dance - code exchange
  $client->authenticate();
  $access_token = $client->getAccessToken();

  // Use the identity service to get their ID
  $identity_client = get_google_api_client();
  $identity_client->setAccessToken($access_token);
  $identity_service = new Google_Oauth2Service($identity_client);
  $user = $identity_service->userinfo->get();
  $user_id = $user->getId();

  // Store their credentials and register their ID with their session
  $_SESSION['userid'] = $user_id;
  store_credentials($user_id, $client->getAccessToken());

  // Bootstrap the new user by inserting a welcome message, a contact,
  // and subscribing them to timeline notifications
  bootstrap_new_user();

  // redirect back to the base url
  header('Location: ' . $base_url);
} elseif (!isset($_SESSION['userid']) || get_credentials($_SESSION['userid']) == null) {
  // Handle step 1 of the OAuth 2.0 dance - redirect to Google
  header('Location: ' . $client->createAuthUrl());
} else {
  // We're authenticated, redirect back to base_url
  header('Location: ' . $base_url);
}