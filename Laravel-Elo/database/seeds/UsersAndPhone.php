<?php

use Illuminate\Database\Seeder;

class UsersAndPhone extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=>'Chucks',
                'email'=>'chucks@mail.com',
                'password'=>hash('sha512','xxxxxxxx'),
            ],
            [
                'name'=>'Chichi',
                'email'=>'chichi@mail.com',
                'password'=>hash('sha512','yyyyyyyyyy'),
            ],
            [
                'name'=>'Chukwudi',
                'email'=>'chuckwudi@him.com',
                'password'=>hash('sha512', 'wwwwwwww')
            ],
            [
                'name'=>'Uche',
                'email'=>'uche@uahoo.com',
                'password'=>hash('sha512', 'zzzzzzzzzz')
            ],
        ];
       
        \DB::table('users')->insert($users);
    

       $phones  = [
            [
                'user_id'=>3,
                'phone'=>'08037673427',
            ],
            [
                'user_id'=>2,
                'phone'=>'+27633651007',
            ],
            [
                'user_id'=>4,
                'phone'=>'08057291992',
            ],
            [
                'user_id'=>1,
                'phone'=>'06035689070'
            ]
        ];
       
        \DB::table('phones')->insert($phones);
    }
}
