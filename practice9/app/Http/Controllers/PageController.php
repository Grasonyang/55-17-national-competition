<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\Parse;
use Illuminate\Support\Carbon;
class PageController extends Controller
{
    public function index($path = '/'){
        $path = Parse::regPath($path);
        $path = "content-pages/".trim($path,'/');
        $basename = basename($path);
        if(!preg_match('/[0-9]{4}-[0-9]{2}-[0-9]{2}/',$basename,$match)){
            // folder
            $breads = $this->getBreads($path);
            $files = $this->getFiles($path);
            $folders = $this->getFolders($path);
            dd($breads, $files,$folders);
            return view('home',[
                "breads"=>$breads,
                "files"=>$files,
                "folders"=>$folders,
            ]);
        }else{
            // file
        }
    }
    public function getBreads($path){
        $path =str_replace("content-pages",'',$path);
        $path = trim($path,'/');
        $base = '';
        $paths = explode('/',$path);
        $breads= [];
        foreach($paths as $path){
            $base= trim($base,'/')."/" . trim($path,'/');
            $breads[]=[
                "show"=>$path,
                "path"=>$base,
            ];
        }
        return $breads;
    }
    public function getFiles($path){
        return collect(File::files(base_path($path)))
        ->filter(fn($file)=>preg_match('/[0-9]{4}-[0-9]{2}-[0-9]{2}-/',$file->getFilename(),$match))
        ->filter(function($file){
            preg_match('/[0-9]{4}-[0-9]{2}-[0-9]{2}/',$file->getFilename(),$match);
            $date = Carbon::parse($match[0]);
            $today= Carbon::today();
            return $date<=$today;
        })
        ->map(function($file){
            $filepath = Parse::regPath($file->getPathname());
            $base = Parse::regPath(base_path('content-pages'));
            $filepath = str_replace($base,'',$filepath);
            $filepath = trim($filepath,'/');
            preg_match('/[0-9]{4}-[0-9]{2}-[0-9]{2}/',$file->getFilename(),$match);
            return [
                "time"=>Carbon::parse($match[0]),
                "show"=>$file->getFilename(),
                "path"=>$filepath,
                "info"=>Parse::getContent($file->getPathname())
            ];
        })
        ->filter(fn($file)=>!$file['info']['draft'])
        ->sortByDesc(fn($file)=>$file['time'])
        ->values();
    }
    public function getFolders($path){
        return collect(File::directories(base_path($path)))
        ->map(function($folder){
            $filepath = Parse::regPath($folder);
            $base = Parse::regPath(base_path('content-pages'));
            $filepath = str_replace($base,'',$filepath);
            $filepath = trim($filepath,'/');
            return [
                "show"=>basename($folder),
                "path"=>$filepath,
            ];
        })
        ->values();
    }
    public function tags(){
        
    }
}
