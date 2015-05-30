<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class FullCalendarController extends Controller{

    public $arrayEventos;
    public function calendarevents(Request $request)
    {
        $json = json_encode($request->only('fechas'));
        $json = substr($json, 10, -1);
        $json1 = json_decode($json);
        $json2 = json_decode($json1);
        $this->arrayEventos = $json2;
        $n = count($json2);
        \DB::table('eventos')->where('user_id', '=', Auth::user()->id)->delete();
        for($i = 0; $i < $n; $i++)
        {
            /*\DB::table('eventos')->insert(
                ['titulo_evento' => $json2[$i]->titulo,
                 'start' => $json2[$i]->start,
                 'backgroundColor' => $json2[$i]->backcolor,
                 'borderColor' => $json2[$i]->bordecolor,
                 'allDay' => $json2[$i]->allday,
                 'id_eventoCallendar' => $json2[$i]->id,
                 'user_id' => Auth::user()->id]
            );*/
            \DB::insert('insert into eventos (titulo_evento, start, backgroundColor, borderColor, allDay, id_eventoCallendar, user_id)
                          values (?, ?, ?, ?, ?, ?, ?)', [$json2[$i]->titulo, $json2[$i]->start, $json2[$i]->backcolor, $json2[$i]->bordecolor,
                            $json2[$i]->allday, $json2[$i]->id, Auth::user()->id]);
        }
        return Redirect::action('FullCalendarController@getCalendar');

    }
    public function getCalendar()
    {
        $array = \DB::table('eventos')->where('user_id', '=', Auth::user()->id)->get();
        return view('pages/calendar', compact('array'));
    }
}