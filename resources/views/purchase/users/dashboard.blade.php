@extends('sidebar.sidebarReg')

@section('title', 'Dashboard')

@section('content')
    </h1>
    <!-- Page Wrapper -->
    <div id="wrapper" class="margin-top:10px pt-2">
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Begin Page Content -->
            <div class="container-fluid">                                 
              <!-- Content Row -->
              <div class="row">

                    <div class="col-xl-8 col-lg-7">

                        <!-- Area Chart -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">User Chart</h6>

                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    {!! $chart->container() !!}
                                    
                                </div>
                                <hr>
                            </div>
                        </div>

                        <!-- Bar Chart -->

                    </div>

                    <!-- Donut Chart -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">User's Dept Chart</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie">
                                    {!! $piechart->container() !!}
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
              </div>

              <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                      <div class="small-box bg-warning">
                        <div class="inner">
                          <h3>{{ $active }}</h3>
          
                          <p>Active Users</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-eye"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-6">                          
                      <div class="small-box bg-primary">
                        <div class="inner">
                          <h3>{{ $inactive }}</h3>
          
                          <p>Inactive Users</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-eye-slash"></i>
                        </div>
                      </div>
                    </div>                                       
                </div>               
            </div>              

          </div>
          <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->
        <div class="m-3">
            <a href="#top">Back to top of page</a> 
        </div>
      </div>
      <!-- End of Page Wrapper -->
      
  </div>
    <!-- Bootstrap core JavaScript-->    
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <script src="../js/demo/chart-bar-demo.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $chart->script() !!}
    {!! $piechart->script() !!}
@stop