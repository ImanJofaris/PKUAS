{{-- <x-app-layout>

    <h1>This is admin dashboard</h1>
    
</x-app-layout> --}}

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

    <title>PKUAS || Email Notification</title>

    

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
    
    
    
        <div class="container-fluid page-body-wrapper">
            
            
           
            <div class="container">
                <br>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{ session()->get('message') }}
                </div>

            @endif
                

                <h1 style="font-size: 30px">Email Notification</h1>
                

               

                <form action="{{ url('sendemail',$data->id) }}" method="POST">
                    {{ csrf_field() }}
                    <br>
                    <div class="mb-3">
                        {{-- <label for="exampleFormControlInput1" class="form-label">Greeting</label> --}}
                        <input type="hidden" name="greeting" class="form-control" id="exampleFormControlInput1" value="Hi, this email is from Pusat Kesihatan UMP"required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Body</label>
                        <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3" required>Your appointment has been approved. Please come at 10.00am. If you have any questions, feel free to call at +09 - 424 5777</textarea>
                      </div>
                      <div class="mb-3">
                        {{-- <label for="exampleFormControlInput1" class="form-label">Action Text</label> --}}
                        <input type="hidden" name="actiontext" class="form-control" id="exampleFormControlInput1" value="Please check your appointment status"required>
                      </div>
                      <div class="mb-3">
                        {{-- <label for="exampleFormControlInput1" class="form-label">Action url</label> --}}
                        <input type="hidden" name="actionurl" class="form-control" id="exampleFormControlInput1" value="http://127.0.0.1:8000"required>
                      </div>
                      <div class="mb-3">
                        {{-- <label for="exampleFormControlInput1" class="form-label">End Part</label> --}}
                        <input type="hidden" name="endpart" class="form-control" id="exampleFormControlInput1" value="Thank you for using PKU Appointment System"required>
                      </div>
                      
                      
                    
                      
                      

                      <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success">Submit</button>
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