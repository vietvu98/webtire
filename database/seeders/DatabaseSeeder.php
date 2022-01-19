<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // DB::table('role_user')->insert([
        //     'role_id' => 2,
        //     'user_id' => 2,
        // ]);
        // DB::table('permission_role')->insert([
        //     ['permission_id' => 1, 'role_id' => 1],
        //     ['permission_id' => 2, 'role_id' => 1],
        //     ['permission_id' => 3, 'role_id' => 1],
        //     ['permission_id' => 4, 'role_id' => 1],
        //     ['permission_id' => 5, 'role_id' => 1],
        // ]);
        DB::table('permissions')->insert([
            ['name' => 'view_permission'],
            // ['name' => 'create_user'],
            // ['name' => 'show_user'],
            // ['name' => 'delete_user'],
        ]);
    }
}
