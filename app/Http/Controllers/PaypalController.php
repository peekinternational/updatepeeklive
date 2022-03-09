<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use DB;

class PaypalController extends Controller
{
  

    public function payWithPaypal()
    {
        return view('paywithpaypal');
    }

    public function postPaymentWithpaypal(Request $request)
    {
		$user_id = DB::table('users')->insertGetId(
            ['email' => $request->email, 'name' => $request->name, 'password' => md5($request->password)]
         );
		
		$decs = $request->plan_id .'-'. $request->amount.'-'.$user_id;
		
		    $apiContext = new ApiContext(
          new OAuthTokenCredential(
                'ARwPWc_n53Fg0RY2MhCyaUakWzj_0jSPbJT6qgZRKCU0JNM6f_vuRgIohe3dd6YiUjne9TihH1imkPuI',
              'EEEJond1ocNxmcIxE8ACqsFy4qI5umQmSjSv2mg5zbHFXP6_jH0IC1Kzw4CPLQhtrfxpB3Bg21MnEG-V'
                 )
      );
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

    	$item_1 = new Item();

        $item_1->setName('Product 1')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount'));

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription($decs);

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status'))
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));            
        try {
            $payment->create($apiContext);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('paywithpaypal');                
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('paywithpaypal');                
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        
        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {            
            return Redirect::away($redirect_url);
        }

        \Session::put('error','Unknown error occurred');
    	return Redirect::route('paywithpaypal');
    }

    public function getPaymentStatus(Request $request)
    {       

    $apiContext = new ApiContext(
          new OAuthTokenCredential(
                'ARwPWc_n53Fg0RY2MhCyaUakWzj_0jSPbJT6qgZRKCU0JNM6f_vuRgIohe3dd6YiUjne9TihH1imkPuI',
              'EEEJond1ocNxmcIxE8ACqsFy4qI5umQmSjSv2mg5zbHFXP6_jH0IC1Kzw4CPLQhtrfxpB3Bg21MnEG-V'
                 )
      );	
        $payment_id = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            \Session::put('error','Payment failed');
            return Redirect::route('paywithpaypal');
        }
        $payment = Payment::get($payment_id, $apiContext);        
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));        
        $result = $payment->execute($execution, $apiContext);
        
        if ($result->getState() == 'approved') {         
            \Session::put('success','Payment success !!');
			  $str = $result->transactions[0]->description;
				$split = explode('-',$str);
				$plan_id =  $split[0];
				$price       =  $split[1];
				$user_id =  $split[2];
				DB::table('payment_history')->insert([
				'plan_id' => $plan_id,
                'price'	=> $price,
                'user_id' => $user_id, 				
				]);
            $user = DB::table('users')
		->where('id',$user_id)->first();
		Session::put('userInfo',$user);
		
		return redirect('/dashboard');
        }

        \Session::put('error','Payment failed !!');
		return Redirect::route('paywithpaypal');
    }
	
	public function cancel(){
		dd('hello');
	}
}