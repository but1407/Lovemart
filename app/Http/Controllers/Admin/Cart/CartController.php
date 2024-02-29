<?php

namespace App\Http\Controllers\Admin\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Cart\CartService;
class CartController extends Controller
{
    private $cartservice;
    public function __construct(CartService $cartservice){
        $this->cartservice = $cartservice;
    }
    public function index(){

        return view('admin.carts.customer',[
            'customers' => $this->cartservice->getCustomer(),
        ]);
    }
}