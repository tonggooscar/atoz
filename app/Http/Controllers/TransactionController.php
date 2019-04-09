<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Balance;
use Validator;
use App\Helpers\Helper;

use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
	
	public function __construct() {
		$this->middleware('auth', ['except' => [
			'index',
		]]);
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

		return view('homepage');
    }
	
	public function prepaid_balance() {
		$list_balance = Balance::pluck('balance_value', 'id');
		return view('transaction.prepaid_balance', compact('list_balance'));
	}
	
	public function product() {
		return view('transaction.product');
	}
	
	public function success_order($id=null) {
		if(!isset($id) || !$id) return redirect('/');
		$transaction = Transaction::findOrFail($id);
		return view('transaction.order_success', compact('transaction'));
	}
	
	public function order(Request $request) {
		$keyword = trim($request->input('keyword'));
		if(!empty($keyword)) {
			$query = strlen($keyword)==10 ? Transaction::where('order_number', $keyword) : Transaction::where('order_number', 'LIKE', '%'.$keyword.'%');
			$transaction_list = $query->paginate(20)->appends($request->except('page'));
		} else {
			$transaction_list = Transaction::orderBy('id', 'desc')->paginate(20);
		}
		$count_transaction = $transaction_list->total();
		
		return view('transaction.order', compact('transaction_list', 'count_transaction'));
	}
	
	public function pay($id, Request $request) {
		$input = $request->all();
		$transaction = Transaction::findOrFail($id);
		if($transaction->shopping_type == 'product') {
			$input['status'] = 'Success';
			$input['shipping_code'] = Helper::random_strings(8);
		} else {
			$input['status'] = 'Success';
		}
		$transaction->update($input);
		return redirect('/order');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		$input = $request->all();
		$input['order_number'] = Helper::random_strings(10);
		$input['id_users'] = Auth::user()->id;
		
		
		if($request->shopping_type == 'product') {
			$validator = Validator::make($input, [
				'product' => 'required|string|min:10|max:150',			
				'shipping_address' => 'required|string|min:10|max:150',
				'price' => 'required|numeric',
			]);
			if($validator->fails()) {
				return redirect('product')->withInput()->withErrors($validator);
			}
			$input['price'] = $input['price'] + 10000;
		} else {
			
			$validator = Validator::make($input, [
				'mobile_number' => 'required|numeric|digits_between:7,12|regex:/(081)[0-9]{3,13}/',			
				'id_balance' => 'required',
			]);
			if($validator->fails()) {
				return redirect('prepaid_balance')->withInput()->withErrors($validator);
			}
			$balanceByID = Balance::findOrFail($input['id_balance']);
			$input['price'] = $balanceByID->balance_value + ( (5/100) * $balanceByID->balance_value);
		}
		
		$transaction = Transaction::create($input);
		// // // Session::flash('flash_message', 'Success!');
		return redirect('transaction/order/'.$transaction->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
