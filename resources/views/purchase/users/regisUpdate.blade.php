@extends('sidebar.sidebarReg')

@section('title', 'Registration Update')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h4>Registration Update</h4>                                    
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
                                <ul class="nav nav-tabs" id="registrationUpdate" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="registrationUpdate" data-toggle="tab" href="#registrationUpdate" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">User Update Form</a>
                                    </li>                              
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="registrationUpdate">

                                    <!-- Registration Update -->
                                    <div class="tab-pane fade show active" id="registrationUpdate" role="tabpanel" aria-labelledby="registrationUpdateb">
                                        <form Action="{{ route('admin_user_update_post', $users->id) }}" method = POST class="needs-validation" novalidate>
                                            @csrf
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationCustom01">Name</label>
                                                        <input type="text" value="{{ $users->name }}" name="name" class="form-control" id="validationCustom01"
                                                            >
                                                        <div class="invalid-feedback">
                                                            Fill the name!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationCustom02">Username</label>
                                                        <input type="text" value="{{ $users->username }}"name="username"class="form-control" id="validationCustom02"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Fill the username!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationCustom03">Password</label>
                                                        <input type="password" value="{{ $users->password }}"name="password"class="form-control" id="validationCustom03"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Fill the password!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationCustom04">Role</label>
                                                        <select name="role" value="{{ $users->role }}" class="custom-select" id="select-2" onchange="hideInput2(this.value)" required>
                                                            <option selected disabled value=""></option>
                                                            @php
                                                                $role_arr = ['Admin Po', 'Admin Approval', 'Admin Mrv','Admin Root'];
                                                            @endphp
                                                            @foreach ($role_arr as $role)
                                                                @if($role== $users->role )
                                                                    <option  value="{{$role}}" selected="">{{$role}}</option>
                                                                @else
                                                                    <option  value="{{$role}}" >{{$role}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please choose one!
                                                        </div>
                                                    </div>                                                                                                    
                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationCustom05">Department</label>
                                                        <select name="dept" value="{{ $users->dept_id }}"class="custom-select" id="validationCustom05" required>
                                                            <option value=""></option>
                                                            @foreach ($depts as $dept)
                                                                @if($dept->id == $users->dept_id )
                                                                    <option selected value="{{ $dept['id'] }}"> {{ $dept['name'] }} </option>
                                                                @else
                                                                    <option value="{{ $dept['id'] }}"> {{ $dept['name'] }} </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Fill the department!
                                                        </div>
                                                    </div>                                                    
                                                    <div class="col-md-2 mb-3">
                                                        <label for="validationCustom07">Status</label>    
                                                        <div class="col-sm-6">                                                    
                                                            <!-- Radio Status -->
                                                            <div class="form-group">                                                                
                                                                @if( $users->is_active == true )    
                                                                    <div class="form-check">                                                                    
                                                                        <input class="form-check-input" type="radio" value='1'  name="active" checked>
                                                                        <label class="form-check-label">Active</label>
                                                                    </div>    
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" value="0" name="active">
                                                                        <label class="form-check-label">Inactive</label>                                                                        
                                                                    </div>
                                                                @else  
                                                                    <div class="form-check">                                                                  
                                                                        <input class="form-check-input" type="radio" value='1'  name="active" >
                                                                        <label class="form-check-label">Active</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" value="0" name="active" checked>
                                                                        <label class="form-check-label">Inactive</label>                                                                        
                                                                    </div>
                                                                @endif                                                                                                                            
                                                            </div>    
                                                        </div>                                                    
                                                    </div>
                                                    <div class="col-md-2 mb-3" id="hide-input-2">
                                                        <label for="validationCustom06">Level Access</label>
                                                        <br>
                                                        
                                                        @foreach($positions as $position)
                                                            @if(in_array($position->id, $position_ids) == true)
                                                                <input type="checkbox" id="lvl-acc-update1" checked name="level[]" value="{{ $position->id }}"> {{ $position->level }} <br>
                                                            @else
                                                                <input type="checkbox" id="lvl-acc-update2" name="level[]" value="{{ $position->id }}"> {{ $position->level }} <br>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#updateDataRegis">Update</button>
                                            <a href="{{ route('admin_user_page') }}" class="btn btn-light btn-outline-dark">Cancel</a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="updateDataRegis" tabindex="-1" role="dialog" aria-labelledby="updateDataRegisTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="updateDataRegisLongTitle">Update Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            Are you sure to update this data?
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            
                                                            <form action="{{ route('admin_user_update_post', $users->id) }}" method="POST">
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