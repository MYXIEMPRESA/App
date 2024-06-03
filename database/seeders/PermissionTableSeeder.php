<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class PermissionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('permissions')->delete();
        
        DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'role',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'role-add',
                'guard_name' => 'web',
                'parent_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'role-list',
                'guard_name' => 'web',
                'parent_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'permission',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'permission-add',
                'guard_name' => 'web',
                'parent_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'permission-list',
                'guard_name' => 'web',
                'parent_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'customer',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'customer-list',
                'guard_name' => 'web',
                'parent_id' => 7,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'customer-show',
                'guard_name' => 'web',
                'parent_id' => 7,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'customer-delete',
                'guard_name' => 'web',
                'parent_id' => 7,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'agent',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'agent-list',
                'guard_name' => 'web',
                'parent_id' => 11,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'agent-show',
                'guard_name' => 'web',
                'parent_id' => 11,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'agent-delete',
                'guard_name' => 'web',
                'parent_id' => 11,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'builder',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'builder-list',
                'guard_name' => 'web',
                'parent_id' => 15,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'builder-show',
                'guard_name' => 'web',
                'parent_id' => 15,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'builder-delete',
                'guard_name' => 'web',
                'parent_id' => 15,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'subadmin',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'subadmin-list',
                'guard_name' => 'web',
                'parent_id' => 19,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'subadmin-add',
                'guard_name' => 'web',
                'parent_id' => 19,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'subadmin-edit',
                'guard_name' => 'web',
                'parent_id' => 19,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'subadmin-delete',
                'guard_name' => 'web',
                'parent_id' => 19,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'amenity',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'amenity-list',
                'guard_name' => 'web',
                'parent_id' => 24,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'amenity-add',
                'guard_name' => 'web',
                'parent_id' => 24,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'amenity-edit',
                'guard_name' => 'web',
                'parent_id' => 24,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'amenity-delete',
                'guard_name' => 'web',
                'parent_id' => 24,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'category',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'category-list',
                'guard_name' => 'web',
                'parent_id' => 29,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'category-add',
                'guard_name' => 'web',
                'parent_id' => 29,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'category-edit',
                'guard_name' => 'web',
                'parent_id' => 29,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'category-delete',
                'guard_name' => 'web',
                'parent_id' => 29,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'property',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'property-list',
                'guard_name' => 'web',
                'parent_id' => 34,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'property-add',
                'guard_name' => 'web',
                'parent_id' => 34,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'property-edit',
                'guard_name' => 'web',
                'parent_id' => 34,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'property-delete',
                'guard_name' => 'web',
                'parent_id' => 34,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'article',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'article-list',
                'guard_name' => 'web',
                'parent_id' => 39,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'article-add',
                'guard_name' => 'web',
                'parent_id' => 39,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'article-edit',
                'guard_name' => 'web',
                'parent_id' => 39,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'article-delete',
                'guard_name' => 'web',
                'parent_id' => 39,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'tags',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'tags-list',
                'guard_name' => 'web',
                'parent_id' => 44,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'tags-add',
                'guard_name' => 'web',
                'parent_id' => 44,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'tags-edit',
                'guard_name' => 'web',
                'parent_id' => 44,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'tags-delete',
                'guard_name' => 'web',
                'parent_id' => 44,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'slider',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'slider-list',
                'guard_name' => 'web',
                'parent_id' => 49,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'slider-add',
                'guard_name' => 'web',
                'parent_id' => 49,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'slider-edit',
                'guard_name' => 'web',
                'parent_id' => 49,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'slider-delete',
                'guard_name' => 'web',
                'parent_id' => 49,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'package',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'package-list',
                'guard_name' => 'web',
                'parent_id' => 54,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'package-add',
                'guard_name' => 'web',
                'parent_id' => 54,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'package-edit',
                'guard_name' => 'web',
                'parent_id' => 54,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'package-delete',
                'guard_name' => 'web',
                'parent_id' => 54,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'extra property limit',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'extra property limit-list',
                'guard_name' => 'web',
                'parent_id' => 59,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'extra property limit-add',
                'guard_name' => 'web',
                'parent_id' => 59,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'extra property limit-edit',
                'guard_name' => 'web',
                'parent_id' => 59,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'extra property limit-delete',
                'guard_name' => 'web',
                'parent_id' => 59,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'subscription',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'subscription-list',
                'guard_name' => 'web',
                'parent_id' => 64,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'subscription-show',
                'guard_name' => 'web',
                'parent_id' => 64,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'push notification',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'push notification-list',
                'guard_name' => 'web',
                'parent_id' => 67,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'push notification-add',
                'guard_name' => 'web',
                'parent_id' => 67,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'push notification-delete',
                'guard_name' => 'web',
                'parent_id' => 67,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'pages',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'terms-condition',
                'guard_name' => 'web',
                'parent_id' => 71,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'privacy-policy',
                'guard_name' => 'web',
                'parent_id' => 71,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'property-show',
                'guard_name' => 'web',
                'parent_id' => 34,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'article-show',
                'guard_name' => 'web',
                'parent_id' => 39,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'screen',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'screen-list',
                'guard_name' => 'web',
                'parent_id' => 76,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'languagekeyword',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'languagekeyword-list',
                'guard_name' => 'web',
                'parent_id' => 78,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'languagekeyword-add',
                'guard_name' => 'web',
                'parent_id' => 78,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'languagekeyword-edit',
                'guard_name' => 'web',
                'parent_id' => 78,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'language',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'language-list',
                'guard_name' => 'web',
                'parent_id' => 82,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'language-add',
                'guard_name' => 'web',
                'parent_id' => 82,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'language-edit',
                'guard_name' => 'web',
                'parent_id' => 82,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'language-delete',
                'guard_name' => 'web',
                'parent_id' => 82,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'languagecontent',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'languagecontent-list',
                'guard_name' => 'web',
                'parent_id' => 87,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'bulkimport',
                'guard_name' => 'web',
                'parent_id' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'bulkimport-list',
                'guard_name' => 'web',
                'parent_id' => 89,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'languagekeyword-delete',
                'guard_name' => 'web',
                'parent_id' => 78,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => NULL,
            ),
        ));
    }
}