<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\User;

class AuthorGalleriesController extends Controller
{
    public function index($id, $page = 1, $term = ''){
    	$user = User::all()->find($id);

    	return Gallery::search(($page - 1) * 10, 10, $term, $user);
    }
}
