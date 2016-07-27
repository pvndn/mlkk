<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Order;

class OrderController extends Controller
{
  protected $transactions;
  protected $orders;

  public function __construct(Transaction $transactions, Order $orders) {
    $this->transactions = $transactions;
    $this->orders = $orders;
  }
  public function index (Request $request) {
    $transactions = $this->transactions->all();
    return view('administrator.orders.index', compact('transactions'));
  }

  public function show( $id ) {
    $transaction = $this->transactions->where([['id', $id], ['status', '!=' , 3]])->first();
    if(!$transaction) {
      return redirect()->route('admin.orders.index')->with(['messages' => 'Đơn hàng không tồn tại.', 'type' => 'error']);
    }
    $orders = $transaction->orders()->get();
    return view('administrator.orders.show', compact('transaction', 'orders'));
  }

  public function remove ( $id, Request $request ) {
    $flag = 3;
    $transaction = $this->transactions->find($id);

    $transaction->update([
      'status' => 2
    ]);

    if(\Response::json(['success' => true], 200)) {
        \Mail::send('auth.emails.noti', ['data' => $transaction, 'flag' => $flag], function ($message) use ($transaction) {
            $message->to($transaction->email, $transaction->name)->subject('Thông báo từ máy lọc không khí!');
        });
        return redirect()->route('admin.orders.index')->with(['messages' => 'Hủy đơn hàng thành công.', 'type' => 'warning']);
    }

  }

  public function pay ( $id, Request $request ) {
    $flag = 1;
    $transaction = $this->transactions->find($id);
    $transaction->update([
      'status' => 1
    ]);
    if(\Response::json(['success' => true], 200)) {
        \Mail::send('auth.emails.noti', ['data' => $transaction, 'flag' => $flag], function ($message) use ($transaction) {
            $message->to($transaction->email, $transaction->name)->subject('Thông báo từ máy lọc không khí!');
        });
        return redirect()->back()->with(['messages' => 'Đã xác nhận thanh toán tiền.', 'type' => 'success']);
    }
  }

  public function update( Request $request ) {
    if($request->get('trans')) {
      $transId = $request->get('trans');
      $transaction = $this->transactions->find($transId);
      $flag = 1;

      $action = $request->get('action');
      if($action == 'unconfirm') {
        $transaction->update([
          'status' => 0
        ]);
        return redirect()->back()->with(['messages' => 'Đã xác nhận chưa thanh toán tiền.', 'type' => 'success']);
      }
      $transaction->update([
        'status' => 1
      ]);
      if(\Response::json(['success' => true], 200)) {
            \Mail::send('auth.emails.noti', ['data' => $transaction, 'flag' => $flag], function ($message) use ($transaction) {
                $message->to($transaction->email, $transaction->name)->subject('Thông báo từ luxury.com!');
            });
        return redirect()->back()->with(['messages' => 'Đã xác nhận thanh toán tiền.', 'type' => 'success']);
        }
    }
  }

}
