<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id'	    => 1,
            'nama'	    => 'user1',
            'username'	=> 'user1',
            'alamat'	=> 'Sorong',
            'tgl_lahir'	=> Carbon::now(),
            'jk'	    => 'L',
            'email'	    => 'user1@gmail.com',
            'password'	=> bcrypt('secret')
        ]);
    }
}
