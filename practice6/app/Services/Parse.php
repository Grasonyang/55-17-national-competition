<?php

namespace App\Services;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class Parse{
    public static $tags = [];
    public static function getContent($path, $fullPath, $extension){
        $filePath =trim($path, '/').'/'.basename($fullPath);
        $content = file_get_contents($fullPath);
        $content = trim($content);
        if(preg_match('/^---(.*)---(.*)$/is',$content,$match)){
            $frontMatter = $match[1];
            $mainContent = $match[2];
            return [
                "title"=>self::getTitle($path, $fullPath, $frontMatter,$mainContent),
                "tags"=>self::getTags($filePath, $frontMatter),
                "cover"=>self::getCover($frontMatter),
                "summary"=>self::getSummary($frontMatter),
                "draft"=>self::getDraft($frontMatter),
                "content"=>($extension=='html')?$mainContent:self::getMainContent($mainContent),
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
    public static function getTitle($path, $fullPath, $frontMatter,$mainContent){
        if(preg_match('/^\s*title\s*:\s*(.*)\s*$/mi',$frontMatter,$match)){
            return trim($match[1]);
        }else{
            if(preg_match('/<h1\s*[^>]*>(.*?)<\/h1>/i',$mainContent,$match)){
                return trim($match[1]);
            }else{
                $filename = pathinfo($fullPath, PATHINFO_FILENAME);
                $filename =substr($filename, 11);
                $filename =str_replace('-', ' ', $filename);
                return $filename;
            }
        }
    }
    public static function getTags($path, $frontMatter){
        if(preg_match('/^\s*tags\s*:\s*(.*)\s*$/mi',$frontMatter,$match)){
            $tags = $match[1];
            $tags = explode(',',$tags);
            $tags = array_map('trim',$tags);
            
            foreach($tags as $tag){
                if(!isset(self::$tags[$tag])){
                    self::$tags[$tag] = [];
                }
                self::$tags[$tag][] = $path;
            }
            return $tags;
        }else{
            return [];
        }
    }
    public static function getCover($frontMatter){
        if(preg_match('/^\s*cover\s*:\s*(.*)\s*$/mi',$frontMatter,$match)){
            $cover = trim($match[1]);
            if(file_exists(public_path('images/'.$cover)))
                return 'images/'.$cover;
            else
                return 'images/default.png';
        }else{
            return "";
        }
    }
    public static function getSummary($frontMatter){
        if(preg_match('/^\s*summary\s*:\s*(.*)\s*$/mi',$frontMatter,$match)){
            return trim($match[1]);
        }else{
            return "";
        }
    }
    public static function getDraft($frontMatter){
        if(preg_match('/^\s*draft\s*:\s*(.*)\s*$/mi',$frontMatter,$match)){
            $draft = strtolower(trim($match[1]));
            return $draft==='true';
        }else{
            return false;
        }
    }
    public static function getMainContent($mainContent){
        if(preg_match_all('/^\s*([0-9A-Za-z-_]*.(jpg|png|jpeg))\s*$/mi',$mainContent,$match)){
            $imgs=$match[1];
            $imgs = array_map('trim',$imgs);
            $imgs = array_unique($imgs);
            foreach($imgs as $img){
                $mainContent = str_replace($img,"<img src='$img' alt='$img'/>", $mainContent);
            }
            return $mainContent;
        }else{
            return $mainContent;
        }
    }
    
    public static function getAllTags(){
        $files = File::allFiles(base_path('content-pages'));
        foreach ($files as $file) {
            $filename = str_replace(base_path('content-pages'),'', $file->getPathname());
            $filename = str_replace('\\','/',$filename);
            $filename = trim($filename,'/');
            $path = pathinfo($filename, PATHINFO_DIRNAME);
            $fullPath = $file->getRealpath();
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            self::getContent($path, $fullPath, $extension);
        }
        return self::$tags;
    }
    
    public static function clearTags(){
        self::$tags = [];
    }
    
}