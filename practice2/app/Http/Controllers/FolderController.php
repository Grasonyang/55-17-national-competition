<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FileReader;
use App\Services\Parse;
class FolderController extends Controller
{
    protected $reader = null;
    protected $tree = null;
    public function __construct(FileReader $reader){
        $this->reader = $reader;
        $this->reader->getTree('content-pages');
        $this->tree = $this->reader->tree;
        dd($this->tree);
    }
    public function index($path = ''){
        // $path = strtolower($path);
        // dd($path);
        // $path=str_replace('content-pages','',$path);
        // dd($path);
        if($path==''){
            $currentFolderPath = "content-pages/";
        }else{
            $currentFolderPath = strtolower($path)."/";
        }
        // dd($currentFolderPath);
        if($this->tree[$currentFolderPath]!==null){
            if($this->tree[$currentFolderPath]['folders']!==null){
                $keys = explode('/',$currentFolderPath);
                $keypath="";
                for($i=0;$i<count($keys);$i++){
                    $keys[$i]=[
                        'name'=>$keys[$i],
                        'path'=>$keypath.$keys[$i]."/"
                    ];
                    $keypath = $keys[$i]['path'];
                }
                // dd($keys);
                return view('home',[
                    'key'=>$keys,
                    'name'=>$path,
                    "folders"=>$this->tree[$currentFolderPath]['folders'],
                    "files"=>$this->tree[$currentFolderPath]['files'],
                ]);
            }else{
                $filename = pathinfo($currentFolderPath)['filename'];
                return view('page',[
                    'name'=>$filename,
                    "title"=>$this->tree[$currentFolderPath]['title'],
                    "tags"=>$this->tree[$currentFolderPath]['tags'],
                    "cover"=>$this->tree[$currentFolderPath]['cover'],
                    "summary"=>$this->tree[$currentFolderPath]['summary'],
                    "draft"=>$this->tree[$currentFolderPath]['draft'],
                    "content"=>$this->tree[$currentFolderPath]['content'],
                ]);
            }
        }else{
            abort(404, "Wrong Path, not found");
        }
    }
}
