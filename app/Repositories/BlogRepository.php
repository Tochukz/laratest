<?php
namespace App\Repositories;

use App\User;
use App\Models\Blog;
use App\Repositories\Interfaces\BlogRepositoryInterface;

class BlogRepository implements BlogRepositoryInterface
{
  public function all()
  {
      return Blog::all();
  }

  public function getByUser(User $user)
  {
      return Blog::where('user_id', $user->id)->get();
  }
}