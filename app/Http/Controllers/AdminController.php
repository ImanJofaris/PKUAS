<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class AdminController extends Controller
{
    //
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function dashboard()
    {
        return view('admin.home');
    }

    public function upload(Request $request)
    {
        $doctor = new doctor;

        //getting image file
        $image=$request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();

        //move the image to the public folder
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;

        $doctor->doctorName=$request->doctorName;
        $doctor->phoneNumber=$request->phoneNumber;
        $doctor->speciality=$request->speciality;
        $doctor->roomNumber=$request->roomNumber;

        $doctor->save();

        return redirect()->back();

    }
}
