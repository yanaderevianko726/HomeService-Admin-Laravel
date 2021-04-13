<?php
/*
 * File name: PermissionsTableSeeder.php
 * Last modified: 2021.03.02 at 14:35:42
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('role_has_permissions')->delete();
        DB::table('permissions')->delete();

        DB::table('permissions')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => 'dashboard',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:34',
                    'updated_at' => '2021-01-07 13:17:34',
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => 'medias.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:35',
                    'updated_at' => '2021-01-07 13:17:35',
                ),
            2 =>
                array(
                    'id' => 3,
                    'name' => 'users.profile',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:35',
                    'updated_at' => '2021-01-07 13:17:35',
                ),
            3 =>
                array(
                    'id' => 4,
                    'name' => 'users.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:35',
                    'updated_at' => '2021-01-07 13:17:35',
                ),
            4 =>
                array(
                    'id' => 5,
                    'name' => 'users.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:35',
                    'updated_at' => '2021-01-07 13:17:35',
                ),
            5 =>
                array(
                    'id' => 6,
                    'name' => 'users.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:35',
                    'updated_at' => '2021-01-07 13:17:35',
                ),
            6 =>
                array(
                    'id' => 7,
                    'name' => 'users.show',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:35',
                    'updated_at' => '2021-01-07 13:17:35',
                ),
            7 =>
                array(
                    'id' => 8,
                    'name' => 'users.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:36',
                    'updated_at' => '2021-01-07 13:17:36',
                ),
            8 =>
                array(
                    'id' => 9,
                    'name' => 'users.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:36',
                    'updated_at' => '2021-01-07 13:17:36',
                ),
            9 =>
                array(
                    'id' => 10,
                    'name' => 'users.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:36',
                    'updated_at' => '2021-01-07 13:17:36',
                ),
            10 =>
                array(
                    'id' => 11,
                    'name' => 'medias.delete',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:36',
                    'updated_at' => '2021-01-07 13:17:36',
                ),
            11 =>
                array(
                    'id' => 12,
                    'name' => 'medias',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:36',
                    'updated_at' => '2021-01-07 13:17:36',
                ),
            12 =>
                array(
                    'id' => 13,
                    'name' => 'permissions.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:36',
                    'updated_at' => '2021-01-07 13:17:36',
                ),
            13 =>
                array(
                    'id' => 14,
                    'name' => 'permissions.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:36',
                    'updated_at' => '2021-01-07 13:17:36',
                ),
            14 =>
                array(
                    'id' => 15,
                    'name' => 'permissions.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:36',
                    'updated_at' => '2021-01-07 13:17:36',
                ),
            15 =>
                array(
                    'id' => 16,
                    'name' => 'permissions.show',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:37',
                    'updated_at' => '2021-01-07 13:17:37',
                ),
            16 =>
                array(
                    'id' => 17,
                    'name' => 'permissions.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:37',
                    'updated_at' => '2021-01-07 13:17:37',
                ),
            17 =>
                array(
                    'id' => 18,
                    'name' => 'permissions.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:37',
                    'updated_at' => '2021-01-07 13:17:37',
                ),
            18 =>
                array(
                    'id' => 19,
                    'name' => 'permissions.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:37',
                    'updated_at' => '2021-01-07 13:17:37',
                ),
            19 =>
                array(
                    'id' => 20,
                    'name' => 'roles.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:37',
                    'updated_at' => '2021-01-07 13:17:37',
                ),
            20 =>
                array(
                    'id' => 21,
                    'name' => 'roles.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:37',
                    'updated_at' => '2021-01-07 13:17:37',
                ),
            21 =>
                array(
                    'id' => 22,
                    'name' => 'roles.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:37',
                    'updated_at' => '2021-01-07 13:17:37',
                ),
            22 =>
                array(
                    'id' => 23,
                    'name' => 'roles.show',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:38',
                    'updated_at' => '2021-01-07 13:17:38',
                ),
            23 =>
                array(
                    'id' => 24,
                    'name' => 'roles.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:38',
                    'updated_at' => '2021-01-07 13:17:38',
                ),
            24 =>
                array(
                    'id' => 25,
                    'name' => 'roles.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:38',
                    'updated_at' => '2021-01-07 13:17:38',
                ),
            25 =>
                array(
                    'id' => 26,
                    'name' => 'roles.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:38',
                    'updated_at' => '2021-01-07 13:17:38',
                ),
            26 =>
                array(
                    'id' => 27,
                    'name' => 'customFields.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:38',
                    'updated_at' => '2021-01-07 13:17:38',
                ),
            27 =>
                array(
                    'id' => 28,
                    'name' => 'customFields.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:38',
                    'updated_at' => '2021-01-07 13:17:38',
                ),
            28 =>
                array(
                    'id' => 29,
                    'name' => 'customFields.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:38',
                    'updated_at' => '2021-01-07 13:17:38',
                ),
            29 =>
                array(
                    'id' => 30,
                    'name' => 'customFields.show',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:38',
                    'updated_at' => '2021-01-07 13:17:38',
                ),
            30 =>
                array(
                    'id' => 31,
                    'name' => 'customFields.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:39',
                    'updated_at' => '2021-01-07 13:17:39',
                ),
            31 =>
                array(
                    'id' => 32,
                    'name' => 'customFields.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:39',
                    'updated_at' => '2021-01-07 13:17:39',
                ),
            32 =>
                array(
                    'id' => 33,
                    'name' => 'customFields.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:39',
                    'updated_at' => '2021-01-07 13:17:39',
                ),
            33 =>
                array(
                    'id' => 34,
                    'name' => 'currencies.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:39',
                    'updated_at' => '2021-01-07 13:17:39',
                ),
            34 =>
                array(
                    'id' => 35,
                    'name' => 'currencies.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:39',
                    'updated_at' => '2021-01-07 13:17:39',
                ),
            35 =>
                array(
                    'id' => 36,
                    'name' => 'currencies.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:39',
                    'updated_at' => '2021-01-07 13:17:39',
                ),
            36 =>
                array(
                    'id' => 37,
                    'name' => 'currencies.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:39',
                    'updated_at' => '2021-01-07 13:17:39',
                ),
            37 =>
                array(
                    'id' => 38,
                    'name' => 'currencies.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:40',
                    'updated_at' => '2021-01-07 13:17:40',
                ),
            38 =>
                array(
                    'id' => 39,
                    'name' => 'currencies.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:40',
                    'updated_at' => '2021-01-07 13:17:40',
                ),
            39 =>
                array(
                    'id' => 40,
                    'name' => 'users.login-as-user',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:40',
                    'updated_at' => '2021-01-07 13:17:40',
                ),
            40 =>
                array(
                    'id' => 41,
                    'name' => 'app-settings',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:40',
                    'updated_at' => '2021-01-07 13:17:40',
                ),
            41 =>
                array(
                    'id' => 42,
                    'name' => 'faqCategories.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:40',
                    'updated_at' => '2021-01-07 13:17:40',
                ),
            42 =>
                array(
                    'id' => 43,
                    'name' => 'faqCategories.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:40',
                    'updated_at' => '2021-01-07 13:17:40',
                ),
            43 =>
                array(
                    'id' => 44,
                    'name' => 'faqCategories.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:40',
                    'updated_at' => '2021-01-07 13:17:40',
                ),
            44 =>
                array(
                    'id' => 45,
                    'name' => 'faqCategories.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:41',
                    'updated_at' => '2021-01-07 13:17:41',
                ),
            45 =>
                array(
                    'id' => 46,
                    'name' => 'faqCategories.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:41',
                    'updated_at' => '2021-01-07 13:17:41',
                ),
            46 =>
                array(
                    'id' => 47,
                    'name' => 'faqCategories.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:41',
                    'updated_at' => '2021-01-07 13:17:41',
                ),
            47 =>
                array(
                    'id' => 48,
                    'name' => 'faqs.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:41',
                    'updated_at' => '2021-01-07 13:17:41',
                ),
            48 =>
                array(
                    'id' => 49,
                    'name' => 'faqs.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:41',
                    'updated_at' => '2021-01-07 13:17:41',
                ),
            49 =>
                array(
                    'id' => 50,
                    'name' => 'faqs.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:41',
                    'updated_at' => '2021-01-07 13:17:41',
                ),
            50 =>
                array(
                    'id' => 51,
                    'name' => 'faqs.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:41',
                    'updated_at' => '2021-01-07 13:17:41',
                ),
            51 =>
                array(
                    'id' => 52,
                    'name' => 'faqs.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:42',
                    'updated_at' => '2021-01-07 13:17:42',
                ),
            52 =>
                array(
                    'id' => 53,
                    'name' => 'faqs.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-07 13:17:42',
                    'updated_at' => '2021-01-07 13:17:42',
                ),
            53 =>
                array(
                    'id' => 54,
                    'name' => 'payments.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-11 00:04:33',
                    'updated_at' => '2021-01-11 00:04:33',
                ),
            54 =>
                array(
                    'id' => 55,
                    'name' => 'payments.show',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-11 00:04:33',
                    'updated_at' => '2021-01-11 00:04:33',
                ),
            55 =>
                array(
                    'id' => 56,
                    'name' => 'payments.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-11 00:04:33',
                    'updated_at' => '2021-01-11 00:04:33',
                ),
            56 =>
                array(
                    'id' => 57,
                    'name' => 'paymentMethods.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-11 00:04:33',
                    'updated_at' => '2021-01-11 00:04:33',
                ),
            57 =>
                array(
                    'id' => 58,
                    'name' => 'paymentMethods.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-11 00:04:34',
                    'updated_at' => '2021-01-11 00:04:34',
                ),
            58 =>
                array(
                    'id' => 59,
                    'name' => 'paymentMethods.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-11 00:04:34',
                    'updated_at' => '2021-01-11 00:04:34',
                ),
            59 =>
                array(
                    'id' => 60,
                    'name' => 'paymentMethods.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-11 00:04:34',
                    'updated_at' => '2021-01-11 00:04:34',
                ),
            60 =>
                array(
                    'id' => 61,
                    'name' => 'paymentMethods.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-11 00:04:34',
                    'updated_at' => '2021-01-11 00:04:34',
                ),
            61 =>
                array(
                    'id' => 62,
                    'name' => 'paymentMethods.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-11 00:04:34',
                    'updated_at' => '2021-01-11 00:04:34',
                ),
            62 =>
                array(
                    'id' => 63,
                    'name' => 'paymentStatuses.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-11 00:04:34',
                    'updated_at' => '2021-01-11 00:04:34',
                ),
            63 =>
                array(
                    'id' => 64,
                    'name' => 'paymentStatuses.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-11 00:04:34',
                    'updated_at' => '2021-01-11 00:04:34',
                ),
            64 =>
                array(
                    'id' => 65,
                    'name' => 'paymentStatuses.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-11 00:04:35',
                    'updated_at' => '2021-01-11 00:04:35',
                ),
            65 =>
                array(
                    'id' => 66,
                    'name' => 'paymentStatuses.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-11 00:04:35',
                    'updated_at' => '2021-01-11 00:04:35',
                ),
            66 =>
                array(
                    'id' => 67,
                    'name' => 'paymentStatuses.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-11 00:04:35',
                    'updated_at' => '2021-01-11 00:04:35',
                ),
            67 =>
                array(
                    'id' => 68,
                    'name' => 'paymentStatuses.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-11 00:04:35',
                    'updated_at' => '2021-01-11 00:04:35',
                ),
            68 =>
                array(
                    'id' => 69,
                    'name' => 'verification.notice',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-12 10:19:50',
                    'updated_at' => '2021-01-12 10:19:50',
                ),
            69 =>
                array(
                    'id' => 70,
                    'name' => 'verification.verify',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-12 10:19:50',
                    'updated_at' => '2021-01-12 10:19:50',
                ),
            70 =>
                array(
                    'id' => 71,
                    'name' => 'verification.resend',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-12 10:19:51',
                    'updated_at' => '2021-01-12 10:19:51',
                ),
            71 =>
                array(
                    'id' => 72,
                    'name' => 'awards.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-12 10:19:51',
                    'updated_at' => '2021-01-12 10:19:51',
                ),
            72 =>
                array(
                    'id' => 73,
                    'name' => 'awards.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-12 10:19:52',
                    'updated_at' => '2021-01-12 10:19:52',
                ),
            73 =>
                array(
                    'id' => 74,
                    'name' => 'awards.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-12 10:19:52',
                    'updated_at' => '2021-01-12 10:19:52',
                ),
            74 =>
                array(
                    'id' => 75,
                    'name' => 'awards.show',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-12 10:19:52',
                    'updated_at' => '2021-01-12 10:19:52',
                ),
            75 =>
                array(
                    'id' => 76,
                    'name' => 'awards.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-12 10:19:52',
                    'updated_at' => '2021-01-12 10:19:52',
                ),
            76 =>
                array(
                    'id' => 77,
                    'name' => 'awards.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-12 10:19:52',
                    'updated_at' => '2021-01-12 10:19:52',
                ),
            77 =>
                array(
                    'id' => 78,
                    'name' => 'awards.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-12 10:19:52',
                    'updated_at' => '2021-01-12 10:19:52',
                ),
            78 =>
                array(
                    'id' => 79,
                    'name' => 'experiences.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-12 11:20:29',
                    'updated_at' => '2021-01-12 11:20:29',
                ),
            79 =>
                array(
                    'id' => 80,
                    'name' => 'experiences.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-12 11:20:29',
                    'updated_at' => '2021-01-12 11:20:29',
                ),
            80 =>
                array(
                    'id' => 81,
                    'name' => 'experiences.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-12 11:20:30',
                    'updated_at' => '2021-01-12 11:20:30',
                ),
            81 =>
                array(
                    'id' => 82,
                    'name' => 'experiences.show',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-12 11:20:30',
                    'updated_at' => '2021-01-12 11:20:30',
                ),
            82 =>
                array(
                    'id' => 83,
                    'name' => 'experiences.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-12 11:20:30',
                    'updated_at' => '2021-01-12 11:20:30',
                ),
            83 =>
                array(
                    'id' => 84,
                    'name' => 'experiences.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-12 11:20:30',
                    'updated_at' => '2021-01-12 11:20:30',
                ),
            84 =>
                array(
                    'id' => 85,
                    'name' => 'experiences.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-12 11:20:30',
                    'updated_at' => '2021-01-12 11:20:30',
                ),
            85 =>
                array(
                    'id' => 92,
                    'name' => 'eProviderTypes.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:31:08',
                    'updated_at' => '2021-01-13 11:31:08',
                ),
            86 =>
                array(
                    'id' => 93,
                    'name' => 'eProviderTypes.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:31:09',
                    'updated_at' => '2021-01-13 11:31:09',
                ),
            87 =>
                array(
                    'id' => 94,
                    'name' => 'eProviderTypes.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:31:09',
                    'updated_at' => '2021-01-13 11:31:09',
                ),
            88 =>
                array(
                    'id' => 95,
                    'name' => 'eProviderTypes.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:31:09',
                    'updated_at' => '2021-01-13 11:31:09',
                ),
            89 =>
                array(
                    'id' => 96,
                    'name' => 'eProviderTypes.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:31:09',
                    'updated_at' => '2021-01-13 11:31:09',
                ),
            90 =>
                array(
                    'id' => 97,
                    'name' => 'eProviderTypes.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:31:09',
                    'updated_at' => '2021-01-13 11:31:09',
                ),
            91 =>
                array(
                    'id' => 98,
                    'name' => 'eProviders.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:48:55',
                    'updated_at' => '2021-01-13 11:48:55',
                ),
            92 =>
                array(
                    'id' => 99,
                    'name' => 'eProviders.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:48:56',
                    'updated_at' => '2021-01-13 11:48:56',
                ),
            93 =>
                array(
                    'id' => 100,
                    'name' => 'eProviders.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:48:56',
                    'updated_at' => '2021-01-13 11:48:56',
                ),
            94 =>
                array(
                    'id' => 101,
                    'name' => 'eProviders.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:48:56',
                    'updated_at' => '2021-01-13 11:48:56',
                ),
            95 =>
                array(
                    'id' => 102,
                    'name' => 'eProviders.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:48:56',
                    'updated_at' => '2021-01-13 11:48:56',
                ),
            96 =>
                array(
                    'id' => 103,
                    'name' => 'eProviders.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:48:56',
                    'updated_at' => '2021-01-13 11:48:56',
                ),
            97 =>
                array(
                    'id' => 104,
                    'name' => 'addresses.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:48:56',
                    'updated_at' => '2021-01-13 11:48:56',
                ),
            98 =>
                array(
                    'id' => 105,
                    'name' => 'addresses.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:48:57',
                    'updated_at' => '2021-01-13 11:48:57',
                ),
            99 =>
                array(
                    'id' => 106,
                    'name' => 'addresses.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:48:57',
                    'updated_at' => '2021-01-13 11:48:57',
                ),
            100 =>
                array(
                    'id' => 107,
                    'name' => 'addresses.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:48:57',
                    'updated_at' => '2021-01-13 11:48:57',
                ),
            101 =>
                array(
                    'id' => 108,
                    'name' => 'addresses.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:48:57',
                    'updated_at' => '2021-01-13 11:48:57',
                ),
            102 =>
                array(
                    'id' => 109,
                    'name' => 'addresses.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:48:57',
                    'updated_at' => '2021-01-13 11:48:57',
                ),
            103 =>
                array(
                    'id' => 110,
                    'name' => 'taxes.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:48:57',
                    'updated_at' => '2021-01-13 11:48:57',
                ),
            104 =>
                array(
                    'id' => 111,
                    'name' => 'taxes.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:48:57',
                    'updated_at' => '2021-01-13 11:48:57',
                ),
            105 =>
                array(
                    'id' => 112,
                    'name' => 'taxes.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:48:58',
                    'updated_at' => '2021-01-13 11:48:58',
                ),
            106 =>
                array(
                    'id' => 113,
                    'name' => 'taxes.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:48:58',
                    'updated_at' => '2021-01-13 11:48:58',
                ),
            107 =>
                array(
                    'id' => 114,
                    'name' => 'taxes.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:48:58',
                    'updated_at' => '2021-01-13 11:48:58',
                ),
            108 =>
                array(
                    'id' => 115,
                    'name' => 'taxes.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-13 11:48:58',
                    'updated_at' => '2021-01-13 11:48:58',
                ),
            109 =>
                array(
                    'id' => 116,
                    'name' => 'availabilityHours.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-16 16:14:21',
                    'updated_at' => '2021-01-16 16:14:21',
                ),
            110 =>
                array(
                    'id' => 117,
                    'name' => 'availabilityHours.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-16 16:14:21',
                    'updated_at' => '2021-01-16 16:14:21',
                ),
            111 =>
                array(
                    'id' => 118,
                    'name' => 'availabilityHours.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-16 16:14:21',
                    'updated_at' => '2021-01-16 16:14:21',
                ),
            112 =>
                array(
                    'id' => 119,
                    'name' => 'availabilityHours.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-16 16:14:21',
                    'updated_at' => '2021-01-16 16:14:21',
                ),
            113 =>
                array(
                    'id' => 120,
                    'name' => 'availabilityHours.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-16 16:14:22',
                    'updated_at' => '2021-01-16 16:14:22',
                ),
            114 =>
                array(
                    'id' => 121,
                    'name' => 'availabilityHours.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-16 16:14:22',
                    'updated_at' => '2021-01-16 16:14:22',
                ),
            115 =>
                array(
                    'id' => 122,
                    'name' => 'eServices.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-19 14:03:00',
                    'updated_at' => '2021-01-19 14:03:00',
                ),
            116 =>
                array(
                    'id' => 123,
                    'name' => 'eServices.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-19 14:03:00',
                    'updated_at' => '2021-01-19 14:03:00',
                ),
            117 =>
                array(
                    'id' => 124,
                    'name' => 'eServices.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-19 14:03:00',
                    'updated_at' => '2021-01-19 14:03:00',
                ),
            118 =>
                array(
                    'id' => 126,
                    'name' => 'eServices.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-19 14:03:01',
                    'updated_at' => '2021-01-19 14:03:01',
                ),
            119 =>
                array(
                    'id' => 127,
                    'name' => 'eServices.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-19 14:03:01',
                    'updated_at' => '2021-01-19 14:03:01',
                ),
            120 =>
                array(
                    'id' => 128,
                    'name' => 'eServices.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-19 14:03:01',
                    'updated_at' => '2021-01-19 14:03:01',
                ),
            121 =>
                array(
                    'id' => 129,
                    'name' => 'categories.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-19 14:08:55',
                    'updated_at' => '2021-01-19 14:08:55',
                ),
            122 =>
                array(
                    'id' => 130,
                    'name' => 'categories.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-19 14:08:55',
                    'updated_at' => '2021-01-19 14:08:55',
                ),
            123 =>
                array(
                    'id' => 131,
                    'name' => 'categories.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-19 14:08:55',
                    'updated_at' => '2021-01-19 14:08:55',
                ),
            124 =>
                array(
                    'id' => 132,
                    'name' => 'categories.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-19 14:08:55',
                    'updated_at' => '2021-01-19 14:08:55',
                ),
            125 =>
                array(
                    'id' => 133,
                    'name' => 'categories.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-19 14:08:56',
                    'updated_at' => '2021-01-19 14:08:56',
                ),
            126 =>
                array(
                    'id' => 134,
                    'name' => 'categories.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-19 14:08:56',
                    'updated_at' => '2021-01-19 14:08:56',
                ),
            127 =>
                array(
                    'id' => 135,
                    'name' => 'optionGroups.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-22 19:48:32',
                    'updated_at' => '2021-01-22 19:48:32',
                ),
            128 =>
                array(
                    'id' => 136,
                    'name' => 'optionGroups.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-22 19:48:32',
                    'updated_at' => '2021-01-22 19:48:32',
                ),
            129 =>
                array(
                    'id' => 137,
                    'name' => 'optionGroups.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-22 19:48:32',
                    'updated_at' => '2021-01-22 19:48:32',
                ),
            130 =>
                array(
                    'id' => 138,
                    'name' => 'optionGroups.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-22 19:48:32',
                    'updated_at' => '2021-01-22 19:48:32',
                ),
            131 =>
                array(
                    'id' => 139,
                    'name' => 'optionGroups.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-22 19:48:32',
                    'updated_at' => '2021-01-22 19:48:32',
                ),
            132 =>
                array(
                    'id' => 140,
                    'name' => 'optionGroups.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-22 19:48:32',
                    'updated_at' => '2021-01-22 19:48:32',
                ),
            133 =>
                array(
                    'id' => 141,
                    'name' => 'options.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-22 20:10:51',
                    'updated_at' => '2021-01-22 20:10:51',
                ),
            134 =>
                array(
                    'id' => 142,
                    'name' => 'options.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-22 20:10:51',
                    'updated_at' => '2021-01-22 20:10:51',
                ),
            135 =>
                array(
                    'id' => 143,
                    'name' => 'options.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-22 20:10:52',
                    'updated_at' => '2021-01-22 20:10:52',
                ),
            136 =>
                array(
                    'id' => 144,
                    'name' => 'options.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-22 20:10:52',
                    'updated_at' => '2021-01-22 20:10:52',
                ),
            137 =>
                array(
                    'id' => 145,
                    'name' => 'options.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-22 20:10:52',
                    'updated_at' => '2021-01-22 20:10:52',
                ),
            138 =>
                array(
                    'id' => 146,
                    'name' => 'options.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-22 20:10:52',
                    'updated_at' => '2021-01-22 20:10:52',
                ),
            139 =>
                array(
                    'id' => 147,
                    'name' => 'favorites.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-22 21:01:13',
                    'updated_at' => '2021-01-22 21:01:13',
                ),
            140 =>
                array(
                    'id' => 148,
                    'name' => 'favorites.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-22 21:01:13',
                    'updated_at' => '2021-01-22 21:01:13',
                ),
            141 =>
                array(
                    'id' => 149,
                    'name' => 'favorites.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-22 21:01:13',
                    'updated_at' => '2021-01-22 21:01:13',
                ),
            142 =>
                array(
                    'id' => 150,
                    'name' => 'favorites.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-22 21:01:13',
                    'updated_at' => '2021-01-22 21:01:13',
                ),
            143 =>
                array(
                    'id' => 151,
                    'name' => 'favorites.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-22 21:01:13',
                    'updated_at' => '2021-01-22 21:01:13',
                ),
            144 =>
                array(
                    'id' => 152,
                    'name' => 'favorites.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-22 21:01:13',
                    'updated_at' => '2021-01-22 21:01:13',
                ),
            145 =>
                array(
                    'id' => 153,
                    'name' => 'eServiceReviews.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-23 19:42:57',
                    'updated_at' => '2021-01-23 19:42:57',
                ),
            146 =>
                array(
                    'id' => 154,
                    'name' => 'eServiceReviews.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-23 19:42:58',
                    'updated_at' => '2021-01-23 19:42:58',
                ),
            147 =>
                array(
                    'id' => 155,
                    'name' => 'eServiceReviews.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-23 19:42:58',
                    'updated_at' => '2021-01-23 19:42:58',
                ),
            148 =>
                array(
                    'id' => 156,
                    'name' => 'eServiceReviews.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-23 19:42:58',
                    'updated_at' => '2021-01-23 19:42:58',
                ),
            149 =>
                array(
                    'id' => 157,
                    'name' => 'eServiceReviews.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-23 19:42:58',
                    'updated_at' => '2021-01-23 19:42:58',
                ),
            150 =>
                array(
                    'id' => 158,
                    'name' => 'eServiceReviews.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-23 19:42:58',
                    'updated_at' => '2021-01-23 19:42:58',
                ),
            151 =>
                array(
                    'id' => 160,
                    'name' => 'galleries.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-23 20:17:46',
                    'updated_at' => '2021-01-23 20:17:46',
                ),
            152 =>
                array(
                    'id' => 161,
                    'name' => 'galleries.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-23 20:17:47',
                    'updated_at' => '2021-01-23 20:17:47',
                ),
            153 =>
                array(
                    'id' => 162,
                    'name' => 'galleries.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-23 20:17:47',
                    'updated_at' => '2021-01-23 20:17:47',
                ),
            154 =>
                array(
                    'id' => 163,
                    'name' => 'galleries.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-23 20:17:47',
                    'updated_at' => '2021-01-23 20:17:47',
                ),
            155 =>
                array(
                    'id' => 164,
                    'name' => 'galleries.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-23 20:17:47',
                    'updated_at' => '2021-01-23 20:17:47',
                ),
            156 =>
                array(
                    'id' => 165,
                    'name' => 'galleries.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-23 20:17:47',
                    'updated_at' => '2021-01-23 20:17:47',
                ),
            157 =>
                array(
                    'id' => 166,
                    'name' => 'requestedEProviders.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 09:53:17',
                    'updated_at' => '2021-01-25 09:53:17',
                ),
            158 =>
                array(
                    'id' => 167,
                    'name' => 'slides.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 11:01:20',
                    'updated_at' => '2021-01-25 11:01:20',
                ),
            159 =>
                array(
                    'id' => 168,
                    'name' => 'slides.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 11:01:20',
                    'updated_at' => '2021-01-25 11:01:20',
                ),
            160 =>
                array(
                    'id' => 169,
                    'name' => 'slides.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 11:01:20',
                    'updated_at' => '2021-01-25 11:01:20',
                ),
            161 =>
                array(
                    'id' => 170,
                    'name' => 'slides.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 11:01:20',
                    'updated_at' => '2021-01-25 11:01:20',
                ),
            162 =>
                array(
                    'id' => 171,
                    'name' => 'slides.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 11:01:20',
                    'updated_at' => '2021-01-25 11:01:20',
                ),
            163 =>
                array(
                    'id' => 172,
                    'name' => 'slides.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 11:01:20',
                    'updated_at' => '2021-01-25 11:01:20',
                ),
            164 =>
                array(
                    'id' => 173,
                    'name' => 'notifications.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 15:42:33',
                    'updated_at' => '2021-01-25 15:42:33',
                ),
            165 =>
                array(
                    'id' => 174,
                    'name' => 'notifications.show',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 15:42:34',
                    'updated_at' => '2021-01-25 15:42:34',
                ),
            166 =>
                array(
                    'id' => 175,
                    'name' => 'notifications.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 15:42:34',
                    'updated_at' => '2021-01-25 15:42:34',
                ),
            167 =>
                array(
                    'id' => 176,
                    'name' => 'coupons.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 16:11:55',
                    'updated_at' => '2021-01-25 16:11:55',
                ),
            168 =>
                array(
                    'id' => 177,
                    'name' => 'coupons.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 16:11:55',
                    'updated_at' => '2021-01-25 16:11:55',
                ),
            169 =>
                array(
                    'id' => 178,
                    'name' => 'coupons.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 16:11:55',
                    'updated_at' => '2021-01-25 16:11:55',
                ),
            170 =>
                array(
                    'id' => 179,
                    'name' => 'coupons.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 16:11:55',
                    'updated_at' => '2021-01-25 16:11:55',
                ),
            171 =>
                array(
                    'id' => 180,
                    'name' => 'coupons.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 16:11:55',
                    'updated_at' => '2021-01-25 16:11:55',
                ),
            172 =>
                array(
                    'id' => 181,
                    'name' => 'coupons.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 16:11:55',
                    'updated_at' => '2021-01-25 16:11:55',
                ),
            173 =>
                array(
                    'id' => 182,
                    'name' => 'bookingStatuses.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 19:21:01',
                    'updated_at' => '2021-01-25 19:21:01',
                ),
            174 =>
                array(
                    'id' => 183,
                    'name' => 'bookingStatuses.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 19:21:01',
                    'updated_at' => '2021-01-25 19:21:01',
                ),
            175 =>
                array(
                    'id' => 184,
                    'name' => 'bookingStatuses.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 19:21:01',
                    'updated_at' => '2021-01-25 19:21:01',
                ),
            176 =>
                array(
                    'id' => 185,
                    'name' => 'bookingStatuses.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 19:21:01',
                    'updated_at' => '2021-01-25 19:21:01',
                ),
            177 =>
                array(
                    'id' => 186,
                    'name' => 'bookingStatuses.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 19:21:01',
                    'updated_at' => '2021-01-25 19:21:01',
                ),
            178 =>
                array(
                    'id' => 187,
                    'name' => 'bookingStatuses.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 19:21:01',
                    'updated_at' => '2021-01-25 19:21:01',
                ),
            179 =>
                array(
                    'id' => 188,
                    'name' => 'bookings.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 21:27:09',
                    'updated_at' => '2021-01-25 21:27:09',
                ),
            180 =>
                array(
                    'id' => 189,
                    'name' => 'bookings.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 21:27:09',
                    'updated_at' => '2021-01-25 21:27:09',
                ),
            181 =>
                array(
                    'id' => 190,
                    'name' => 'bookings.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 21:27:09',
                    'updated_at' => '2021-01-25 21:27:09',
                ),
            182 =>
                array(
                    'id' => 191,
                    'name' => 'bookings.show',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 21:27:09',
                    'updated_at' => '2021-01-25 21:27:09',
                ),
            183 =>
                array(
                    'id' => 192,
                    'name' => 'bookings.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 21:27:09',
                    'updated_at' => '2021-01-25 21:27:09',
                ),
            184 =>
                array(
                    'id' => 193,
                    'name' => 'bookings.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 21:27:09',
                    'updated_at' => '2021-01-25 21:27:09',
                ),
            185 =>
                array(
                    'id' => 194,
                    'name' => 'bookings.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-25 21:27:09',
                    'updated_at' => '2021-01-25 21:27:09',
                ),
            186 =>
                array(
                    'id' => 195,
                    'name' => 'eProviderPayouts.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-30 11:23:08',
                    'updated_at' => '2021-01-30 11:23:08',
                ),
            187 =>
                array(
                    'id' => 196,
                    'name' => 'eProviderPayouts.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-30 11:23:08',
                    'updated_at' => '2021-01-30 11:23:08',
                ),
            188 =>
                array(
                    'id' => 197,
                    'name' => 'eProviderPayouts.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-30 11:23:08',
                    'updated_at' => '2021-01-30 11:23:08',
                ),
            189 =>
                array(
                    'id' => 198,
                    'name' => 'eProviderPayouts.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-30 11:23:09',
                    'updated_at' => '2021-01-30 11:23:09',
                ),
            190 =>
                array(
                    'id' => 199,
                    'name' => 'earnings.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-30 13:57:57',
                    'updated_at' => '2021-01-30 13:57:57',
                ),
            191 =>
                array(
                    'id' => 200,
                    'name' => 'earnings.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-30 13:57:57',
                    'updated_at' => '2021-01-30 13:57:57',
                ),
            192 =>
                array(
                    'id' => 201,
                    'name' => 'earnings.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-30 13:57:57',
                    'updated_at' => '2021-01-30 13:57:57',
                ),
            193 =>
                array(
                    'id' => 202,
                    'name' => 'earnings.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-01-30 13:57:57',
                    'updated_at' => '2021-01-30 13:57:57',
                ),
            194 =>
                array(
                    'id' => 203,
                    'name' => 'customPages.index',
                    'guard_name' => 'web',
                    'created_at' => '2021-02-24 11:37:44',
                    'updated_at' => '2021-02-24 11:37:44',
                ),
            195 =>
                array(
                    'id' => 204,
                    'name' => 'customPages.create',
                    'guard_name' => 'web',
                    'created_at' => '2021-02-24 11:37:44',
                    'updated_at' => '2021-02-24 11:37:44',
                ),
            196 =>
                array(
                    'id' => 205,
                    'name' => 'customPages.store',
                    'guard_name' => 'web',
                    'created_at' => '2021-02-24 11:37:44',
                    'updated_at' => '2021-02-24 11:37:44',
                ),
            197 =>
                array(
                    'id' => 206,
                    'name' => 'customPages.show',
                    'guard_name' => 'web',
                    'created_at' => '2021-02-24 11:37:44',
                    'updated_at' => '2021-02-24 11:37:44',
                ),
            198 =>
                array(
                    'id' => 207,
                    'name' => 'customPages.edit',
                    'guard_name' => 'web',
                    'created_at' => '2021-02-24 11:37:44',
                    'updated_at' => '2021-02-24 11:37:44',
                ),
            199 =>
                array(
                    'id' => 208,
                    'name' => 'customPages.update',
                    'guard_name' => 'web',
                    'created_at' => '2021-02-24 11:37:44',
                    'updated_at' => '2021-02-24 11:37:44',
                ),
            200 =>
                array(
                    'id' => 209,
                    'name' => 'customPages.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2021-02-24 11:37:44',
                    'updated_at' => '2021-02-24 11:37:44',
                ),
        ));


    }
}
