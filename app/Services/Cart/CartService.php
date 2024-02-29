<?php

namespace App\Services\Cart;

use App\Models\Customer;

class CartService{
    public function getCustomer(){
        return Customer::orderByDesc('id')->paginate(15);
    }
    
}