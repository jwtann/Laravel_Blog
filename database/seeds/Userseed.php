<?php

use Illuminate\Database\Seeder;
use App\User;
class Userseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class,10)->create();
        $user = User::find(1);
        $user->username = 'admin';
        $user->email = '123456@qq.com';
        $user->is_admin = 1;
        $user->save();
    }
}
