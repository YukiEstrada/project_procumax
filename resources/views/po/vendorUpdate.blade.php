@extends('sidebar.sidebarForm')

@section('title', 'Vendor Update')

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
                                        <a class="nav-link active" id="vendorUpdate-tab" data-toggle="tab" data-target="#vendorUpdate" type="button" role="tab" aria-controls="vendorUpdate" aria-selected="true">Vendor Update</a>
                                    </li>                              
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">                                    

                                    <!-- Registration -->
                                    <div class="tab-pane fade show active" id="vendorUpdate" role="tabpanel" aria-labelledby="custom-tabs-four-vendorUpdate-tab">
                                        <form action="{{ route('Po_vendor_update_post', $vendors->id) }}" method="POST"class="needs-validation" novalidate>
                                            @csrf
                                            <div class="form-row">                                                
                                                <div class="col-md-3 mb-2">
                                                    <label for="validationCustom01" class="align-self-center">Vendor Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $vendors->name }}" id="validationCustom" required>
                                                    <div class="invalid-feedback">
                                                        Fill the vendor's name!
                                                    </div>
                                                </div>                                                                                                                                                                                                                                                                           
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-3 mb-2">
                                                    <label for="validationCustom03" class="align-self-center">Address</label>
                                                    <input type="text" name="address" class="form-control" value="{{ $vendors->address }}" id="validationCustom" required>
                                                    <div class="invalid-feedback">
                                                        Fill the vendor's address!
                                                    </div>
                                                </div>         
                                            </div>
                                            <div class="form-row">                                         
                                                <div class="col-md-2 mb-2">                                                                                                  
                                                    <button class="btn btn-primary" name="submit" type="button" data-toggle="modal" data-target="#updateVendor">Update</button>                                                    
                                                    <a href="{{ route('Po_vendor_show') }}" class="btn btn-light btn-outline-dark">Cancel</a>                                                 
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="updateVendor" tabindex="-1" role="dialog" aria-labelledby="updateVendorTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="updateVendorLongTitle">Update Vendor</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                    Are you sure to update this vendor?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <form action="{{ route('Po_vendor_update_post', $vendors->id) }}" method="POST">

                                                                        @csrf
                                                                        <button name="save" type="submit" class="btn btn-primary">Update</button>
                                                                    </form>
                                                                </div>
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
