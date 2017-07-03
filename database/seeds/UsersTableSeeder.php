<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::where('email', 'nguyen.xuan.quynh@framgia.com')->firstOrCreate([
            'username' => 'nguyen.xuan.quynh',
            'email' => 'nguyen.xuan.quynh@framgia.com',
            'password' => bcrypt('secret@123#'),
            'fullname' => 'Nguyen Xuan Quynh',
            'active' => true,
            'avatar' => 'no-image.png',
            'type' => 'super-user',
        ]);
    }
}
