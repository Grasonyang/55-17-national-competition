<?php

namespace App\Services;
use Illuminate\Support\Facades\File;
class Parse{
    public static $tags = [];
    public static function regPath($fullPath){
        $path = str_replace('\\','/',$fullPath);
        $path= trim($path,'/');
        return $path;
    }
    public static function Copy(){
        File::ensureDirectoryExists(base_path('public/images'));
        File::copyDirectory(base_path('content-pages/images'),base_path('public/images'));
    }
    public static function getContent($fullPath){
        $base = self::regPath(base_path('content-pages'));
        $fullPath = self::regPath($fullPath);
        $content = trim(file_get_contents($fullPath));
        $filename = pathinfo($fullPath, PATHINFO_FILENAME);
        $relativePath = str_replace($base,"",$fullPath);
        $filetype = pathinfo($fullPath, PATHINFO_EXTENSION);
        self::Copy();
        if(preg_match('/^---(.*?)---(.*?)$/si',$content,$match)){
            $front = trim($match[1]);
            $last = trim($match[2]);
            return [
                "title"=>self::Title($front, $last, $filename),
                "tags"=>self::Tags($front,$relativePath),
                "cover"=>self::Cover($front),
                "draft"=>self::Draft($front),
                "summary"=>self::Summary($front),
                "content"=>self::MainContent($last, $filetype),
            ];
        }else{
            return [
                "title"=>"",
                "tags"=>[],
                "cover"=>"",
                "draft"=>true,
                "summary"=>"",
                "content"=>"",
            ];
        }
    }
    public static function Title($front, $last, $filename){
        if(preg_match('/^\s*title\s*:\s*(.*?)$/mi',$front,$match)){
            return trim($match[1]);
        }else{
            if(preg_match('/<\s*[^>]*>(.*?)<\/h1>/si',$last,$match)){
                return trim($match[1]);
            }else{
                $filename = substr($filename,11);
                $filename = str_replace('-', ' ', $filename);
                return $filename;
            }
        }
    }
    public static function Tags($front,$relativePath){
        if(preg_match('/^\s*tags\s*:\s*(.*?)$/mi',$front,$match)){
            $tags = explode(',',$match[1]);
            $tags = array_map("trim",$tags);
            $tags = array_unique($tags);
            foreach($tags as $tag){
                self::$tags[$tag][] = $relativePath;
            }
            return $tags;
            
        }else{
            return [];
        }
    }
    public static function Cover($front){
        if(preg_match('/^\s*cover\s*:\s*(.*?)$/mi',$front,$match)){
            $img = trim($match[1]);
            $imgPath = base_path("public/images/$img");
            if(file_exists($imgPath)){
                return url("images/$img");
            }else{
                return url("images/default.png");
            }
        }else{
            return url("images/default.png");
        }
    }
    public static function Draft($front){
        if(preg_match('/^\s*draft\s*:\s*(.*?)$/mi',$front,$match)){
            $draft = trim($match[1]);
            $draft= strtolower($draft);
            return $draft==="true";
        }else{
            return false;
        }
    }
    public static function Summary($front){
        if(preg_match('/^\s*summary\s*:\s*(.*?)$/mi',$front,$match)){
            return trim($match[1]);
        }else{
            return "";
        }
    }
    public static function MainContent($last,$filetype){
        if($filetype=="html"){
            if(preg_match_all('/"([0-9A-Za-z_-]*.(jpg|png|jpeg))"/mi',$last,$match)){
                $imgs = $match[1];
                $imgs = array_map("trim",$imgs);
                $imgs = array_unique($imgs);
                foreach($imgs as $img){
                    $imgPath = base_path("public/images/$img");
                    if(file_exists($imgPath)){
                        $url =  url("images/$img");
                    }else{
                        $url =  url("images/default.png");
                    }
                    $last= str_replace($img, "$url",$last);
                }
                return $last;
            }else{
                return $last;
            }
        }else{
            if(preg_match_all('/^\s*([0-9A-Za-z_-]*.(jpg|png|jpeg))\s*$/mi',$last,$match)){
                $imgs = $match[1];
                $imgs = array_map("trim",$imgs);
                $imgs = array_unique($imgs);
                foreach($imgs as $img){
                    $imgPath = base_path("public/images/$img");
                    if(file_exists($imgPath)){
                        $url =  url("images/$img");
                    }else{
                        $url =  url("images/default.png");
                    }
                    $last= str_replace($img, "<img src='$url' alt='$img'>",$last);
                }
                return $last;
            }else{
                // dd($match);
                return $last;
            }
        }
        
    }

}










