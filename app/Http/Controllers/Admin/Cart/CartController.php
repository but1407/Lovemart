<?php

namespace App\Http\Controllers\Admin\Cart;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Services\Cart\CartService;
use App\Http\Controllers\Controller;

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

    public function show(Customer $customer){
        return view('admin.carts.detail',[
            'title' => $customer->name,
            'customer'=>$customer,
            'carts'=>$customer->carts,
        ]);
    }
}