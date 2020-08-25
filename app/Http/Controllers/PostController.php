<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function index(){
        $posts = DB::table('post')->get();
        echo json_encode($posts);
    }

    public function getPostbyid(Request $request)
    {
        $id = $request->input('id');
        $posts = DB::table('post')
        ->where('post_id', '=', $id)
        ->get();
        echo json_encode($posts);
    }

    public function postMessage(Request $request){
        $message = $request->input('message');
        $query = DB::table('post')->insert(['message' => $message]);
        $status = array(
            "status" => "OK"
        );
        echo json_encode($status);
    }
}
