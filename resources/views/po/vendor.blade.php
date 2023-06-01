@extends('sidebar.sidebarForm')

@section('title', 'Vendor')

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
                                        <a class="nav-link active" id="vendor-tab" data-toggle="tab" data-target="#vendor" type="button" role="tab" aria-controls="vendor" aria-selected="true">Vendor</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="log-tab" data-toggle="tab" data-target="#log" type="button" role="tab" aria-controls="log" aria-selected="false">Log</a>
                                    </li> 
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">                                    

                                    <!-- Registration -->
                                    <div class="tab-pane fade show active" id="vendor" role="tabpanel" aria-labelledby="custom-tabs-four-vendor-tab">
                                        <form action="{{ route('Po_vendor_create_post') }}" method="POST"class="needs-validation" novalidate>
                                            @csrf
                                            <div class="form-row">                                                
                                                <div class="col-md-3 mb-2">
                                                    <label for="validationCustom01" class="align-self-center">Vendor Name</label>
                                                    <input type="text" name="name" class="form-control" id="validationCustom" required>
                                                    <div class="invalid-feedback">
                                                        Fill the vendor's name!
                                                    </div>
                                                </div>                                                                                                                                                                                                                                                                           
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-3 mb-2">
                                                    <label for="validationCustom03" class="align-self-center">Address</label>
                                                    <input type="text" name="address" class="form-control" id="validationCustom" required>
                                                    <div class="invalid-feedback">
                                                        Fill the vendor's address!
                                                    </div>
                                                </div>         
                                            </div>
                                            <div class="form-row">                                         
                                                <div class="col-md-2 mb-2">                                                                                                  
                                                    <button class="btn btn-primary" type="submit">Save</button>
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
                                                                    <th scope="col" style="text-align: center">Vendor Name</th>
                                                                    <th scope="col" style="text-align: center">Address</th>                                                                                                                                   
                                                                    <th scope="col" style="text-align: center">Created At</th>
                                                                    <th scope="col" style="text-align: center">Updated At</th>
                                                                    <th scope="col" style="text-align: center">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    @if (COUNT($vendors) == 0)
                                                                    <tr>
                                                                        <td colspan="6" style="text-align:center; width:100px">
                                                                            List Vendor Unavailable</td>
                                                                    </tr>
                                                                @endif
                                                                @foreach ($vendors as $vendor)
                                                                    <tr>
                                                                        <td style="vertical-align:center; text-align:center; max-width:35px; word-wrap:break-word">
                                                                            {{ $sequence++ }}</td>
                                                                        <td>{{ $vendor->name }}</td>
                                                                        <td>{{ $vendor->address }}</td>
                                                                        <td>{{ $vendor->created_at }}</td>
                                                                        <td>{{ $vendor->updated_at }}</td>
                                                                        <td style="text-align: center">
                                                                            @if ($vendor->deleted_at == null)
                                                                                <a
                                                                                    href="{{ route('Po_vendor_update_show', $vendor->id) }}" class="btn btn-primary btn-custom-color">
                                                                                    <i class="fas fa-edit"></i>                                                                                
                                                                                </a>
                                                        
                                                                                
                                                                                <a
                                                                                    type="button" data-toggle="modal" data-target="#deleteVendor{{$vendor->id}}"class="btn btn-primary">
                                                                                    <i class="fas fa-eye-slash"></i>                                                                                                                                                        
                                                                                </a>                                                                    
                                                                                <!-- Modal -->
                                                                                <div class="modal fade" id="deleteVendor{{$vendor->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteVendorTitle" aria-hidden="true">
                                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title" id="deleteVendorLongTitle">Delete Vendor</h5>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                                </div>
                                                                                                <div class="modal-body">
                                                                                                Are you sure to delete this vendor?
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                                <a href="{{ route('Po_vendor_delete_show', $vendor->id) }}" name="submit" type="submit" class="btn btn-primary">Yes</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @else
                                                                                <a
                                                                                    href="{{ route('Po_vendor_restore_show', $vendor->id) }}" class="btn btn-primary btn-custom-color"><i class="fas fa-undo"></i>
                                                                                    </a>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                        @endforeach
                                                                    <div class="col">
                                                                        {{ $vendors->links("pagination::bootstrap-4") }}
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
            </div>
        </section>
    </div>    

@stop
