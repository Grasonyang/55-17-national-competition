<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\Parse;
class PageController extends Controller
{
    public function index($path='/'){
//        dd(pathinfo($path,PATHINFO_EXTENSION));
        if(pathinfo($path,PATHINFO_EXTENSION)==""){
            Parse::getCopy();
            $breads = Parse::getBread($path);
            $folders = Parse::getFolders($path);
            $files = Parse::getFiles($path);
            dd($breads, $folders, $files);
        }
        else{}
    }
    public function tags($tags = ''){
        if($tags == ''){
            $tags = Parse::getAllTags('/',[]);
            return $tags;
        }else{
            $tags = explode('/',$tags);
            $tags = array_map('trim',$tags);
            $tags = array_unique($tags);
            $tags = Parse::getAllTags('/',$tags);
            return $tags;
        }


    }
    public function search($keywords = ''){}

}
