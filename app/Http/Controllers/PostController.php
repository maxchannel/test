<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Taggable;
use App\Http\Requests\NewPostRequest;
use App\Http\Requests\EditPostRequest;

class PostController extends Controller
{
	public function create()
	{
		return view('add.post');
	}

	public function store(NewPostRequest $request)
	{
		$post = new Post;
		$post->fill($request->all());
		$post->user_id = \Auth::user()->id;
		$post->slug = str_slug($request->input('title'));
		$post->save();

		$tag = new Tag;
		$tag->name = $request->input('tag');
		$tag->save();

		$taggable = new Taggable;
		$taggable->tag_id = $tag->id;
		$taggable->taggable_id = $post->id;
		$taggable->taggable_type = 'App\Post';
		$taggable->save();

		return \Redirect::back()->with('message', 'Creado con éxito')
		->with('vista_id', $post->id)->with('slug', $post->slug);
	}

	public function show($id)
	{
		$post = Post::find($id);

		return view('show.post', compact('post'));
	}

	public function edit($id)
	{
    	$post = Post::find($id);
        $this->notFoundUnless($post);

        return view('edit.post', compact('post'));
    }

	public function update($id, EditPostRequest $request)
	{
        $post = Post::find($id);
        $post->fill($request->all());
		$post->save();

        return \Redirect::back()->with('message', 'Editado con éxito');
    }

	public function destroy($id)
	{
		//
	}

}
