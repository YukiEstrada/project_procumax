<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <link rel="icon" type="image/x-icon" href="{{ url('../img/logo.png') }}">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('../plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('../plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">  
  <!-- Font Awesome -->  
  <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css') }}" />
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ url('../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('../plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ url('../plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('../dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('../plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('../plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ url('../plugins/summernote/summernote-bs4.min.css') }}"> 
  <!-- Custom style -->
  <link rel="stylesheet" href="{{ url('../css/style.css') }}">    

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper"> 

  @include('navbar')

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->     
    <div class="index-image">
      <a href="{{ route('admin_user_page') }}">
        <img src="{{ url('../img/logo.png') }}" alt="Procumax Logo" class="index-home-image">      
      </a>
    </div>   
    @yield('sidebar')
  </aside>
      
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">             
        <div>
          @if (session('success'))
              <div class="alert alert-success">                
                  {{ session('success') }}
              </div>
          @endif
  
          @if ($errors->count() > 0)
              <div class="alert alert-danger">
                @foreach ($errors->all() as $message)
                  {{ $message }}
                @endforeach                  
              </div>
          @endif
        </div>      

        @yield('content')                            

      </div>
    </section>

  </div>

  @include('footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>  
</div>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ url('../plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ url('../plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ url('../plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('../plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ url('../plugins/sparklines/sparkline.js') }}"></script>
<script src="{{ url('../plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ url('../plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<script src="{{ url('../plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ url('../plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('../plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ url('../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ url('../plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ url('../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ url('../dist/js/adminlte.js') }}"></script>

{{-- Department --}}
{{-- DataTables & Plugins --}}
<script src="{{ url('../plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('../plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('../plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ url('../plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('../plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

{{-- Print Invoice --}}
<script src="{{ url('https://unpkg.com/jspdf-invoice-template@1.4.3/dist/index.js') }}"></script>
<script src="{{ url('http://www.openjs.com/scripts/events/keyboard_shortcuts/shortcut.js') }}"></script>

{{-- Script --}}
<script src="{{ url('../js/script.js') }}"></script>

{{-- JQuery --}}

<script src="{{ url('https://code.jquery.com/jquery-3.6.0.js') }}" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>

{{-- Sweet Alert --}}
@include('sweetalert::alert')

<script>
  // Level Access Dropdown Disable for Registration
function hideInput() {                        
    // const removeRequired = document.getElementById('removeRequired').value;
    // const umur = document.getElementById('Umur').value;
    var input = document.getElementById('select').value;            
    if(input == "Admin Po")
    {
        document.getElementById("hide-input").style.visibility = "hidden";    
        document.getElementById("lvl-acc").value = "disable";         
    }             
    else 
    {
        document.getElementById("hide-input").style.visibility = "visible";                         
    };            
}; 

// Level Access Dropdown Disable for Update Registration
function hideInput2() {                        
    var input = document.getElementById('select-2').value;            
    if(input == "Admin Po")
    {
        document.getElementById("hide-input-2").style.visibility = "hidden";    
        document.getElementById("lvl-acc-update1").value = "disable";         
        document.getElementById("lvl-acc-update2").value = "disable";         
    }             
    else 
    {
        document.getElementById("hide-input-2").style.visibility = "visible";                         
    };            
}; 
</script>
</body>
</html>
