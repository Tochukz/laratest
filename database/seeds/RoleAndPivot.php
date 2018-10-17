<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleAndPivot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['superadmin','admin', 'editor', 'author'];
        foreach($roles as $role){
            Role::create(['role'=>$role]);
        }

        $user_roles = [
            ['user_id'=>1, 'roles'=>[1,2,3,4]],
            ['user_id'=>3, 'roles'=>[2,3,4]],
            ['user_id'=>2, 'roles'=>[3,4]],
            ['user_id'=>4, 'roles'=>[4]],
        ];
               
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        foreach($user_roles as $user_role){
            $userId = $user_role['user_id'];
            $roles = $user_role['roles'];
            for($x=0; $x<count($roles); $x++){
                $record = [
                            'user_id'=>$userId,
                            'role_id'=>$roles[$x],
                            'created_at'=>$created_at,
                            'updated_at'=>$updated_at,
                         ];
                \DB::table('role_user')->insert($record);
            }
        }
        
    }
}
