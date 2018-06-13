<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;
use App\Gallery;
use App\Http\Requests\Controllers


class CommentsController extends Controller
{
    public function store(CommentRequest $request, $gallery_id){
    	$user = User::all()->first();
    	$gallery = Gallery::find($gallery_id);

    	$commnet->owner_id=$user->$id;
    	$commnet->gallery_id=$gallery_id;
    	$commnet->body=$request->input('body');
    	$commnet->save();
    	$commnet->owner=$user;
    	$commnet->gallery=$gallery;
    	$commnet->with('owner');

    	return $commnet;
    }

    public function destroy($id){
    	$comment=Comment::find($id);
    	$comment=delete();

    	return['success'=>true];
    }
}
