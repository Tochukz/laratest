<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\User;

class BlogController extends Controller
{
    private $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function index()
    {
        $blog = $this->blogRepositoy->all();
        return view('blog')->withBlogs($blog);
    }

    public function detail($id)
    {
        $user = User::find($id);
        $blog = $this->blogRepository->getByUser($user);
        return view('blog')->withBlogs($blogs);
    }
}
