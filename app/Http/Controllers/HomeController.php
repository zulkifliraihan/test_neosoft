<?php

namespace App\Http\Controllers;

use App\Helpers\APIURL;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = APIURL::post();
        $comments = APIURL::comment();

        $getPosts = array_filter($posts,function($v,$k) {
            return $v['userId'] == 1;
        },ARRAY_FILTER_USE_BOTH); // With latest PHP third parameter is optional.. Available Values:- ARRAY_FILTER_USE_BOTH OR ARRAY_FILTER_USE_KEY

        $getComments = array_filter($comments,function($v,$k) {
            return $v['postId'] == 1;
        },ARRAY_FILTER_USE_BOTH); // With latest PHP third parameter is optional.. Available Values:- ARRAY_FILTER_USE_BOTH OR ARRAY_FILTER_USE_KEY

        $data = [
            'posts' => $posts,
            'countComment' => count($comments)
        ];

        return view('home', $data);
    }

    public function detail($id)
    {
        $post = APIURL::postDetail($id);
        $postComments = APIURL::postComment($id);

        $data = [
            'post' => $post[0],
            'postComments' => $postComments
        ];

        return view('detail', $data);
    }
}
