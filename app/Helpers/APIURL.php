<?php
namespace App\Helpers;

use GuzzleHttp\Client;

class APIURL
{
    public static function post()
    {
        $client = new Client();
        $posts = $client->get(env('API_URL'). 'posts')->getBody();

        $posts = json_decode($posts, true);

        return $posts;
    }

    public static function comment()
    {
        $client = new Client();
        $comments =  $client->get(env('API_URL'). 'comments')->getBody();

        $comments = json_decode($comments, true);

        return $comments;
    }

    public static function countComment($id)
    {
        $comments = APIURL::comment();

        $getComments = array_filter($comments,function($v,$k) use ($id) {
            return $v['postId'] == 1;
        },ARRAY_FILTER_USE_BOTH); // With latest PHP third parameter is optional.. Available Values:- ARRAY_FILTER_USE_BOTH OR ARRAY_FILTER_USE_KEY

        return count($getComments);
    }

    public static function postDetail($id)
    {
        $client = new Client();
        $posts = $client->get(env('API_URL'). 'posts')->getBody();

        $posts = json_decode($posts, true);

        $getPost = array_filter($posts,function($v,$k) use ($id) {
            return $v['id'] == $id;
        },ARRAY_FILTER_USE_BOTH); // With latest PHP third parameter is optional.. Available Values:- ARRAY_FILTER_USE_BOTH OR ARRAY_FILTER_USE_KEY

        return $getPost;
    }

    public static function postComment($id)
    {
        $client = new Client();
        $comments =  $client->get(env('API_URL'). 'comments')->getBody();

        $comments = json_decode($comments, true);

        $getComments = array_filter($comments,function($v,$k) use ($id) {
            return $v['postId'] == $id;
        },ARRAY_FILTER_USE_BOTH); // With latest PHP third parameter is optional.. Available Values:- ARRAY_FILTER_USE_BOTH OR ARRAY_FILTER_USE_KEY

        return $getComments;
    }



}
