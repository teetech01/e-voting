<?php

namespace App\Http\Controllers;

use App\PoliticalPost;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = PoliticalPost::with('candidates')->get();
        return view('votes.index', compact('posts'));
    }
}
