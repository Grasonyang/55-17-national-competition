<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\Parse;
use Illuminate\Support\Carbon;
class SearchController extends Controller
{
    public function root(Request $request, $path = '/'){
        $relativePath = 'content-pages'.'/'.trim($path,'/');
        $fullPath = base_path($relativePath);
        $extension = pathinfo($fullPath, PATHINFO_EXTENSION);
        if(!$extension){
            // folder
            // - bread > show and path
            // - current dir name
            // - folders
            // - files
            $breads = $this->getBread($path);
            $dirName = basename($path);
            $folders = $this->getFolders($path, $fullPath);
            // dd($breads, $dirName ,$folders);
            $files = $this->getFiles($path, $fullPath);
            
        }else{
            // file
        }
    }
    public function getBread($path){
        if($path=='/')
            return [
                "show"=>'/',
                "path"=>'/',
            ];
        $paths = explode('/',$path);
        $base = '';
        $breads = [];
        foreach($paths as $path){
            $base .= '/'.trim($path, '/');
            $breads[]=[
                "show"=>$path,
                "path"=>$base
            ];
        }
        return $breads;
    }
    public function getFolders($path, $fullPath){
        $folders = collect(File::directories($fullPath))
        ->sort()
        ->map(function($folder) use ($path){
            return [
                "show"=>basename($folder),
                "path"=>trim($path,'/').'/'.basename($folder)
            ];
        })
        ->values();
        return $folders;
    }
    public function getFiles($path, $fullPath){
        $files = collect(File::files($fullPath))
        ->map(fn($file)=>$file->getFilename())
        ->filter(fn($name)=>preg_match('/[0-9]{4}-[0-9]{2}-[0-9]{2}-/',$name,$match))
        ->filter(function($name){
            $name = pathinfo($name,PATHINFO_FILENAME);
            $date = Carbon::parse(substr($name,0,10));
            $today = Carbon::today();
            return $date<=$today;
        })
        ->map(function($name) use ($path, $fullPath){
            $name1=$name;
            $name = pathinfo($name,PATHINFO_FILENAME);
            $type = pathinfo($name1,PATHINFO_EXTENSION);
            // dd($path,$fullPath."/".trim($name1),$name,$type);
            return [
                "path"=>$path."/".trim($name1,'/'),
                "name"=>$name,
                "info"=>Parse::getContent($path,$fullPath."/".trim($name1),$name,$type),
            ];
        })
        ->values();
        dd($files);
        return $files;
    }
    public function tags(Request $request, $tags = null){
        
    }
    public function search(Request $request, $keywords = null){
        
    }
}
