<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Student;
use App\Driver;
use App\Events\Location;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web_student');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('students.home');
    }

    public function linkProfile()
    {
        return view('students.profile');
    }

    public function linkMessage()
    {
        return view('students.message');
    }

    public function linkDriver()
    {
        return view('students.my_driver');
    }


    public function showDriverInfo()
    {
        $id = Auth::guard('web_student')->id();
        $bus_id = Student::find($id)->bus_id;
        $driver = Driver::where('bus_id', $bus_id)->get();

        return response()->json(array('driver' => $driver));
    }

    public function updateLocation(Request $request)
    {
            $lat = $request->lat;
            $lng = $request->lng;
            $id = Auth::guard('web_student')->id();

            $student = Student::find($id);
            $bus_id = Student::find($id)->bus_id;
            $driver = Driver::where('bus_id', $bus_id)->get();

            DB::table('students')
            ->where('stu_id', $id)
            ->update(['lat' => $lat, 'lng' => $lng]);


            broadcast(new Location($student, $driver));
    }

    public function showInformation()
    {
        $id = Auth::guard('web_student')->id();

        $student = Student::where('stu_id', $id)->select('fname')->get();

        return response()->json(array('students' => $student));
    }

    public function showLocation()
    {
        $id = Auth::guard('web_student')->id();
        $bus_id = Student::find($id)->bus_id;
        $driver = Driver::where('bus_id', $bus_id)->get();
        $student = Student::find($id);

        broadcast(new Location($student, $driver));

        return response(['driver' => $driver, 'student' => $student]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/student/login');
    }
}
