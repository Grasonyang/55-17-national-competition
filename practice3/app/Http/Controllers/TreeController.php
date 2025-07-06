<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Tree;
class TreeController extends Controller
{
    public $map = null;

    public function __construct(Tree $tree){
        $this->map = $tree->map;
    }
    public function index($path = ''){
        if($path==""){
            $relativePath = '/'.$path;
        }else{
            $relativePath = '/'.$path."/";
        }
        // dd($this->map, $relativePath);
        if(isset($this->map[$relativePath])){
            $info = pathinfo($path,PATHINFO_EXTENSION);
            // dd($info);
            if($info!==""){
                // file
                return view('page', [
                    "title"=>$this->map[$relativePath]['title'],
                    "tags"=>$this->map[$relativePath]['tags'],
                    "draft"=>$this->map[$relativePath]['draft'],
                    "summary"=>$this->map[$relativePath]['summary'],
                    "cover"=>$this->map[$relativePath]['cover'],
                    "content"=>$this->map[$relativePath]['content'],
                ]);
            }else{
                // folder
                $bread = explode('/',$relativePath);
                $bread = array_filter($bread);
                $breads = [];
                $now = '/';
                foreach($bread as $item){
                    $breads[] = [
                        "show"=>$item,
                        "path"=>ltrim($now.$item, '/')
                    ];
                    $now.=$item.'/';
                }
                // dd($breads);
                return view('home', [
                    "breads"=>$breads,
                    "basePath"=> ltrim($relativePath, '/'),
                    "folders"=>$this->map[$relativePath]['folders'] ?? [],
                    "files"=>$this->map[$relativePath]['files'] ?? [],
                ]);
            }
        }else{
            abort('404', "Cant Find this Folder");
        }
    }
    
}
