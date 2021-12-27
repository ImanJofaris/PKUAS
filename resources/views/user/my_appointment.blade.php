<!DOCTYPE html>
<html lang="en">
    <style>
        h1
        {
            font-size: 200px!;
        }
    </style>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>PKU UMP</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

 

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="logo" width="200" ></a>
        {{-- <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a> --}}

        

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="doctors.html">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.html">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>

            @if(Route::has('login'))
            
            {{-- check auth --}}
            @auth
            <li class="nav-item">
              <a class="nav-link btn btn-primary" style="color: white;" href="{{ url('myappointment') }}">My Appointment</a>
            </li>
            <x-app-layout>
            </x-app-layout>
            

            @else
                
            
            <li class="nav-item">
              <a class="btn btn-outline-primary ml-lg-3" href="{{ route('login') }}">Login </a>
            </li>

            <li class="nav-item">
                <a class="btn btn-outline-primary ml-lg-3" href="{{ route('register') }}">Register </a>
              </li>

              @endauth
              @endif
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

  <br><br>
  <div>
    <table class="table table-striped" align="center">
        
        <tr>
            <th>Doctor Name</th>
            <th>Date</th>
            <th>Message</th>
            <th>Status</th>
            <th>Cancel Appointment</th>
        </tr>
        @foreach ($appoint as $appoints)
            
      
        <tr>
            <td>{{ $appoints->doctorName }}</td>
            <td>{{ $appoints->date }}</td>
            <td>{{ $appoints->message }}</td>
            <td>{{ $appoints->status }}</td>
            <td><a class="btn btn-danger" style="color: white;" href="{{ url('cancel_appoint',$appoints->id) }}" onclick="return confirm('Are you sure you want to delete this appointment')">Delete</a></td>
        </tr>
        @endforeach
      </table>
  </div>

  

  

    

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>

