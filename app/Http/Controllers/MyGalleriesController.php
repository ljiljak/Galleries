<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Gallery;

class MyGalleriesController extends Controller
{
    public function index($page=1, $term = ''){
    	$user=User::all()->first();

    	return Gallery::search(($page - 1) * 10, 10, $term, $user);

    }
}
