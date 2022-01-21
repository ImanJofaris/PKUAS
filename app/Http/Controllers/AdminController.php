<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use Notification;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Auth;
use DB;

class AdminController extends Controller
{
    //Only admin able to navigates to add doctor page
    public function addview()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                return view('admin.add_doctor');
            }

            else
            {
                return redirect()->back();
            }
        }

        else{
            return redirect('login');
        }
        
    }

    public function dashboard()
    {
        return view('admin.home');
    }

    //Admin uploads all information about the information of doctor to the database
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

        return redirect()->back()->with('message','Doctor Added Successfully');

    }

    //To retrieve data from database to view the appointment for the admin
    public function showappointment()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                $data=appointment::all();
                return view('admin.showappointment', compact('data'));
            }

            else
            {
                return redirect()->back();
            }
        }

        else{
            return redirect('login');
        }
        
        
    }

    //Admin can approve the appointment request by the student
    public function approved($id)
    {
        $data=appointment::find($id);
        $data->status='Approved';
        $data->save();
        return redirect()->back();    
    }

    //Admin can delete the appointment request by the student
    public function deleted($id)
    {
        $data=appointment::find($id);
        $data->status='Canceled';
        $data->save();
        return redirect()->back();
    }

    //Retrieve data from doctor table for admin
    public function showdoctor()
    {
        $data=doctor::all();
        return view('admin.showdoctor', compact('data'));
    }

    //Admin deletes doctor’s information
    public function deletedoctor($id)
    {
        $data=doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    //Admin able to find id of the doctor information page
    public function updatedoctor($id)
    {
        $data=doctor::find($id);
        return view('admin.update_doctor', compact('data'));
    }

    //Admin edits the doctor’s information
    public function editdoctor(Request $request, $id)
    {
        $doctor=doctor::find($id);

        $doctor->doctorName=$request->doctorName;
        $doctor->phoneNumber=$request->phoneNumber;
        $doctor->speciality=$request->speciality;
        $doctor->roomNumber=$request->roomNumber;

        //getting image file
        $image=$request->file;

        if($image)
        {
            $imagename=time().'.'.$image->getClientoriginalExtension();

            //move the image to the public folder
            $request->file->move('doctorimage',$imagename);
            $doctor->image=$imagename;
    
        }
        
       
        $doctor->save();

        return redirect()->back()->with('message','Doctor Informations Updated Successfully');;
    }

    //To view form of the email 
    public function emailview($id)
    {
        $data=appointment::find($id);
        return view('admin.email_view',compact('data'));
    }

    //Admin send an email to the student
    public function sendemail(Request $request, $id)
    {
        $data = appointment::find($id);
        $details =[
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart
        ];

        Notification::send($data,new SendEmailNotification($details));
        
        return redirect()->back()->with('message','Email is sent');
    }

    //Retrieve data from database to count the number of total users, total doctor, total appointment and total pending
    public function count()
    {
        
        $totaluser = DB::table('users')->count();
        $totaldoctor = DB::table('doctors')->count();
        $totalappointment = DB::table('appointments')->count();
        $totalpending = DB::table('appointments')->where('status', '=', 'In Progress')->count();

        return view('admin.count', compact('totaluser','totaldoctor','totalappointment','totalpending'));
    }
}
