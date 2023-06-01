@extends('sidebar.sidebarForm')

@section('title', 'Product Update')

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
                                        <a class="nav-link active" id="productUpdate-tab" data-toggle="tab" data-target="#productUpdate" type="button" role="tab" aria-controls="productUpdate" aria-selected="true">Product Update</a>
                                    </li>                              
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">                                    

                                    <!-- Registration -->
                                    <div class="tab-pane fade show active" id="productUpdate" role="tabpanel" aria-labelledby="custom-tabs-four-productUpdate-tab">
                                        <form action="{{ route('Po_product_update_post', $products->id) }}" method= "POST" class="needs-validation" novalidate>
                                            @csrf
                                            <div class="form-row">                                                
                                                <div class="col-md-3 mb-2">
                                                    <label for="validationCustom01" class="align-self-center">Item Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $products->name }}"id="validationCustom" required>
                                                    <div class="invalid-feedback">
                                                        Fill the Product Name!
                                                    </div>
                                                </div>        
                                                <div class="col-md-3 mb-2">
                                                    <label for="validationCustom01" class="align-self-center">UOM</label>
                                                    <input type="text" name="uom" class="form-control" value="{{ $products->uom }}"id="validationCustom" required>
                                                    <div class="invalid-feedback">
                                                        Fill the UOM!
                                                    </div>
                                                </div>                                                                                                                                                                                                                                                                        
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-3 mb-2">
                                                    <label for="validationCustom03" class="align-self-center">Unit Price (Rp)</label>
                                                    <input type="number" name="unit_price" class="form-control" value="{{ $products->unit_price }}"id="validationCustom" required>
                                                    <div class="invalid-feedback">
                                                        Fill the Price!
                                                    </div>
                                                </div>         
                                            </div>
                                                                                 
                                                                                                                                                 
                                                <button class="btn btn-primary" name="save" type="button" data-toggle="modal" data-target="#updateProduct">Update</button>
                                                <a href="{{ route('Po_product_show') }}" class="btn btn-light btn-outline-dark">Cancel</a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="updateProduct" tabindex="-1" role="dialog" aria-labelledby="updateProductTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="updateProductLongTitle">Update Product</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                Are you sure to update this product?
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <form action="{{ route('Po_product_update_post', $products->id) }}" method="POST">

                                                                    @csrf
                                                                    <button name="save" type="submit" class="btn btn-primary">Update</button>
                                                                </form>
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

                                 