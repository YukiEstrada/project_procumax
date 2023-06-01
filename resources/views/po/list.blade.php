@extends('sidebar.sidebarForm')

@section('title', 'Form PO')

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
                                        <a class="nav-link active" id="log-tab" data-toggle="tab" data-target="#log" type="button" role="tab" aria-controls="log" aria-selected="true">PO List</a>
                                    </li> 
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">                                                                  

                                    <!-- Log -->
                                    <div class="tab-pane fade show active" id="log" role="tabpanel" aria-labelledby="log-tab">                                        
                                        <section class="content">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12 table-responsive">
                                                        <table id="example1" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>                                                                    
                                                                    <th scope="col" style="text-align: center">No.</th>
                                                                    <th scope="col" style="text-align: center">PO No</th>
                                                                    <th scope="col" style="text-align: center">MRV No</th>
                                                                    <th scope="col" style="text-align: center">Admin PO Name</th>
                                                                    <th scope="col" style="text-align: center">Vendor Name</th>
                                                                    <th scope="col" style="text-align: center">Total Price (Rp)</th>
                                                                    <th scope="col" style="text-align: center">Status</th>     
                                                                    <th scope="col" style="text-align: center">Progress</th>                                                                    
                                                                    <th scope="col" style="text-align: center">Created At</th>
                                                                    <th scope="col" style="text-align: center">Updated At</th>
                                                                    <th scope="col" style="text-align: center">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>                                   
                                                                @if (COUNT($orders) == 0)
                                                                <tr>
                                                                    <td colspan="10" style="text-align:center; width:100px">
                                                                        List Product Unavailable</td>
                                                                </tr>
                                                                @endif
                                                                @foreach ($orders as $order)
                                                                <tr>
                                                                    <td style="vertical-align:center; text-align:center; max-width:35px; word-wrap:break-word">
                                                                        {{ $sequence++ }}</td>
                                                                    <td>{{ $order->ref_no }}</td>
                                                                    <td>{{ $order->mrv_id }}</td>
                                                                    <td>{{ $order->user->name }}</td>
                                                                    <td>{{ $order->vendor->name }}</td>
                                                                    <td>{{ number_format($order->total_price, 0, ',', '.') }}</td>
                                                                    <td>{{ $order->status }}</td>
                                                                    <td>
                                                                    @foreach($order->approval->where('status', 'APPROVED') as $approval)
                                                                        <div>Approved By : {{$approval->verifier->name}}
                                                                    @endforeach    
                                                                        </td>
                                                                    <td>{{ $order->created_at }}</td>
                                                                    <td>{{ $order->updated_at }}</td>
                                                                    <td style="text-align: center">
                                                                        @if ($order->status === 'COMPLETED')
                                                                            <div class="custom-actions-btn mb-5">  
                                                                                {{-- <a onclick="printDiv()" class="badge badge-secondary">Print</a> --}}
                                                                                <a  href="{{ route('item_order_show', $order->id) }}" class="btn btn-primary">View</a>
                                                                            </div>
                                                                        @elseif($order->status === 'REJECTED')
                                                                            <div class="custom-actions-btn mb-5">  
                                                                                {{-- <a onclick="printDiv()" class="badge badge-secondary">Print</a> --}}
                                                                                <a  href="{{ route('item_order_show', $order->id) }}" class="btn btn-primary">View</a>
                                                                            </div>
                                                                        @else
                                                                            <button class="btn-print" style="display:none;" disabled data-id="{{ $order->id }}">View</button>
                                                                        @endif
                                                                                                                                 
                                                                    </td>
                                                                @endforeach
                                                                    <div class="col">
                                                                        {{ $orders->links("pagination::bootstrap-4") }}
                                                                    </div>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>    

@stop
