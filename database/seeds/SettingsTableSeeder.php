<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //create a new row in the datanase whene we execute db:seed
        \App\Settings::create([
            'site_name' => "Laravel/'s Blog",
            'contact_number' => '12 343 658',
            'contact_email' =>'info@blog.com',
            'address' => 'Egypt , Giza'
        ]);
    }
}
