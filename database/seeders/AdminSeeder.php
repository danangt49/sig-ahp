<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'id'	    => 1,
            'nama'	    => 'Admin',
            'email'	    => 'admin@gis.com',
            'password'	=> bcrypt('secret')
        ]);
    }
}
