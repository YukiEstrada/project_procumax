@extends('index')

@section('sidebar')

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->   
                <li class="nav-item">
                    <a href="{{ route('Po_product_show') }}" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                    <p>
                        Product                     
                    </p>
                    </a>            
                </li>   

                <li class="nav-item">
                    <a href="{{ route('Po_vendor_show') }}" class="nav-link">
                        <i class="nav-icon fas fa-store"></i>
                    <p>
                        Vendor                        
                    </p>
                    </a>            
                </li> 
                
                <li class="nav-item">
                    <a href="{{ route('item_Cart') }}" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>
                        Cart            
                    </p>
                    </a>
                </li>       
                <li class="nav-item">
                    <a href="{{ route('Po_form_show') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-check"></i>
                    <p>
                        PO List            
                    </p>
                    </a>
                </li>
                   
                     
                <li class="nav-item">
                    <a href="{{ route('Po_dashboard') }}" class="nav-link">
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