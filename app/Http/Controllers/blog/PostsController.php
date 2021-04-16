<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
     public function show(Post $post){
         return view('blog.show',['post'=>$post]);
     }

     public function category(Category $category, Request $request){

         return view('blog.category',
         ['category' => $category,
         'posts' => $category->posts()->Paginate(4),
         'tags' => Tag::all(),'categories' => Category::all()]);
     }
     public function tag(Tag $tag,Request $request)
     {

    $search = ($request->query('term'));
     
         return view('blog.tag',['tag' => $tag,'posts' => $tag->posts()->simplePaginate(1),
         'tags' => Tag::all(),'categories' => Category::all()]);
     }
}
