{{-- <x-app-layout>

    <h1>This is admin dashboard</h1>
    
</x-app-layout> --}}

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PKUAS || Appointments</title>

    

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>

    .table table-striped{
        padding-right: 90px;
    }
</style>

<body id="page-top">

    @include('admin.sidebar')


    
        <!-- End of Sidebar -->

        {{-- <div>
            <br>
            <h1 style="color: black; font-size: 30px; padding-left: 20px;">Appointment</h1>
            <br><br>
        </div> --}}
        
        
        <div class="container-fluid page-body-wrapper">
            <br>
            <table class="table table-striped">
                <h1 style="font-size: 30px; color:black;">List of Appointment</h1>
                <br><br>
        
                <tr>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Doctor Name</th>
                    <th>Date</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Approve</th>
                    <th>Cancel</th>
                    <th>E-Mail Notification</th>
                </tr>
               
                @foreach ($data as $appoint)
                        
                    
              
                <tr>
                    <td>{{ $appoint->userName }}</td>
                    <td>{{ $appoint->email }}</td>
                    <td>{{ $appoint->phoneNumber }}</td>
                    <td>{{ $appoint->doctorName }}</td>
                    <td>{{ $appoint->date }}</td>
                    <td>{{ $appoint->message }}</td>
                    <td style="font-weight: bold">{{ $appoint->status }}</td>
                    <td><a class="btn btn-success" href="{{ url('approved',$appoint->id) }}">Approve</a></td>
                    <td><a class="btn btn-danger" style="color: white;" href="{{ url('deleted',$appoint->id) }}" onclick="return confirm('Are you sure you want to cancel this appointment')">Cancel</a></td>
                    <td><a class="btn btn-primary" href="{{ url('emailview',$appoint->id) }}">Send email</a></td>
                </tr>
                @endforeach
              </table>
        </div>

    
        
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="admin/js/demo/chart-area-demo.js"></script>
    <script src="admin/js/demo/chart-pie-demo.js"></script>

</body>

</html>