<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        {{-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a> --}}
        <br>
        <img src="{{ asset('img/logo.png') }}" alt="logo" width="200" >

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href={{ url('home') }}>
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Add Doctor -->
        <li class="nav-item">
            <a class="nav-link" href={{ url('add_doctor_view') }}>
                <i class="fas fa-briefcase-medical"></i>
                <span>Add Doctor</span></a>
        </li>

        <!-- Nav Item - Appointment -->
        <li class="nav-item">
            <a class="nav-link" href={{ url('showappointment') }}>
                <i class="fas fa-calendar-check"></i>
                <span>Appointment</span></a>
        </li>

        <!-- Nav Item - Appointment -->
        <li class="nav-item">
            <a class="nav-link" href={{ url('showdoctor') }}>
                <i class="fas fa-hospital-user"></i>
                <span>All Doctor</span></a>
        </li>

         <!-- Nav Item - Count -->
         <li class="nav-item">
            <a class="nav-link" href={{ url('homeadmin') }}>
                <i class="fas fa-chart-line"></i>
                <span>Analysis</span></a>
        </li>

        

      
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Profile
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    
                    <left>
                    <x-app-layout>
                    </x-app-layout>
                </left>
                </div>
            </div>
        </li>

       

        

        

    </ul>