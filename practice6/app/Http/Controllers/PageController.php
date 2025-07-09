<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;
use App\Services\Parse;
class PageController extends Controller
{
    public function index($path = null){
        $sourcePath = base_path('content-pages/images');
        $desPath = public_path('images');
        
        if(!File::exists($desPath)){
            File::makeDirectory($desPath, 0755, true);
        }
        
        if(File::exists($sourcePath)){
            File::copyDirectory($sourcePath, $desPath);
        }
        $relativePath = 'content-pages/'.trim($path,'/');
        $fullPath = base_path($relativePath);
        $info = pathinfo($fullPath);
        if(!isset($info['extension'])){
            // folder
            $breads = $this->getBread($path,$relativePath,$fullPath,$info);
            $folders = $this->getFolders($path,$relativePath,$fullPath,$info);
            $files = $this->getFiles($path,$relativePath,$fullPath,$info);
            return view('home',[
                'currentPath'=>basename($path),
                'breads'=>$breads,
                'folders'=>$folders,
                'files'=>$files,
            ]);
        }else{
            // file
            $info = pathinfo($path);
            // dd(Parse::getContent($info['dirname'],base_path('content-pages/'.trim($path,'/')),$info['extension']));
            return view('page',[
                "show"=>basename($path),
                "path"=>$path,
                "info"=>Parse::getContent($info['dirname'],base_path('content-pages/'.trim($path,'/')),$info['extension'])
            ]);
        }
    }
    public function getBread($path,$relativePath,$fullPath,$info){
        $base = '';
        $paths = explode('/',trim($path,'/'));
        $breads = [];
        foreach($paths as $path){
            $base = trim($base,'/').'/'.trim($path,'/');
            $breads[$path]=[
                "show"=>$path,
                "path"=>$base
            ];
        }
        return $breads;
    }
    public function getFolders($path,$relativePath,$fullPath,$info){
        $folders = collect(File::directories($fullPath))
        ->map(function($folder) use ($path){
            $folder = basename($folder);
            return [
                "show"=>$folder,
                "path"=>trim($path, '/').'/'.trim($folder, '/')
            ];
        })
        ->sort()
        ->values();
        return $folders;
    }
    public function getFiles($path,$relativePath,$fullPath,$info){
        $files = collect(File::files($fullPath))
        ->map(fn($file)=>$file->getFilename())
        ->filter(fn($file)=>preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}-/', $file, $match))
        ->filter(function($file){
            $filename = basename($file);
            preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}/', $filename, $match);
            $date = $match[0];
            $today = Carbon::today();
            return $date <= $today;
        })
        ->map(function($file) use($path,$relativePath,$fullPath){
            $extension = pathinfo($file,PATHINFO_EXTENSION);
            return [
                "show"=>$file,
                "path"=> trim($path,'/').'/'.trim($file,'/'),
                "info"=>Parse::getContent($path, trim($fullPath,'/').'/'.trim($file,'/'), $extension)
            ];
        })
        ->filter(fn($file)=>$file['info']['draft']===false)
        ->sort()
        ->values();
        return $files;
    }
    
    public function tags($tag = ''){
        // dd();
        $tags = Parse::getAllTags();
        $tag = explode('/',$tag);
        $tag = array_unique($tag);
        $tag = array_map('trim',$tag);
        $alltags=[];
        foreach($tag as $thetag){
            if(isset($tags[$thetag])){
                $alltags[$thetag] = $tags[$thetag];
            }else{
                $alltags[$thetag] = [];
            }
        }
        // dd($alltags);
        return view('tags',[
            'currentTag'=>$tag,
            'tags'=>$alltags,
        ]);
    }
    public function search($part = null){

    }
    
}
