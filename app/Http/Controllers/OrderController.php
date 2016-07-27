<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\Models\Order;
use Cart;

class OrderController extends Controller
{

    protected $menuItem;
    protected $gallery;
    protected $setting;

    public function __construct() {
        $this->menuItem = \App\Models\MenuItem::where('menu_id', 1)->get()->toHierarchy();
        $this->footerItem = \App\Models\MenuItem::where('menu_id', 2)->get()->toHierarchy();
        $this->setting = \App\Models\Setting::lists('option_value', 'option_key');
    }

    private function _setting() {
      return $this->setting->toArray();
    }

    public function order(Request $request) {
  		$name = $request->get('name');
  		$email = $request->get('email');
  		$phone = $request->get('phone');
  		$address = $request->get('address');


  		$messages = [
		    'required' 	=> 'Vui lòng nhập vào trường này.',
		    'email'    	=> 'Địa chỉ e-mail chưa đúng định dạng.',
		    'regex' 	=> 'Số điện thoại chưa đúng định dạng'
		  ];

  		$validator = Validator::make($request->all(), [
  			'name' 	=> 'required|min:1',
  			'email' => 'required|min:3|email',
  			'phone' => 'required|regex:/^0[0-9]{9,10}$/',
  		], $messages);

  		if($validator->fails()) {
  			return \Response::json([
  					'success'=>false,
  					'errors' => $validator->errors()->toArray()
  				]);
  		}

      $input = $request->all();
      $input['amount'] = Cart::total(0,'','');

      $transactions = \App\Models\Transaction::create($input);

      $last_id_trans = $transactions->id;

      foreach(Cart::content() as $item) {
          $orders = \App\Models\Order::create([
              'transaction_id'    => $last_id_trans,
              'product_id'        => $item->id,
              'amount'            => $item->subtotal,
              'qty'               => $item->qty
          ]);
      }

      if(\Response::json(['success' => true], 200)) {
          \Mail::send('auth.emails.cart', ['data' => $transactions], function ($message) use ($transactions) {
              $message->to($transactions->email, $transactions->name)->subject('Thông tin đơn hàng!');
          });
          \Mail::send('auth.emails.sendAdmin', ['data' => $transactions], function ($message) use ($transactions) {
              $message->from($transactions->email, 'Thông tin đơn hàng từ '.$transactions->name);
              $message->to('butrentron123@gmail.com', 'Máy lọc không khí')->subject('Thông tin giao dịch');
          });

          Cart::destroy();

          return redirect('/')->with(['message' => 'Bạn đã đặt hàng thành công. Hãy truy cập email để xem đơn hàng của mình.', 'type' => 'success']);
      }

		  return \Response::json(['success'=>true, 'id' => $order->id ]);
    }

    public function orderPage($id) {
        $order = Order::find($id);

        $setting = \App\Models\Setting::first();

        \Mail::send('auth.emails.cart', ['data' => $order, 'setting' => $setting], function ($message) use ($order, $setting) {
            $message->to($order->email, $order->name)->subject('Thông tin đặt thuê xe!');
        });

        \Mail::send('auth.emails.sendAdmin', ['data' => $order], function ($message) use ($order, $setting) {
            $message->from($order->email, 'Thông tin đặt xe từ '.$order->name);

            $message->to('luxurysp.info@gmail.com', 'thuexemayphuongbinh.com')->subject('Thông tin đặt thuê');
        });

        $setting = $this->setting;
        $menuItem = $this->menuItem;
        $footerItem = $this->footerItem;
        $gallery = $this->gallery;
        if(!$order) abort(404);
        return view('site.order', compact('menuItem', 'footerItem', 'order', 'setting'));
    }

    public function getOrder() {
        $menuItem = $this->menuItem;
        $cataProducts = \App\Models\MenuItem::where('menu_id', 2)->get()->toHierarchy();
        return view('site.order', compact('menuItem', 'cataProducts'));
    }
}
