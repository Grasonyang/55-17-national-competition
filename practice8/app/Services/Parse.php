<?php
namespace App\Services;

use Illuminate\Support\Facades\File;
class Parse{



    public static $tags = [];
    public static function getContent($fullPath){
        // input: show be a filepath
        $content = file_get_contents($fullPath);
        $content = trim($content);
        $base = base_path("content-pages");
        $relativePath = str_replace($base,'',$fullPath);
        $relativePath = str_replace('\\', '/', $relativePath);
        $relativePath = trim($relativePath,'/');
        $dirname = dirname($relativePath);
        $filename = pathinfo($relativePath, PATHINFO_FILENAME);
        $extension = pathinfo($relativePath, PATHINFO_EXTENSION);
        self::Copy();
        if(preg_match('/^---(.*?)---(.*?)$/si', $content, $match)){
            $front = trim($match[1]);
            $last = trim($match[2]);
            return [
                "title"=>self::Title($front,$last,$filename),
                "tags"=>self::Tags($front,$relativePath),
                "cover"=>self::Cover($front),
                "summary"=>self::Summary($front),
                "draft"=>self::Draft($front),
                "content"=>self::Content($last,$extension),
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
    public static function Copy(){
        $sour = base_path("content-pages/images");
        $dest = base_path("public/images");
        File::ensureDirectoryExists($dest);
        File::copyDirectory($sour,$dest);
    }
    public static function Title($front,$last,$filename){
        if(preg_match('/^\s*title\s*:(.*?)$/mi',$front,$match)){
            return trim($match[1]);
        }else{
            if(preg_match('/<h1\s*[^>]>(.*?)<\/h1>/si',$last,$match)){
                return trim($match[1]);
            }else{
                $filename = substr(11, $filename);
                $filename = str_replace('-', ' ',$filename);
                return $filename;
            }
        }
    }
    public static function Tags($front,$relativePath){
        if(preg_match('/^\s*tags\s*:(.*?)$/mi',$front,$match)){
            $tags = trim($match[1]);
            $tags = explode(',',$tags);
            $tags = array_map('trim',$tags);
            $tags = array_unique($tags);
            foreach($tags as $tag){
                if(!isset(self::$tags[$tag])){
                    self::$tags[$tag] = [];
                }
                self::$tags[$tag][] = $relativePath;
            }
            return $tags;
        }else{
            return [];
        }
    }
    public static function Cover($front){
        if(preg_match('/^\s*cover\s*:([0-9A-Za-z_-]*.(jpg|png|jpeg))$/mi',$front,$match)){
            $img=trim($match[1]);
            $file = base_path("public/images/$img");
            if(file_exists($file)){
                return url("images/$img");
            }else{
                return url("images/default.png");
            }
        }else{
            return url("images/default.png");
        }
    }
    public static function Summary($front){
        if(preg_match('/^\s*summary\s*:(.*?)$/mi',$front,$match)){
            return trim($match[1]);
        }else{
            return "";
        }
    }
    public static function Draft($front){
        if(preg_match('/^\s*draft\s*:(.*?)$/mi',$front,$match)){
            $draft = strtolower(trim($match[1]));
            return $draft==='true';
        }else{
            return false;
        }
    }
    public static function Content($last,$extension){
        // check and change img path
        if($extension=="html"){
            if(preg_match_all('/"([0-9A-Za-z_-]*.(jpg|png|jpeg))"/mi',$last,$match)){
                $imgs=$match[1];
                $imgs= array_map("trim",$imgs);
                $imgs= array_unique($imgs);
                foreach($imgs as $img){
                    $file = base_path("public/images/$img");
                    if(file_exists($file)){
                        $url = url("images/$img");
                    }else{
                        $url = url("images/default.png");
                    }
                    $last = str_replace($img,$url,$last);
                }
                return $last;
            }else{
                return $last;
            }
        }else{
            if(preg_match_all('/^\s*([0-9A-Za-z_-]*.(jpg|png|jpeg))\s*$/mi',$last,$match)){
                $imgs=$match[1];
                $imgs= array_map("trim",$imgs);
                $imgs= array_unique($imgs);
                foreach($imgs as $img){
                    $file = base_path("public/images/$img");
                    if(file_exists($file)){
                        $url = url("images/$img");
                    }else{
                        $url = url("images/default.png");
                    }
                    $last = str_replace($img,"<img src='$url' alt='$img' class='float-end w-100'>",$last);
                }
                return $last;
            }else{
                return $last;
            }
        }
    }
    public static function getAllTags(){
        return self::$tags;
    }

}

// title
// tags
// cover
// summary
// draft
// content
// 
// Title
// Tags
// Cover
// Summary
// Draft
// Content