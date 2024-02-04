<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\AddArticleReques;


class ArticleController extends Controller
{
    public function index(){
        return view("Bikester");
    }

}
