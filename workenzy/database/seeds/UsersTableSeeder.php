<?php
/*
 * File name: UsersTableSeeder.php
 * Last modified: 2021.03.02 at 14:35:42
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->delete();

        DB::table('users')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => 'Hyatt Zimmerman',
                    'email' => 'admin@demo.com',
                    'phone_number' => '+1 234 8996 321',
                    'phone_verified_at' => '2021-01-10 17:22:10',
                    'email_verified_at' => '2021-01-10 17:22:10',
                    'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                    'api_token' => 'PivvPlsQWxPl1bB5KrbKNBuraJit0PrUZekQUgtLyTRuyBq921atFtoR1HuA',
                    'device_token' => '',
                    'stripe_id' => NULL,
                    'card_brand' => NULL,
                    'card_last_four' => NULL,
                    'trial_ends_at' => NULL,
                    'paypal_email' => NULL,
                    'remember_token' => 'fU74kiNeDsPSli77nLRFboCEmUOuK57tpt9SGSczqnmlebqgOODfO8HXjYrb',
                    'created_at' => NULL,
                    'updated_at' => '2021-02-09 16:50:32',
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => 'Jennifer Paul',
                    'email' => 'provider@demo.com',
                    'phone_number' => '+1 234 8996 322',
                    'phone_verified_at' => '2021-01-10 17:22:10',
                    'email_verified_at' => '2021-01-10 17:22:10',
                    'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                    'api_token' => 'tVSfIKRSX2Yn8iAMoUS3HPls84ycS8NAxO2dj2HvePbbr4WHorp4gIFRmFwB',
                    'device_token' => '',
                    'stripe_id' => NULL,
                    'card_brand' => NULL,
                    'card_last_four' => NULL,
                    'trial_ends_at' => NULL,
                    'paypal_email' => NULL,
                    'remember_token' => 'TwyKlf5NJ0oG6l5FfFhbCKsdRWrjF6HCunV8nZn2U9OXhJJTZ2Jxx4EqAJPA',
                    'created_at' => NULL,
                    'updated_at' => '2021-02-28 17:06:55',
                ),
            2 =>
                array(
                    'id' => 3,
                    'name' => 'Germaine Guzman',
                    'email' => 'customer@demo.com',
                    'phone_number' => '+1 234 8996 323',
                    'phone_verified_at' => '2021-01-10 17:22:10',
                    'email_verified_at' => '2021-01-10 17:22:10',
                    'password' => '$2y$10$EBubVy3wDbqNbHvMQwkj3OTYVitL8QnHvh/zV0ICVOaSbALy5dD0K',
                    'api_token' => 'fXLu7VeYgXDu82SkMxlLPG1mCAXc4EBIx6O5isgYVIKFQiHah0xiOHmzNsBv',
                    'device_token' => '',
                    'stripe_id' => NULL,
                    'card_brand' => NULL,
                    'card_last_four' => NULL,
                    'trial_ends_at' => NULL,
                    'paypal_email' => NULL,
                    'remember_token' => 'SPz6luq3aoxCbgIS1gqmFDgM1qzGlIDtF0HgmDbtWcx2reaeFcogcFQzdP2F',
                    'created_at' => NULL,
                    'updated_at' => '2021-02-24 21:52:57',
                ),
            3 =>
                array(
                    'id' => 4,
                    'name' => 'Aimee Mcgee',
                    'email' => 'provider1@demo.com',
                    'phone_number' => '+1 234 8996 324',
                    'phone_verified_at' => '2021-01-10 17:22:10',
                    'email_verified_at' => '2021-01-10 17:22:10',
                    'password' => '$2y$10$pmdnepS1FhZUMqOaFIFnNO0spltJpziz3j13UqyEwShmLhokmuoei',
                    'api_token' => 'Czrsk9rwD0c75NUPkzNXM2WvbxYHKj8p0nG29pjKT0PZaTgMVzuVyv4hOlte',
                    'device_token' => '',
                    'stripe_id' => NULL,
                    'card_brand' => NULL,
                    'card_last_four' => NULL,
                    'trial_ends_at' => NULL,
                    'paypal_email' => NULL,
                    'remember_token' => 'yCzPqDP1oczySU57q6G71SxTIJSiZUBE4vYdXbXCqzpzC2iN09igcs3jzSQK',
                    'created_at' => NULL,
                    'updated_at' => '2021-02-21 14:50:29',
                ),
            4 =>
                array(
                    'id' => 5,
                    'name' => 'Josephine Harding',
                    'email' => 'customer3@demo.com',
                    'phone_number' => NULL,
                    'phone_verified_at' => NULL,
                    'email_verified_at' => NULL,
                    'password' => '$2y$10$n/06hZG121ZGp3tSwDQS3uhsQKxEYspjKrn7kGlLxRinUZKiulrEm',
                    'api_token' => 'gkEWScQHIol9EIRhP3m5m7JqnK5UvcGdEsKQJo7YeBcQawYFq3JAJ6SX9UKy',
                    'device_token' => NULL,
                    'stripe_id' => NULL,
                    'card_brand' => NULL,
                    'card_last_four' => NULL,
                    'trial_ends_at' => NULL,
                    'paypal_email' => NULL,
                    'remember_token' => NULL,
                    'created_at' => '2021-01-11 10:55:52',
                    'updated_at' => '2021-02-02 11:29:47',
                ),
            5 =>
                array(
                    'id' => 6,
                    'name' => 'Nicolette Christiansen',
                    'email' => 'provider2@demo.com',
                    'phone_number' => NULL,
                    'phone_verified_at' => NULL,
                    'email_verified_at' => '2021-01-11 00:00:00',
                    'password' => '$2y$04$WRpHC9iMxZ3f.gctQ4igsuZjsYfGjX7igVM8GsC2AMME3.4au3dYu',
                    'api_token' => 'TKArYDDFHNiEI33sfExaBEhxHCs5kFaWP7EO6aNlUZfnqHrvsMCwsYeAk9s2',
                    'device_token' => NULL,
                    'stripe_id' => NULL,
                    'card_brand' => NULL,
                    'card_last_four' => NULL,
                    'trial_ends_at' => NULL,
                    'paypal_email' => NULL,
                    'remember_token' => 'JbiYaHlRWGKkfITxH9qI87GzTMPf0zJ2Iw6NIdlS5dDvWuT5PC2sP5ELGwKx',
                    'created_at' => '2021-01-11 11:33:59',
                    'updated_at' => '2021-02-02 11:30:56',
                ),
            6 =>
                array(
                    'id' => 7,
                    'name' => 'Rose Bauer',
                    'email' => 'customer2@demo.com',
                    'phone_number' => NULL,
                    'phone_verified_at' => NULL,
                    'email_verified_at' => NULL,
                    'password' => '$2y$10$3GhoIShzRdSXevYAh1NF/.67J3OshX9D2.sqY50o8kxh7EXPw7tuC',
                    'api_token' => 'w6QJYqZyllY24AIR3nSsKqgj5eMSZevmgpSywwxJxUS9nwULcuriRLBxEXZC',
                    'device_token' => '',
                    'stripe_id' => NULL,
                    'card_brand' => NULL,
                    'card_last_four' => NULL,
                    'trial_ends_at' => NULL,
                    'paypal_email' => NULL,
                    'remember_token' => 'WxYP9zjTBy9SYF5OWjcFbMt2Ob9r0bahBKzPDOtw9OrAJ89JqaMxkN5aqu8J',
                    'created_at' => '2021-01-17 16:13:24',
                    'updated_at' => '2021-02-28 18:03:25',
                ),
            7 =>
                array(
                    'id' => 8,
                    'name' => 'smarter8',
                    'email' => 'smartersvision@gmail.com',
                    'phone_number' => '+12645595482',
                    'phone_verified_at' => NULL,
                    'email_verified_at' => NULL,
                    'password' => '$2y$10$MqPMTfg6RUNxxEH6aLdqnOYZUBsT7xtxkglD74pDgThV52.HJrLba',
                    'api_token' => 'WivbG2oAEbEGl51EBeBuHaZeCqyfBnCVGo18nSaj2FwwiDjux2ZOAZWUoddK',
                    'device_token' => '',
                    'stripe_id' => NULL,
                    'card_brand' => NULL,
                    'card_last_four' => NULL,
                    'trial_ends_at' => NULL,
                    'paypal_email' => NULL,
                    'remember_token' => 'SdstZCaeYW0pjqZn832HMzBD7WPGJ5m9hwWG28nhbIrzSS0etj33rbTRJ6kD',
                    'created_at' => '2021-02-10 11:31:12',
                    'updated_at' => '2021-02-23 20:41:50',
                ),
        ));


    }
}
