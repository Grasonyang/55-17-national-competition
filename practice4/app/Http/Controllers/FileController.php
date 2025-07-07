<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;
use App\Services\Parse;
class FileController extends Controller
{
    public function index($path = '/'){
        $path = ltrim($path, '/');
        $relativePath = 'content-pages/'.$path;
        $fullPath = base_path($relativePath);
        // dd($fullPath);
        if(is_dir($fullPath)){
            $files = collect(File::files($fullPath))
                ->map(fn($file)=>$file->getFilename())
                ->filter(function($file){
                    if(preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}/',$file,$match)){
                        $match = $match[0];
                        $today = Carbon::today();
                        $date = Carbon::parse($match);
                        return $date<= $today;
                    }else{
                        return false;
                    }
                })
                ->sortByDesc(fn($file)=>substr($file, 0 ,10))
                ->map(function($file) use ($fullPath) {
                    $result = Parse::getContent($fullPath . '/' . $file);
                    return $result;
                    // return [
                    //     'name' => $file,
                    //     'date' => substr($file, 0, 10),
                    //     'path' => $file
                    // ];
                })->values();
            $folders = collect(File::directories($fullPath))
                ->map(fn ($folder) =>basename($folder))
                ->sort()
                ->values();
            // dd(Parse::getBread($path));
            return view('home',[
                'folders'=> $folders,
                'files'=> $files,
                'path'=>Parse::getBread($path),
                'currentFolderName'=>basename($path),
                'currentPath'=>$path,
            ]);
        }else{
            dd(1);
        }
    }
}
