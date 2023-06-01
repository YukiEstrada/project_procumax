@extends('sidebar.sidebarReg')

@section('title', 'Registration')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <form Action="{{ route('level_config') }}" method="POST"class="needs-validation" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom03">Limit Access</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input name="level_update" type="text" class="form-control" id="validationCustom07" required>
                                <div class="invalid-feedback">
                                    Fill the Limit Access!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <button class="btn btn-primary" name="revise" type="button" data-toggle="modal" data-target="#reviseLevel">Revise</button>                                
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="reviseLevel" tabindex="-1" role="dialog" aria-labelledby="reviseLevelTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="reviseLevelLongTitle">Revise Max Level</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            Are you sure to change the level?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button name="submit" type="submit" class="btn btn-primary">Revise</button>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <h6> Currently the highest level of approval is {{$max_level}}</h6>

                        </div>
                    </form>
                </div>
            </div><!-- /.container-fluid -->
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
                                        <a class="nav-link active" id="registration-tab" data-toggle="tab" data-target="#registration" type="button" role="tab" aria-controls="registration" aria-selected="true">Registration</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="log-tab" data-toggle="tab" data-target="#log" type="button" role="tab" aria-controls="log" aria-selected="false">Log</a>
                                    </li> 
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">                                    

                                    <!-- Registration -->
                                    <div class="tab-pane fade show active" id="registration" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-registration-tab">
                                        <form Action="{{ route('admin_user_create_post') }}" method="POST"class="needs-validation" novalidate>
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">Name</label>
                                                    <input type="text" name="name" class="form-control" id="validationCustom01" required>
                                                    <div class="invalid-feedback">
                                                        Fill the name!
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom02">Username</label>
                                                    <input type="text" name="username"class="form-control" id="validationCustom02" required>
                                                    <div class="invalid-feedback">
                                                        Fill the username!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom03">Password</label>
                                                    <input type="password" name="password"class="form-control" id="validationCustom03" required>
                                                    <div class="invalid-feedback">
                                                        Fill the password!
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom04">Role</label>
                                                    <select name="role" class="custom-select" id="select" onchange="hideInput(this.value)" required>
                                                        <option selected disabled value=""></option>
                                                        @php
                                                            $role_arr = ['Admin Po', 'Admin Approval', 'Admin Mrv','Admin Root'];
                                                        @endphp
                                                        @foreach ($role_arr as $role)
                                                        <option value="{{$role}}" selected="">{{$role}}</option>
                                                        @endforeach>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please choose one!
                                                    </div>
                                                </div>                                                                                            
                                                <div class="col-md-6 mb-3">                                                    
                                                    <label for="validationCustom03">Department</label>
                                                    <select name="dept" class="custom-select" id="validationCustom04" required>
                                                        <option value=""></option>
                                                        @foreach ($depts as $dept)
                                                            <option value="{{ $dept['id'] }}"> {{ $dept['name'] }} </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Fill the department!
                                                    </div>                                                    
                                                </div>                                                
                                                <div class="col-md-2 mb-3">
                                                    <label for="validationCustom03">Status</label>
                                                    <div class="col-sm-6">
                                                        <!-- Radio Status -->
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" value='1' name="active" checked>
                                                                <label class="form-check-label">Active</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" value="0" name="active">
                                                                <label class="form-check-label">Inactive</label>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 mb-3" id="hide-input">
                                                    <label for="validationCustom05">Level Access</label>
                                                    <br>
                                                    @foreach($positions as $position)
                                                        <input type="checkbox" id="lvl-acc" name="level[]" value="{{ $position->id }}"> {{ $position->level }} <br>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" name="submit" type="submit">Submit Form</button>                                            
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
                                                                    <th scope="col" style="text-align: center">Name</th>
                                                                    <th scope="col" style="text-align: center">Username</th>
                                                                    <th scope="col" style="text-align: center">Role</th>
                                                                    <th scope="col" style="text-align: center">Level</th>
                                                                    <th scope="col" style="text-align: center">Department</th>
                                                                    <th scope="col" style="text-align: center">Status</th>
                                                                    <th scope="col" style="text-align: center">Created At</th>
                                                                    <th scope="col" style="text-align: center">Updated At</th>
                                                                    <th scope="col" style="text-align: center">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (COUNT($users) == 0)
                                                                    <tr>
                                                                        <td colspan="10"
                                                                            style="text-align:center; width:100px">List
                                                                            User Unavailable</td>
                                                                    </tr>
                                                                @endif
                                                                @foreach ($users as $user)
                                                                    <tr>
                                                                        <td style="vertical-align:center; text-align:center; max-width:35px; word-wrap:break-word">
                                                                            {{ $sequence++ }}</td>
                                                                        <td>{{ $user->name }}</td>
                                                                        <td>{{ $user->username }}</td>
                                                                        <td>{{ $user->role }}</td>

                                                                        <td style="text-align: center">
                                                                            @foreach ($user->positions as $position)
                                                                                {{ $position->level }} <br>
                                                                            @endforeach
                                                                        </td>
                                                                        <td>{{ $user->department->name }}</td>
                                                                        <td style="text-align: center">{{ $user['is_active'] == true ? 'Active' : 'Inactive' }}
                                                                        </td>
                                                                        <td>{{ $user->created_at }}</td>
                                                                        <td>{{ $user->updated_at }}</td>

                                                                        <td style="text-align: center">
                                                                            @if ($user['is_active'] == true)
                                                                                <a
                                                                                    href="{{ route('admin_user_update_show', $user->id) }}" class="btn btn-primary btn-custom-color">
                                                                                    <i class="fas fa-edit"></i>
                                                                                </a>
                                                                                |
                                                                                <a
                                                                                    class="btn btn-primary btn-custom-color">
                                                                                    <i class="fas fa-eye-slash" data-toggle="modal" data-target="#deleteDataRegis{{$user->id}}"></i>
                                                                                </a>
                                                                                <!-- Modal -->
                                                                                <div class="modal fade" id="deleteDataRegis{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteDataRegisTitle" aria-hidden="true">
                                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                            <h5 class="modal-title" id="deleteDataRegisLongTitle">Delete Data</h5>
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                            Are you sure to delete this data?
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                            <a name="submit" href="{{ route('admin_user_delete_show', $user->id) }}" class="btn btn-primary">Yes</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @else
                                                                                <a
                                                                                    href="{{ route('admin_user_restore_show', $user->id) }}" class="btn btn-primary btn-custom-color">
                                                                                    <i class="fas fa-undo"></i>
                                                                                </a>
                                                                            @endif
                                                                        </td>
                                                                @endforeach


                                                                <div class="col">
                                                                    {{ $users->links("pagination::bootstrap-4") }}
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
