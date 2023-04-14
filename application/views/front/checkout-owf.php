<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Payment Gateway</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>

<body><br /> -->

<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" /> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<div class="container name_neon  my-5 pb-5 ">
    <!-- <h2 style="text-align:center">Payment</h2><br /> -->

    <div class="row">
        <?php
        $shipping_cost = 0;
        $disabled = "";
        $deliveryPrice = 0;

        foreach ($cartItems as $cart) {

            $type = array();
            $type_n = $cart['options']['type_n'];
            if ($type_n === "Flower Page") {
                array_push($type, "true");
            }
            if (count($type) > 0) {
                $disabled = "disabled";
                $deliveryPrice = $delivery_price[0]->price;
            }

            $textLength = $cart['qty'] * $cart['options']['textLength'];
            $textHeight = $cart['qty'] * $cart['options']['textHeight'];

            // echo $textHeight . "<br/>";
            // echo $textLength . "<br/>";

            foreach ($cost as $co) {
                // echo print_r($co);
                if ($textHeight > 75) {
                    if ($textHeight > 100) {

                        if ($co->Height === '150' && $textLength <= $co->Width && $textLength > ($co->Width - 10)) {
                            // echo $co->cost . '<br/>';
                            $shipping_cost = $shipping_cost + $co->cost;
                        }
                    } else if ($co->Height === '100' && $textLength <= $co->Width && $textLength > ($co->Width - 10)) {
                        // echo $co->cost . '<br/>';
                        $shipping_cost = $shipping_cost + $co->cost;
                    }
                } else if ($textHeight < 50) {
                    if ($co->Height === '50' && $textLength <= $co->Width && $textLength > ($co->Width - 10)) {
                        // echo $co->cost . '<br/>';
                        $shipping_cost = $shipping_cost + $co->cost;
                    }
                } else if ($textHeight <= $co->Height && $textHeight > ($co->Height - 25) && $textLength <= $co->Width && $textLength > ($co->Width - 10)) {
                    // echo $co->cost . '<br/>';
                    $shipping_cost = $shipping_cost + $co->cost;
                }
            }
        }

        ?>
        <div class="col-md-5 mx-auto ">
            <h4 class="col-12 pb-0 mb-0">DELIVERY DETAILS</h4>

            <div class="selector mt-4">
                <div class="selecotr-item shipping  <?php echo $disabled; ?>">
                    <input type="radio" id="radio1" name="selector" class="selector-item_radio" value="shipping" checked>
                    <label for="radio1" class="selector-item_label"><i class="fa-solid fa-earth"></i><br />shipping ($<?php echo $shipping_cost; ?>)</label>
                </div>
                <div class="selecotr-item delivery">
                    <input type="radio" id="radio2" name="selector" class="selector-item_radio" value="local delivery">
                    <label for="radio2" class="selector-item_label"><i class="fa-solid fa-truck-fast"></i><br />local delivery ($<?php echo !empty($deliveryPrice) ? $deliveryPrice : '0'; ?>)</label>
                </div>
                <div class="selecotr-item pickup">
                    <input type="radio" id="radio3" name="selector" checked class="selector-item_radio" value="store pickup">
                    <label for="radio3" class="selector-item_label"><i class="fa-solid fa-store"></i><br />store pickup</label>
                </div>
            </div>
            <div class="d-flex my-2 address_cart">
                <div class="col-2 d-flex align0items-center justify-content-center">
                    <i class="fa-solid fa-map-location-dot d-flex align-items-center"></i>
                </div>
                <div class="col-10">
                    <strong>Main Store</strong><br />
                    1150 Douglas Ave #1090, Altamonte Springs, FL 32714
                </div>
            </div>
            <div class=" my-2 delivery_cart d-none">
                <!-- <div class="col-2 d-flex align0items-center justify-content-center">
                    <i class="fa-solid fa-map-location-dot d-flex align-items-center"></i>
                </div> -->
                <div class="col-10 d-flex flex-column">

                    <h5> <strong class="d-flex align-items-center">
                            <!-- <div class="col-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-map-location-dot d-flex align-items-center"></i>
                            </div> -->
                            DELIVERY ADDRESS
                        </strong>
                    </h5>
                    <!-- <label for="address">Your Address</label>
                    <textarea type="text" name="address" id="yaddress"></textarea> -->
                </div>
                <form id="#">
                    <div class="form-group">
                        <label for="address">Your Address</label>
                        <textarea type="text" name="address" class="form-control validate_a" id="yaddress"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" name="city" class="form-control validate_a" id="city" />
                    </div>
                    <div class="form-group">
                        <label for="country_n">Country</label>
                        <select name="country_n" class="form-select" id="country_n">
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Åland Islands">Åland Islands</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antarctica">Antarctica</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Bouvet Island">Bouvet Island</option>
                            <option value="Brazil">Brazil</option>
                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo">Congo</option>
                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="French Southern Territories">French Southern Territories</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernsey">Guernsey</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-bissau">Guinea-bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Isle of Man">Isle of Man</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jersey">Jersey</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                            <option value="Korea, Republic of">Korea, Republic of</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macao">Macao</option>
                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Norfolk Island">Norfolk Island</option>
                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Pitcairn">Pitcairn</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Reunion">Reunion</option>
                            <option value="Romania">Romania</option>
                            <option value="Russian Federation">Russian Federation</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Helena">Saint Helena</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                            <option value="Taiwan">Taiwan</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Timor-leste">Timor-leste</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States" selected>United States</option>
                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Viet Nam">Viet Nam</option>
                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                            <option value="Western Sahara">Western Sahara</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                    </div>

                </form>
            </div>
            <div class="warning_red error_d d-none my-4 p-2 text-center">
                Sorry, Shipping is not available for flower products
            </div>
            <div class="">
                <h5><strong>PERSONAL INFORMATION</strong></h5>
                <form class="row" id="personal_f">
                    <div class="form-group col-6">
                        <label for="fullName">First Name</label>
                        <input type="text" name="fullName" class="form-control validate" id="fullName" />
                    </div>
                    <div class="form-group col-6">
                        <label for="lName">Last Name</label>
                        <input type="text" name="lName" class="form-control validate" id="lName" />
                    </div>
                    <div class="form-group col-12">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control validate" id="email" />
                    </div>
                    <div class="form-group col-12 my-2">
                        <label for="order_text">Delivery Note (optional)</label>
                        <textarea type="text" name="order_text" class="form-control" id="order_text"></textarea>
                    </div>
                    <div class="form-group d-none">
                        <label for="delivery_type" class="col-form-label">Delivery type:</label>
                        <input type="text" class="form-control" id="delivery_type" name="delivery_type" value="store pickup" required readonly>
                    </div>

                    <div class="form-group d-none">
                        <label for="totalPrice" class="col-form-label">Total Price in $:</label>
                        <input type="number" class="form-control" id="totalPrice" name="totalPrice" required readonly>
                    </div>

                </form>
            </div>
        </div>
        <div class="col-md-5 mx-auto ">
            <h4 class="col-12 pb-0 mb-0">PAYMENT DETAILS</h4>
            <div class="d-flex mb-3">
                <h5>Sub Total :
                    <?php
                    $TPrice = $this->cart->total() + ($this->cart->total() * $tax);
                    $T_Price = round($TPrice, 2);
                    ?>
                    $ <span><?php echo $this->cart->total()  ?></span> USD
                    <p>Tax: $ <?php echo round($this->cart->total() * $tax, 2) ?> USD</p>
                    <strong>
                        <span id="total_price" class="d-none"><?php echo $T_Price ?></span>
                        <p>TOTAL: $ <span id="show_price"><?php echo $T_Price ?></span> USD</p>
                    </strong>
                </h5>
            </div>
            <h4 class="col-12 pb-0 mb-0">PAYMENT METHOD</h4>
            <p class="mb-2">All transactions are secure and encrypted.</p>

            <div class="panel panel-default card p-2">

                <div class="acc_cards mb-3">
                    <h5 class="mb-0"><strong>Credit Card</strong></h5>
                    <small>We accept all major credit cards.</small>
                    <div class="my-2">
                        <img src="<?php echo base_url('/assets/front/img/visa.svg') ?>" alt="" class="img-fluid">
                        <img src="<?php echo base_url('/assets/front/img/master.svg') ?>" alt="" class="img-fluid">
                        <img src="<?php echo base_url('/assets/front/img/american_express.svg') ?>" alt="" class="img-fluid">
                        <small>and more...</small>
                    </div>
                </div>
                <div class="panel-body">
                    <div class='form-group row'>
                        <div class='col-md-12 error form-group d-none'>
                            <div class='alert-danger alert'>Error occured while making the payment.</div>
                        </div>
                    </div>
                    <form role="form" action="<?php echo base_url('handleStripePayment-owf'); ?>" method="post" class="form-validation" data-cc-on-file="false" data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>" id="payment-form">
                        <div class='col-xs-12 form-group my-2 required'>
                            <!-- <label class='control-label'>Name on Card</label> -->
                            <input class='form-control validate' placeholder="Name on card" size='4' type='text' required>
                        </div>
                        <div class='col-xs-12 form-group my-2 required'>
                            <!-- <label class='control-label'>Card Number</label> -->
                            <input autocomplete='off' placeholder="Card Number" class='form-control card-number validate' size='20' type='number' required>
                        </div>
                        <div class=' row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <!-- <label class='control-label'>CVC</label> -->
                                <input autocomplete='off' placeholder="CVC" class='form-control card-cvc validate' min="3" size='4' type='number' required>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <!-- <label class='control-label'>Expiry Month</label> -->
                                <input class='form-control card-expiry-month validate' placeholder='Expiry Month' size='2' type='number' required>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <!-- <label class='control-label'>Expiry Year</label> -->
                                <input class='form-control card-expiry-year validate' placeholder='Expiry Year' size='4' type='number' required>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <div class='col-md-12 error form-group d-none'>
                                <div class='alert-danger alert'>Error occured while making the payment.</div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <!-- <div class="col-md-6 col-12 d-flex p-4">
                            <img src="<?php echo base_url('assets/front/img/stripe.png'); ?>" alt="" class="img-fluid">
                        </div> -->
                        <div class="col-12 d-flex">
                            <?php
                            if (empty($cartItems)) {
                            ?><button class="btn btn-danger btn-lg btn-block " type="button"><a style="text-decoration:none;color:white" href="<?php echo base_url(''); ?>">Go to Home Page</a></button>
                            <?php
                            } else {
                            ?><button class="btn pay_btn w-100 btn-lg btn-block my-3 ms-auto" type="submit">Pay Now
                                    <!-- ($ -->
                                    <?php
                                    // echo $this->session->userdata('totalPrice') ? $this->session->userdata('totalPrice') : 0 
                                    ?>
                                    <!-- )  -->
                                </button>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- </body> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.pay_btn').click(function() {
            var validate = [];
            $('.validate').each(function() {
                if ($(this).val() === "") {
                    if ($(this).next(".validation").length == 0) // only add if not added
                    {
                        $(this).after("<small class='validation' style='color:red;margin-bottom: 20px;'>Please fill this field.</small>");
                        validate.push('false')
                    }
                } else {
                    $(this).next(".validation").remove(); // remove it
                }
                // console.log($(this).val())
            })
            if ($('.selector-item_radio:checked').val() != "store pickup") {
                $('.validate_a').each(function() {
                    if ($(this).val() === "") {
                        if ($(this).next(".validation").length == 0) // only add if not added
                        {
                            $(this).after("<small class='validation' style='color:red;margin-bottom: 20px;'>Please fill this field.</small>");
                            validate.push('false')
                        }
                    } else {
                        $(this).next(".validation").remove(); // remove it
                    }
                    // console.log($(this).val())
                })
            }
            if (validate.length > 0) {
                console.log('incomplete form')
            } else {

                $.ajax({
                    url: '<?php echo base_url("/submit_address-owf") ?>',
                    data: $('#address_f').serialize(),
                    type: 'post',
                    success: function(res) {
                        console.log(res)
                    }
                })

                $.ajax({
                    url: '<?php echo base_url("/submit_personal-owf") ?>',
                    data: $('#personal_f').serialize(),
                    type: 'post',
                    success: function(res) {
                        console.log(res)
                    }
                })



                $('#payment-form').submit()
            }
        })
    })

    $(function() {
        var $stripeForm = $(".form-validation");
        $('form.form-validation').bind('submit', function(e) {
            var $stripeForm = $(".form-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $stripeForm.find('.required').find(inputSelector),
                $errorMessage = $stripeForm.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });
            if (!$stripeForm.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($stripeForm.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });

        function stripeResponseHandler(status, res) {
            if (res.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(res.error.message);
            } else {
                var token = res['id'];
                $stripeForm.find('input[type=text]').empty();
                $stripeForm.append("<input type='d-none' name='stripeToken' value='" + token + "'/>");
                $stripeForm.get(0).submit();
            }
        }
    });
</script>

<script type="text/javascript">
    <?php if ($this->session->flashdata('success')) { ?>
        sweetAlert("<?php echo $this->session->flashdata('title'); ?>", "<?php echo $this->session->flashdata('success'); ?>", "success");
    <?php } else if ($this->session->flashdata('error')) {  ?>
        sweetAlert("<?php echo $this->session->flashdata('title'); ?>", "<?php echo $this->session->flashdata('error'); ?>", "error");
    <?php } else if ($this->session->flashdata('warning')) {  ?>
        sweetAlert("<?php echo $this->session->flashdata('title'); ?>", "<?php echo $this->session->flashdata('warning'); ?>", "warning");
    <?php } else if ($this->session->flashdata('info')) {  ?>
        sweetAlert("<?php echo $this->session->flashdata('title'); ?>", "<?php echo $this->session->flashdata('info'); ?>", "info");
    <?php } ?>
    $("#totalPrice").val($("#total_price").text())

    function change() {
        var total_sel_price = $("#total_price").text();

        if (total_sel_price == '' || total_sel_price == "0") {
            toastr.error('Price can not be 0! Please add something in Cart First');
            return false;
        }
        var order_text = $(".order_text").val();
        var items = $('#abcd').text()
        console.log(items)
        $("#items").val(items);
        var delivery_type = $('.selector-item_radio:checked').val()
        $("#delivery_type").val(delivery_type);
        var cost = '<?php echo $shipping_cost; ?>';
        var deliveryPrice = <?php echo $deliveryPrice; ?>;
        let isnum = /^\d+$/.test(cost);
        if (delivery_type == 'shipping' && isnum == true) {
            var total_sel_price2 = parseFloat(total_sel_price) + parseInt(cost);
            $("#totalPrice").val(total_sel_price2);
            $("#show_price").text(total_sel_price2);
        } else if (delivery_type == 'local delivery' && isnum == true) {
            var total_sel_price2 = parseFloat(total_sel_price) + parseInt(deliveryPrice);
            $("#totalPrice").val(total_sel_price2);
            $("#show_price").text(total_sel_price2);
        } else {
            $("#totalPrice").val(total_sel_price);
            $("#show_price").text(total_sel_price);
        }
        if ($('.selector-item_radio:checked').val() === 'local delivery' || $('.selector-item_radio:checked').val() === 'shipping') {
            address = $('#yaddress').val()

        } else if ($('.selector-item_radio:checked').val() === 'store pickup') {
            $('#address').val('Pickup From Store')
        }
    }


    $('.pickup').click(function() {
        $('.address_cart').removeClass('d-none')
        $('.delivery_cart').addClass('d-none')
        $('.error_d').addClass('d-none')
        $('.pay_btn').removeClass('no-click')
        $('.delivery_cart input').each(function() {
            $(this).attr('disabled', 'true')
        })
        change()
    })
    $('.shipping').click(function() {
        if ($(this).hasClass('disabled')) {
            $('.address_cart').addClass('d-none')
            $('.delivery_cart').addClass('d-none')
            $('.error_d').removeClass('d-none')
            $('.pay_btn').addClass('no-click')
        } else {
            $('.address_cart').addClass('d-none')
            $('.delivery_cart').removeClass('d-none')
            $('.error_d').addClass('d-none')
            $('.pay_btn').removeClass('no-click')
            $('.delivery_cart input').each(function() {
                $(this).removeAttr('disabled')
            })
        }
        change()
    })
    $('.delivery').click(function() {
        $('.address_cart').addClass('d-none')
        $('.delivery_cart').removeClass('d-none')
        $('.error_d').addClass('d-none')
        $('.pay_btn').removeClass('no-click')
        $('.delivery_cart input').each(function() {
            $(this).removeAttr('disabled')
        })
        change()
    })
</script>

<!-- </html> -->