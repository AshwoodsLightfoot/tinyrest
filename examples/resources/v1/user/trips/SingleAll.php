<?php

namespace App\resources\v1\user\trips;

use TinyRest\ApiResourceBase;
use TinyRest\ApiValidator;

class SingleAll extends ApiResourceBase
{

  protected $params = [
    'groupId' => [
      'type' => ApiValidator::PARAM_TYPE_INT,
      'require' => 1,
    ],
    'startDate' => [
      'type' => ApiValidator::PARAM_TYPE_INT,
      'require' => 1,
      'convert' => ApiValidator::CONVERT_DATETIMESTRING,
    ],
    'endDate' => [
      'type' => ApiValidator::PARAM_TYPE_INT,
      'require' => 1,
      'convert' => ApiValidator::CONVERT_DATETIMESTRING,
    ],
  ];

  public function get()
  {
    $resultArray = [
      'groupId' => $this->paramValues['groupId'],
      'startDate' => $this->paramValues['startDate'],
      'endDate' => $this->paramValues['endDate'],
    ];

    return $resultArray;
  }

}