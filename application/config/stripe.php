<?php
defined('BASEPATH') or exit('No direct script access allowed');
/* 
| ------------------------------------------------------------------- 
|  Stripe API Configuration 
| ------------------------------------------------------------------- 
| 
| You will get the API keys from Developers panel of the Stripe account 
| Login to Stripe account (https://dashboard.stripe.com/) 
| and navigate to the Developers » API keys page 
| Remember to switch to your live publishable and secret key in production! 
| 
|  stripe_api_key            string   Your Stripe API Secret key. 
|  stripe_publishable_key    string   Your Stripe API Publishable key. 
|  stripe_currency           string   Currency code. 
*/
// $config['stripe_key'] = 'pk_test_lm2FhkrIxh6nwHr6YLVcOOIR00jBqNN8hn';
// $config['stripe_secret'] = 'sk_test_VR2rpQcyJtHqYQiiXiWurtyT00eI90GTTY';




$config['stripe_key'] = 'pk_live_51MPYvQB3i6q54T8OW7u0cnARrGK2VqYbJ1sBfe0vqzYCtlD8Gy71gWwh37wyxoBleFgh5bwB4oe8bylAEoeWjD8J00FURiTKmI';
$config['stripe_secret'] = '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';



$config['stripe_currency']        = 'usd';
