<?php

class PostController extends AdminController
{

    /**
     * @return $this
     * List all the posts
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        return View::make('posts.index')->with('posts', $posts);
    }

    /**
     * @return \Illuminate\View\View
     * Display the create post form
     */

    public function create()
    {
        return View::make('posts.create');
    }

    /**
     * @return $this|\Illuminate\Http\RedirectResponse
     * Store the post in the database
     */
    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, Post::$rules);
        if ($v->passes()) {
            $post = new Post();
            $post->title = Input::get('title');
            $post->body = Input::get('body');
            $post->m_keyw = Input::get('m_keyw');
            $post->m_desc = Input::get('m_desc');
            $post->slug = Str::slug(Input::get('title'));
            $post->user_id = Auth::user()->id;
            $post->save();

            return Redirect::route('posts.index');
        }


        return Redirect::back()->withErrors($v);
    }


    public function show($id)
    {
        $post = Post::find($id);
        $date = $post->created_at;
        setlocale(LC_TIME, 'Bangladesh/Dhaka');
        $date = $date->formatlocalized('%A %D %B %Y');
        return View::make('posts.show')->with('post', $id)->with('date', $date);
    }


    public function edit($id)
    {
        $post = Post::find($id);
        if (is_null($post)) {
            return Redirect::route('posts.index');
        }
        return View::make('posts.edit')->with('post', $post);
    }


    /**
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     * Update the post
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');

        $v = validator::make($input, Post::$rules);
        if ($v->passes()) {
            Post::find($id)->update($input);
            return Redirect::route('posts.index');
        }
        return Redirect::back()->withErrors($v);
    }


    /**
     * @param $id
     * Let's delete the post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return Redirect::route('posts.index');
    }


}