<?php

namespace App\Http\Controllers;
use App\Guardian;
use App\Student;
use App\Driver;
use Illuminate\Support\Facades\Auth;
use App\Events\Location;

class GuardianController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web_guardian');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guardians.home');
    }

    public function linkProfile()
    {
        return view('guardians.profile');
    }

    public function showProfileInfo()
    {
        $id = Auth::guard('web_guardian')->id();
        $student_id = Guardian::find($id)->student_id;
        $student = Student::find($student_id);

        return response(['student'=> $student]);
    }


    public function showLocation()
    {
        $id = Auth::guard('web_guardian')->id();
        $student_id = Guardian::find($id)->student_id;
        $bus_id = Student::find($student_id)->bus_id;
        $student = Student::find($student_id);
        $driver = Driver::where('bus_id', $bus_id)->get();

        broadcast(new Location($student, $driver));

        return response()->json(array('student' => $student, 'driver' => $driver));
     }



    public function logout()
    {
        auth()->logout();
        return redirect('/guardian/login');
    }
}
