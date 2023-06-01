@extends('sidebar.sidebarReg')

@section('title', 'Department')

@section('content')

    <!-- Main content -->
    <section class="content pt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="registration-tab" data-toggle="tab" data-target="#registration" type="button" role="tab" aria-controls="registration" aria-selected="true">Depts Registration</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="log-tab" data-toggle="tab" data-target="#log" type="button" role="tab" aria-controls="log" aria-selected="false">Log</a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">

                                <!-- Department -->
                                <div class="tab-pane fade show active" id="registration" role="tabpanel" aria-labelledby="registration-tab">
                                    <form Action="{{ route('admin_dept_create_post') }}" method="POST" class="needs-validation" novalidate>
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom01">Department Name</label>
                                                <input type="text" name="name" class="form-control" id="validationCustom01" required>
                                                <div class="invalid-feedback">
                                                    Fill the department name!
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Save</button>
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
                                                                <th style="text-align: center">No.</th>
                                                                <th style="text-align: center">Department Name</th>
                                                                <th style="text-align: center">Created At</th>
                                                                <th style="text-align: center">Updated At</th>
                                                                <th style="text-align: center">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if (COUNT($depts) == 0)
                                                                <tr>
                                                                    <td colspan="5" style="text-align:center; width:100px">
                                                                        List Dept Unavailable</td>
                                                                </tr>
                                                            @endif
                                                            @foreach ($depts as $dept)
                                                                <tr>
                                                                    <td style="vertical-align:center; text-align:center; max-width:35px; word-wrap:break-word">
                                                                        {{ $sequence++ }}</td>
                                                                    <td>{{ $dept->name }}</td>
                                                                    <td>{{ $dept->created_at }}</td>
                                                                    <td>{{ $dept->updated_at }}</td>
                                                                    <td style="text-align: center">
                                                                        @if ($dept->deleted_at == null)
                                                                            <a
                                                                                href="{{ route('admin_dept_update_show', $dept->id) }}" class="btn btn-primary btn-custom-color">
                                                                                <i class="fas fa-edit"></i>                                                                                
                                                                            </a>
                                                                            |
                                                                            <a
                                                                                class="btn btn-primary" type="button" data-toggle="modal" data-target="#deleteDataDept{{$dept->id}}">
                                                                                <i class="fas fa-eye-slash"></i>                                                                                                                                                               
                                                                            </a>
                                                                            <!-- Modal -->
                                                                            <div class="modal fade" id="deleteDataDept{{$dept->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteDataDeptTitle" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="deleteDataDeptLongTitle">Delete Data</h5>
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                            Are you sure to delete this data?
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                            <a name="submit" href="{{ route('admin_dept_delete_show', $dept->id) }}" type="submit" class="btn btn-primary">Yes</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div> 
                                                                        @else
                                                                            <a
                                                                                href="{{ route('admin_dept_restore_show', $dept->id) }}" class="btn btn-primary btn-custom-color">
                                                                                <i class="fas fa-undo"></i>                                                                                
                                                                            </a>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            <div class="col">
                                                                {{ $depts->links("pagination::bootstrap-4") }}
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
    <!-- /.content -->

@stop
