<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\PageRequest;
//use App\Item;

class PagesController extends Controller
{   
    public function __construct(){
    $this->middleware('auth')
    ->except(['about', 'contact','/']);
    }
  
    public function about() {
        return view('pages.about');
    }
    
    public function mypage() {
        $user = Auth::user();
        return view('pages.mypage', [ 'user' => $user ]);
    }
    public function edit() {
        $user = Auth::user();
        return view('pages.edit', compact('user'));
    }
    
    public function update(PageRequest $request) {
        $user = Auth::user();
        $user->update($request->validated());
        \Flash::success('お客様情報を更新しました。');
        return redirect()->route('mypage');
        
    }
    
    
}
