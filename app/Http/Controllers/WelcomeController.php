<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request){
      $search = Post::searched()->get();
      
 
      return view('welcome.index',['posts' => Post::searched()->Paginate(4), 
       'categories' => Category::all(),
       'tags' => Tag::all(),
       'search' => $search]);
      }
}


