<?php
/*
 * File name: AppSettingsTableSeeder.php
 * Last modified: 2021.03.01 at 21:12:24
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Seeder;

class AppSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('app_settings')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('app_settings')->insert(array(
            0 =>
                array(
                    'id' => 7,
                    'key' => 'date_format',
                    'value' => 'l jS F Y (H:i:s)',
                ),
            1 =>
                array(
                    'id' => 8,
                    'key' => 'language',
                    'value' => 'en',
                ),
            2 =>
                array(
                    'id' => 17,
                    'key' => 'is_human_date_format',
                    'value' => '1',
                ),
            3 =>
                array(
                    'id' => 18,
                    'key' => 'app_name',
                    'value' => 'Home Services',
                ),
            4 =>
                array(
                    'id' => 19,
                    'key' => 'app_short_description',
                    'value' => 'Manage Mobile Application',
                ),
            5 =>
                array(
                    'id' => 20,
                    'key' => 'mail_driver',
                    'value' => 'smtp',
                ),
            6 =>
                array(
                    'id' => 21,
                    'key' => 'mail_host',
                    'value' => 'smtp.hostinger.com',
                ),
            7 =>
                array(
                    'id' => 22,
                    'key' => 'mail_port',
                    'value' => '587',
                ),
            8 =>
                array(
                    'id' => 23,
                    'key' => 'mail_username',
                    'value' => 'test@demo.com',
                ),
            9 =>
                array(
                    'id' => 24,
                    'key' => 'mail_password',
                    'value' => '-',
                ),
            10 =>
                array(
                    'id' => 25,
                    'key' => 'mail_encryption',
                    'value' => 'ssl',
                ),
            11 =>
                array(
                    'id' => 26,
                    'key' => 'mail_from_address',
                    'value' => 'test@demo.com',
                ),
            12 =>
                array(
                    'id' => 27,
                    'key' => 'mail_from_name',
                    'value' => 'Smarter Vision',
                ),
            13 =>
                array(
                    'id' => 30,
                    'key' => 'timezone',
                    'value' => 'America/Montserrat',
                ),
            14 =>
                array(
                    'id' => 32,
                    'key' => 'theme_contrast',
                    'value' => 'light',
                ),
            15 =>
                array(
                    'id' => 33,
                    'key' => 'theme_color',
                    'value' => 'primary',
                ),
            16 =>
                array(
                    'id' => 34,
                    'key' => 'app_logo',
                    'value' => '020a2dd4-4277-425a-b450-426663f52633',
                ),
            17 =>
                array(
                    'id' => 35,
                    'key' => 'nav_color',
                    'value' => 'navbar-dark navbar-navy',
                ),
            18 =>
                array(
                    'id' => 38,
                    'key' => 'logo_bg_color',
                    'value' => 'text-light  navbar-navy',
                ),
            19 =>
                array(
                    'id' => 66,
                    'key' => 'default_role',
                    'value' => 'admin',
                ),
            20 =>
                array(
                    'id' => 68,
                    'key' => 'facebook_app_id',
                    'value' => '518416208939727',
                ),
            21 =>
                array(
                    'id' => 69,
                    'key' => 'facebook_app_secret',
                    'value' => '93649810f78fa9ca0d48972fee2a75cd',
                ),
            22 =>
                array(
                    'id' => 71,
                    'key' => 'twitter_app_id',
                    'value' => 'twitter',
                ),
            23 =>
                array(
                    'id' => 72,
                    'key' => 'twitter_app_secret',
                    'value' => 'twitter 1',
                ),
            24 =>
                array(
                    'id' => 74,
                    'key' => 'google_app_id',
                    'value' => '527129559488-roolg8aq110p8r1q952fqa9tm06gbloe.apps.googleusercontent.com',
                ),
            25 =>
                array(
                    'id' => 75,
                    'key' => 'google_app_secret',
                    'value' => 'FpIi8SLgc69ZWodk-xHaOrxn',
                ),
            26 =>
                array(
                    'id' => 77,
                    'key' => 'enable_google',
                    'value' => '1',
                ),
            27 =>
                array(
                    'id' => 78,
                    'key' => 'enable_facebook',
                    'value' => '1',
                ),
            28 =>
                array(
                    'id' => 93,
                    'key' => 'enable_stripe',
                    'value' => '0',
                ),
            29 =>
                array(
                    'id' => 94,
                    'key' => 'stripe_key',
                    'value' => 'pk_test_pltzOnX3zsUZMoTTTVUL4O41',
                ),
            30 =>
                array(
                    'id' => 95,
                    'key' => 'stripe_secret',
                    'value' => 'sk_test_o98VZx3RKDUytaokX4My3a20',
                ),
            31 =>
                array(
                    'id' => 101,
                    'key' => 'custom_field_models.0',
                    'value' => 'App\\Models\\User',
                ),
            32 =>
                array(
                    'id' => 104,
                    'key' => 'default_tax',
                    'value' => '10',
                ),
            33 =>
                array(
                    'id' => 107,
                    'key' => 'default_currency',
                    'value' => '$',
                ),
            34 =>
                array(
                    'id' => 108,
                    'key' => 'fixed_header',
                    'value' => '1',
                ),
            35 =>
                array(
                    'id' => 109,
                    'key' => 'fixed_footer',
                    'value' => '0',
                ),
            36 =>
                array(
                    'id' => 110,
                    'key' => 'fcm_key',
                    'value' => 'AAAAHMZiAQA:APA91bEb71b5sN5jl-w_mmt6vLfgGY5-_CQFxMQsVEfcwO3FAh4-mk1dM6siZwwR3Ls9U0pRDpm96WN1AmrMHQ906GxljILqgU2ZB6Y1TjiLyAiIUETpu7pQFyicER8KLvM9JUiXcfWK',
                ),
            37 =>
                array(
                    'id' => 111,
                    'key' => 'enable_notifications',
                    'value' => '1',
                ),
            38 =>
                array(
                    'id' => 112,
                    'key' => 'paypal_username',
                    'value' => 'sb-z3gdq482047_api1.business.example.com',
                ),
            39 =>
                array(
                    'id' => 113,
                    'key' => 'paypal_password',
                    'value' => '-',
                ),
            40 =>
                array(
                    'id' => 114,
                    'key' => 'paypal_secret',
                    'value' => '-',
                ),
            41 =>
                array(
                    'id' => 115,
                    'key' => 'enable_paypal',
                    'value' => '1',
                ),
            42 =>
                array(
                    'id' => 116,
                    'key' => 'main_color',
                    'value' => '#F4841F',
                ),
            43 =>
                array(
                    'id' => 117,
                    'key' => 'main_dark_color',
                    'value' => '#F4841F',
                ),
            44 =>
                array(
                    'id' => 118,
                    'key' => 'second_color',
                    'value' => '#08143A',
                ),
            45 =>
                array(
                    'id' => 119,
                    'key' => 'second_dark_color',
                    'value' => '#CCCCDD',
                ),
            46 =>
                array(
                    'id' => 120,
                    'key' => 'accent_color',
                    'value' => '#8C9DA8',
                ),
            47 =>
                array(
                    'id' => 121,
                    'key' => 'accent_dark_color',
                    'value' => '#9999AA',
                ),
            48 =>
                array(
                    'id' => 122,
                    'key' => 'scaffold_dark_color',
                    'value' => '#2C2C2C',
                ),
            49 =>
                array(
                    'id' => 123,
                    'key' => 'scaffold_color',
                    'value' => '#FAFAFA',
                ),
            50 =>
                array(
                    'id' => 124,
                    'key' => 'google_maps_key',
                    'value' => '-',
                ),
            51 =>
                array(
                    'id' => 125,
                    'key' => 'mobile_language',
                    'value' => 'en',
                ),
            52 =>
                array(
                    'id' => 126,
                    'key' => 'app_version',
                    'value' => '1.0.0',
                ),
            53 =>
                array(
                    'id' => 127,
                    'key' => 'enable_version',
                    'value' => '1',
                ),
            54 =>
                array(
                    'id' => 128,
                    'key' => 'default_currency_id',
                    'value' => '1',
                ),
            55 =>
                array(
                    'id' => 129,
                    'key' => 'default_currency_code',
                    'value' => 'USD',
                ),
            56 =>
                array(
                    'id' => 130,
                    'key' => 'default_currency_decimal_digits',
                    'value' => '2',
                ),
            57 =>
                array(
                    'id' => 131,
                    'key' => 'default_currency_rounding',
                    'value' => '0',
                ),
            58 =>
                array(
                    'id' => 132,
                    'key' => 'currency_right',
                    'value' => '1',
                ),
            59 =>
                array(
                    'id' => 133,
                    'key' => 'distance_unit',
                    'value' => 'km',
                ),
            60 =>
                array(
                    'id' => 134,
                    'key' => 'default_theme',
                    'value' => 'light',
                ),
        ));


    }
}
