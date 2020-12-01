<?php

use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'MD.Atik',
            'username' => 'admin',
            'email' => 'atik@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'MD.Hasan',
            'username' => 'Hasan',
            'email' => 'hasan@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

    }
}
