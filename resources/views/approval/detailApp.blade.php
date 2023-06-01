@extends('sidebar.sidebarApp')

@section('title', 'Detail Form')

@section('content')

    <div class="container pt-2">
        <div class="row gutters">
            <div class="col-1x-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="custom-actions-btn mb-2">
                            <a href="{{ route('App_form_show') }}" class="btn btn-primary">
                                <i class="icon-download"></i> Back to List
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6" name="print">
                                <div><b>PROCUMAX</b></div>
                                <div>Purchase Order</div>
                                <div>Jl Merdu No 304</div>
                                <div>Telp : 08123456789</div>
                                <div>Issued by : {{ $inv->user->name }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>PO Issued To : <b>{{ $inv->vendor->name }}</b></div>
                            <div>{{ $inv->vendor->address }}</div>
                            <div>PO No. : {{ $inv->ref_no }}</div>
                            <div>Our Reference : {{ $inv->mrv_id }}</div>
                        </div>
                    </div>

                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col" style="text-align: center">Quantity</th>
                                                <th scope="col">UOM</th>
                                                <th scope="col">Unit Price</th>
                                                <th scope="col" style="text-align: center">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($inv->products as $i => $purchased_item)
                                                <tr>
                                                    <td scope="col">{{ $i + 1 }}</td>
                                                    <td scope="col">
                                                        {{ $purchased_item->name }}
                                                        <p class="m-0 text-muted"></p>
                                                    </td>
                                                    <td scope="col" style="text-align: center">
                                                        {{ $purchased_item->pivot->quantity }}</td>
                                                    <td scope="col">{{ $purchased_item->uom }}
                                                        <p class="m-0 text-muted"></p>
                                                    </td>
                                                    <td scope="col">Rp.
                                                        {{ number_format($purchased_item->pivot->unit_price, 0, ',', '.') }}
                                                    </td>
                                                    <td scope="col" style="text-align: center">Rp.
                                                        {{ number_format($purchased_item->pivot->unit_price * $purchased_item->pivot->quantity, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                            @endforeach
                                            <td>&nbsp;</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td scope="col">
                                                <p>Total</p>
                                            </td>
                                            <td scope="col" style="text-align: center">
                                                <p>Rp. {{ number_format($inv->sub_total, 0, ',', '.') }}</p>
                                            </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        @if ($po_approval->status == 'REJECTED')
    
                                <div class="stamp">
                                    <img src="{{ url('../img/rejected.png') }}" alt="Rejected Stamp">
                                </div>
    
                        @elseif($po_approval->status == 'APPROVED')
    
                                <div class="stamp">
                                    <img src="{{ url('../img/approved.png') }}" alt="Approved Stamp">
                                </div>
                        @else
                            </div>
                        </div>
                    </section>
                    <center>
                        <p><strong>Thank you for your business support.</strong></p>
                        <p>Ref no : {{ $inv->ref_no }}</p>
                    </center>
                    <div class="form-row">
                        <div class="col-md-3 mb-2">                      
                                
                            </div>
                                    
                            <div class="col-md-3 mb-2">
                            </div>
                            <div class="col-md-3 mb-2">
                            </div>  
                            <div class="col-md mb-2">
                            </div>  
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 mb-2 mt-auto">
                                    <form action="{{ route('App_detail_show_rejected', $po_approval->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger" name="reject" type="submit">Reject</button>
                                    </form>                                      
                                </div>
                                <div class="col-lg-6 col-sm-6 mb-2 mt-auto"> 
                                    
                                        <form action="{{ route('App_detail_show_approved', $po_approval->id) }}" method="POST">
                                            @csrf
                                            <label for="validationCustom03" class="align-self-center">Next level</label>
                                            <select name="next_verifier_id" class="custom-select" id="validationCustom04">
                                                <option value=""></option>
                                                @if ($next_verifiers != null)
                                                    @foreach ($next_verifiers as $approval)
                                                        <option value="{{ $approval['id'] }}"> {{ $approval['name'] }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    
                                                @endif
                                            </select>       
                                            <button class="btn btn-primary" name="submit" type="submit">Save</button>
                                                                                               
                                        </form>
                                </div>
                            </div>
                        @endif
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container my-5 p-0">
    <div class="row gutters">
            <div class="col-1x-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body p-10">
                        <div class="invoice-container">
                            <div class="invoice-header">
                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="custom-actions-btns mb-5">  
                                            <a href="{{ route('App_form_show') }}" class="btn btn-primary">
                                                <i class="icon-download"></i> Back to List
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->
                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <a href="{{ route('App_form_show') }}" class="invoice-logo">
                                            PROCUMAX
                                        </a>
                                    </div>
                                </div>
                                <!-- Row end -->
                                <!-- Row start -->
                            
                                <div class="row gutters">
                                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                        <div class="invoice-details">
                                            <address>
                                                PURCHASE ORDER<br>
                                                Jl di hatimu no 304
                                                TELP : 08123456789
                                                Issued by : {{ $inv->user->name}}
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                        <div class="invoice-details">
                                            <div class="invoice-num">
                                                PURCHASE ORDER ISSUED TO 
                                                <div>{{ $inv->vendor->name }}
                                                <div>{{ $inv->vendor->address }}

                                                PURCHASE ORDER NUMBER
                                                <div>{{ $inv->ref_no }}</div>
                                                OUR REFERENCE
                                                <div>{{ $inv->mrv_id }}</div>
                                            </div>
                                        </div>													
                                    </div>
                                </div>
                                <!-- Row end -->
                            </div>
                            <div class="invoice-body">
                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="table-responsive">
                                            
                                            <table class="table custom-table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <th>UOM</th>
                                                        <th>Unit Price (Rp)</th>
                                                        <th>Subtotal (Rp)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($inv->products as $purchased_item)
                                                    <tr>
                                                        <td>
                                                            {{ $purchased_item->name }}
                                                            <p class="m-0 text-muted"></p>
                                                        </td>
                                                        <td>{{ $purchased_item->pivot->quantity }}</td>
                                                        <td>{{ $purchased_item->uom }}
                                                            <p class="m-0 text-muted"></p>

                                                        </td>
                                                        <td>{{ number_format($purchased_item->pivot->price, 0, ',', '.') }}</td>
                                                        <td> {{ number_format($purchased_item->pivot->unit_price * $purchased_item->pivot->quantity, 0, ',', '.') }}</td>
                                                    </tr>
                                                    <tr>
                                                @endforeach
                                                        <td>&nbsp;</td>
                                                        <td colspan="2">
                                                            <h5 class="text-success"><strong>Total (Rp)</strong></h5>
                                                        </td>			
                                                        <td>
                                                            <h5 class="text-success"><strong>{{ number_format($inv->sub_total, 0, ',', '.') }}</strong></h5>
                                                        </td>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Row end -->
                            </div>
                            <div class="invoice-footer">
                                Thank you for your business support.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
