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
        for($i = 0; $i < 10; $i++){
            \DB::table('users')->insert(array(
                'first_name'=> $faker->firstName,
                'last_name' => $faker->lastName,
                'email'     => $faker->unique()->email,
                'password'  => \Hash::make('secret'),
                'type'      => 'Docente'
            ));
        }

    }
}