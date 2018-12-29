<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user =  App\User::create([
            'name' => "Mohamed Hassan Shanan",
            'email' => "info@gmail.com",
            'password' => bcrypt('123456789'),
            'admin' =>1
    
           ]);

        App\Profile::create([
                'user_id'=> $user->id,
                'avatar' => 'uploads/avatar/',
                'about' =>'Just engineer graduated this year 2018',
                'facebook' =>'facebook.com',
                'youtube' => 'youtube.com'


        ]);   
    }
}
