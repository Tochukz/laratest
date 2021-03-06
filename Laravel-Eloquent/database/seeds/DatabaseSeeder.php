<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersAndPhone::class);
        $this->call(PostAndComment::class);
        $this->call(RoleAndPivot::class);
    }

}
