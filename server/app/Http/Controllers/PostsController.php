<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($status, $page){
        if($page<1) {
			return redirect('ADMIN/post/show/'.strval($status).'/1');
        }
		$posts = Post::orderBy('updated_at','desc')
			->where('status', $status)
			->skip(($page-1)*10)
			->take(10)
			->get();
		if(count($posts)==0 and $page!=1){
			$pageNum = post::where('status', $status)->count();
			$pageNum = intval(($pageNum-1)/10)+1;
			return redirect('/ADMIN/post/show/'.strval($status).'/'.strval($pageNum));
		}
		$data = array(
			'posts' => $posts,
			'status' => $status,
			'pageNum' => $page
		);
		#return $data;
		return view('postCtrl.show')->with($data);
    }
    
    public function editingSite($postID){
        $post = Post::where('id', $postID)->first();
		return view('postCtrl.edit')->with('post', $post);
    }

    public function editing(request $request){
        $request->validate([
            'id' => 'required',
            'type' => 'required',
            'img_url' => 'required',
            'sum_up' => 'required', 
            'type' => 'required',
            'primary' => 'required',
            'post' => 'required',
        ]);
        $post = Post::where('id', $request->id)->first();
        
        Post::where('id', $request->id)
			->update([
				'title' => $request->title,
				'sum_up' => $request->sum_up,
				'img_url' => $request->img_url,
				'post' => $request->post,
				'primary' => $request->primary,
				'type' => $request->type
			]);
		if($post->status==0) return redirect('/ADMIN/post/show/0/1');
		return redirect('/ADMIN/post/show/1/1');
    }

    public function CreatingSite(){
        return view("postCtrl.create");
        $post = new post;
		//******************************** SET DEFAULT VALUE ********************************\\
		$post->status = 0;//default auto post, can turn off later

		//******************************** SET REQUEST VALUE ********************************\\
		if(isset($request->title)) $post->title = $request->title;
		else $post->title = "GO ENGLISH";
		if(isset($request->sum_up)) $post->sum_up = $request->sum_up;
		else $post->sum_up = "GO ENGLISH";
		if(isset($request->img_url)) $post->img_url = $request->img_url;
		else $post->img_url = "http://localhost/goenglish/img/about/4.jpg";
		if(isset($request->post)) $post->post = $request->post;
		else $post->post = "GO ENGLISH";
		$post->primary = (int)$request->primary;
		$post->type = (int)$request->type;
		//******************************** SET TEMPORARY VALUE ********************************\\
		$post->user_id = 1;
		$post->save();
		//return $post;
		//return $post->save();
		return redirect('posts/show/0/1');
    }

    public function Creating(request $request){
        $request->validate([
            'type' => 'required',
            'img_url' => 'required',
            'sum_up' => 'required', 
            'type' => 'required',
            'primary' => 'required',
            'post' => 'required',
		]);
		$post = new post;
		$post->status = 0;//default auto post, can turn off later

		//******************************** SET REQUEST VALUE ********************************\\
		$post->title = $request->title;
		$post->sum_up = $request->sum_up;
		$post->img_url = $request->img_url;
		$post->post = $request->post;
		$post->primary = (int)$request->primary;
		$post->type = (int)$request->type;
		//******************************** SET TEMPORARY VALUE ********************************\\
		$post->user_id = Auth::user()->id;
		$post->save();
		return redirect('ADMIN/post/show/0/1');
	}
	
	public function EditingStatus($postID){
		$currStatus = Post::where('id', $postID)->first()->status;
		Post::where('id', $postID)
			->update([
				'status' => 1-$currStatus
			]);
		if($currStatus==0) return redirect('ADMIN/post/show/1/1');
		return redirect('ADMIN/post/show/0/1');
	}
    
}
