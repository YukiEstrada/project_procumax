@extends('sidebar.sidebarForm')

@section('title', 'Details')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content">     
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="detail-tab" data-toggle="tab" data-target="#detail" type="button" role="tab" aria-controls="detail" aria-selected="true">Details</a>
                                    </li>                                                                      
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">                                    

                                    <!-- Registration -->
                                    <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="custom-tabs-four-formPo-tab">
                                        <form action="#" method="#" id="toNewWindow">
                                            @csrf                                                                                                                                                                             
                                            <div class="form-row" id="print-form">
                                                <div class="col-md-3 mb-2">
                                                    <label class="align-self-center">Date</label>
                                                    <input type="date" name="date" class="form-control" readonly>                                                 
                                                </div>                                                
                                                <div class="col-md-3 mb-2">
                                                    <label class="align-self-center">Vendor</label>
                                                    <input type="text" name="vendor" class="form-control" readonly>                                                
                                                </div>                                                                                                 
                                                <div class="col-md-4 mb-2 approved">                                                     
                                                    <img src="{{ url('img/approved.png') }}" alt="Approved">                                                    
                                                </div>                                                                                              
                                                <div class="col-md-2 mb-2">
                                                    <label class="align-self-center">Po No.</label>
                                                    <input type="text" name="poNo" class="form-control" readonly>
                                                </div>
                                            </div>                                            
                                            <div class="form-row">
                                                <div class="col-md-2 mb-2">
                                                    <label class="align-self-center">MRV No</label>
                                                    <input type="text" name="mrvNo" class="form-control" readonly>                                                   
                                                </div>                                                                                                                                                                                                                                                                 
                                            </div>
                                            <hr>
                                            <section class="content">                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card">                                                  
                                                            <div class="table-responsive card-body p-0">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th style="width: 10px">No.</th>
                                                                            <th>Item Name</th>
                                                                            <th class="col-md-2" style="text-align: center">Qty</th>
                                                                            <th class="col-md-2" style="text-align: center">UOM</th>
                                                                            <th class="col-md-2" style="text-align: center">Price</th>
                                                                            <th class="col-md-2" style="text-align: center">Total</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="width: 10px">1.</td>
                                                                            <td>Sapu asdasdasdasdasdasdasdasdasdasd</td>
                                                                            <td class="col-md-2" style="text-align: center">                                                                        
                                                                                <input type="number" name="qty" class="form-control" readonly>                                                                        
                                                                            </td>
                                                                            <td class="col-md-2" style="text-align: center">PCS</td>
                                                                            <td class="col-md-2" style="text-align: center">200.000</td>
                                                                            <td class="col-md-2" style="text-align: center">400.000</td>
                                                                        </tr>  
                                                                        <tr>
                                                                            <td style="width: 10px">2.</td>
                                                                            <td>Sapu asdasdasdasdasdasdasdasdasdasd</td>
                                                                            <td class="col-md-2" style="text-align: center">                                                                        
                                                                                <input type="number" name="qty" class="form-control" readonly>                                                                        
                                                                            </td>
                                                                            <td class="col-md-2" style="text-align: center">PCS</td>
                                                                            <td class="col-md-2" style="text-align: center">200.000</td>
                                                                            <td class="col-md-2" style="text-align: center">400.000</td>
                                                                        </tr>  
                                                                        <tr>
                                                                            <td style="width: 10px">3.</td>
                                                                            <td>Sapu asdasdasdasdasdasdasdasdasdasd</td>
                                                                            <td class="col-md-2" style="text-align: center">                                                                        
                                                                                <input type="number" name="qty" class="form-control" readonly>                                                                        
                                                                            </td>
                                                                            <td class="col-md-2" style="text-align: center">PCS</td>
                                                                            <td class="col-md-2" style="text-align: center">200.000</td>
                                                                            <td class="col-md-2" style="text-align: center">400.000</td>
                                                                        </tr>                                                                                                                                       
                                                                    </tbody>
                                                                </table>
                                                            </div>                                                              
                                                        </div>
                                                    </div>                                                            
                                                </div>                                                
                                            </section>
                                            <hr>
                                            <div class="form-row">                                                
                                                <div class="col-md-4 mb-2">                                                    
                                                    <label class="align-self-center">Total</label>
                                                    <input type="number" name="total" class="form-control" readonly>
                                                </div>     
                                                <div class="col-md-8 mb-2 text-right">
                                                    <a onclick="generatePDF()" class="btn btn-primary">Print</a>                                                                                                                     
                                                </div>                                                  
                                            </div>
                                        </form>                                                                                                                                                    
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


