@extends('index')

@section('sidebar')

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->          
                <li class="nav-item">
                    <a href="{{route('App_form_show') }}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                    <p>
                        List Approval 
                    </p>
                    </a>
                </li>   
                <li class="nav-item">
                    <a href="{{ route('Acc_dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-chart-area"></i>
                        <p>
                        Dashboard                     
                    </p>
                    </a>            
                </li>                             
            </ul>
        </nav>
    </div>

@stop