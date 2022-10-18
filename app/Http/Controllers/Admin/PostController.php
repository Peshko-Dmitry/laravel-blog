<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','DESC')->paginate(7);
        // dd($posts)
        return view('admin.posts.index',[
            'posts'=>$posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {

        $data =[
            'title'=>$request->title,
            'preview'=>$request->preview,
            'description'=>$request->description,
            'author'=>$request->author,

        ];

        if($request->has('thumbnail')){
            $thumbnail = str_replace('public/posts/', "", $request->file('thumbnail')->store('public/posts'));
            $data['thumbnail'] = $thumbnail;
        }
        
        if($request->slider === null){
            $data['slider'] = 0;
        }else{
            $data['slider'] = 1;
        }
        
        
        $post = Post::create($data);
        return redirect(route('admin.posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $post = Post::findOrFail($id);
        // return view('admin.posts.post',[
        //     'post'=>$post,
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.post',[
            'post'=>$post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {

    }
    public function edit_process(UpdateRequest $request, $id)
    {
        $post= Post::findOrFail($id);
        // dd($request->title);
        $data = $request->validated();
        $data =[
            'title'=>$request->title,
            'preview'=>$request->preview,
            'description'=>$request->description,
            'author'=>$request->author,

        ];

        if($request->has('thumbnail')){

            $thumbnail = str_replace('public/posts/', "", $request->file('thumbnail')->store('public/posts'));
            
            $data['thumbnail'] = $thumbnail;
        }
        if($request->slider === null){
            $data['slider'] = 0;
        }else{
            $data['slider'] = 1;
        }
        
        $post->update($data);
        return redirect(route('admin.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        
        return redirect(route('admin.posts.index'));

    }
}
