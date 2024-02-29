@extends('layouts.admin')

@section('title')
    <title>{{ $title ?? 'Detail'  }}</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Customer', 'key' => 'list'])
        @include('admin.alert')
        <div class="customer mt-3">
            <ul>
                <li>Tên khách hàng: <strong>{{ $customer->name }}</strong></li>
                <li>Số điện thoại: <strong>{{ $customer->phone }}</strong></li>
                <li>Địa chỉ: <strong>{{ $customer->address }}</strong></li>
                <li>Email: <strong>{{ $customer->email }}</strong></li>
                <li>Ghi chú: <strong>{{ $customer->content }}</strong></li>
            </ul>
        </div>
    
        <div class="carts">
            @php $total = 0; @endphp
            <table class="table">
                <tbody>
                <tr class="table_head">
                    <th class="column-1">IMG</th>
                    <th class="column-2">Product</th>
                    <th class="column-3">Price</th>
                    <th class="column-4">Quantity</th>
                    <th class="column-5">Total</th>
                </tr>
    
                @foreach($carts as $key => $cart)
                    @php
                        $price = $cart->price * $cart->qty;
                        $total += $price;
                    @endphp
                    <tr>
                        <td class="column-1">
                            <div class="how-itemcart1">
                                <img src="{{ $cart->product->feature_image_path }}" alt="IMG" style="width: 100px">
                            </div>
                        </td>
                        <td class="column-2">{{ $cart->product->name }}</td>
                        <td class="column-3">${{ $cart->price}}</td>
                        <td class="column-4">{{ $cart->pty }}</td>
                        <td class="column-5">${{ $price }}</td>
                    </tr>
                @endforeach
                    <tr>
                        <td colspan="4" class="text-right">Tổng Tiền</td>
                        <td>${{ $total }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection