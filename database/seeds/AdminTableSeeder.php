<?php
/**
 * Created by PhpStorm.
 * User: Ted Carrasco C
 * Date: 5/20/2015
 * Time: 11:51 p.m.
 */
use \Illuminate\Database\Seeder;
class AdminTableSeeder extends Seeder{
    public function run()
    {
        \DB::table('users')->insert(array(
            'first_name'=> 'Jefe',
            'last_name' => 'Carrera',
            'email'     => 'admin@admin.com',
            'password'  => \Hash::make('EMI2015'),
            'type'      => 'admin'
        ));
    }
}