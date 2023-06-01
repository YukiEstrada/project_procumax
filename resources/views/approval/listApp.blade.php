@extends('sidebar.sidebarApp')

@section('title', 'List Approval')

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
                                        <a class="nav-link active" id="listApp-tab" data-toggle="tab" data-target="#listApp"
                                            type="button" role="tab" aria-controls="listApp" aria-selected="True">List
                                            Approval
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">

                                    <!-- Log -->
                                    <div class="tab-pane fade show active" id="listApp" role="tabpanel" aria-labelledby="listApp-tab">
                                        <section class="content pt-2">
                                            <div class="content">
                                                <div class="container-fluid">
                                                    <form method="GET">                                                    
                                                        @php
                                                            $statuses = ['PENDING', 'APPROVED', 'REJECTED'];
                                                        @endphp    
                                                       
                                                        @foreach ($statuses as $status)
                                                        <div class="content">                                                            
                                                            @if (in_array($status, $param_status))
                                                                <input type="checkbox" name="status[]" value="{{ $status }}"
                                                                    checked>
                                                                {{ $status }}
                                                            @else
                                                                <input type="checkbox" name="status[]" value="{{ $status }}">
                                                                {{ $status }}
                                                            @endif                                                                                                                                                                     
                                                        </div>                                                        
                                                        @endforeach                                                                                                                                                                                                                                                                                     
                                                        <div class="container-fluid row">
                                                            <button class="btn btn-primary" name="submit" type="submit">Filter</button>
                                                        </div>
                                                    </form>                                                
                                                </div>     
                                            </div>                                                                     
                                           
                                            <div class="content pt-2">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-12 table-responsive">
                                                            <table id="example1" class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col" style="text-align: center">No.</th>
                                                                        <th scope="col" style="text-align: center">PO No</th>
                                                                        <th scope="col" style="text-align: center">Vendor
                                                                        </th>
                                                                        <th scope="col" style="text-align: center">Total
                                                                            Price</th>
                                                                        <th scope="col" style="text-align: center">Status
                                                                        </th>
                                                                        <th scope="col" style="text-align: center">Action
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if (COUNT($po_approvals) == 0)
                                                                        <tr>
                                                                            <td colspan="6" style="text-align:center; width:100px">
                                                                                List Approval Unavailable</td>
                                                                        </tr>
                                                                    @endif
                                                                    @foreach ($po_approvals as $i => $row)
                                                                        <tr>
                                                                            <td style="text-align: center">{{ $i + 1 }}
                                                                            </td>
                                                                            <td style="text-align: center">
                                                                                {{ $row->order->ref_no }}</td>
                                                                            <td style="text-align: center">
                                                                                {{ $row->order->vendor->name }}</td>
                                                                            <td style="text-align: center">
                                                                                Rp. {{ number_format($row->order->total_price, 0, ',', '.') }}
                                                                            </td>
                                                                            <td style="text-align: center">{{ $row->status }}
                                                                            </td>
    
                                                                            <td style="text-align: center">
                                                                                <div>
                                                                                    <a href="{{ route('App_detail_show', $row->id) }}"
                                                                                        class="badge badge-info">Details</a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
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
