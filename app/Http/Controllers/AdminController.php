<?php namespace App\Http\Controllers;

class AdminController extends Controller{
    public function getCalendar()
    {
        return view('pages/calendar');
    }
}