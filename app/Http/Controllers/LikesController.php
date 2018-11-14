<?php

namespace App\Http\Controllers;

use App\Likes;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $post
     * @param  \Illuminate\Http\Request  $type
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post, $type)
    {
        //


        $post_id = $post->id;
        $user_id = Auth::user()->id;

        if($post->likes->where('user_id',$user_id)->where('type',$type)->count() > 0)
        {
            //duplicate
            return redirect()->route('posts.index');

        }
       else if($post->likes->where('user_id',$user_id)->where('type','!=',$type)->count() > 0)
        {
            // invert record
            $post->likes->where('user_id',$user_id)->where('type','!=',$type)->first()->delete();

            Likes::create([
                'user_id'=>$user_id,
                'post_id' =>$post_id,
                'type' => $type
            ]);
            if ($this->isLike($type)){
                $post->dislikes_counter --;
            }else{
                $post->likes_counter--;
            }


        }else{
            // new record
        Likes::create([
            'user_id'=>$user_id,
            'post_id' =>$post_id,
            'type' => $type
        ]);

        }
        if ($this->isLike($type)){
            $post->likes_counter++;
        }else{
            $post->dislikes_counter++;
        }

        $post->save();

        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Likes  $likesDisLikes
     * @return \Illuminate\Http\Response
     */
    public function show(Likes $likesDisLikes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Likes  $likesDisLikes
     * @return \Illuminate\Http\Response
     */
    public function edit(Likes $likesDisLikes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Likes  $likesDisLikes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Likes $likesDisLikes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Likes  $likesDisLikes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Likes $likesDisLikes)
    {
        //
    }
    //helpers
    public function isLike(int $type){
        if($type == 1){
            return true;
        }else{
            return false;
        }
    }
}
