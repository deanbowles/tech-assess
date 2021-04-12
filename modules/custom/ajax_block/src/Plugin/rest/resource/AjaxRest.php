<?php

namespace Drupal\ajax_block\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;

/**
 * Provides a Resource
 *
 * @RestResource(
 *   id = "ajax_rest",
 *   label = @Translation("Ajax Rest"),
 *   uri_paths = {
 *     "canonical" = "/api/accessibility"
 *   }
 * )
 */
class AjaxRest extends ResourceBase {

  /**
   * Responds to entity GET requests.
   * @return ResourceResponse
   */
  public function get() {
    $response = ['message' => 'Test message'];
    return new ResourceResponse($response);
  }
}
