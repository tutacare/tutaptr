<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Omnipay\Omnipay;
use App\User;
use Session, Auth;

class PaymentController extends Controller
{

  public function postPayment()
  {
    $params = array(
    'cancelUrl' 	=> url() . '/deposit/cancel-deposit',
    'returnUrl' 	=> url() . '/deposit/payment-success',
    'name'		=> 'saya',
    'description' 	=> 'Deposit',
    'amount' 	=> 0.50,
    'currency' 	=> 'USD'
    );

    Session::put('params', $params);
    Session::save();

    $gateway = Omnipay::create('PayPal_Express');
    $gateway->setUsername(env('PAYPAL_USERNAME'));
    $gateway->setPassword(env('PAYPAL_PASSWORD'));
    $gateway->setSignature(env('PAYPAL_SIGNATURE'));
    $gateway->setTestMode(env('PAYPAL_TESTMODE'));

    $response = $gateway->purchase($params)->send();

    if ($response->isSuccessful()) {
    //print_r($response);
    } elseif ($response->isRedirect()) {
    // redirect to offsite payment gateway
    $response->redirect();
    } else {
    // payment failed: display message to customer
    echo $response->getMessage();
    }
  }

  public function getSuccessPayment()
  {
    $gateway = Omnipay::create('PayPal_Express');
    $gateway->setUsername(env('PAYPAL_USERNAME'));
    $gateway->setPassword(env('PAYPAL_PASSWORD'));
    $gateway->setSignature(env('PAYPAL_SIGNATURE'));
    $gateway->setTestMode(env('PAYPAL_TESTMODE'));

    $params = Session::get('params');

    $response = $gateway->completePurchase($params)->send();
    $paypalResponse = $response->getData(); // this is the raw response object

    if(isset($paypalResponse['PAYMENTINFO_0_ACK']) && $paypalResponse['PAYMENTINFO_0_ACK'] === 'Success') {

    $users = User::find(Auth::user()->id);
    $users->balance = Auth::user()->balance + $paypalResponse['PAYMENTINFO_0_AMT'];
    $users->save();
    // Response
    // print_r($paypalResponse);
    } else {
    //Failed transaction
    }
    echo 'sukses bro';
  }

  public function cancelOrderPayment()
  {
    echo 'Batal Deposit';
  }
}
