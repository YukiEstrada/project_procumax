@extends('sidebar.sidebarReg')

@section('title', 'Registration Update')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h4>Department Update Form</h4>                                    
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="registration-tab" data-toggle="tab" data-target="#registration" type="button" role="tab" aria-controls="registration" aria-selected="true">Depts Registration</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="registration" role="tabpanel" aria-labelledby="registration-tab">
                                        <form Action="{{ route('admin_dept_update_post', $depts->id) }}" method="POST" class="needs-validation"
                                            novalidate>
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">Department Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                    value="{{ $depts->name }}"id="validationCustom01" required>
                                                    <div class="invalid-feedback">
                                                        Fill the department name!
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#updateDataDept">Update</button>
                                            <a href="{{ route('admin_dept_show') }}" class="btn btn-light btn-outline-dark">Cancel</a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="updateDataDept" tabindex="-1" role="dialog" aria-labelledby="updateDataDeptTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="updateDataDeptLongTitle">Update Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            Are you sure to update this data?
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                            <form action="{{ route('admin_dept_update_post', $depts->id) }}" method="POST">
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