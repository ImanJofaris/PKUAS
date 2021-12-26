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

    <title>PKUAS || List of Doctors</title>

    

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
            <h1 style="font-size: 30px; color:black;">List of Doctors in PKU Univerisity Malaysia Pahang</h1>
            <br><br>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Spciality</th>
                    <th>Room Number</th>
                    <th>Image</th>
                    <td align="right" style="font-weight: bold">Operation</td>
                    <th></th>
                </tr>
               
               
                   @foreach ($data as $doctors)
                       
                 
              
                <tr>
                    <td>{{ $doctors->id  }}</td>
                    <td>{{ $doctors->doctorName }}</td>
                    <td>{{ $doctors->phoneNumber }}</td>
                    <td>{{ $doctors->speciality }}</td>
                    <td>{{ $doctors->roomNumber }}</td>
                    <td><img src="doctorimage/{{ $doctors->image }} " alt="" height="110" width="110"></td>
                    <td align="right"><a class="btn btn-success" style="color: white;" href="{{ url('updatedoctor',$doctors->id) }}" >Update</a></td>
                    <td><a class="btn btn-danger" style="color: white;" href="{{ url('deletedoctor',$doctors->id) }}" onclick="return confirm('Are you sure you want to delete the doctor?')">Delete</a></td>
                </tr>
                @endforeach 
              </table>
        </div>

    
        
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

   

    

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