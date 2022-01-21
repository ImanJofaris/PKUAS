<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\doctor;
use App\Models\Appointment;

use App\Http\Controllers\HomeController;

class HomeController extends Controller
{
    //To determine either student or admin. If a student is logged in, it will be redirected to student page and otherwise
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $doctor = doctor::all();
                return view('user.home',compact('doctor'));
            }

            else
            {
                return view('admin.home');
            }
        }

        else
        {
            return redirect()->back();
        }
    }

    //To redirect to mainpage of the system
    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }

        else{
            $doctor = doctor::all();
            return view('user.home',compact('doctor'));

        }
        

    }

    //To save an appointment form to the database
    public function appointment(Request $request)
    {
        $data = new appointment;

        $data->userName=$request->userName;
        $data->email=$request->email;
        $data->date=$request->date;
        $data->doctorName=$request->doctorName;
        $data->phoneNumber=$request->phoneNumber;
        $data->message=$request->message;
        $data->status='In progress';

        if(Auth::id())
        {
            $data->user_id=Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message','Appointment request is successful. We will contact with you soon');
        
    }

    //To retrieve data from database to view the appointment for the student
    public function myappointment()
    {
        if(Auth::id()){

            $userid=Auth::user()->id;
            $appoint=appointment::where('user_id',$userid)->get();
            return view('user.my_appointment', compact('appoint'));
        }
        else{
            return redirect()->back();
        }
        
    }

    //The student can delete an appointment 
    public function cancel_appoint($id)
    {

        $data=appointment::find($id);
        $data->delete();
        return redirect()->back();
    }
}
