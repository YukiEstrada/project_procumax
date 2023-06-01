@extends('sidebar.sidebarForm')

@section('title', 'Product')

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
                                        <a class="nav-link active" id="product-tab" data-toggle="tab" data-target="#product" type="button" role="tab" aria-controls="product" aria-selected="true">Product</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="log-tab" data-toggle="tab" data-target="#log" type="button" role="tab" aria-controls="log" aria-selected="false">Log</a>
                                    </li> 
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">                                    

                                    <!-- Registration -->
                                    <div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="custom-tabs-four-product-tab">
                                        <form action="{{ route('Po_product_create_post') }}" method="POST"class="needs-validation" novalidate>
                                            @csrf
                                            <div class="form-row">                                                
                                                <div class="col-md-3 mb-2">
                                                    <label for="validationCustom01" class="align-self-center">Item Name</label>
                                                    <input type="text" name="name" class="form-control" id="validationCustom" required>
                                                    <div class="invalid-feedback">
                                                        Fill the Product Name!
                                                    </div>
                                                </div>        
                                                <div class="col-md-3 mb-2">
                                                    <label for="validationCustom01" class="align-self-center">UOM</label>
                                                    <input type="text" name="uom" class="form-control" id="validationCustom" required>
                                                    <div class="invalid-feedback">
                                                        Fill the UOM!
                                                    </div>
                                                </div>                                                                                                                                                                                                                                                                        
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-3 mb-2">
                                                    <label for="validationCustom03" class="align-self-center">Unit Price</label>
                                                    <input type="number" name="unit_price" class="form-control" id="validationCustom" required>
                                                    <div class="invalid-feedback">
                                                        Fill the Price!
                                                    </div>
                                                </div>         
                                            </div>
                                            <div class="form-row">                                         
                                                <div class="col-md-2 mb-2">                                                                                                  
                                                    <button class="btn btn-primary" name="submit" type="submit">Save</button>
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
                                                                    <th scope="col" style="text-align: center">No.</th>                                                                    
                                                                    <th scope="col" style="text-align: center">Item Name</th>
                                                                    <th scope="col" style="text-align: center">UOM</th>                                                                                                                                   
                                                                    <th scope="col" style="text-align: center">Unit Price  (Rp)</th> 
                                                                    <th scope="col" style="text-align: center">Created At</th>
                                                                    <th scope="col" style="text-align: center">Updated At</th>
                                                                    <th scope="col" style="text-align: center">Action</th>
                                                                    <th scope="col" style="text-align: center">Purchase</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    @if (COUNT($products) == 0)
                                                                    <tr>
                                                                        <td colspan="8" style="text-align:center; width:100px">
                                                                            List Product Unavailable</td>
                                                                    </tr>
                                                                @endif
                                                                @foreach ($products as $product)
                                                                    <tr>
                                                                        <td style="vertical-align:center; text-align:center; max-width:35px; word-wrap:break-word">
                                                                            {{ $sequence++ }}</td>
                                                                        <td>{{ $product->name }}</td>
                                                                        <td>{{ $product->uom }}</td>
                                                                        <td>{{ number_format($product->unit_price, 0, ',', '.') }}</td>
                                                                        <td>{{ $product->created_at }}</td>
                                                                        <td>{{ $product->updated_at }}</td>
                                                                        <td style="text-align: center">
                                                                            @if ($product->deleted_at == null)
                                                                                <a
                                                                                    href="{{ route('Po_product_update_show', $product->id) }}" class="btn btn-primary btn-custom-color">
                                                                                    <i class="fas fa-edit"></i>                                                                                
                                                                                </a>
                                                        
                                                                                <a
                                                                                    type="button" data-toggle="modal" data-target="#deleteProduct{{$product->id}}"class="btn btn-primary">
                                                                                    <i class="fas fa-eye-slash"></i>                                                                            
                                                                                </a>                                
                                                                                <!-- Modal -->
                                                                                <div class="modal fade" id="deleteProduct{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteProductTitle" aria-hidden="true">
                                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title" id="deleteProductLongTitle">Delete Product</h5>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                                </div>
                                                                                                <div class="modal-body">
                                                                                                Are you sure to delete this product?
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                                <a href="{{ route('Po_product_delete_show', $product->id) }}" name="submit" type="submit" class="btn btn-primary">Yes</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>                                    
                                                                            @else
                                                                                <a
                                                                                    href="{{ route('Po_product_restore_show', $product->id) }}" class="btn btn-primary btn-custom-color">
                                                                                    <i class="fas fa-undo"></i>                                                                                
                                                                                </a>
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                <form method="POST" action="{{route("item_addToCart")}}">
                                                                                    @csrf
                                                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                                                    <input type="number" name="quantity" min="0" class="form-control" value="0">
                                                                                    <button type="submit" class="btn btn-success w-100 mt-2"> Add to Cart </button>
                                                                                </form>
                                                                            </td>
                                                                    </tr>
                                                                    @endforeach
                                                                    <div class="col">
                                                                        {{ $products->links("pagination::bootstrap-4") }}
                                                                    </div>
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
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>

@stop