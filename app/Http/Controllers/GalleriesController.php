<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Gallery;
use App\Image;
use App\Comment;
use App\Http\Request\GalleryRequest

class GalleriesController extends Controller
{
    public function index($page=1, $term = ''){
    	return Gallery::search(($page - 1) * 10, 10, $term);
    }

    public function store(GalleryRequest $request){
    	$user=Gallery::all()->first();

    	$gallery= new Gallery();

    	$gallery->name=$request->input('name');
    	$gallery->description=$request->input('description');
    	$gallery->owner_id=$user->$id;
    	$gallery->save();

    	$imagesArray=$request->input('images');
    	$images= [];

    	foreach ($imagesArray as $image ) {
    		$newImage = new Image($image);

    		$images[] = $newImage;
    	}

    	$gallery->images()->saveMany($images);

    	return $gallery;
    }

    public function show($id){
    	return Gallery::with([
    		'images' => function($query){
    			$query->orderBy('order');
    		},
    		'comments',
    		'owner'
    	])->find($id);
    }

    public function update(Request $request, $id){
    	$gallery=Gallery::find($id);
    	$gallery->description=$request->input('description');
    	$gallery->save();

    	return $gallery;
    }

    public function destroy($id){
    	$gallery=Gallery::find($id);
    	$gallery->delete();

    	return ['success'=>true];
    }
}
