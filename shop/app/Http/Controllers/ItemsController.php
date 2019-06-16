<?php

namespace App\Http\Controllers;

use App\Item;

use App\Http\Controllers\Controller;

use App\Http\Requests\ItemRequest;
use Illuminate\Http\Request;

use Session;

class ItemsController extends Controller
{
    
    public function index() {
        $items = Item::latest('created_at')->get();
        return view('items.index', compact('items'));
    }
    
    public function show($id) {
        $item = Item::findOrFail($id);
        return view('items.show', compact('item'));
    }
    // public function orderValidation(ItemRequest $request) {
    //     $request->validated();
    //     return view('items.show');
    // }

}
