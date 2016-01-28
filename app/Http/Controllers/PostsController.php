<?php

namespace App\Http\Controllers;

use App\Post;
use App\Transformers\PostTransformer;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class PostsController extends ApiController
{
    protected $postTransformer;

    public function __construct(PostTransformer $postTransformer)
    {
//        $this->middleware('auth', ['except' => ['show', 'index']]);
        $this->postTransformer = $postTransformer;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $limit = Input::get('limit') ?: 5;
        $posts = Post::latest('published_at')->paginate($limit);
//        dd(get_class_methods($posts));
        return $this->respond([
            'data' => $this->postTransformer->transformCollection($posts->all()),
            'paginator' => [
                'total_count' => $posts->total(),
                'current_page' => $posts->currentPage(),
                'total_pages' => ceil( $posts->total()/$posts->perPage() ),
                'limit'=>$posts->perPage()
            ]


        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        if ($post) {
            return $this->respond([
                'data' => $this->postTransformer->transform($post)
            ]);
        } else {
            return $this->respondNotFound('Post does not found!');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
