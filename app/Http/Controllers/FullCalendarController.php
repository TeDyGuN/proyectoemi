<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FullCalendarController extends Controller{

    public function calendarevents(Request $request)
    {
        $json = json_encode($request->only('fechas'));
        if($request->Json())
        {
           echo($json);
        }

        //$credentials = $request->only('fechas');
        //var_dump($credentials);
    }
}