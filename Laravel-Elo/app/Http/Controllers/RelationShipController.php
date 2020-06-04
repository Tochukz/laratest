<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Phone;
use App\Models\Post;
use App\Models\Comment;
use  App\Models\Role;

class RelationShipController extends Controller
{
    /**
     * Using one-to-one relationship (parent-to-child) 
     */
    public function parentChild()
    {
        $usersWithPhone = User::all();        
        return view('relationship', ['usersWithPhone'=>$usersWithPhone]);
    }

    /**
     * Using one-to-one relationship in reverse (child-to-parent)
     */
    public function childParent()
    {
        $phoneWithUser = Phone::all();
        return view('relationship', ['phoneWithUser'=>$phoneWithUser]);
    }


    /**
     * Using the one-to-many relationship
     */
    public function oneToMany()
    {
        //$postsAndComments = Post::find(1)->comments()->where('email', 'true@chucks.com')->get(); 
        $postsAndComments = Post::all();
        return view('relationship', ['postsAndComments'=>$postsAndComments]);
    }

    /**
     * Using one-to-many relationship in reverse(many-to-one)
     */
    public function manyToOne()
    {
        $manyToOne = Comment::all();
        return view('relationship', ['manyToOne'=>$manyToOne]);
    }

    public function usersToRoles()
    {
        $usersToRoles = User::all();
        return view('relationship', ['usersToRoles'=>$usersToRoles]);
    }

    public function rolesToUsers()
    {
        $rolesToUsers = Role::all();
        return view('relationship', ['rolesToUsers'=>$rolesToUsers]);
    }
}
