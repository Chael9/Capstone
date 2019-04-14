<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class DriverController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web_driver');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('drivers.home');
    }

    public function linkProfile()
    {
        return view('drivers.profile');
    }

    public function linkMessage()
    {
        return view('drivers.message');
    }

    public function updateLocation(Request $request)
    {
            $lat = $request->lat;
            $lng = $request->lng;
            $id = Auth::guard('web_driver')->id();

            DB::table('drivers')
            ->where('id', $id)
            ->update(['lat' => $lat, 'lng' => $lng]);

    }

    public function logout()
    {
        auth()->logout();
        return redirect('/driver/login');
    }
}
