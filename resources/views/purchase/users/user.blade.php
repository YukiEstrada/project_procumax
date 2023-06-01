@extends('purchase.layouts.layout')
@section('content')

<div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->count() > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $message)
                    <li> {{ $message }} <br> </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

@section('log')
<a href="{{ route('admin_user_page') }}"class="nav-link" id="nav-log-tab" data-bs-toggle="tab" data-bs-target="#nav-log-2" type="button" role="tab" aria-controls="nav-log" aria-selected="true">Log</a>
@stop


<div class="tab-pane fade show active" id="nav-log-2" role="tabpanel" aria-labelledby="nav-log-tab" tabindex="0">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">USER LIST</h1>          
    </div>              

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Name</th>      
                <th scope="col">Usn</th>                                   
                <th scope="col">Role</th>   
                <th scope="col">Position</th>   
                <th scope="col">Dept</th> 
                <th scope="col">Status</th> 
                <th scope="col">Created_At</th> 
                <th scope="col">Updated_At</th>    
            </tr>
        </thead>
        <tbody>  
            @if (COUNT($users) == 0)
                <tr>
                    <td colspan="3" style="text-align:center; width:100px">List User Unavailable</td>
                </tr>
            @endif  
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>    
                    <td>{{ $user->username }}</td>    
                    <td>{{ $user->role }}</td> 
                    
                    <td> @foreach ($user->positions as $position){{ $position->level  }} <br>@endforeach</td> 
                    <td>{{ $user->department->name }}</td>    
                    <td>{{$user['is_active'] == true ? 'active' : 'inactive'}}</td>
                    <td>{{ $user->created_at }}</td> 
                    @if ($user['is_active'] == true)
                    <a
                        href="{{ route('admin_user_page', $user->user_id) }}"class="btn btn-primary btn-custom-color"><i
                            class="fas fa-edit"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 20 20">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                    </a>
                    |
                    <a
                        
                        href="{{ route('admin_user_page', $user->user_id) }}"class="btn btn-primary btn-custom-color"><i
                            class="far fa-trash-alt"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                            fill="currentColor" class="bi bi-trash3" viewBox="0 0 20 20">
                            <path
                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                        </svg>
                    </a>
                @else
                    <a
                        href="{{ route('admin_user_page', $user->user_id) }}"class="btn btn-primary btn-custom-color"><i
                            class="fas fa-trash-restore"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                            fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                            <path
                                d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                        </svg>
                    </a>
                @endif             
                </tr>
            @endforeach
            {{ $users->links() }}

        </tbody>
    </table>
</div>
@stop