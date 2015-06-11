<?php
/**
 * Created by PhpStorm.
 * User: Ted Carrasco C
 * Date: 5/20/2015
 * Time: 11:51 p.m.
 */
use \Illuminate\Database\Seeder;
class LineaTableSeeder extends Seeder{

    public function run()
    {
        \DB::table('lineainvestigacion')->insert([
            ['Categoria' => 'Seguridad Informatica'],
            ['Categoria' => 'Desarrollo de Software'],
            ['Categoria' => 'Sistemas Expertos'],
            ['Categoria' => 'Sistemas Operativos'],
            ['Categoria' => 'Modelado de Sistemas'],
            ['Categoria' => 'Robotica'],
            ['Categoria' => 'Inteligencia Artificial'],
            ['Categoria' => 'Redes de Comunicacion'],
            ['Categoria' => 'Otros']
        ]);

    }
}