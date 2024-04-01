<?php

include_once('Config/Config.php');
include_once('Helpers/PayPalHelper.php');

$paypalHelper = new PayPalHelper;

header('Content-Type: application/json');
echo json_encode($paypalHelper->orderGet());