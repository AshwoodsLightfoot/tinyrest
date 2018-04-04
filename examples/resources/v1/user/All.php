<?php
/**
 * Test URI:
 * /rest/v1/user/all/group?userId=5&cloneId=7
 * /rest/v1/user/all/single?singleId=3&cloneId=4
 */

namespace App\resources\v1\user;

use TinyRest\ApiResourceBase;
use TinyRest\ApiValidator;

class All extends ApiResourceBase
{

  protected $params = [
    'userLevels' => [
      'type' => ApiValidator::PARAM_TYPE_ARRAY,
      'require' => 1,
      'session' => 'user_levels', //Get data for this parameter from $_SESSION
    ],
    'userId' => [
      'type' => ApiValidator::PARAM_TYPE_INT,
      'require' => ['group'],
    ],
    'cloneId' => [
      'type' => ApiValidator::PARAM_TYPE_INT,
    ],
    'singleId' => [
      'type' => ApiValidator::PARAM_TYPE_INT,
      'require' => ['single'], //This parameter is required for method single only
    ],
  ];

  public function group()
  {
    $userLevels = $this->paramValues['userLevels'];
    $userId = $this->paramValues['userId'];
    $cloneId = 0;
    if (!empty($this->paramValues['cloneId'])) {
      $cloneId = $this->paramValues['cloneId'];
    }

    $resultArray = [
      'userLevels' => $userLevels,
      'userId' => $userId,
      'cloneId' => $cloneId,
    ];

    return $resultArray;
  }

  public function single()
  {
    $userLevels = $this->paramValues['userLevels'];
    $singleId = $this->paramValues['singleId'];
    $cloneId = 0;
    if (!empty($this->paramValues['cloneId'])) {
      $cloneId = $this->paramValues['cloneId'];
    }

    $resultArray = [
      'userLevels' => $userLevels,
      'singleId' => $singleId,
      'cloneId' => $cloneId,
    ];

    return $resultArray;
  }

}