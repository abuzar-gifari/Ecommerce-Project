<?php
namespace PhpPot\Service;

require_once 'vendor/autoload.php';
require_once '../function/functions.php';
session_start();

use \Stripe\Stripe;
use \Stripe\Customer;
use \Stripe\ApiOperations\Create;
use \Stripe\Charge;

class StripePayment
{

    private $apiKey;

    private $stripeService;

    public function __construct()
    {
        require_once "config.php";
        $this->apiKey = STRIPE_SECRET_KEY;
        $this->stripeService = new \Stripe\Stripe();
        $this->stripeService->setVerifySslCerts(false);
        $this->stripeService->setApiKey($this->apiKey);
    }

    public function addCustomer($customerDetailsAry)
    {
        
        $customer = new Customer();
        
        $customerDetails = $customer->create($customerDetailsAry);
        
        return $customerDetails;
    }

    public function chargeAmountFromCard($cardDetails)
    {
        $customerDetailsAry = array(
            'email' => $cardDetails['email'],
            'source' => $cardDetails['token']
        );
        $customerResult = $this->addCustomer($customerDetailsAry);
        $charge = new Charge();
        $cardDetailsAry = array(
            'customer' => $customerResult->id,
            'amount' => $_SESSION['grand_total'],
            'currency' => 'BDT',
            'description' => $cardDetails['item_name'],
            'metadata' => array(
                'order_id' => $cardDetails['item_number']
            )
        );
        $result = $charge->create($cardDetailsAry);

        $total = $_SESSION['grand_total'] * 100;
        $user_id = $_SESSION['login']->user_id;
        
		$connection = db_config::DBConnect();
		$sql = "INSERT INTO orders VALUES('','$total','$user_id','Order Placed')";
		$response = $connection->insert($sql);
		$order_id = $response['last_id'];
		foreach ($_SESSION['cart_item'] as $key => $value) {
		    $id = $_SESSION['cart_item'][$key]['id'];
		    $pro_price = $_SESSION['cart_item'][$key]['pro_price'];
		    $qty = $_SESSION['cart_item'][$key]['qty'];
		    $supplier_id = 1;
		    $sql = "INSERT INTO order_details VALUES('','$id','$supplier_id','$pro_price','$order_id','$qty')";
		    $response = $connection->insert($sql);
		
		}        
        return $result->jsonSerialize();
    }
}
