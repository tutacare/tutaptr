<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Omnipay\Omnipay;
use App\User;
use Session, Auth, Input, Redirect;

class PaymentController extends Controller
{

  protected $paypal_username = 'your_paypal_username';
  protected $paypal_password = 'your_paypal_password';
  protected $paypal_signature = 'your_paypal_signature';
  protected $paypal_testmode = true;

  public function postPayment()
  {
    $params = array(
    'cancelUrl' 	=> url() . '/deposit/cancel-deposit',
    'returnUrl' 	=> url() . '/deposit/payment-success',
    'name'		=> 'Deposit',
    'description' 	=> 'Deposit',
    'amount' 	=> Input::get('amount'),
    'currency' 	=> 'USD'
    );

    Session::put('params', $params);
    Session::save();

    $gateway = Omnipay::create('PayPal_Express');
    $gateway->setUsername(env('PAYPAL_USERNAME', $this->paypal_username));
    $gateway->setPassword(env('PAYPAL_PASSWORD', $this->paypal_password));
    $gateway->setSignature(env('PAYPAL_SIGNATURE', $this->paypal_signature));
    $gateway->setTestMode(env('PAYPAL_TESTMODE', $this->paypal_testmode));

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
    $gateway->setUsername(env('PAYPAL_USERNAME', $this->paypal_username));
    $gateway->setPassword(env('PAYPAL_PASSWORD', $this->paypal_password));
    $gateway->setSignature(env('PAYPAL_SIGNATURE', $this->paypal_signature));
    $gateway->setTestMode(env('PAYPAL_TESTMODE', $this->paypal_testmode));

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
    Session::flash('message', 'You have successfully deposit');
    return Redirect::to('deposit');
  }

  public function cancelOrderPayment()
  {
    Session::flash('message', 'Deposit has been canceled');
    return Redirect::to('deposit');
  }
}
