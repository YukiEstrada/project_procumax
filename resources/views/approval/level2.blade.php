@extends('sidebar.sidebarApp')

@section('title', 'Approval Level 2')

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
                                        <a class="nav-link active" id="detail-tab" data-toggle="tab" data-target="#detail" type="button" role="tab" aria-controls="detail" aria-selected="true">Form PO</a>
                                    </li>                                    
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">                                    

                                    <!-- Registration -->
                                    <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="custom-tabs-four-formPo-tab">
                                        <form action="#" method="#">
                                            @csrf                                                                                                                                                                             
                                            <div class="form-row">
                                                <div class="col-md-3 mb-2">
                                                    <label class="align-self-center">Date</label>
                                                    <input type="date" name="date" class="form-control" disabled>                                                 
                                                </div>                                                
                                                <div class="col-md-3 mb-2">
                                                    <label class="align-self-center">Vendor</label>
                                                    <input type="text" name="vendor" class="form-control" disabled>                                                
                                                </div>                                                                                                 
                                                <div class="col-md-4 mb-2">                                                                                                                                                        
                                                </div>                                                                                              
                                                <div class="col-md-2 mb-2">
                                                    <label class="align-self-center">Po No.</label>
                                                    <input type="text" name="poNo" class="form-control" disabled>
                                                </div>
                                            </div>                                            
                                            <div class="form-row">
                                                <div class="col-md-2 mb-2">
                                                    <label class="align-self-center">MRV No</label>
                                                    <input type="text" name="mrvNo" class="form-control" disabled>                                                   
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
                                                                            <th class="col-md-2" style="text-align: center">Subtotal</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="width: 10px">1.</td>
                                                                            <td>Sapu asdasdasdasdasdasdasdasdasdasd</td>
                                                                            <td class="col-md-2" style="text-align: center">                                                                        
                                                                                <input type="number" name="qty" class="form-control" disabled>                                                                        
                                                                            </td>
                                                                            <td class="col-md-2" style="text-align: center">PCS</td>
                                                                            <td class="col-md-2" style="text-align: center">200.000</td>
                                                                            <td class="col-md-2" style="text-align: center">400.000</td>
                                                                        </tr>  
                                                                        <tr>
                                                                            <td style="width: 10px">2.</td>
                                                                            <td>Sapu asdasdasdasdasdasdasdasdasdasd</td>
                                                                            <td class="col-md-2" style="text-align: center">                                                                        
                                                                                <input type="number" name="qty" class="form-control" disabled>                                                                        
                                                                            </td>
                                                                            <td class="col-md-2" style="text-align: center">PCS</td>
                                                                            <td class="col-md-2" style="text-align: center">200.000</td>
                                                                            <td class="col-md-2" style="text-align: center">400.000</td>
                                                                        </tr>  
                                                                        <tr>
                                                                            <td style="width: 10px">3.</td>
                                                                            <td>Sapu asdasdasdasdasdasdasdasdasdasd</td>
                                                                            <td class="col-md-2" style="text-align: center">                                                                        
                                                                                <input type="number" name="qty" class="form-control" disabled>                                                                        
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
                                                <div class="col-md-3 mb-2">                                                    
                                                    <label class="align-self-center">Total</label>
                                                    <input type="number" name="total" class="form-control" disabled>
                                                </div>
                                                <div class="col-md-2 mb-2">

                                                </div>
                                                
                                                <div class="col-md-3 mb-2">                                                                                                        
                                                    <label class="align-self-center">Level 3</label>
                                                    <select name="dept" class="custom-select" required>
                                                        <option value=""></option>
                                                        
                                                    </select>                                                                                        
                                                </div>

                                                <div class="col-md-4 mb-2 text-right">    
                                                    <button class="btn btn-danger" name="submit" type="button" data-toggle="modal" data-target="#rejectLvl2">Reject</button>                                                                                                                                                                                                                  
                                                    <button class="btn btn-primary" name="submit" type="button" data-toggle="modal" data-target="#approveLvl2">Approve</button> 
                                                </div>  
                                                <!-- Modal Reject -->
                                                <div style="text-align: center" class="modal fade" id="rejectLvl2" tabindex="-1" role="dialog" aria-labelledby="rejectLvl2Title" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="rejectLvl2LongTitle">Reject Level 2</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            Are you sure to reject this level 2?
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button name="submit" type="submit" class="btn btn-primary">Yes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <!-- Modal Approve -->
                                                <div style="text-align: center" class="modal fade" id="approveLvl2" tabindex="-1" role="dialog" aria-labelledby="approveLvl2Title" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="approveLvl2LongTitle">Approve Level 2</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            Are you sure to approve this level 2?
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button name="submit" type="submit" class="btn btn-primary">Yes</button>
                                                            </div>
                                                        </div>
                                                    </div>
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
