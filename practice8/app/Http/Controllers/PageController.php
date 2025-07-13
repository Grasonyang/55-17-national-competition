<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;
use App\Services\Parse;
class PageController extends Controller
{
    public function index($path = '/'){
        $path = trim($path, '\\');
        $rePath = "content-pages/".trim($path,'/');
        $fullPath = base_path($rePath);
        // is_dir
        if(!preg_match('/[0-9]{4}-[0-9]{2}-[0-9]{2}-/',basename($fullPath))){
            // folder
            $breads = $this->getBread($path);
            $folders = $this->getFolders($fullPath);
            $files = $this->getFiles($fullPath);
            // dd($files);
            return view('home',[
                "curentFolderName"=>basename($path),
                "breads"=>$breads,
                "folders"=>$folders,
                "files"=>$files,
            ]);
        }else{
            // file
            // dd();
            $info = pathinfo($fullPath);
            $files = $this->getSpecialFiles($info);
            return view('page',["file"=>$files[0]]);
        }
    }
    public function getFolders($fullPath){
        return collect(File::directories($fullPath))
            ->map(function($path){
                $base = base_path("content-pages");
                
                $relativePath = str_replace($base,'',$path);
                $relativePath = str_replace('\\', '/', $relativePath);
                return [
                    "show"=>basename($relativePath),
                    "path"=>trim($relativePath,'/'),
                ];
            })
            ->values();
    }
    public function getFiles($fullPath){
        return collect(File::files($fullPath))
            ->filter(fn($file)=>preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}-/', $file->getFilename(),$match))
            ->filter(function($file){
                preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}/', $file->getFilename(),$match);
                $date = Carbon::parse($match[0]);
                $today = Carbon::today();
                return $date<=$today;
            })
            ->map(function($file) use ($fullPath){
                $base = base_path('content-pages');
                $path = str_replace($base, '', $file->getPathname());
                $path = str_replace('\\', '/', $path);
                $fileinfo = pathinfo($file->getFilename());
                return[
                    "show"=>$fileinfo['filename'],
                    "path"=>trim(str_replace(".$fileinfo[extension]",'',$path),'/'),
                    "info"=>Parse::getContent($file->getPathname())
                ];
            })
            ->filter(fn($file)=>!$file['info']['draft'])
            ->values();
    }
    public function getSpecialFiles($info){
        $fullPath = $info['dirname'];
        return collect(File::files($fullPath))
            ->filter(fn($file)=>preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}-/', $file->getFilename(),$match))
            ->filter(function($file){
                preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}/', $file->getFilename(),$match);
                $date = Carbon::parse($match[0]);
                $today = Carbon::today();
                return $date<=$today;
            })
            ->map(function($file) use ($fullPath){
                $base = base_path('content-pages');
                $path = str_replace($base, '', $file->getPathname());
                $path = str_replace('\\', '/', $path);
                $fileinfo = pathinfo($file->getFilename());
                return[
                    "show"=>$fileinfo['filename'],
                    "path"=>str_replace(".$fileinfo[extension]",'',$path),
                    "info"=>Parse::getContent($file->getPathname())
                ];
            })
            ->filter(fn($file)=>!$file['info']['draft'])
            ->filter(fn($file)=>$file['show']===$info['filename'])
            ->values();
    }
    public function getAllFiles(){
        $fullPath=base_path('content-pages');
        return collect(File::allFiles($fullPath))
            ->filter(fn($file)=>preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}-/', $file->getFilename(),$match))
            ->filter(function($file){
                preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}/', $file->getFilename(),$match);
                $date = Carbon::parse($match[0]);
                $today = Carbon::today();
                return $date<=$today;
            })
            ->map(function($file) use ($fullPath){
                $base = base_path('content-pages');
                $path = str_replace($base, '', $file->getPathname());
                $path = str_replace('\\', '/', $path);
                $fileinfo = pathinfo($file->getFilename());
                return[
                    "show"=>$fileinfo['filename'],
                    "path"=>str_replace(".$fileinfo[extension]",'',$path),
                    "info"=>Parse::getContent($file->getPathname())
                ];
            })
            ->filter(fn($file)=>!$file['info']['draft'])
            ->values();
    }
    public function getBread($path){
        // input: relative path
        // output: breads
        //  - show
        //  - path
        $base = '';
        $paths = explode('/',trim($path,'/'));
        $breads = [];
        foreach($paths as $cpath){
            $base = trim($base, '/').'/'.trim($cpath, '/');
            $breads[]=[
                "show"=>$cpath,
                "path"=>trim($base,'/'),
            ];
        }
        // dd($breads);
        return $breads;
    }
    public function tags($tags=''){
        $files = $this->getAllFiles();
        $alltags = Parse::getAllTags();
        // dd($files,$alltags);
        $tags = explode('/',$tags);
        $tags = array_map('trim', $tags);
        $tags = array_unique($tags);
        $result = [];
        foreach($tags as $tag){
            $filePaths = $alltags[$tag] ?? [];
            foreach($filePaths as $filePath){
                $file = collect($files)->firstWhere('path', $filePath);
                if($file){
                    $result[$tag][] = $file;
                } else {
                    $result[$tag][] = null;
                }
            }
        }
        dd($files,$result, $tags, $alltags);
    }
    public function search($search = ''){
        $files = $this->getAllFiles();
        $searchs = explode('/',$search);
        $searchs = array_map('trim', $searchs);
        $searchs = array_unique($searchs);
        foreach($searchs as $search){
            $files =collect($files)
                ->filter(function($file) use ($search){

                })
                ->values();
        }
    }
}
