@extends('layouts.app')

@section('content')
    {{--{{dd($data)}}--}}
    <p data-placement="top" data-toggle="tooltip" title="Create"><button class="btn btn-primary " data-title="Create" data-toggle="modal" data-target="#create" >Create New Cart</button></p>
    {{-- **************** Carts ****************** --}}
    @forelse($data['carts'] as $cart)
        <div class="alert alert-info">
            <span>{{$cart->cart_name}}</span>
            <form style="top: -25px; position: relative" action="{{route('carts.destroy',['cart_id'=>$cart->cart_id])}}" method="POST">
                {{method_field('DELETE')}}
                {{csrf_field()}}
                <button type="submit" class="deleteAll btn btn-danger pull-right">Empty All</button>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        <th>Product Name</th>
                        <th>Product Type</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        </thead>
                        <tbody>
                        @foreach($data['orders'] as $order)
                            @if($order->cart_id == $cart->cart_id)
                                <tr>
                                    <td>{{$order->product_name}}</td>
                                    <td>{{$order->product_type}}</td>
                                    <td>$ {{$order->product_price}}</td>
                                    <td>{{$order->order_quantity}}</td>
                                    <td>$ {{$order->order_total_price}}</td>
                                    {{--{{dd($data)}}--}}
                                    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit{{$order->order_id}}" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                    {{-- Update Product Quantity Model --}}
                                    <form action="{{route('carts.update',['order_id'=>$order->order_id, 'price'=>$order->product_price])}}" method="POST">
                                        {{method_field('PUT')}}
                                        {{csrf_field()}}
                                        <div class="modal fade" id="edit{{$order->order_id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                        <h4 class="modal-title custom_align" id="Heading">Edit Your Product Quantity</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <input class="form-control" type="number" name="updateQuantity{{$order->order_id}}" placeholder="{{$order->order_quantity}}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer ">
                                                        <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    </form>

                                    <form action="{{route('deleteOrder',['order_id'=>$order->order_id])}}" method="POST">
                                        {{method_field('DELETE')}}
                                        {{csrf_field()}}
                                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button type="submit" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                    </form>

                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-info">NO Carts</div>
    @endforelse

    {{-- Create New Cart --}}
    <form action="{{route('carts.create')}}">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Create New Cart</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control" type="text" name="cartName" placeholder="Cart Name">
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Create</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
@endsection