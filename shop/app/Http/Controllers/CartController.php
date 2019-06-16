<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
//use App\Item;
use Session;
//use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\PageRequest;
use App\Http\Requests\CartRequest;
use Illuminate\Support\Facades\Mail;



class CartController extends Controller
{
    
    public function getOrders(ItemRequest $request)
    {
        // orders キーに値が代入されていない場合にだけ空の配列を代入する
        if (is_null(Session::get('orders'))) {   
            //セッションのordersキーには最初に空の配列を代入しておき、メソッドが呼び出されるたびに、その配列を更新するように実装
            Session::put('orders', []);
        }
        
        if ($this->preventOverlap()) {
            return redirect()->route('home');
        }
        
        $orders = Session::get('orders');
        $orders[] = $request->validated();             
        //dump($orders);
        Session::put('orders', $orders);
        $count = count($orders);
        $sum = 0;
        for($i = 0; $i < $count; $i++) {
            $sum += $orders[$i]['price'] * $orders[$i]['num'];
            Session::put('sum', $sum);
        }
        return view('cart.cart',compact('orders', 'count', 'sum'));
    }

    
    //配送情報
    public function delivery() 
    {
        $user = Auth::user();
        
        //前画面で変更された個数をセッションに保存するための処理
        $changed = \Request::all();
        $sum = Session::get('sum');
        $orders = Session::get('orders');
        $count = count($orders);
        //dump($changed);
        //dump($orders);
        for($i = 0; $i < $count; $i++) {
            $orders[$i]['num'] = $changed['num'][$i];
        }
        Session::put('orders', $orders);
        $sum = $changed['sum'];
        Session::put('sum', $sum);
        //dump($orders);
        return view('cart.delivery', [ 'user' => $user ]);
    }
    
    //配送情報でvalidationエラーでリダイレクトされた時に表示する画面
    public function redirect() 
    {
        $user = Auth::user();
        return view('cart.delivery', [ 'user' => $user ]);
    }
    //支払い
    public function payment(Request $request ) 
    {  
        $receiver = $request->validate([             
            'name' => 'required',
            'email' => 'required|email',
            'tel' => 'required|numeric',
            'postcode' => 'required|digits:7',
            'prefecture' => 'required|min:3',
            'city' => 'required|min:2',
            'no' => 'required|min:1'
        ]);
        $receiver = \Request::all();  
        //dump($receiver);
        Session::put('receiver', $receiver);
        return view('cart.payment');
    }
    //支払でvalidationエラーでリダイレクトされた時に表示する画面
    public function redirectPayment() 
    {
        return view('cart.payment');
    }
    //確認画面
    public function orderConfirm(Request $request) 
    {
         $payment = $request->validate([
            'payment' => 'required',
        ]);
        //$payment = \Request::all();
        Session::put('payment', $payment);
        $items = Session::get('orders');
        $count = count($items);
        $sum = Session::get('sum');
        $receiver = Session::get('receiver');
        $test = Session::all();
        //dump($test);
        return view('cart.order_confirm', compact('items','count','sum','receiver','payment'));
    }

    public function orderAcceptMail() 
    {
        $all = Session::all();
        $items = Session::get('orders');
        $sum = Session::get('sum');
        $receiver = Session::get('receiver');
        $payment = Session::get('payment');
        # Mailファサード
        Mail::send(['text' => 'cart.order_accept_message'], $all, function($message) use($all){ //メール送信処理
        $message->to($all['receiver']["email"])->subject('【Handmade shop】ご注文ありがとうございます（自動送信メール）')->bcc('from@example.com');
        });
        Session::forget('orders');
        \Flash::success('ご注文を受け付けました');
        return redirect()->route('home');
    }
    //カートを空にする
    public function  makeCartEmpty() 
    {
        Session::forget('orders');
        \Flash::success('カートを空にしました。');
        return redirect('/');
    }
    
    //カート内でアイテムを削除する
    public function deleteCartItem(Request $request) {
        $orders = Session::get('orders');
        $id = $request->id;
        //dump($orders);
        //dump($id);
        //$ordersからidだけの配列を作る
        $ordersId = array_column($orders, 'id');
        //dump($ordersId);
        //$ordersIdからurlで受け取ったidを含む配列が、どのキーにあるか見つける
        $index = array_search($id, $ordersId);
        //dump($index);
        //切り取られた値 = array_splice(削除対象配列, 切り取り開始Index, 切り取り数);
        $remained = array_splice($orders, $index, 1);                     //unset($orders[$index]);はだめ　
        Session::put('orders', $orders);
        //dd($orders);
        if (Session::get('orders')) {
             return redirect()->route('getOrders');
        }
        else {
            \Flash::success('お客様のショッピングカートに商品はありません。');
             return redirect('/');
        }
    }

    //アイテムの重複を防ぐ
    public function preventOverlap() 
    {
        $requestedId = \Request::all()['id'];
        //dump($requestedId);
        $session = Session::get('orders');
        //d($session);
        //$count = count($session);
        //array_column(値を取り出したい多次元配列, 取得したい要素のキー名)
        $sessionIdArray = array_column($session, 'id'); 
        //$sessionIdArrayに$requestedIdと同じ値があるかどうか調べる　あったらtrue なければfalse
        $checkId = in_array($requestedId, $sessionIdArray);
        //もしあったら
        if ($checkId) {
            \Flash::success('その商品は既にカートに入っています');
            return true;
        }
        else {
            return false;
        }
    }
    
    //ナビゲーションのカートアイコンからカートのページへ飛ぶ
    public function navToCart() 
    {
        if (is_null(Session::get('orders'))) {
             \Flash::success('お客様のショッピングカートに商品はありません。');
             return redirect('/');
        }
        else {
            $orders = Session::get('orders');
            $count = count($orders);
            $sum = 0;
            //dump($orders);
            for($i = 0; $i < $count; $i++) {
            $sum += $orders[$i]['price'] * $orders[$i]['num'];
            Session::put('sum');
            return view('cart.cart', compact('orders', 'count', 'sum'));
            }
        }
    }    
    
}