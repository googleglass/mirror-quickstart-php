<?php
/*
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */


  /**
   * The "contacts" collection of methods.
   * Typical usage is:
   *  <code>
   *   $mirrorService = new google_MirrorService(...);
   *   $contacts = $mirrorService->contacts;
   *  </code>
   */
  class google_ContactsServiceResource extends Google_ServiceResource {


    /**
     * Deletes a contact. (contacts.delete)
     *
     * @param string $id The ID of the contact.
     * @param array $optParams Optional parameters.
     */
    public function delete($id, $optParams = array()) {
      $params = array('id' => $id);
      $params = array_merge($params, $optParams);
      $data = $this->__call('delete', array($params));
      return $data;
    }
    /**
     * Gets a single contact by ID. (contacts.get)
     *
     * @param string $id The ID of the contact.
     * @param array $optParams Optional parameters.
     * @return google_Contact
     */
    public function get($id, $optParams = array()) {
      $params = array('id' => $id);
      $params = array_merge($params, $optParams);
      $data = $this->__call('get', array($params));
      if ($this->useObjects()) {
        return new google_Contact($data);
      } else {
        return $data;
      }
    }
    /**
     * Inserts a new contact. (contacts.insert)
     *
     * @param google_Contact $postBody
     * @param array $optParams Optional parameters.
     * @return google_Contact
     */
    public function insert(google_Contact $postBody, $optParams = array()) {
      $params = array('postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('insert', array($params));
      if ($this->useObjects()) {
        return new google_Contact($data);
      } else {
        return $data;
      }
    }
    /**
     * Retrieves a list of contacts for the authenticated user. (contacts.list)
     *
     * @param array $optParams Optional parameters.
     * @return google_ContactsListResponse
     */
    public function listContacts($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('list', array($params));
      if ($this->useObjects()) {
        return new google_ContactsListResponse($data);
      } else {
        return $data;
      }
    }
    /**
     * Updates a contact in place. This method supports patch semantics. (contacts.patch)
     *
     * @param string $id The ID of the contact.
     * @param google_Contact $postBody
     * @param array $optParams Optional parameters.
     * @return google_Contact
     */
    public function patch($id, google_Contact $postBody, $optParams = array()) {
      $params = array('id' => $id, 'postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('patch', array($params));
      if ($this->useObjects()) {
        return new google_Contact($data);
      } else {
        return $data;
      }
    }
    /**
     * Updates a contact in place. (contacts.update)
     *
     * @param string $id The ID of the contact.
     * @param google_Contact $postBody
     * @param array $optParams Optional parameters.
     * @return google_Contact
     */
    public function update($id, google_Contact $postBody, $optParams = array()) {
      $params = array('id' => $id, 'postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('update', array($params));
      if ($this->useObjects()) {
        return new google_Contact($data);
      } else {
        return $data;
      }
    }
  }

  /**
   * The "locations" collection of methods.
   * Typical usage is:
   *  <code>
   *   $mirrorService = new google_MirrorService(...);
   *   $locations = $mirrorService->locations;
   *  </code>
   */
  class google_LocationsServiceResource extends Google_ServiceResource {


    /**
     * Gets a single location by ID. (locations.get)
     *
     * @param string $id The ID of the location or latest for the last known location.
     * @param array $optParams Optional parameters.
     * @return google_Location
     */
    public function get($id, $optParams = array()) {
      $params = array('id' => $id);
      $params = array_merge($params, $optParams);
      $data = $this->__call('get', array($params));
      if ($this->useObjects()) {
        return new google_Location($data);
      } else {
        return $data;
      }
    }
    /**
     * Retrieves a list of locations for the user. (locations.list)
     *
     * @param array $optParams Optional parameters.
     * @return google_LocationsListResponse
     */
    public function listLocations($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('list', array($params));
      if ($this->useObjects()) {
        return new google_LocationsListResponse($data);
      } else {
        return $data;
      }
    }
  }

  /**
   * The "shareTargets" collection of methods.
   * Typical usage is:
   *  <code>
   *   $mirrorService = new google_MirrorService(...);
   *   $shareTargets = $mirrorService->shareTargets;
   *  </code>
   */
  class google_ShareTargetsServiceResource extends Google_ServiceResource {


    /**
     * Deletes a share target. (shareTargets.delete)
     *
     * @param string $id The ID of the share target.
     * @param array $optParams Optional parameters.
     */
    public function delete($id, $optParams = array()) {
      $params = array('id' => $id);
      $params = array_merge($params, $optParams);
      $data = $this->__call('delete', array($params));
      return $data;
    }
    /**
     * Gets a single share target by ID. (shareTargets.get)
     *
     * @param string $id The ID of the share target.
     * @param array $optParams Optional parameters.
     * @return google_Contact
     */
    public function get($id, $optParams = array()) {
      $params = array('id' => $id);
      $params = array_merge($params, $optParams);
      $data = $this->__call('get', array($params));
      if ($this->useObjects()) {
        return new google_Contact($data);
      } else {
        return $data;
      }
    }
    /**
     * Inserts a new share target. (shareTargets.insert)
     *
     * @param google_Contact $postBody
     * @param array $optParams Optional parameters.
     * @return google_Contact
     */
    public function insert(google_Contact $postBody, $optParams = array()) {
      $params = array('postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('insert', array($params));
      if ($this->useObjects()) {
        return new google_Contact($data);
      } else {
        return $data;
      }
    }
    /**
     * Retrieves a list of share targets for the authenticated user. (shareTargets.list)
     *
     * @param array $optParams Optional parameters.
     * @return google_ShareTargetsListResponse
     */
    public function listShareTargets($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('list', array($params));
      if ($this->useObjects()) {
        return new google_ShareTargetsListResponse($data);
      } else {
        return $data;
      }
    }
    /**
     * Updates a share target in place. This method supports patch semantics. (shareTargets.patch)
     *
     * @param string $id The ID of the share target.
     * @param google_Contact $postBody
     * @param array $optParams Optional parameters.
     * @return google_Contact
     */
    public function patch($id, google_Contact $postBody, $optParams = array()) {
      $params = array('id' => $id, 'postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('patch', array($params));
      if ($this->useObjects()) {
        return new google_Contact($data);
      } else {
        return $data;
      }
    }
    /**
     * Updates a share target in place. (shareTargets.update)
     *
     * @param string $id The ID of the share target.
     * @param google_Contact $postBody
     * @param array $optParams Optional parameters.
     * @return google_Contact
     */
    public function update($id, google_Contact $postBody, $optParams = array()) {
      $params = array('id' => $id, 'postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('update', array($params));
      if ($this->useObjects()) {
        return new google_Contact($data);
      } else {
        return $data;
      }
    }
  }

  /**
   * The "subscriptions" collection of methods.
   * Typical usage is:
   *  <code>
   *   $mirrorService = new google_MirrorService(...);
   *   $subscriptions = $mirrorService->subscriptions;
   *  </code>
   */
  class google_SubscriptionsServiceResource extends Google_ServiceResource {


    /**
     * Deletes a subscription. (subscriptions.delete)
     *
     * @param string $id The ID of the subscription.
     * @param array $optParams Optional parameters.
     */
    public function delete($id, $optParams = array()) {
      $params = array('id' => $id);
      $params = array_merge($params, $optParams);
      $data = $this->__call('delete', array($params));
      return $data;
    }
    /**
     * Creates a new subscription. (subscriptions.insert)
     *
     * @param google_Subscription $postBody
     * @param array $optParams Optional parameters.
     * @return google_Subscription
     */
    public function insert(google_Subscription $postBody, $optParams = array()) {
      $params = array('postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('insert', array($params));
      if ($this->useObjects()) {
        return new google_Subscription($data);
      } else {
        return $data;
      }
    }
    /**
     * Retrieves a list of subscriptions for the authenticated user and service. (subscriptions.list)
     *
     * @param array $optParams Optional parameters.
     * @return google_SubscriptionsListResponse
     */
    public function listSubscriptions($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('list', array($params));
      if ($this->useObjects()) {
        return new google_SubscriptionsListResponse($data);
      } else {
        return $data;
      }
    }
    /**
     * Updates an existing subscription in place. (subscriptions.update)
     *
     * @param string $id The ID of the subscription.
     * @param google_Subscription $postBody
     * @param array $optParams Optional parameters.
     * @return google_Subscription
     */
    public function update($id, google_Subscription $postBody, $optParams = array()) {
      $params = array('id' => $id, 'postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('update', array($params));
      if ($this->useObjects()) {
        return new google_Subscription($data);
      } else {
        return $data;
      }
    }
  }

  /**
   * The "timeline" collection of methods.
   * Typical usage is:
   *  <code>
   *   $mirrorService = new google_MirrorService(...);
   *   $timeline = $mirrorService->timeline;
   *  </code>
   */
  class google_TimelineServiceResource extends Google_ServiceResource {


    /**
     * Deletes a timeline item. (timeline.delete)
     *
     * @param string $id The ID of the timeline item.
     * @param array $optParams Optional parameters.
     */
    public function delete($id, $optParams = array()) {
      $params = array('id' => $id);
      $params = array_merge($params, $optParams);
      $data = $this->__call('delete', array($params));
      return $data;
    }
    /**
     * Gets a single timeline item by ID. (timeline.get)
     *
     * @param string $id The ID of the timeline item.
     * @param array $optParams Optional parameters.
     * @return google_TimelineItem
     */
    public function get($id, $optParams = array()) {
      $params = array('id' => $id);
      $params = array_merge($params, $optParams);
      $data = $this->__call('get', array($params));
      if ($this->useObjects()) {
        return new google_TimelineItem($data);
      } else {
        return $data;
      }
    }
    /**
     * Inserts a new item into the timeline. (timeline.insert)
     *
     * @param google_TimelineItem $postBody
     * @param array $optParams Optional parameters.
     * @return google_TimelineItem
     */
    public function insert(google_TimelineItem $postBody, $optParams = array()) {
      $params = array('postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('insert', array($params));
      if ($this->useObjects()) {
        return new google_TimelineItem($data);
      } else {
        return $data;
      }
    }
    /**
     * Retrieves a list of timeline items for the authenticated user. (timeline.list)
     *
     * @param array $optParams Optional parameters.
     *
     * @opt_param string bundleId If provided, only items with the given bundleId will be returned.
     * @opt_param bool includeDeleted If true, tombstone records for deleted items will be returned.
     * @opt_param string maxResults The maximum number of items to include in the response, used for paging.
     * @opt_param string orderBy Controls the order in which timeline items are returned.
     * @opt_param string pageToken Token for the page of results to return.
     * @opt_param bool pinnedOnly If true, only pinned items will be returned.
     * @return google_TimelineListResponse
     */
    public function listTimeline($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('list', array($params));
      if ($this->useObjects()) {
        return new google_TimelineListResponse($data);
      } else {
        return $data;
      }
    }
    /**
     * Updates a timeline item in place. This method supports patch semantics. (timeline.patch)
     *
     * @param string $id The ID of the timeline item.
     * @param google_TimelineItem $postBody
     * @param array $optParams Optional parameters.
     * @return google_TimelineItem
     */
    public function patch($id, google_TimelineItem $postBody, $optParams = array()) {
      $params = array('id' => $id, 'postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('patch', array($params));
      if ($this->useObjects()) {
        return new google_TimelineItem($data);
      } else {
        return $data;
      }
    }
    /**
     * Updates a timeline item in place. (timeline.update)
     *
     * @param string $id The ID of the timeline item.
     * @param google_TimelineItem $postBody
     * @param array $optParams Optional parameters.
     * @return google_TimelineItem
     */
    public function update($id, google_TimelineItem $postBody, $optParams = array()) {
      $params = array('id' => $id, 'postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('update', array($params));
      if ($this->useObjects()) {
        return new google_TimelineItem($data);
      } else {
        return $data;
      }
    }
  }

  /**
   * The "attachments" collection of methods.
   * Typical usage is:
   *  <code>
   *   $mirrorService = new google_MirrorService(...);
   *   $attachments = $mirrorService->attachments;
   *  </code>
   */
  class google_TimelineAttachmentsServiceResource extends Google_ServiceResource {


    /**
     * Deletes an attachment from a timeline item. (attachments.delete)
     *
     * @param string $itemId The ID of the timeline item the attachment belongs to.
     * @param string $attachmentId The ID of the attachment.
     * @param array $optParams Optional parameters.
     */
    public function delete($itemId, $attachmentId, $optParams = array()) {
      $params = array('itemId' => $itemId, 'attachmentId' => $attachmentId);
      $params = array_merge($params, $optParams);
      $data = $this->__call('delete', array($params));
      return $data;
    }
    /**
     * Retrieves an attachment on a timeline item by item ID and attachment ID. (attachments.get)
     *
     * @param string $itemId The ID of the timeline item the attachment belongs to.
     * @param string $attachmentId The ID of the attachment.
     * @param array $optParams Optional parameters.
     * @return google_Attachment
     */
    public function get($itemId, $attachmentId, $optParams = array()) {
      $params = array('itemId' => $itemId, 'attachmentId' => $attachmentId);
      $params = array_merge($params, $optParams);
      $data = $this->__call('get', array($params));
      if ($this->useObjects()) {
        return new google_Attachment($data);
      } else {
        return $data;
      }
    }
    /**
     * Adds a new attachment to a timeline item. (attachments.insert)
     *
     * @param string $itemId The ID of the timeline item the attachment belongs to.
     * @param array $optParams Optional parameters.
     * @return google_Attachment
     */
    public function insert($itemId, $optParams = array()) {
      $params = array('itemId' => $itemId);
      $params = array_merge($params, $optParams);
      $data = $this->__call('insert', array($params));
      if ($this->useObjects()) {
        return new google_Attachment($data);
      } else {
        return $data;
      }
    }
    /**
     * Returns a list of attachments for a timeline item. (attachments.list)
     *
     * @param string $itemId The ID of the timeline item whose attachments should be listed.
     * @param array $optParams Optional parameters.
     * @return google_AttachmentsListResponse
     */
    public function listTimelineAttachments($itemId, $optParams = array()) {
      $params = array('itemId' => $itemId);
      $params = array_merge($params, $optParams);
      $data = $this->__call('list', array($params));
      if ($this->useObjects()) {
        return new google_AttachmentsListResponse($data);
      } else {
        return $data;
      }
    }
  }

/**
 * Service definition for google_Mirror (v1).
 *
 * <p>
 * API for interacting with Glass users via the timeline.
 * </p>
 *
 * <p>
 * For more information about this service, see the
 * <a href="https://developers.google.com/glass" target="_blank">API Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class google_MirrorService extends Google_Service {
  public $contacts;
  public $locations;
  public $shareTargets;
  public $subscriptions;
  public $timeline;
  public $timeline_attachments;
  /**
   * Constructs the internal representation of the Mirror service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client) {
    $this->servicePath = 'mirror/v1/';
    $this->version = 'v1';
    $this->serviceName = 'mirror';

    $client->addService($this->serviceName, $this->version);
    $this->contacts = new google_ContactsServiceResource($this, $this->serviceName, 'contacts', json_decode('{"methods": {"delete": {"id": "mirror.contacts.delete", "path": "contacts/{id}", "httpMethod": "DELETE", "parameters": {"id": {"type": "string", "required": true, "location": "path"}}}, "get": {"id": "mirror.contacts.get", "path": "contacts/{id}", "httpMethod": "GET", "parameters": {"id": {"type": "string", "required": true, "location": "path"}}, "response": {"$ref": "Contact"}}, "insert": {"id": "mirror.contacts.insert", "path": "contacts", "httpMethod": "POST", "request": {"$ref": "Contact"}, "response": {"$ref": "Contact"}}, "list": {"id": "mirror.contacts.list", "path": "contacts", "httpMethod": "GET", "response": {"$ref": "ContactsListResponse"}}, "patch": {"id": "mirror.contacts.patch", "path": "contacts/{id}", "httpMethod": "PATCH", "parameters": {"id": {"type": "string", "required": true, "location": "path"}}, "request": {"$ref": "Contact"}, "response": {"$ref": "Contact"}}, "update": {"id": "mirror.contacts.update", "path": "contacts/{id}", "httpMethod": "PUT", "parameters": {"id": {"type": "string", "required": true, "location": "path"}}, "request": {"$ref": "Contact"}, "response": {"$ref": "Contact"}}}}', true));
    $this->locations = new google_LocationsServiceResource($this, $this->serviceName, 'locations', json_decode('{"methods": {"get": {"id": "mirror.locations.get", "path": "locations/{id}", "httpMethod": "GET", "parameters": {"id": {"type": "string", "required": true, "location": "path"}}, "response": {"$ref": "Location"}}, "list": {"id": "mirror.locations.list", "path": "locations", "httpMethod": "GET", "response": {"$ref": "LocationsListResponse"}}}}', true));
    $this->shareTargets = new google_ShareTargetsServiceResource($this, $this->serviceName, 'shareTargets', json_decode('{"methods": {"delete": {"id": "mirror.shareTargets.delete", "path": "shareTargets/{id}", "httpMethod": "DELETE", "parameters": {"id": {"type": "string", "required": true, "location": "path"}}}, "get": {"id": "mirror.shareTargets.get", "path": "shareTargets/{id}", "httpMethod": "GET", "parameters": {"id": {"type": "string", "required": true, "location": "path"}}, "response": {"$ref": "Contact"}}, "insert": {"id": "mirror.shareTargets.insert", "path": "shareTargets", "httpMethod": "POST", "request": {"$ref": "Contact"}, "response": {"$ref": "Contact"}}, "list": {"id": "mirror.shareTargets.list", "path": "shareTargets", "httpMethod": "GET", "response": {"$ref": "ShareTargetsListResponse"}}, "patch": {"id": "mirror.shareTargets.patch", "path": "shareTargets/{id}", "httpMethod": "PATCH", "parameters": {"id": {"type": "string", "required": true, "location": "path"}}, "request": {"$ref": "Contact"}, "response": {"$ref": "Contact"}}, "update": {"id": "mirror.shareTargets.update", "path": "shareTargets/{id}", "httpMethod": "PUT", "parameters": {"id": {"type": "string", "required": true, "location": "path"}}, "request": {"$ref": "Contact"}, "response": {"$ref": "Contact"}}}}', true));
    $this->subscriptions = new google_SubscriptionsServiceResource($this, $this->serviceName, 'subscriptions', json_decode('{"methods": {"delete": {"id": "mirror.subscriptions.delete", "path": "subscriptions/{id}", "httpMethod": "DELETE", "parameters": {"id": {"type": "string", "required": true, "location": "path"}}}, "insert": {"id": "mirror.subscriptions.insert", "path": "subscriptions", "httpMethod": "POST", "request": {"$ref": "Subscription"}, "response": {"$ref": "Subscription"}}, "list": {"id": "mirror.subscriptions.list", "path": "subscriptions", "httpMethod": "GET", "response": {"$ref": "SubscriptionsListResponse"}}, "update": {"id": "mirror.subscriptions.update", "path": "subscriptions/{id}", "httpMethod": "PUT", "parameters": {"id": {"type": "string", "required": true, "location": "path"}}, "request": {"$ref": "Subscription"}, "response": {"$ref": "Subscription"}}}}', true));
    $this->timeline = new google_TimelineServiceResource($this, $this->serviceName, 'timeline', json_decode('{"methods": {"delete": {"id": "mirror.timeline.delete", "path": "timeline/{id}", "httpMethod": "DELETE", "parameters": {"id": {"type": "string", "required": true, "location": "path"}}}, "get": {"id": "mirror.timeline.get", "path": "timeline/{id}", "httpMethod": "GET", "parameters": {"id": {"type": "string", "required": true, "location": "path"}}, "response": {"$ref": "TimelineItem"}}, "insert": {"id": "mirror.timeline.insert", "path": "timeline", "httpMethod": "POST", "request": {"$ref": "TimelineItem"}, "response": {"$ref": "TimelineItem"}, "supportsMediaUpload": true, "mediaUpload": {"accept": ["audio/*", "image/*", "video/*"], "maxSize": "10MB", "protocols": {"simple": {"multipart": true, "path": "/upload/mirror/v1/timeline"}, "resumable": {"multipart": true, "path": "/resumable/upload/mirror/v1/timeline"}}}}, "list": {"id": "mirror.timeline.list", "path": "timeline", "httpMethod": "GET", "parameters": {"bundleId": {"type": "string", "location": "query"}, "includeDeleted": {"type": "boolean", "location": "query"}, "maxResults": {"type": "integer", "format": "uint32", "location": "query"}, "orderBy": {"type": "string", "enum": ["displayTime", "writeTime"], "location": "query"}, "pageToken": {"type": "string", "location": "query"}, "pinnedOnly": {"type": "boolean", "location": "query"}}, "response": {"$ref": "TimelineListResponse"}}, "patch": {"id": "mirror.timeline.patch", "path": "timeline/{id}", "httpMethod": "PATCH", "parameters": {"id": {"type": "string", "required": true, "location": "path"}}, "request": {"$ref": "TimelineItem"}, "response": {"$ref": "TimelineItem"}}, "update": {"id": "mirror.timeline.update", "path": "timeline/{id}", "httpMethod": "PUT", "parameters": {"id": {"type": "string", "required": true, "location": "path"}}, "request": {"$ref": "TimelineItem"}, "response": {"$ref": "TimelineItem"}, "supportsMediaUpload": true, "mediaUpload": {"accept": ["audio/*", "image/*", "video/*"], "maxSize": "10MB", "protocols": {"simple": {"multipart": true, "path": "/upload/mirror/v1/timeline/{id}"}, "resumable": {"multipart": true, "path": "/resumable/upload/mirror/v1/timeline/{id}"}}}}}}', true));
    $this->timeline_attachments = new google_TimelineAttachmentsServiceResource($this, $this->serviceName, 'attachments', json_decode('{"methods": {"delete": {"id": "mirror.timeline.attachments.delete", "path": "timeline/{itemId}/attachments/{attachmentId}", "httpMethod": "DELETE", "parameters": {"attachmentId": {"type": "string", "required": true, "location": "path"}, "itemId": {"type": "string", "required": true, "location": "path"}}}, "get": {"id": "mirror.timeline.attachments.get", "path": "timeline/{itemId}/attachments/{attachmentId}", "httpMethod": "GET", "parameters": {"attachmentId": {"type": "string", "required": true, "location": "path"}, "itemId": {"type": "string", "required": true, "location": "path"}}, "response": {"$ref": "Attachment"}, "supportsMediaDownload": true}, "insert": {"id": "mirror.timeline.attachments.insert", "path": "timeline/{itemId}/attachments", "httpMethod": "POST", "parameters": {"itemId": {"type": "string", "required": true, "location": "path"}}, "response": {"$ref": "Attachment"}, "supportsMediaUpload": true, "mediaUpload": {"accept": ["audio/*", "image/*", "video/*"], "maxSize": "10MB", "protocols": {"simple": {"multipart": true, "path": "/upload/mirror/v1/timeline/{itemId}/attachments"}, "resumable": {"multipart": true, "path": "/resumable/upload/mirror/v1/timeline/{itemId}/attachments"}}}}, "list": {"id": "mirror.timeline.attachments.list", "path": "timeline/{itemId}/attachments", "httpMethod": "GET", "parameters": {"itemId": {"type": "string", "required": true, "location": "path"}}, "response": {"$ref": "AttachmentsListResponse"}}}}', true));

  }
}



class google_Attachment extends Google_Model {
  public $contentType;
  public $contentUrl;
  public $id;
  public $isProcessingContent;
  public function setContentType($contentType) {
    $this->contentType = $contentType;
  }
  public function getContentType() {
    return $this->contentType;
  }
  public function setContentUrl($contentUrl) {
    $this->contentUrl = $contentUrl;
  }
  public function getContentUrl() {
    return $this->contentUrl;
  }
  public function setId($id) {
    $this->id = $id;
  }
  public function getId() {
    return $this->id;
  }
  public function setIsProcessingContent($isProcessingContent) {
    $this->isProcessingContent = $isProcessingContent;
  }
  public function getIsProcessingContent() {
    return $this->isProcessingContent;
  }
}

class google_AttachmentsListResponse extends Google_Model {
  protected $__itemsType = 'google_Attachment';
  protected $__itemsDataType = 'array';
  public $items;
  public $kind;
  public function setItems(/* array(google_Attachment) */ $items) {
    $this->assertIsArray($items, 'google_Attachment', __METHOD__);
    $this->items = $items;
  }
  public function getItems() {
    return $this->items;
  }
  public function setKind($kind) {
    $this->kind = $kind;
  }
  public function getKind() {
    return $this->kind;
  }
}

class google_Contact extends Google_Model {
  public $acceptTypes;
  public $displayName;
  public $email;
  public $id;
  public $imageUrls;
  public $kind;
  public $phoneNumber;
  public $priority;
  public $secondaryEmails;
  public $secondaryPhoneNumbers;
  public $source;
  public $type;
  public function setAcceptTypes(/* array(google_string) */ $acceptTypes) {
    $this->assertIsArray($acceptTypes, 'google_string', __METHOD__);
    $this->acceptTypes = $acceptTypes;
  }
  public function getAcceptTypes() {
    return $this->acceptTypes;
  }
  public function setDisplayName($displayName) {
    $this->displayName = $displayName;
  }
  public function getDisplayName() {
    return $this->displayName;
  }
  public function setEmail($email) {
    $this->email = $email;
  }
  public function getEmail() {
    return $this->email;
  }
  public function setId($id) {
    $this->id = $id;
  }
  public function getId() {
    return $this->id;
  }
  public function setImageUrls(/* array(google_string) */ $imageUrls) {
    $this->assertIsArray($imageUrls, 'google_string', __METHOD__);
    $this->imageUrls = $imageUrls;
  }
  public function getImageUrls() {
    return $this->imageUrls;
  }
  public function setKind($kind) {
    $this->kind = $kind;
  }
  public function getKind() {
    return $this->kind;
  }
  public function setPhoneNumber($phoneNumber) {
    $this->phoneNumber = $phoneNumber;
  }
  public function getPhoneNumber() {
    return $this->phoneNumber;
  }
  public function setPriority($priority) {
    $this->priority = $priority;
  }
  public function getPriority() {
    return $this->priority;
  }
  public function setSecondaryEmails(/* array(google_string) */ $secondaryEmails) {
    $this->assertIsArray($secondaryEmails, 'google_string', __METHOD__);
    $this->secondaryEmails = $secondaryEmails;
  }
  public function getSecondaryEmails() {
    return $this->secondaryEmails;
  }
  public function setSecondaryPhoneNumbers(/* array(google_string) */ $secondaryPhoneNumbers) {
    $this->assertIsArray($secondaryPhoneNumbers, 'google_string', __METHOD__);
    $this->secondaryPhoneNumbers = $secondaryPhoneNumbers;
  }
  public function getSecondaryPhoneNumbers() {
    return $this->secondaryPhoneNumbers;
  }
  public function setSource($source) {
    $this->source = $source;
  }
  public function getSource() {
    return $this->source;
  }
  public function setType($type) {
    $this->type = $type;
  }
  public function getType() {
    return $this->type;
  }
}

class google_ContactsListResponse extends Google_Model {
  protected $__itemsType = 'google_Contact';
  protected $__itemsDataType = 'array';
  public $items;
  public $kind;
  public function setItems(/* array(google_Contact) */ $items) {
    $this->assertIsArray($items, 'google_Contact', __METHOD__);
    $this->items = $items;
  }
  public function getItems() {
    return $this->items;
  }
  public function setKind($kind) {
    $this->kind = $kind;
  }
  public function getKind() {
    return $this->kind;
  }
}

class google_Location extends Google_Model {
  public $accuracy;
  public $address;
  public $displayName;
  public $id;
  public $kind;
  public $latitude;
  public $longitude;
  public $timestamp;
  public function setAccuracy($accuracy) {
    $this->accuracy = $accuracy;
  }
  public function getAccuracy() {
    return $this->accuracy;
  }
  public function setAddress($address) {
    $this->address = $address;
  }
  public function getAddress() {
    return $this->address;
  }
  public function setDisplayName($displayName) {
    $this->displayName = $displayName;
  }
  public function getDisplayName() {
    return $this->displayName;
  }
  public function setId($id) {
    $this->id = $id;
  }
  public function getId() {
    return $this->id;
  }
  public function setKind($kind) {
    $this->kind = $kind;
  }
  public function getKind() {
    return $this->kind;
  }
  public function setLatitude($latitude) {
    $this->latitude = $latitude;
  }
  public function getLatitude() {
    return $this->latitude;
  }
  public function setLongitude($longitude) {
    $this->longitude = $longitude;
  }
  public function getLongitude() {
    return $this->longitude;
  }
  public function setTimestamp($timestamp) {
    $this->timestamp = $timestamp;
  }
  public function getTimestamp() {
    return $this->timestamp;
  }
}

class google_LocationsListResponse extends Google_Model {
  protected $__itemsType = 'google_Location';
  protected $__itemsDataType = 'array';
  public $items;
  public $kind;
  public function setItems(/* array(google_Location) */ $items) {
    $this->assertIsArray($items, 'google_Location', __METHOD__);
    $this->items = $items;
  }
  public function getItems() {
    return $this->items;
  }
  public function setKind($kind) {
    $this->kind = $kind;
  }
  public function getKind() {
    return $this->kind;
  }
}

class google_MenuItem extends Google_Model {
  public $action;
  public $id;
  public $removeWhenSelected;
  protected $__valuesType = 'google_MenuValue';
  protected $__valuesDataType = 'array';
  public $values;
  public function setAction($action) {
    $this->action = $action;
  }
  public function getAction() {
    return $this->action;
  }
  public function setId($id) {
    $this->id = $id;
  }
  public function getId() {
    return $this->id;
  }
  public function setRemoveWhenSelected($removeWhenSelected) {
    $this->removeWhenSelected = $removeWhenSelected;
  }
  public function getRemoveWhenSelected() {
    return $this->removeWhenSelected;
  }
  public function setValues(/* array(google_MenuValue) */ $values) {
    $this->assertIsArray($values, 'google_MenuValue', __METHOD__);
    $this->values = $values;
  }
  public function getValues() {
    return $this->values;
  }
}

class google_MenuValue extends Google_Model {
  public $displayName;
  public $iconUrl;
  public $state;
  public function setDisplayName($displayName) {
    $this->displayName = $displayName;
  }
  public function getDisplayName() {
    return $this->displayName;
  }
  public function setIconUrl($iconUrl) {
    $this->iconUrl = $iconUrl;
  }
  public function getIconUrl() {
    return $this->iconUrl;
  }
  public function setState($state) {
    $this->state = $state;
  }
  public function getState() {
    return $this->state;
  }
}

class google_Notification extends Google_Model {
  public $collection;
  public $itemId;
  public $operation;
  protected $__userActionsType = 'google_UserAction';
  protected $__userActionsDataType = 'array';
  public $userActions;
  public $userToken;
  public $verifyToken;
  public function setCollection($collection) {
    $this->collection = $collection;
  }
  public function getCollection() {
    return $this->collection;
  }
  public function setItemId($itemId) {
    $this->itemId = $itemId;
  }
  public function getItemId() {
    return $this->itemId;
  }
  public function setOperation($operation) {
    $this->operation = $operation;
  }
  public function getOperation() {
    return $this->operation;
  }
  public function setUserActions(/* array(google_UserAction) */ $userActions) {
    $this->assertIsArray($userActions, 'google_UserAction', __METHOD__);
    $this->userActions = $userActions;
  }
  public function getUserActions() {
    return $this->userActions;
  }
  public function setUserToken($userToken) {
    $this->userToken = $userToken;
  }
  public function getUserToken() {
    return $this->userToken;
  }
  public function setVerifyToken($verifyToken) {
    $this->verifyToken = $verifyToken;
  }
  public function getVerifyToken() {
    return $this->verifyToken;
  }
}

class google_NotificationConfig extends Google_Model {
  public $deliveryTime;
  public $level;
  public function setDeliveryTime($deliveryTime) {
    $this->deliveryTime = $deliveryTime;
  }
  public function getDeliveryTime() {
    return $this->deliveryTime;
  }
  public function setLevel($level) {
    $this->level = $level;
  }
  public function getLevel() {
    return $this->level;
  }
}

class google_ShareTargetsListResponse extends Google_Model {
  protected $__itemsType = 'google_Contact';
  protected $__itemsDataType = 'array';
  public $items;
  public $kind;
  public function setItems(/* array(google_Contact) */ $items) {
    $this->assertIsArray($items, 'google_Contact', __METHOD__);
    $this->items = $items;
  }
  public function getItems() {
    return $this->items;
  }
  public function setKind($kind) {
    $this->kind = $kind;
  }
  public function getKind() {
    return $this->kind;
  }
}

class google_Subscription extends Google_Model {
  public $callbackUrl;
  public $collection;
  public $id;
  public $kind;
  public $operation;
  public $updated;
  public $userToken;
  public $verifyToken;
  public function setCallbackUrl($callbackUrl) {
    $this->callbackUrl = $callbackUrl;
  }
  public function getCallbackUrl() {
    return $this->callbackUrl;
  }
  public function setCollection($collection) {
    $this->collection = $collection;
  }
  public function getCollection() {
    return $this->collection;
  }
  public function setId($id) {
    $this->id = $id;
  }
  public function getId() {
    return $this->id;
  }
  public function setKind($kind) {
    $this->kind = $kind;
  }
  public function getKind() {
    return $this->kind;
  }
  public function setOperation(/* array(google_string) */ $operation) {
    $this->assertIsArray($operation, 'google_string', __METHOD__);
    $this->operation = $operation;
  }
  public function getOperation() {
    return $this->operation;
  }
  public function setUpdated($updated) {
    $this->updated = $updated;
  }
  public function getUpdated() {
    return $this->updated;
  }
  public function setUserToken($userToken) {
    $this->userToken = $userToken;
  }
  public function getUserToken() {
    return $this->userToken;
  }
  public function setVerifyToken($verifyToken) {
    $this->verifyToken = $verifyToken;
  }
  public function getVerifyToken() {
    return $this->verifyToken;
  }
}

class google_SubscriptionsListResponse extends Google_Model {
  protected $__itemsType = 'google_Subscription';
  protected $__itemsDataType = 'array';
  public $items;
  public $kind;
  public function setItems(/* array(google_Subscription) */ $items) {
    $this->assertIsArray($items, 'google_Subscription', __METHOD__);
    $this->items = $items;
  }
  public function getItems() {
    return $this->items;
  }
  public function setKind($kind) {
    $this->kind = $kind;
  }
  public function getKind() {
    return $this->kind;
  }
}

class google_TimelineItem extends Google_Model {
  protected $__attachmentsType = 'google_Attachment';
  protected $__attachmentsDataType = 'array';
  public $attachments;
  public $bundleId;
  public $canonicalUrl;
  public $created;
  protected $__creatorType = 'google_Contact';
  protected $__creatorDataType = '';
  public $creator;
  public $displayTime;
  public $etag;
  public $html;
  public $htmlPages;
  public $id;
  public $inReplyTo;
  public $isBundleCover;
  public $isDeleted;
  public $isPinned;
  public $kind;
  protected $__locationType = 'google_Location';
  protected $__locationDataType = '';
  public $location;
  protected $__menuItemsType = 'google_MenuItem';
  protected $__menuItemsDataType = 'array';
  public $menuItems;
  protected $__notificationType = 'google_NotificationConfig';
  protected $__notificationDataType = '';
  public $notification;
  public $pinScore;
  protected $__recipientsType = 'google_Contact';
  protected $__recipientsDataType = 'array';
  public $recipients;
  public $selfLink;
  public $sourceItemId;
  public $speakableText;
  public $text;
  public $title;
  public $updated;
  public function setAttachments(/* array(google_Attachment) */ $attachments) {
    $this->assertIsArray($attachments, 'google_Attachment', __METHOD__);
    $this->attachments = $attachments;
  }
  public function getAttachments() {
    return $this->attachments;
  }
  public function setBundleId($bundleId) {
    $this->bundleId = $bundleId;
  }
  public function getBundleId() {
    return $this->bundleId;
  }
  public function setCanonicalUrl($canonicalUrl) {
    $this->canonicalUrl = $canonicalUrl;
  }
  public function getCanonicalUrl() {
    return $this->canonicalUrl;
  }
  public function setCreated($created) {
    $this->created = $created;
  }
  public function getCreated() {
    return $this->created;
  }
  public function setCreator(google_Contact $creator) {
    $this->creator = $creator;
  }
  public function getCreator() {
    return $this->creator;
  }
  public function setDisplayTime($displayTime) {
    $this->displayTime = $displayTime;
  }
  public function getDisplayTime() {
    return $this->displayTime;
  }
  public function setEtag($etag) {
    $this->etag = $etag;
  }
  public function getEtag() {
    return $this->etag;
  }
  public function setHtml($html) {
    $this->html = $html;
  }
  public function getHtml() {
    return $this->html;
  }
  public function setHtmlPages(/* array(google_string) */ $htmlPages) {
    $this->assertIsArray($htmlPages, 'google_string', __METHOD__);
    $this->htmlPages = $htmlPages;
  }
  public function getHtmlPages() {
    return $this->htmlPages;
  }
  public function setId($id) {
    $this->id = $id;
  }
  public function getId() {
    return $this->id;
  }
  public function setInReplyTo($inReplyTo) {
    $this->inReplyTo = $inReplyTo;
  }
  public function getInReplyTo() {
    return $this->inReplyTo;
  }
  public function setIsBundleCover($isBundleCover) {
    $this->isBundleCover = $isBundleCover;
  }
  public function getIsBundleCover() {
    return $this->isBundleCover;
  }
  public function setIsDeleted($isDeleted) {
    $this->isDeleted = $isDeleted;
  }
  public function getIsDeleted() {
    return $this->isDeleted;
  }
  public function setIsPinned($isPinned) {
    $this->isPinned = $isPinned;
  }
  public function getIsPinned() {
    return $this->isPinned;
  }
  public function setKind($kind) {
    $this->kind = $kind;
  }
  public function getKind() {
    return $this->kind;
  }
  public function setLocation(google_Location $location) {
    $this->location = $location;
  }
  public function getLocation() {
    return $this->location;
  }
  public function setMenuItems(/* array(google_MenuItem) */ $menuItems) {
    $this->assertIsArray($menuItems, 'google_MenuItem', __METHOD__);
    $this->menuItems = $menuItems;
  }
  public function getMenuItems() {
    return $this->menuItems;
  }
  public function setNotification(google_NotificationConfig $notification) {
    $this->notification = $notification;
  }
  public function getNotification() {
    return $this->notification;
  }
  public function setPinScore($pinScore) {
    $this->pinScore = $pinScore;
  }
  public function getPinScore() {
    return $this->pinScore;
  }
  public function setRecipients(/* array(google_Contact) */ $recipients) {
    $this->assertIsArray($recipients, 'google_Contact', __METHOD__);
    $this->recipients = $recipients;
  }
  public function getRecipients() {
    return $this->recipients;
  }
  public function setSelfLink($selfLink) {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink() {
    return $this->selfLink;
  }
  public function setSourceItemId($sourceItemId) {
    $this->sourceItemId = $sourceItemId;
  }
  public function getSourceItemId() {
    return $this->sourceItemId;
  }
  public function setSpeakableText($speakableText) {
    $this->speakableText = $speakableText;
  }
  public function getSpeakableText() {
    return $this->speakableText;
  }
  public function setText($text) {
    $this->text = $text;
  }
  public function getText() {
    return $this->text;
  }
  public function setTitle($title) {
    $this->title = $title;
  }
  public function getTitle() {
    return $this->title;
  }
  public function setUpdated($updated) {
    $this->updated = $updated;
  }
  public function getUpdated() {
    return $this->updated;
  }
}

class google_TimelineListResponse extends Google_Model {
  protected $__itemsType = 'google_TimelineItem';
  protected $__itemsDataType = 'array';
  public $items;
  public $kind;
  public $nextPageToken;
  public function setItems(/* array(google_TimelineItem) */ $items) {
    $this->assertIsArray($items, 'google_TimelineItem', __METHOD__);
    $this->items = $items;
  }
  public function getItems() {
    return $this->items;
  }
  public function setKind($kind) {
    $this->kind = $kind;
  }
  public function getKind() {
    return $this->kind;
  }
  public function setNextPageToken($nextPageToken) {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken() {
    return $this->nextPageToken;
  }
}

class google_UserAction extends Google_Model {
  public $payload;
  public $type;
  public function setPayload($payload) {
    $this->payload = $payload;
  }
  public function getPayload() {
    return $this->payload;
  }
  public function setType($type) {
    $this->type = $type;
  }
  public function getType() {
    return $this->type;
  }
}
