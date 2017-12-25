@extends('layouts.app')

@section('content')
    {{-- **************** Products ****************** --}}
    <div >Products</div>
    <br/>
    <div class="row">
        @forelse($data['products'] as $product)
            <div class="product thumbnail col-lg-3" >
                <img src="images/{{$product->product_photo}}" alt="Product Image">
                <div class="clearfix"></div>
                <p>{{$product->product_name}}</p>
                <p>{{$product->product_type}}</p>
                <span>$ {{$product->product_price}}</span>

                {{--Add All Carts I Have --}}
                @foreach($data['carts'] as $cart)
                    {{--{{route('addProductToCart',['cart_id'=>$cart->id, 'price'=>$product->price, 'product_id'=>$product->id])}}--}}
                    <form action="{{route('carts.store',['cart_id'=>$cart->cart_id, 'price'=>$product->product_price, 'product_id'=>$product->product_id])}}" method="POST">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-sucess">Add To {{$cart->cart_name}}</button>
                    </form>
                @endforeach

            </div>
        @empty
            <div class="alert alert-info">NO Products</div>
        @endforelse
    </div>
@endsection