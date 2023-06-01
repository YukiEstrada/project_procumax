@extends('sidebar.sidebarForm')

@section('title', 'Print PO')

@section('content')

<div class="container pt-2">
    <div class="row gutters">
            <div class="col-1x-12 col-lg-12 col-md-12 col-sm-12 col-12">           
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="custom-actions-btn mb-2">  
                            <a href="{{ route('Po_form_show') }}" class="btn btn-primary">
                                <i class="icon-download"></i> Back to List
                            </a>
                            <a onclick="window.print()" class="btn btn-secondary">
                                <i class="icon-printer"></i> Print
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
                                <div>Issued by : {{ $inv->user->name}}</p>                                                                   
                            </div>                                                                                                                                                                                                                                                  
                        </div>            
                        <div class="col-md-6">
                            <div>PO Issued To  : <b>{{ $inv->vendor->name }}</b></div>                                  
                            <div>{{ $inv->vendor->address }}</div>
                            <div>PO No        : {{ $inv->ref_no }}</div>
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
                                            @foreach($inv->products as $purchased_item)
                                            <tr>
                                                <td scope="col">1.</td>
                                                <td scope="col">
                                                    {{ $purchased_item->name }}
                                                    <p class="m-0 text-muted"></p>
                                                </td>
                                                <td scope="col" style="text-align: center">{{ $purchased_item->pivot->quantity }}</td>
                                                <td scope="col">{{ $purchased_item->uom }}
                                                    <p class="m-0 text-muted"></p>    
                                                </td>
                                                <td scope="col">Rp. {{ number_format($purchased_item->pivot->unit_price, 0, ',', '.') }}</td>
                                                <td scope="col" style="text-align: center">Rp. {{  number_format($purchased_item->pivot->unit_price * $purchased_item->pivot->quantity, 0, ',', '.') }}</td>
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
                                                    <p>Rp. {{  number_format($inv->sub_total, 0, ',', '.') }}</p>
                                                </td>
                                            </tr>                                                                                                                            
                                        </tbody>
                                    </table>                                    
                                </div>      
                                @if ($inv->status == 'REJECTED')
                                <div class="stamp">
                                    <img src="{{ url('../img/rejected.png') }}" alt="Rejected Stamp">
                                </div>
                                @elseif($inv->status == 'COMPLETED')
                                <div class="stamp">
                                    <img src="{{ url('../img/completed.png') }}" alt="Completed Stamp">
                                </div>
                                @endif                           
                            </div>
                        </div>
                    </section>                    
                    <center>            
                        <p><strong>Thank you for your business support.</strong></p>
                        <p>Ref no : {{ $inv->ref_no }}</p>
                    </center>          
                </div>
            </div>
        </div>
    </div>
</div>
@endsection