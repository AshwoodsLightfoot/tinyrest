<?php

namespace App\resources\v1\user\trips;

use TinyRest\ApiResourceBase;
use TinyRest\ApiValidator;

class SingleOne extends ApiResourceBase
{

  protected $params = [
    'userId' => [
      'type' => ApiValidator::PARAM_TYPE_INT,
      'require' => 1,
    ],
    'tripId' => [
      'type' => ApiValidator::PARAM_TYPE_ARRAY,
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
      'userId' => $this->paramValues['userId'],
      'tripId' => $this->paramValues['tripId'],
      'startDate' => $this->paramValues['startDate'],
      'endDate' => $this->paramValues['endDate'],
    ];

    return $resultArray;
  }

}