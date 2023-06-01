@extends('sidebar.sidebarForm')

@section('title', 'Cart')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content pt-2">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="formPo-tab" data-toggle="tab" data-target="#formPo" type="button" role="tab" aria-controls="formPo" aria-selected="true">Form PO</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                @if (isset($carts))
                                    <form method="POST" action="{{ route('cart_checkout') }}">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-3 mb-2">
                                                <label for="validationCustom02" class="align-self-center">Vendor</label>
                                                <select name="vendor" class="custom-select" id="validationCustom04" required>
                                                    <option value=""></option>
                                                    @foreach ($vendors as $vendor)
                                                        <option value="{{ $vendor['id'] }}"> {{ $vendor['name'] }} </option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Fill the vendor!
                                                </div>                                                                                            
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <label for="validationCustom03" class="align-self-center">MRV No</label>
                                                <input type="text" name="mrv" class="form-control"
                                                    id="validationCustom" required>
                                                <div class="invalid-feedback">
                                                    Fill the MRV No!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="width:100px">Quantity</th>
                                                        <th scope="col">Product</th>
                                                        <th scope="col">UOM</th>
                                                        <th scope="col">Unit Price (Rp) </th>
                                                        <th scope="col">Subtotal (Rp)</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($carts as $cart)
                                                        <tr>
                                                            <td>
                                                                <input type="hidden" name="id[]"
                                                                    value="{{ $cart->id }}">
                                                                <input type="number" class="form-control quantity-input"
                                                                    name="quantity[]" value="{{ $cart->quantity }}" min=1
                                                                    style="width:100px">
                                                            </td>
                                                            <td>{{ $cart->product->name }}</td>
                                                            <td>{{ $cart->product->uom }}</td>
                                                            <td class="price-col" name ="unit_price">
                                                                {{ number_format($cart->product->unit_price, 0, ',', '.') }}
                                                            </td>
                                                            <td class="subtotal-col" name ="quantity">
                                                                {{ number_format($cart->quantity * $cart->product->unit_price, 0, ',', '.') }}
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('Po_cart_delete_show', $cart->id) }}"
                                                                    class="btn btn-primary btn-custom-color"><i
                                                                        class="far fa-trash-alt"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="4"> <b>TOTAL</b> </td>
                                                        <td colspan="2">
                                                            <input type="hidden" name="total_price" id="total_price"
                                                                value="{{ $total_price }}" readonly>
                                                            <div class="total-col">
                                                                <b>{{ number_format($total_price, 0, ',', '.') }}</b>                                                                
                                                            </div>
                                                        </td>                                                        
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <hr>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-2">
                                                <label for="validationCustom03" class="align-self-center">Level 1</label>
                                                <select name="verifier_id" class="custom-select" id="validationCustom04"
                                                    required>
                                                    <option value=""></option>
                                                    @foreach ($next_acc as $approval)
                                                        <option value="{{ $approval['id'] }}"> {{ $approval['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>                                                
                                            </div>  
                                            <div class="col-md-3 mb-2">
                                            </div>
                                            <div class="col-md-3 mb-2">
                                            </div>
                                            <div class="col-md-3 mb-2 mt-auto text-right">
                                                <button href="{{ url('approval/detail1') }}" class="btn btn-primary" name="submit" type="submit">Save</button>
                                            </div>                                          
                                        </div>                                                             
                                    </form>
                                @else
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                                            <h1>No Items Addded!</h1>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
