<?php 

include_once('Config/Config.php');
include_once('Helpers/PayPalHelper.php');

$paypalHelper = new PayPalHelper;

$orderData = array();

if(array_key_exists('updated_shipping', $_POST)) {
    $finalTotal = floatval($_POST['total_amt']) + (floatval($_POST['updated_shipping']) - floatval($_POST['current_shipping']));

    $orderData = '[ {
              "op" : "replace",
              "path" : "/purchase_units/@reference_id==\'PU1\'/amount",
              "value" : {
                "currency_code" : "'.$_POST['currency'].'",
                "value" : "'.$finalTotal.'",
                "breakdown" : {
                  "item_total" : {
                    "currency_code" : "'.$_POST['currency'].'",
                    "value" : "'.$_POST['item_amt'].'"
                  },
                  "shipping" : {
                    "currency_code" : "'.$_POST['currency'].'",
                    "value" : "'.$_POST['updated_shipping'].'"
                  },
                  "tax_total" : {
                    "currency_code" : "'.$_POST['currency'].'",
                    "value" : "'.$_POST['tax_amt'].'"
                  },
                  "shipping_discount" : {
                    "currency_code" : "'.$_POST['currency'].'",
                    "value" : "'.$_POST['shipping_discount'].'"
                  },
                  "handling" : {
                    "currency_code" : "'.$_POST['currency'].'",
                    "value" : "'.$_POST['handling_fee'].'"
                  },
                  "insurance" : {
                    "currency_code" : "'.$_POST['currency'].'",
                    "value" : "'.$_POST['insurance_fee'].'"
                  }
                }
              }       
            }]';
}

header('Content-Type: application/json');
echo json_encode($paypalHelper->orderPatch($orderData));