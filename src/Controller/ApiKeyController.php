<?php

namespace Drupal\node_json_data\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ApiKeyController.
 */
class ApiKeyController extends ControllerBase {

  /**
   * Post.
   *
   * @return string
   *   Return Hello string.
   */
  public function Api($api,$nid) {
    $config_api = \Drupal::config('node_json_data.settings')->get('api_key');
    $ans = \Drupal::entityQuery('node')->condition('nid', $nid)->execute();
    $node_exists = !empty($ans);
    if((($api == $config_api) and ($node_exists))  ){
      $result = array(
        'API KEY'=> $api,
        'Node ID'=>$nid,
    );
    return new JsonResponse($result);
  }
  return new JsonResponse(t('Invalid Api Key or Node ID'));

}
}
