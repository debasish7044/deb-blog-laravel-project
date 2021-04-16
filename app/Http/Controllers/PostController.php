<?php

namespace App\Http\Controllers;

use App\Http\Requests\posts\PostRequest;
use App\Http\Requests\posts\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class PostController extends Controller
{


    public function __construct()
    {
      $this->middleware('verifyCategoriesCount')->only(['create','store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $user = auth()->user();

         $user = User::first();

         $posts = $user->posts()->paginate(4);     

        return view('posts.index',compact('user','posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('posts.create',['categories' => Category::all(),'tags' => Tag::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

       $image = $request->image->store('posts');

       $post =   Post::create([
           'title' => $request->title,
           'description' => $request->description,
           'content' => $request->content,
           'image' => $image,
           'publish_at' => $request->publish_at,
           'category_id' => $request->category,
           'user_id' => auth()->user()->id,
           
        ]);

        // assigning tags value to belongsToMany tags method
        if ($request->tags) {
           $post->tags()->attach($request->tags);
        }

       return redirect('/posts')->with('success', 'Post has been created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Post $post)

    {
         $user = auth()->user();
         if($user->id == $post->user_id){
           return view('posts.create',['post' => $post,'categories' => Category::all(),'tags' => Tag::all()]);
         }
         
         return redirect('/posts')->with('error', 'You are not a authorized to edit this post');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request,Post $post)
    {

      $data = $request->only(['title','description','publish_at','content','category_id']);

        if($request->hasFile('image')){
            $image =  $request->image->store('posts');
            $post->deleteImage($post->image);
            $data['image'] = $image;
        }

        if($request->tags){
            $post->tags()->sync($request->tags);
        }

         $post->update($data);

         return redirect('/posts')->with('success', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $post = Post::withTrashed()
        ->where('id', $id)
        ->firstOrFail();

       if ($post->trashed()) {
           $post->deleteImage($post->image);
           $post->forceDelete();
       }else{
           $post->delete();
       }

        return redirect('/trashed-posts')->with('success', 'Post has been deleted');

    }
    /**
     * Remove softDelete Post from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
         $trashed = Post::onlyTrashed()->paginate(4);
          
        //  $trashedPosts = $trashed->Paginate(4);
 
         return view('posts.index',['posts' => $trashed]);

    }
    /**
     * Restoring softDelete Post from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trashedStore($id)
    {
         Post::withTrashed()
                ->where('id', $id)
                ->restore();

        return redirect('/trashed-posts')->with('success', 'Post has restored');

    }

     public function upload(Request $request) {    
        if($request->hasFile('upload')) {
                    $originName = $request->file('upload')->getClientOriginalName();
                    $fileName = pathinfo($originName, PATHINFO_FILENAME);
                    $extension = $request->file('upload')->getClientOriginalExtension();
                    $fileName = $fileName.'_'.time().'.'.$extension;
                
                    $request->file('upload')->move(public_path('images'), $fileName);
        
                    $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                    $url = asset('images/'.$fileName); 
                    $msg = 'Image uploaded successfully'; 
                    $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
                    
                    @header('Content-type: text/html; charset=utf-8'); 
                    echo $response;
                }
            }  
}
