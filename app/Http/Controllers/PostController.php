<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class PostController extends Controller
{
    // List Post
    public function list() {
        $this->authorize('viewAny', Post::class);
        $post_list = Post::all();
        return view('admin.post_list')->with('post_list', $post_list);
    }
    // Create Post
    public function add () {
        $this->authorize('create', Post::class);
        $post_all = User::all();
        return view('admin.post_add')->with('post_all', $post_all);
    }

    public function store (Request $request) {
        $post = new Post;

        $post->title = $request->txtTitle;
        $post->content = $request->txtContent;
        $post->user_id = $request->listUser;
        $post->status = $request->listStatus;
    
        if ($request->hasFile('imgPost')) {
            $file = $request->file('imgPost');
            $name_image = time().'.'.$file->getClientOriginalName();
            $file->move('upload/post', $name_image);
            $post->image = $name_image;
            $post->save();
            return redirect('/post/list')->withSuccess( 'Create successful !' );

        } else {
            $post->image = null;
            $post->save();
            return redirect('/post/list')->withSuccess( 'Create successful !' );
        }
    }
    // Detail Post
    public function show ($id) {
        $this->authorize('view', Post::class);
        $post_detail = Post::where('id', $id)->get();
        return view('admin.post_detail')->with('post_detail', $post_detail);
    }
    // Edit Post
    public function edit ($id) {
        $this->authorize('update', Post::class);
        $post_data = Post::where('id', $id)->get();
        $user_data = User::all();
        return view('admin.post_edit', compact('post_data', 'user_data'));
    }
    public function update (Request $request, $id) {
        $post = Post::find($id);

        $post->title = $request->txtTitle;
        $post->content = $request->txtContent;
        $post->user_id = $request->listUser;
        $post->status = $request->listStatus;
    
        if (isset($request->image)) {
            $image = $request->image; 
        } elseif ($request->hasFile('imgPost')) {
                $path = public_path().'/upload/post/';

                if($post->image != ''  && $post->image != null){
                    $file_old = $path.$post->image;
                    unlink($file_old);
                }
                $file = $request->file('imgPost');
                $image = time().'.'.$file->getClientOriginalName();
                $file->move('upload/post', $image);
                $post->image = $image;
        }
        $post->save();
        return redirect('/post/list')->withSuccess( 'Update Post Successful !' );
    }
    // Delete Post
    public function delete($id) {
        $this->authorize('delete', Post::class);
        Post::where('id', $id)->delete();
        return redirect('/post/list')->withSuccess('Delete Post Successful !');
    }
}
