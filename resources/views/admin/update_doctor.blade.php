

<!DOCTYPE html>
<html lang="en">
<style>

    
</style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="/public">

    <title>PKUAS || Update </title>

    

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    @include('admin.sidebar')
    
        <!-- End of Sidebar -->

        
        <div class="container-fluid page-body-wrapper">
            
            
           
            <div class="container">
                <br>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{ session()->get('message') }}
                </div>

            @endif
                

                <h1 style="font-size: 30px">Update Information</h1>
                

               

                <form action="{{ url('editdoctor',$data->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <br>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Doctor's Name</label>
                        <input type="text" name="doctorName" class="form-control" id="exampleFormControlInput1" value="{{ $data->doctorName }}" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                        <input type="text" name="phoneNumber" class="form-control" id="exampleFormControlInput1"  value="{{ $data->phoneNumber }}"required>
                      </div>
                      <br>
                      <label for="exampleFormControlInput1" class="form-label">Speciality</label>
                      <br>
                      <select name="speciality" class="form-select" aria-label="Default select example">
                        <option selected value="{{ $data->speciality }}">{{ $data->speciality }}</option>
                        <option value="Family Physician">Family Physician</option>
                        <option value="Dentist">Dentist</option>
                        <option value="Primary Care">Primary Care</option>
                      </select>
                      <br><br>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Room Number</label>
                        <input type="text" name="roomNumber" class="form-control" id="exampleFormControlInput1" value="{{ $data->roomNumber }}" placeholder="" required>
                      </div>
                      <br>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Current Image</label>
                        <br>
                        <img src="doctorimage/{{ $data->image }}" alt="" height="150" width="150">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Change Image</label>
                        <br>
                        <input type="file" name="file">
                    </div>
                      

                      <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success">Update</button>
                    </div>
                </form>

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