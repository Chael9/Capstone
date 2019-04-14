<?php

namespace App\Http\Controllers;
use App\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web_admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admins.home');
    }


    public function studentTable()
    {
        $students = Student::all();

        return view('admins.student-table');
    }


    public function showStudentTable()
    {
        $students = Student::all();

        return response(['students'=>$students]);
    }

    public function saveStudentTable(Request $request)
    {
        $stu_id = $request->stu_id;
        $bus_id = $request->bus_id;
        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;

        DB::table('students')
        ->where('fname', $fname)
        ->update(['stu_id' => $stu_id]);

        DB::table('students')
        ->where('stu_id', $stu_id)
        ->update(['bus_id' => $bus_id,
        'fname' => $fname,
        'lname' => $lname,
        'email' => $email
        ]);

        return response(['status'=>'Message sent successfully']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/admin/login');
    }
}


