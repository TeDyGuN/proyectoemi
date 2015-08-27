<?php
/**
 * Created by PhpStorm.
 * User: Ted Carrasco C
 * Date: 5/20/2015
 * Time: 11:51 p.m.
 */
use \Illuminate\Database\Seeder;
use \Faker\Factory as Faker;
class UserTableSeeder extends Seeder{

    public function run()
    {
        $faker = Faker::create();
        for($i = 0; $i < 20; $i++){
            \DB::table('users')->insert(array(
                'first_name'=> $faker->firstName,
                'last_name' => $faker->lastName,
                'email'     => $faker->unique()->email,
                'password'  => \Hash::make('secret'),
                'type'      => 'Estudiante'
            ));
        }

            \DB::table('users')->insert(array(
                'first_name'=> 'Alejandro',
                'last_name' => 'Zambrana',
                'email'     => 'alejo2@hotmail.com',
                'password'  => \Hash::make('secreto'),
                'type'      => 'docente'
            ));
        \DB::table('users')->insert(array(
            'first_name'=> 'Cynthia',
            'last_name' => 'Rodriguez',
            'email'     => 'cinti2@hotmail.com',
            'password'  => \Hash::make('secreto'),
            'type'      => 'docente'
        ));
        \DB::table('users')->insert(array(
            'first_name'=> 'Luis',
            'last_name' => 'Ruiz',
            'email'     => 'luisruiz2@hotmail.com',
            'password'  => \Hash::make('secreto'),
            'type'      => 'docente'
        ));
        \DB::table('users')->insert(array(
            'first_name'=> 'Osamu',
            'last_name' => 'Yokosaki',
            'email'     => 'osumayoko2@hotmail.com',
            'password'  => \Hash::make('secreto'),
            'type'      => 'docente'
        ));


    }
}