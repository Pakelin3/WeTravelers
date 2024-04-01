<?php
/*
    * Shipping details page -  Mark Flow.
    * Buyer can enter shipping address information and choose shipping option on this page.
*/
$rootPath = "../";
include_once('../api/Config/Config.php');
include_once('../api/Config/Sample.php');
include('../templates/header.php');

$baseUrl = str_replace("pages/shipping.php", "", URL['current']);
?>

<!-- HTML Content -->

<div class="row-fluid">
    <div class="col-md-offset-4 col-md-4">

        <h3 class="text-center">Informacion de factura</h3>

        <hr>
        <form class="form-horizontal">
            <!-- Shipping Information -->
            <div class="form-group">
                <label for="recipient_name" class="col-sm-5 control-label">nombre</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" id="recipient_name" name="recipient_name" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="line1" class="col-sm-5 control-label">Direccion 1</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" id="line1" name="line1" value="2211 North Street">
                </div>
            </div>
            <div class="form-group">
                <label for="line2" class="col-sm-5 control-label">Direccion Line 2</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" id="line2" name="line2" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="city" class="col-sm-5 control-label">Ciudad</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" id="city" name="city" value="San Jose">
                </div>
            </div>
            <div class="form-group">
                <label for="state" class="col-sm-5 control-label">Estado</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" id="state" name="state" value="CA">
                </div>
            </div>
            <div class="form-group">
                <label for="zip" class="col-sm-5 control-label">Codigo postal</label>
                <div class="col-sm-7">
                    <input class="form-control" type="text" id="zip" name="zip" value="95123">
                </div>
            </div>
            <div class="form-group">
                <label for="countrySelect" class="col-sm-5 control-label">Pais</label>
                <div class="col-sm-7">
                    <select class="form-control" name="countrySelect" id="countrySelect">
                        <option value="AF">Afghanistan</option>
                        <option value="AX">Aland Islands</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antarctica</option>
                        <option value="AG">Antigua and Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BV">Bouvet Island</option>
                        <option value="BR">Brazil</option>
                        <option value="IO">British Indian Ocean Territory</option>
                        <option value="BN">Brunei Darussalam</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CX">Christmas Island</option>
                        <option value="CC">Cocos (Keeling) Islands</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, The Democratic Republic of The</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CI">Cote D'ivoire</option>
                        <option value="HR">Croatia</option>
                        <option value="CU">Cuba</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands (Malvinas)</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GG">Guernsey</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard Island and Mcdonald Islands</option>
                        <option value="VA">Holy See (Vatican City State)</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran, Islamic Republic of</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IM">Isle of Man</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JE">Jersey</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KP">Korea, Democratic People's Republic of</option>
                        <option value="KR">Korea, Republic of</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Lao People's Democratic Republic</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libyan Arab Jamahiriya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macao</option>
                        <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia, Federated States of</option>
                        <option value="MD">Moldova, Republic of</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="ME">Montenegro</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="AN">Netherlands Antilles</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau</option>
                        <option value="PS">Palestinian Territory, Occupied</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Reunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russian Federation</option>
                        <option value="RW">Rwanda</option>
                        <option value="SH">Saint Helena</option>
                        <option value="KN">Saint Kitts and Nevis</option>
                        <option value="LC">Saint Lucia</option>
                        <option value="PM">Saint Pierre and Miquelon</option>
                        <option value="VC">Saint Vincent and The Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome and Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="RS">Serbia</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SK">Slovakia</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="SO">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="GS">South Georgia and The South Sandwich Islands</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SD">Sudan</option>
                        <option value="SR">Suriname</option>
                        <option value="SJ">Svalbard and Jan Mayen</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="SY">Syrian Arab Republic</option>
                        <option value="TW">Taiwan, Province of China</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania, United Republic of</option>
                        <option value="TH">Thailand</option>
                        <option value="TL">Timor-leste</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad and Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TM">Turkmenistan</option>
                        <option value="TC">Turks and Caicos Islands</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>
                        <option value="US" selected>United States</option>
                        <option value="UM">United States Minor Outlying Islands</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistan</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VE">Venezuela</option>
                        <option value="VN">Vietnam</option>
                        <option value="VG">Virgin Islands, British</option>
                        <option value="VI">Virgin Islands, U.S.</option>
                        <option value="WF">Wallis and Futuna</option>
                        <option value="EH">Western Sahara</option>
                        <option value="YE">Yemen</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabwe</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="shippingMethod" class="col-sm-5 control-label">Tipo de viajero</label>
                <div class="col-sm-7">
                    <select class="form-control" name="shippingMethod" id="shippingMethod">
                        <optgroup label="Plan plus" style="font-style:normal;">
                            <option value="8.00">
                                Delujo - +$8.00</option>
                            <option value="4.00">
                                Excursionista - +$4.00</option>
                        </optgroup>
                        <optgroup label="Plan Estandar" style="font-style:normal;">
                            <option value="2.00" selected>
                                Convencional - +$2.00</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <!-- Checkout Options -->
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-7">
                    <div class="radio">
                        <label>
                            <input type="radio" name="paymentMethod" id="paypalRadio" value="paypal" checked>
                            <img src="https://fpdbs.paypal.com/dynamicimageweb?cmd=_dynamic-image&amp;buttontype=ecmark&amp;locale=en_US" alt="Acceptance Mark" class="v-middle">
                            <a href="https://www.paypal.com/us/cgi-bin/webscr?cmd=xpt/Marketing/popup/OLCWhatIsPayPal-outside" onclick="javascript:window.open('https://www.paypal.com/us/cgi-bin/webscr?cmd=xpt/Marketing/popup/OLCWhatIsPayPal-outside','olcwhatispaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, ,left=0, top=0, width=400, height=350'); return false;">What
                                is PayPal?</a>
                        </label>
                    </div>
                    <div class="radio disabled">
                        <label>
                            <input type="radio" name="paymentMethod" id="cardRadio" value="card" disabled>
                            carta
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-7">
                    <!-- Container for PayPal Mark Checkout -->
                    <div id="paypalCheckoutContainer"></div>
                    <a class=" btn-danger btn col-md-5" href="../../Home/Home.php">Volver al inicio</a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Javascript Import -->
<script src="https://www.paypal.com/sdk/js?intent=capture&vault=false&client-id=sb<?php echo isset($_GET['buyer-country']) ? "&buyer-country=" . $_GET['buyer-country'] : "" ?>">
</script>
<script src="<?= $rootPath ?>js/config.js"></script>

<!-- PayPal In-Context Checkout script -->
<script type="text/javascript">
    paypal.Buttons({

        // Set your environment
        env: '<?= PAYPAL_ENVIRONMENT ?>',

        // Set style of button
        style: {
            layout: 'vertical', // horizontal | vertical
            size: 'responsive', // medium | large | responsive
            shape: 'pill', // pill | rect
            color: 'gold' // gold | blue | silver | black
        },

        // Execute payment on authorize
        commit: true,

        // Wait for the PayPal button to be clicked
        createOrder: function() {

            let shippingMethodSelect = document.getElementById("shippingMethod"),
                updatedShipping = shippingMethodSelect.options[shippingMethodSelect.selectedIndex].value,
                countrySelect = document.getElementById("countrySelect"),
                total_amt = parseFloat(<?= SampleCart['item_amt'] ?>) +
                parseFloat(<?= SampleCart['tax_amt'] ?>) +
                parseFloat(<?= SampleCart['handling_fee'] ?>) +
                parseFloat(<?= SampleCart['insurance_fee'] ?>) +
                parseFloat(updatedShipping) -
                parseFloat(<?= SampleCart['shipping_discount'] ?>),
                postData = new FormData();
            postData.append('item_amt', '<?= SampleCart['item_amt'] ?>');
            postData.append('tax_amt', '<?= SampleCart['tax_amt'] ?>');
            postData.append('handling_fee', '<?= SampleCart['handling_fee'] ?>');
            postData.append('insurance_fee', '<?= SampleCart['insurance_fee'] ?>');
            postData.append('shipping_amt', updatedShipping);
            postData.append('shipping_discount', '<?= SampleCart['shipping_discount'] ?>');
            postData.append('total_amt', total_amt);
            postData.append('currency', '<?= SampleCart['currency'] ?>');
            postData.append('return_url', '<?= $baseUrl . URL["redirectUrls"]["returnUrl"] ?>' +
                '?commit=true');
            postData.append('cancel_url', '<?= $baseUrl . URL["redirectUrls"]["cancelUrl"] ?>');
            postData.append('shipping_recipient_name', document.getElementById("recipient_name").value);
            postData.append('shipping_line1', document.getElementById("line1").value);
            postData.append('shipping_line2', document.getElementById("line2").value);
            postData.append('shipping_city', document.getElementById("city").value);
            postData.append('shipping_state', document.getElementById("state").value);
            postData.append('shipping_postal_code', document.getElementById("zip").value);
            postData.append('shipping_country_code', countrySelect.options[countrySelect.selectedIndex].value);

            return fetch(
                '<?= $rootPath . URL['services']['orderCreate'] ?>', {
                    method: 'POST',
                    body: postData
                }
            ).then(function(response) {
                return response.json();
            }).then(function(resJson) {
                return resJson.data.id;
            });
        },

        // Wait for the payment to be authorized by the customer
        onApprove: function(data, actions) {
            // Capture Order
            let postData = new FormData();
            return fetch(
                '<?= $rootPath . URL['services']['orderCapture'] ?>', {
                    method: 'POST',
                    body: postData
                }
            ).then(function(res) {
                return res.json();
            }).then(function() {
                window.location.href = 'success.php?commit=true';
            });
        }

    }).render('#paypalCheckoutContainer');
</script>
<?php
include('../templates/footer.php');
?>