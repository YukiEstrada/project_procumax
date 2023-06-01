@extends('sidebar.sidebarForm')

@section('title', 'Form PO')

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
                                        <a class="nav-link active" id="formPo-tab" data-toggle="tab" data-target="#formPo" type="button" role="tab" aria-controls="formPo" aria-selected="true">Form PO</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="log-tab" data-toggle="tab" data-target="#log" type="button" role="tab" aria-controls="log" aria-selected="false">Log</a>
                                    </li> 
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">                                    

                                    <!-- Registration -->
                                    <div class="tab-pane fade show active" id="formPo" role="tabpanel" aria-labelledby="custom-tabs-four-formPo-tab">
                                        <form action="#" method="POST"class="needs-validation" novalidate>
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-md-3 mb-2">
                                                    <label for="validationCustom01" class="align-self-center">Date</label>
                                                    <input type="date" name="date" class="form-control" id="validationCustom" required>
                                                    <div class="invalid-feedback">
                                                        Fill the date!
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="validationCustom02" class="align-self-center">Vendor</label>
                                                    <input type="text" name="vendor" class="form-control" id="validationCustom" required>
                                                    <div class="invalid-feedback">
                                                        Fill the vendor!
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    
                                                </div>
                                                <div class="col-md-2 mb-2">
                                                    <label for="validationCustom02" class="align-self-center">Po No.</label>
                                                    <input type="text" name="poNo" class="form-control" id="validationCustom" readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-2 mb-2">
                                                    <label for="validationCustom03" class="align-self-center">MRV No</label>
                                                    <input type="text" name="mrvNo" class="form-control" id="validationCustom" required>
                                                    <div class="invalid-feedback">
                                                        Fill the MRV No!
                                                    </div>
                                                </div>                                                                                                                                                                                                                                                                 
                                            </div>
                                            <hr>
                                            <section class="content">                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card">                                                  
                                                            <div class="table-responsive card-body p-0">
                                                                <table class="table table-bordered table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th style="width: 10px">No.</th>
                                                                            <th>Item Name</th>
                                                                            <th class="col-md-2" style="text-align: center">Qty</th>
                                                                            <th class="col-md-2" style="text-align: center">UOM</th>
                                                                            <th class="col-md-2" style="text-align: center">Price (Rp)</th>
                                                                            <th class="col-md-2" style="text-align: center">Subtotal</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="width: 10px">1.</td>
                                                                            <td>Sapu asdasdasdasdasdasdasdasdasdasd</td>
                                                                            <td class="col-md-2" style="text-align: center">                                                                        
                                                                                <input type="number" name="qty" class="form-control" id="validationCustom" required>                                                                        
                                                                            </td>
                                                                            <td class="col-md-2" style="text-align: center">PCS</td>
                                                                            <td class="col-md-2" style="text-align: center">200.000</td>
                                                                            <td class="col-md-2" style="text-align: center">400.000</td>
                                                                        </tr>  
                                                                        <tr>
                                                                            <td style="width: 10px">2.</td>
                                                                            <td>Sapu asdasdasdasdasdasdasdasdasdasd</td>
                                                                            <td class="col-md-2" style="text-align: center">                                                                        
                                                                                <input type="number" name="qty" class="form-control" id="validationCustom" required>                                                                        
                                                                            </td>
                                                                            <td class="col-md-2" style="text-align: center">PCS</td>
                                                                            <td class="col-md-2" style="text-align: center">200.000</td>
                                                                            <td class="col-md-2" style="text-align: center">400.000</td>
                                                                        </tr>  
                                                                        <tr>
                                                                            <td style="width: 10px">3.</td>
                                                                            <td>Sapu asdasdasdasdasdasdasdasdasdasd</td>
                                                                            <td class="col-md-2" style="text-align: center">                                                                        
                                                                                <input type="number" name="qty" class="form-control" id="validationCustom" required>                                                                        
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
                                                    <label for="validationCustom02" class="align-self-center">Total</label>
                                                    <input type="number" name="total" class="form-control" id="validationCustom" readonly>
                                                </div>

                                                <div class="col-md-2 mb-2">
                                                </div>
                                                
                                                <div class="col-md-3 mb-2">                                                                                                        
                                                    <label for="validationCustom03" class="align-self-center">Level 1</label>
                                                    <select name="dept" class="custom-select" id="validationCustom04" required>
                                                        <option value=""></option>
                                                        
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Fill the Level 1!
                                                    </div>                                                    
                                                </div>

                                                <div class="col-md-2 mb-2">

                                                </div>

                                                <div class="col-md-2 mb-2 text-right">                                                                                                  
                                                    <button href="{{ url('approval/detail1') }}" class="btn btn-primary" name="submit" type="submit">Save</button>
                                                </div>   
                                            </div>
                                        </form>                                        
                                    </div>                                    

                                    <!-- Log -->
                                    <div class="tab-pane fade" id="log" role="tabpanel" aria-labelledby="log-tab">                                        
                                        <section class="content">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12 table-responsive">
                                                        <table id="example1" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" style="text-align: center">PO No</th>
                                                                    <th scope="col" style="text-align: center">MRV No</th>
                                                                    <th scope="col" style="text-align: center">Vendor Name</th>
                                                                    <th scope="col" style="text-align: center">Total Price</th>
                                                                    <th scope="col" style="text-align: center">Status</th>                                                                    
                                                                    <th scope="col" style="text-align: center">Created At</th>
                                                                    <th scope="col" style="text-align: center">Updated At</th>
                                                                    <th scope="col" style="text-align: center">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="text-align: center">P0001</td>
                                                                    <td style="text-align: center">12345</td>
                                                                    <td style="text-align: center">PT. Seragam</td>
                                                                    <td style="text-align: center">Rp. 120.000</td>
                                                                    <td style="text-align: center">Done Approved</td>
                                                                    <td style="text-align: center">17-03-2023</td>
                                                                    <td style="text-align: center">18-03-2023</td>
                                                                    <td style="text-align: center">
                                                                        <div>
                                                                            <a href="{{ url('detail/detailApp') }}" class="badge badge-info">Details</a>
                                                                        </div>
                                                                        <div>
                                                                            <a type="button" class="badge badge-danger" data-toggle="modal" data-target="#deleteFormPO">Delete</a>
                                                                            <!-- Modal -->
                                                                            <div class="modal fade" id="deleteFormPO" tabindex="-1" role="dialog" aria-labelledby="deleteFormPOTitle" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="deleteFormPOLongTitle">Delete Form PO</h5>
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                            Are you sure to delete this form po?
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                            <button name="submit" type="submit" class="btn btn-primary">Delete</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div> 
                                                                        </div>                                                                        
                                                                    </td>
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
