<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Auth\Factory as Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class AdminsController extends Controller
{
	protected $guard = 'web_users';
    protected $redirectTo = '/admin';

    public function dashboard () {
        //Tuần trước
        $currentDate = \Carbon\Carbon::now();
        $agoDate = $currentDate->subDays($currentDate->dayOfWeek)->subWeek()->toDateString();

        $currentDate = \Carbon\Carbon::now();
        $nowDate = $currentDate->subDays($currentDate->dayOfWeek + 1)->toDateString();

        $LastWeek = \App\Models\Transaction::select('amount')->whereBetween(\DB::raw("date(created_at)"), [$agoDate, $nowDate])
                                        ->where('status', 1)->get();
        $count_money_last_week = 0;
        foreach ($LastWeek  as $money) {
            $count_money_last_week = $count_money_last_week + $money['amount'];
        }

        //ngày trước

        $tillDate = \Carbon\Carbon::now()->subDay()->toDateString();
        $yesterday = \App\Models\Transaction::select('amount')
                                    ->where([[\DB::raw("date(created_at)"), $tillDate],['status', 1]])->get();

        $count_money_yesterday = 0;
        foreach ($yesterday  as $money) {
            $count_money_yesterday = $count_money_yesterday + $money['amount'];
        }

        //tháng

        $currentDate = \Carbon\Carbon::now();
        $lastMonth = $currentDate->startOfMonth()->toDateString();

        $currentDate = \Carbon\Carbon::now();
        $nowMonth = $currentDate->endOfMonth()->toDateString();

        $month = \App\Models\Transaction::select('amount')->whereBetween(\DB::raw("date(created_at)"), [$lastMonth, $nowMonth])
                                        ->where('status', 1)->get();

        $count_money_month = 0;
        foreach ($month  as $money) {
            $count_money_month = $count_money_month + $money['amount'];
        }

        //năm

        $toyear = date("Y");

        $year = \App\Models\Transaction::select('amount')
                                    ->where([[\DB::raw("year(created_at)"), $tillDate],['status', 1]])->get();
        $count_money_year = 0;
        foreach ($year  as $money) {
            $count_money_year = $count_money_year + $money['amount'];
        }

        //all


        $all = \App\Models\Transaction::select('amount')->where('status', 1)->get();
        $count_money = 0;
        foreach ($all  as $money) {
            $count_money = $count_money + $money['amount'];
        }


    	return view('administrator.dashboard', compact('count_money_last_week', 'count_money_yesterday',
                                                'count_money_month', 'count_money_year', 'count_money'));
    }

    public function getRegister()
    {
        return view('administrator.authentications.signup');
    }

    public function register ( RegisterRequest $request, Auth $auth ) {
        $input = $request->all();
				$input['role'] = 0;
        $input['password'] = Hash::make($input['password']);
        if( $auth->guard($this->guard) ){
					User::create($input);
				}
        return redirect($this->redirectTo);
    }

}
