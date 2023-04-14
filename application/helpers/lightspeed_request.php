<?php

require_once(FCPATH . 'vendor/autoload.php');

function createSales($carts, $userData)
{
  try {

    global $LightSpeedToken;

    $LightSpeedAdminUserId = "";
    $LightSpeedOnlinePaymentTypeId = "";
    $LightSpeedOnlineCustomerId = "";

    $client = new \GuzzleHttp\Client();

    $body = array();
    $body["source"] = "OWF Online";
    $body["user_id"] = $LightSpeedAdminUserId;
    $body["customer_id"] = $LightSpeedOnlineCustomerId;
    $body["status"] = "AWAITING_DISPATCH";

    $body["note"] = "Full Name: {$userData["fullName"]}\n";
    $body["note"] .= "Email: {$userData["email"]}\n";
    $body["note"] .= "Address: {$userData["address"]}\n";
    $body["note"] .= "Delivery Date: {$userData["delivery"]}\n\n";
    $body["note"] .= "Order Note: {$userData["order_text"]}\n";

    $body["register_sale_products"] = array();
    $body["register_sale_payments"] = array();

    foreach ($carts as $cart) {
      $register_sale_products = array();
      $register_sale_products["product_id"] = $cart["id"];
      $register_sale_products["quantity"] = $cart["qty"];
      $register_sale_products["price"] = $cart["price"];
      $register_sale_products["tax"] = 0;
      $register_sale_products["tax_id"] = "No Tax";

      array_push($body["register_sale_products"], $register_sale_products);
    }

    $register_sale_payments = array();
    $register_sale_payments["retailer_payment_type_id"] = $LightSpeedOnlinePaymentTypeId;
    $register_sale_payments["amount"] = (float) $userData["totalPrice"];

    array_push($body["register_sale_payments"], $register_sale_payments);

    $response = $client->request("POST", "https://orlandoflowerwalls.vendhq.com/api/register_sales", [
      "body" => json_encode($body),
      "headers" => [
        "accept" => "application/json",
        "authorization" => "Bearer {$LightSpeedToken}",
        "content-type" => "application/json",
      ],
    ]);
  } catch (\Exception $ex) {
    echo "<b>";
    print_r($ex->getMessage());
    echo "</b>";
  }
}

function getProductsById($id)
{
  global $LightSpeedToken;

  $client = new \GuzzleHttp\Client();

  $response = $client->request("GET", "https://orlandoflowerwalls.vendhq.com/api/2.0/products/{$id}", [
    "headers" => [
      "accept" => "application/json",
      "authorization" => "Bearer {$LightSpeedToken}",
    ],
  ]);

  // echo $response->getBody();

  $result = json_decode($response->getBody());

  return $result->data;
  // llll

}
function getVariantsById($id)
{
  global $LightSpeedToken;

  $client = new \GuzzleHttp\Client();

  $response = $client->request("GET", "https://orlandoflowerwalls.vendhq.com/api/2.0/search?type=products&variant_parent_id={$id}", [
    "headers" => [
      "accept" => "application/json",
      "authorization" => "Bearer {$LightSpeedToken}",
    ],
  ]);

  // echo $response->getBody();

  $result = json_decode($response->getBody());

  return $result->data;
  // llll
}

function getTaxList()
{
  global $LightSpeedToken;

  $client = new \GuzzleHttp\Client();

  $response = $client->request("GET", "https://orlandoflowerwalls.vendhq.com/api/2.0/taxes", [
    "headers" => [
      "accept" => "application/json",
      "authorization" => "Bearer {$LightSpeedToken}",
    ],
  ]);

  // echo $response->getBody();

  $result = json_decode($response->getBody());

  return $result->data;
  // llll

}

function getProductsByPage($page)
{
  global $LightSpeedToken;

  $client = new \GuzzleHttp\Client();

  $tag_response = $client->request("GET", "https://orlandoflowerwalls.vendhq.com/api/2.0/tags", [
    "headers" => [
      "accept" => "application/json",
      "authorization" => "Bearer {$LightSpeedToken}",
    ],
  ]);

  $tag = json_decode($tag_response->getBody());

  $tag_id = "";

  foreach ($tag->data as $elm) {
    if ($elm->name == $page)
      $tag_id = $elm->id;
  }


  $response = $client->request("GET", "https://orlandoflowerwalls.vendhq.com/api/2.0/search?type=products&tag_id={$tag_id}", [
    "headers" => [
      "accept" => "application/json",
      "authorization" => "Bearer {$LightSpeedToken}",
    ],
  ]);

  // echo $response->getBody();
  $result = json_decode($response->getBody());
  $products = $result->data;

  $section_content = array();

  foreach ($products as $elm) {

    $brand_id = $elm->brand->id;

    $exists = array_filter($section_content, function ($val, $key) use ($brand_id) {
      return $val["id"] == $brand_id;
    }, ARRAY_FILTER_USE_BOTH);

    if (count($exists) == 0) {
      $obj = array();
      $obj["id"] = $elm->brand->id;
      $obj["heading"] = $elm->brand->name;
      $obj["subHeading"] = $elm->brand->description;

      array_push($section_content, $obj);
    }
  }
  $returnObj = array();
  $returnObj["section_content"] = $section_content;
  $returnObj["products"] = $products;
  // echo json_encode($returnObj);

  return $returnObj;
}
