<?php

namespace App\Http\Controllers;
use App\Models\Team;
use App\Models\Programs;
use App\Models\Services;


class IndexController extends Controller
{
    public function index()
    {
        $title = "Home | ".env('APP_NAME');
        $description = "";
        $services = Services::where("is_active" , 1)->where("is_deleted" , 0)->get();
        return view('web.index')->with(compact('title' , 'description','services'));
    }

    public function about()
    {
        $title = "About Us | ".env('APP_NAME');
        $description = "";
        $teams = Team::where("is_active" , 1)->where("is_deleted" , 0)->get();
        return view('web.about')->with(compact('title' , 'description','teams'));
    }

    public function programs()
    {
        $title = "Programs | ".env('APP_NAME');
        $description = "";
        $programs = Programs::where("is_active" , 1)->where("is_deleted" , 0)->get();
        return view('web.programs')->with(compact('title' , 'description','programs'));
    }

    public function sponsors()
    {
        $title = "Sponsors | ".env('APP_NAME');
        $description = "";
        return view('web.sponsor')->with(compact('title' , 'description'));
    }

    public function contact()
    {
        $title = "Contact Us | ".env('APP_NAME');
        $description = "";
        return view('web.contact-us')->with(compact('title' , 'description'));
    }

    public function donation()
    {
        $title = "Donation | ".env('APP_NAME');
        $description = "";
        return view('web.donation')->with(compact('title' , 'description'));
    }

}
