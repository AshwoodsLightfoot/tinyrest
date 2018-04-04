<?php
/**
 * Test URI:
 * /rest/v1/user/trips/group?&startDate=1520114400&endDate=1522789199
 * /rest/v1/user/trips/single?mode=One&userId=3&tripId=11&startDate=1520114400&endDate=1522789199
 * /rest/v1/user/trips/single?mode=All&groupId=8&startDate=1520114400&endDate=1522789199
 */

namespace App\resources\v1\user;

use App\resources\v1\user\trips\SingleAll;
use App\resources\v1\user\trips\SingleOne;
use TinyRest\ApiValidator;
use TinyRest\ApiResourceBase;

class Trips extends ApiResourceBase
{

  protected $params = [
    'mode' => [
      'type' => ApiValidator::PARAM_TYPE_STRING,
      'require' => ['single'], //only for the method `single`
    ],
    'startDate' => [
      'type' => ApiValidator::PARAM_TYPE_INT,
      'require' => ['group'],
      'convert' => ApiValidator::CONVERT_DATETIMESTRING,
    ],
    'endDate' => [
      'type' => ApiValidator::PARAM_TYPE_INT,
      'require' => ['group'],
      'convert' => ApiValidator::CONVERT_DATETIMESTRING,
    ],
  ];

  public function single()
  {
    switch ($this->paramValues['mode']) {
      case 'One':
        $oSubMethod = new SingleOne($this->oApi);
        break;
      case 'All':
        $oSubMethod = new SingleAll($this->oApi);
        break;
      default:
        throw new \LogicException("Unknown mode `{$this->paramValues['mode']}`");
        break;
    }

    return $oSubMethod->callMethod('get');
  }

  public function group()
  {
    $resultArray = [];
    $resultArray[] = $this->paramValues['startDate'];
    $resultArray[] = $this->paramValues['endDate'];

    return $resultArray;
  }


}