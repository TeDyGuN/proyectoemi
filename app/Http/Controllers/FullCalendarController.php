<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FullCalendarController extends Controller{

    public function calendarevents(Request $request)
    {
        $credentials = $request->only('fechas');
        var_dump($credentials);
    }
}