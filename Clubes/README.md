# PayPal Checkout Server-side PHP Demo - Using Orders v2 REST API with PayPal JavaScript SDK

## Prerequisites

1. Update [`api/Config/Config.php`](api/Config/Config.php) with your REST API credentials

2. Verify that all the files are in place by running  and passing the Unit tests (process shown below).

		wget https://phar.phpunit.de/phpunit-5.7.phar 
		(Download a version of PHPunit consisent with your php version)
		
		mv phpunit-5.7.phar /usr/local/bin/phpunit
		
		chmod a+x  /usr/local/bin/phpunit
		
		phpunit --version 
		
		phpunit Tests/unit_test.php

## Quick Start Demo Deployment Using XAMPP

1. Download PHP server.  Use a server such as [XAMPP](https://www.apachefriends.org/index.html) to be able to host the demo code sample.
2. Browse to the `htdocs` directory of XAMPP. Unzip the downloaded demo code folder and place it in this `htdocs` directory.
3. Start the Apache server in XAMPP from the XAMPP control panel.
4. Open the website in the browser and access it as: `http://<your_domain>/<php_code_folder_name>/index.php`
   Here, `your_domain` will be localhost if hosting on your local machine.
   The `php_code_folder_name` is the name of the folder under which the downloaded code resides.
5. Read further instructions when `index.php` in opened in a browser.

1. If you have a newer version of XAMPP, launch the XAMPP control panel. In the General tab, click on Start to start the XAMPP stack.
2. In the Services tab, start the Apache service.
3. In the Volumes tab, click on Mount to mount the `/opt/lampp` volume. Then click on Explore which will launch the file explorer. Go to `htdocs` directory there and unzip the downloaded code sample there.
4. In the Network tab, enable port forwarding for  `localhost:8080 -> 80 (over SSH)`.
5. Next, open your browser and go to the `localhost:8080/<Code sample folder name here>/`  to launch the web application.

## How the code works

- The starting point is `index.php`.
- Click on 'PayPal Checkout’ button and see the experience. Additionally, you can click on "Proceed to Checkout" and see the guest checkout experience.
- In the guest checkout experience, the buyer country can be switched. When switched to one of Germany,Poland, Austria, Belgium, Netherlands, Italy and Spain, you will be able to choose the alternative payment methods offered in those countries. The shipping address will be pre-filled on the Shipping Information page for these countries. For all other countries, the address has to be manually entered.


## License

Code released under [LICENSE](LICENSE.md).
