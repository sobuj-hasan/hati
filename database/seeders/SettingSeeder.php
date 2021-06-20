<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'setting_name' => 'phone',
            'setting_value' => '01300000000',
        ]);
        DB::table('settings')->insert([
            'setting_name' => 'email',
            'setting_value' => 'abc@gmail.com',
        ]);
        DB::table('settings')->insert([
            'setting_name' => 'address',
            'setting_value' => 'Dhanmondi, Dhaka Bangladesh..',
        ]);
        DB::table('settings')->insert([
            'setting_name' => 'facebook_link',
            'setting_value' => 'https://www.facebook.com/',
        ]);
        DB::table('settings')->insert([
            'setting_name' => 'twitter_link',
            'setting_value' => 'https://twitter.com',
        ]);
        DB::table('settings')->insert([
            'setting_name' => 'insta_link',
            'setting_value' => 'https://instragram.com',
        ]);
        DB::table('settings')->insert([
            'setting_name' => 'googleplus_link',
            'setting_value' => '',
        ]);
        DB::table('settings')->insert([
            'setting_name' => 'copyright',
            'setting_value' => 'web_saiful',
        ]);
        DB::table('settings')->insert([
            'setting_name' => 'phone_two',
            'setting_value' => '01300000000',
        ]);
        DB::table('settings')->insert([
            'setting_name' => 'email_two',
            'setting_value' => 'abc@gmail.com',
        ]);
        DB::table('settings')->insert([
            'setting_name' => 'footer_short_description',
            'setting_value' => 'Lorem ipsum dolor sit Amit .... ',
        ]);
    }
}
