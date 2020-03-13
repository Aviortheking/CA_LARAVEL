<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome()

    {

        return view('adminHome');

    }
    public function blog() {

        $posts = DB::table('posts')->get();

        return view('blog', ['posts' => $posts]);
    }
    public function detail($id) {
        return view('detail',['post' => Post::findOrFail($id)]);
    }
}
