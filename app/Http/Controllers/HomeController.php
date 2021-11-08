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
        $client = new Client();
        $posts = $client->get(env('API_URL'). 'posts')->getBody();

        $posts = json_decode($posts, true);

        $comments =  $client->get(env('API_URL'). 'comments')->getBody();

        $comments = json_decode($comments, true);

        ##  OLD (LONG RESPONSE)  ##
        // $posts = APIURL::post();
        // $comments = APIURL::comment();

        $data = [
            'posts' => $posts
        ];

        return view('home', $data);
    }

    public function detail($id)
    {
        $post = APIURL::postDetail($id);
        $postComments = APIURL::postComment($id);

        $data = [
            'post' => reset($post),
            'postComments' => $postComments
        ];

        return view('detail', $data);
    }
}
