<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use Notification;
use App\Notifications\SendEmailNotification;

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

        return redirect()->back()->with('message','Doctor Added Successfully');

    }

    public function showappointment()
    {
        $data=appointment::all();
        return view('admin.showappointment', compact('data'));
    }

    public function approved($id)
    {
        $data=appointment::find($id);
        $data->status='Approved';
        $data->save();
        return redirect()->back();    
    }

    public function deleted($id)
    {
        $data=appointment::find($id);
        $data->status='Canceled';
        $data->save();
        return redirect()->back();
    }

    public function showdoctor()
    {
        $data=doctor::all();
        return view('admin.showdoctor', compact('data'));
    }

    public function deletedoctor($id)
    {
        $data=doctor::find($id);
        $data=delete();
        return redirect()->back;
    }

    public function updatedoctor($id)
    {
        $data=doctor::find($id);
        return view('admin.update_doctor', compact('data'));
    }

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

    public function emailview($id)
    {
        $data=appointment::find($id);
        return view('admin.email_view',compact('data'));
    }

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
}
