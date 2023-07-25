<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestUser;
use App\Models\User;
use App\Models\Contact;
use App\Models\Donation;
use Illuminate\Support\Facades\Crypt;
use Auth;
use Stripe\Stripe;

class InquiryController extends Controller
{
    public function contact_view()
    {
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Kindly login to review this form');
        }
        $contacts = Contact::where('type' ,1)->where('is_deleted' ,0)->get();

        return view('inquiry.contact_all')->with('title',"Contact Inquiry")->with(compact('contacts'));
    }

    public function sponsor_view()
    {
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Kindly login to review this form');
        }
        $contacts = Contact::where('type' ,2)->where('is_deleted' ,0)->get();

        return view('inquiry.sponsor_all')->with('title',"Sponsor Inquiry")->with(compact('contacts'));
    }
    
    public function donation_view()
    {
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Kindly login to review this form');
        }
        $donations = Donation::where('is_deleted' ,0)->get();

        return view('inquiry.donation_all')->with('title',"Donations")->with(compact('donations'));
    }
    


    public function contact_submit(Request $request)
    {
        $contact = new Contact;
        $contact->type = 1;
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->back()->with('message', 'Contact form submitted');
    }

    public function sponsor_submit(Request $request)
    {
        $contact = new Contact;
        $contact->type = 2;
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->back()->with('message', 'Sponsor form submitted');
    }

    public function donation_submit(Request $request)
    {
        $donation = new Donation;
        $donation->name = $request->name;
        $donation->email = $request->email;
        $donation->amount = $request->amount;
        $donation->order_id = $this->generateRandomOrderID(8);

        $donation->save();
        $decrypted = Crypt::encryptString($donation->id);
        return redirect()->route('checkout_process',[$decrypted])->with('message', 'Welcome '.$donation->name.', you can checkout here.');
    }
    
    private function generateRandomOrderID($length = 8) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $maxIndex = strlen($characters) - 1;
        $randomOrderID = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomOrderID .= $characters[rand(0, $maxIndex)];
        }
    
        return $randomOrderID;
    }
    
    public function checkout_process($id){

        try {
            $decrypted = Crypt::decryptString($id);
            $order = Donation::find($decrypted);
            if($order->is_paid == 1){
                return redirect($order->payment_link)->with('success','Order Completed');
            }
            $title = "Checkout | " .env('APP_NAME') ;
            return view('web.checkout',compact('order','title'));
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function submit_checkout_process(Request $request){

        $card_number = $request->card1.$request->card2.$request->card3.$request->card4;
        $order=Donation::find($request->id);
        if(!$order){
            return redirect()->back()->with('error','Order not found');   
        }
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = \Stripe\Customer::create(array(
            "address" => [
                "line1" => " - ",
                "postal_code" => "Not Entered",
                "city" => "Not Entered",
                "state" => "Not Entered",
                "country" => "Not Entered",
            ],
            "email" => $order->email,
            "name" => $order->name ,
            "source" => $request->stripeToken
        ));
        $charge = \Stripe\Charge::create ([
                "amount" => $order->amount * 100,
                "currency" => 'USD',
                "customer" => $customer->id,
                "description" => "Charged from ".env('APP_NAME')." with the order ID: " .$order->order_id,
                "shipping" => [
                    "name" => $order->name,
                    "address" => [
                        "line1" => "Not Entered",
                        "postal_code" => "Not Entered",
                        "city" => "Not Entered",
                        "state" => "Not Entered",
                        "country" => "Not Entered",
                    ],
                ]
        ]); 
        
        $is_error = 0;
        if(isset($charge->status) && $charge->status == "succeeded"){
            $last4 = $charge->source->last4;


            $order->payment_link = $charge->receipt_url;
            $order->customer_id = $charge->customer;
            $order->payment_id = $charge->balance_transaction;
            $order->last_4_digit = $last4;
            $order->response_data = serialize($charge);
            
            $order->is_paid = 1;

            $order->update();
            $is_error = 0;
        }else{
            $is_error = 1;
        }

        
        if($is_error == 0){
            //return view('thankyou',compact('order'));
            $decrypted = Crypt::encryptString($order->id);
            return redirect($order->payment_link)->with('success','Order Successfully Completed');   //->route('thankyou',[ $decrypted])
        }
        else{
         return redirect()->back()->with('error','Please try again');   
        }
    }

}
