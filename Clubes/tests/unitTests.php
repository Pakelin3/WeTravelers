<?php

use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase {

    public function test_checkPayPalConfiguration() {
        require_once(dirname(__FILE__)."/../api/Config/Config.php");

        // Check if PayPal environment is sandbox
        $this->assertEquals(PAYPAL_ENVIRONMENT,
            "sandbox",
            "PayPal environment is not set to sandbox"
        );

        // Chick if PayPal REST credentials are updated
        $this->assertNotEmpty(PAYPAL_CREDENTIALS['sandbox']['client_id'],
            "PayPal REST client_id is required"
        );
        $this->assertNotEmpty(PAYPAL_CREDENTIALS['sandbox']['client_secret'],
            "PayPal REST client_secret is required"
        );

    }

    public function test_checkSampleCart() {
        require_once(dirname(__FILE__)."/../api/Config/Sample.php");

        $total = SampleCart['item_amt']
            + SampleCart['tax_amt']
            + SampleCart['insurance_fee']
            + SampleCart['handling_fee']
            + SampleCart['shipping_amt']
            + SampleCart['shipping_discount'];

        // Check sample cart total
        $this->assertEquals(SampleCart['total_amt'],
            $total,
            "Cart total does not match itemization"
        );
    }

    public function test_checkDefaultCredentials() {
        require_once(dirname(__FILE__)."/../api/Config/Sample.php");

        // Check if default client ID
        $this->assertNotEquals(PAYPAL_CREDENTIALS['sandbox']['client_id'],
            "Aa2IfcoEvHnfJRnVQLSFrSs3SmTTkv5N1weMEL66ysqYIeHfAqXpDVkjOv3vLhkhbP4eKB6MpRlQIcJw",
            "Using default PayPal REST credentials"
        );

        // Check if default client secret
        $this->assertNotEquals(PAYPAL_CREDENTIALS['sandbox']['client_secret'],
            "EF6l6PDQJEZbdKTeg35pbBSft6WRdALQC3Xrl5vvG0VNgBUehQyTCQ09QdIauxoccvJOf5Aoy-OGsH5G",
            "Using default PayPal REST credentials"
        );
    }
}