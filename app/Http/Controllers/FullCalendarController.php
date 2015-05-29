<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class FullCalendarController extends Controller{

    public function calendarevents(Request $request)
    {
        $json = json_encode($request->only('fechas'));
        $json = substr($json, 10, -1);
        $json1 = json_decode($json);
        $json2 = json_decode($json1);
        $n = count($json2);
        for($i = 0; $i < $n; $i++)
        {
            \DB::table('eventos')->insert(
                ['titulo_evento' => $json2[$i]->titulo,
                 'start' => $json2[$i]->start,
                 'backgroundColor' => $json2[$i]->backcolor,
                 'borderColor' => $json2[$i]->bordecolor,
                 'allDay' => $json2[$i]->allday,
                 'id_eventoCallendar' => $json2[$i]->id,
                 'user_id' => Auth::user()->id]
            );
        }
        return Redirect::back();
    }
}