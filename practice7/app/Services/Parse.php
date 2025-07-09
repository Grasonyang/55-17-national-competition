<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;
class Parse{
    public static $tags = [];
    public static function base(){ // 跟目錄
        $path = base_path('content-pages');
        $path = str_replace('\\','/',$path);
        return $path;
    }
    public static function basePath($path){ // 獲取絕對路徑
        $path = base_path('content-pages/'.trim($path, '/'));
        $path = str_replace('\\','/',$path);
        return $path;
    }
    public static function Info($path){ // 傳入絕對路徑，獲取相對路徑資料
        // full path
        $base = self::base();
        $path = str_replace($base, '', $path);
        return pathinfo($path);
    }


    public static function getBread($path){
        $base = '';
        $paths = explode('/',$path);
        foreach ($paths as $path) {
            $base = trim($base,'/').'/'.trim($path, '/');
            return [
                "show"=>$path,
                "path"=>$base
            ];
        }
    }
    public static function getFolders($path){
        $fullPath = self::basePath($path);
//        dd($fullPath);
        return collect(File::directories($fullPath))
            ->map(function($dir) use ($path){
                $filename = basename($dir);
                return [
                    "path"=>trim($path,'/').'/'.trim($filename,'/'),
                    "show"=>$filename
                ];
            })
            ->values();
    }
    public static function getFiles($path){
        $fullPath = self::basePath($path);
        return collect(File::files($fullPath))
            ->filter(function($file){
                if(preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}-/',$file->getFilename(),$match)){
                    $today = Carbon::today();
                    $date = Carbon::parse(substr($file->getFilename(),0,10));
                    return $date<=$today;
                }else{
                    return false;
                }
            })
            ->sortByDesc(function($file){
                $date = substr($file->getFilename(),0,10);
                return $date;
            })
            ->map(function($file) use ($path, $fullPath){
                return [
                    "show"=>$file->getFilename(),
                    "path"=>trim($path,'/').'/'.$file->getFilename(),
                    "info"=>self::getContent($fullPath.'/'.$file->getFilename()),
                ];
            })
            ->filter(fn($file)=>!$file['info']['draft'])
            ->values();
    }
    public static function getContent($path){
        $content = file_get_contents($path);
        $content = trim($content);
        $info = self::Info($path);
        if(preg_match('/^---(.*?)---(.*?)$/si',$content,$match)){
            $front = $match[1];
            $last = $match[2];
//            dd($front,$last);
            return [
                "title"=>self::getTitle($front,$last,$path),
                "tags"=>self::getTags($front,$path),
                "cover"=>self::getCover($front),
                "summary"=>self::getSummary($front),
                "draft"=>self::getDraft($front),
                "content"=>$info['extension']==='html'?self::getHTMLContent($last):self::getMainContent($last),
            ];
        }else{
            return [
                "title"=>"",
                "tags"=>[],
                "cover"=>"",
                "summary"=>"",
                "draft"=>true,
                "content"=>"",
            ];
        }
    }
    public static function getTitle($front,$last,$path){
        if(preg_match('/^\s*title\s*:\s*(.*?)$/mi',$front,$match)){
            return trim($match[1]);
        }else{
            if(preg_match('/<h1\s[^>]*>(.*?)</h1>/si',$last,$match)){
                return trim($match[1]);
            }else{
                $info = self::Info($path);
                $filename = $info['filename'];
                $filename = substr($filename,11);
                $filename = str_replace('-',' ',$filename);
                return $filename;
            }
        }
    }
    public static function getTags($front,$path){
        if(preg_match('/^\s*tags\s*:\s*(.*?)$/mi',$front,$match)){
            $tags = explode(',',$match[1]);
            $tags = array_map('trim',$tags);
            $tags = array_unique($tags);
            return $tags;
        }else{
            return [];
        }
    }
    public static function getCover($front){
        if(preg_match('/^\s*cover\s*:\s*(.*?)$/mi',$front,$match)){
            $img = trim($match[1]);
            $imgPath = self::basePath("public/images/$img");
            if(file_exists(($imgPath))){
                return url("public/images/$img");
            }else{
                return url("public/images/default.png");
            }
        }else{
            return "";
        }
    }
    public static function getSummary($front){
        if(preg_match('/^\s*summary\s*:\s*(.*?)$/mi',$front,$match)){
            return trim($match[1]);
        }else{
            return "";
        }
    }
    public static function getDraft($front){
        if(preg_match('/^\s*draft\s*:\s*(.*?)$/mi',$front,$match)){

            $draft = strtolower(trim($match[1]));
            return $draft==='true';
        }else{
            return false;
        }
    }
    public static function getMainContent($last){
        if(preg_match_all('/^\s*([0-9A-Aa-z-_]*.(png|jpg|jpeg))\s*$/mi',$last,$match)){
            $imgs = $match[1];
            foreach($imgs as $img){
                $img = trim($img);
                $imgPath = self::basePath("public/images/$img");
                if(file_exists(($imgPath))){
                    $imgurl=url("public/images/$img");
                    $last=str_replace($img,"<img src='$imgurl' alt='$img'>",$last);

                }else{
                    $imgurl=url("public/images/default.png");
                    $last=str_replace($img,"<img src='$imgurl' alt='$img'>",$last);
                }
            }

            return $last;
        }else{
            return $last;
        }
    }
    public static function getHTMLContent($last){
        if(preg_match_all('/"([0-9A-Aa-z-_]*.(png|jpg|jpeg))"/mi',$last,$match)){
            $imgs = $match[1];
//            dd($imgs);
            foreach($imgs as $img){
                $img = trim($img);
                $imgPath = self::basePath("public/images/$img");
                if(file_exists(($imgPath))){
                    $imgurl=url("public/images/$img");
                    $last=str_replace($img,$imgurl,$last);

                }else{
                    $imgurl=url("public/images/default.png");
                    $last=str_replace($img,$imgurl,$last);
                }
            }

            return $last;
        }else{
//            dd($match);
            return $last;
        }
    }
    public static function getCopy(){
        $source = 'content-pages/images';
        $desc = 'public/images';
        if(!file_exists(base_path($desc))){
            File::makeDirectory(base_path($desc), 755, true);
        }
        File::copyDirectory(base_path($source),base_path($desc));
    }
    public static function getAllTags($path, $tags){
        $fullPath=self::basePath($path);
        $files=collect(File::allFiles($fullPath))
        ->map(function($file) use($path,$fullPath){
            return [
                "show"=>$file->getFilename(),
                "path"=>trim($path,'/').'/'.$file->getFilename(),
                "info"=>self::getContent($file->getPathname()),
            ];
        })
        ->values();
        $fileshavetag = [];
        foreach($files as $file){
            foreach($tags as $tag){
                if(in_array($tag,$file['info']['tags'])){
                    $fileshavetag[$tag]=$file;
                }
            }
        }
        dd($fileshavetag);
    }


}
