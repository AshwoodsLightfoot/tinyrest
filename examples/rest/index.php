<?php

$loader = require __DIR__ . '/../../vendor/autoload.php';
$loader->addPsr4('App\\', __DIR__ . "/../../examples");

//Add test data to PHP session
session_start();
$_SESSION['user_levels'] = [1, 5, 8];

$resultArray = [];
$oResponse = new App\request\ApiResponse();

try {

  $oConfig = new \TinyRest\ApiConfig('App\\resources');
  $oApi = new \TinyRest\Api($oConfig);

  //Get resource by URI. Api will check version/classGroup/resource/method
  $oResource = $oApi->getResourceObject();

  //Get data and make results
  $resultArray = $oResource->callMethod($oApi->getMethod());
  $oResponse->operationSuccess();

} catch (\TinyRest\ApiException $e) {
  $oResponse->setCode($e->getCode());
  $oResponse->setError($e->getMessage());
} catch (Exception $e) {
  //Add debug info about error if debug mode = 1. Example: uri param debugServer=1
  $oResponse->setDebugError('Operation Failed', $e);
}

$oResponse->setField(['data' => $resultArray]);
//Response always contains array
echo $oResponse->getJSON();
exit;
