<?php

namespace App\Http\Controllers;

use App\Mail\BlogPosted;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::check()){
            return redirect('login');
        }
        $post = Post::Active()
                    // ->withTrashed()
                    ->get();
        $view_data = [  
            'Title' => "ini postingan.",
            'lists'=>['list1','list2','list3','list4'],
            'posts'=>$post
        ];
        // . ->path folder
        return view('posts.index',$view_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::check()){
            return redirect('login');
        }
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::check()){
            return redirect('login');
        }
        $title = $request->input('title');
        $content = $request->input('content');

        Post::create([
            'title' => $title,
            'content' => $content,
        ]);

        \Mail::to('aafattahh@gmail.com')->send(new BlogPosted());

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Auth::check()){
            return redirect('login');
        }  
      $selected_post = Post::where('id','=',$id)->first();
      $comment = $selected_post->comments()->get();
      $total_Comments = $selected_post->total_comments();
        $view_data = [
            'post' => $selected_post,
            'comments'=>$comment,
            'totCom' => $total_Comments
        ];
        return view('posts.show',$view_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::check()){
            return redirect('login');
        }
        $selected_post =  Post::where('id','=',$id)
                ->first();
        $view_data = [
            'post' => $selected_post
        ];
        return view('posts.edit',$view_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!Auth::check()){
            return redirect('login');
        }
        $title = $request->input('title');
        $content = $request->input('content');

        Post::where('id',$id)
            ->update([
                'title' => $title,
                'content' => $content,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            
            return redirect("posts/$id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::check()){
            return redirect('login');
        }
        Post::where('id',$id)
            ->delete();

        return redirect('posts');
    }
}
