<?php
namespace App\Services;
class Parse{
    public static $tags = [];
    public static function getContent($path,$fullPath,$name,$type){
        // dd($path,$fullPath,$name,$type);
        $content = trim(file_get_contents($fullPath));
        if(preg_match('/^---\s*?(.*)\s*?---(.*)/is', $content, $matches)){
            $frontMatter=$matches[1]; 
            $mainContent=$matches[2]; 
            return [
                "title"=>Parse::getTitle($frontMatter,$mainContent,$path,$name),
                "tags"=>Parse::getTags($frontMatter,$path),
                "cover"=>Parse::getCover($frontMatter),
                "summary"=>Parse::getSummary($frontMatter),
                "draft"=>Parse::getDraft($frontMatter),
                "content"=>($type=='html')?$mainContent:Parse::getMainContent($mainContent),
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
    public static function getTitle($frontMatter,$mainContent,$path,$name){
        $frontMatter = trim($frontMatter);
        $mainContent = trim($mainContent);
        if(preg_match('/^title\s*:\s*(.*)\s*$/mi', $frontMatter, $matches)){
            return $matches[1];
        }else{
            if(preg_match('/^<h1\s*[^>]*>(.*?)<\/h1>$/mi', $mainContent, $matches)){
                return $matches[1];
            }else{
                // xxxx-xx-xx-
                return substr($name,11);
            }
        }
    }
    public static function getTags($frontMatter,$path){
        $frontMatter = trim($frontMatter);
        if(preg_match('/^tags\s*:\s*(.*)\s*$/mi', $frontMatter, $matches)){
            $tags = explode(',',$matches[1]);
            $tags = array_map('trim',$tags);
            foreach ($tags as $tag) {
                self::$tags[$path][]=$tag;
            }
            return $tags;
        }else{
            return [];
        }
    }
    public static function getCover($frontMatter){
        $frontMatter = trim($frontMatter);
        if(preg_match('/^cover\s*:\s*(.*)\s*$/mi', $frontMatter, $matches)){
            return $matches[1];
        }else{
            return "";
        }
    }
    public static function getSummary($frontMatter){
        $frontMatter = trim($frontMatter);
        if(preg_match('/^summary\s*:\s*(.*)\s*$/mi', $frontMatter, $matches)){
            return $matches[1];
        }else{
            return "";
        }
    }
    public static function getDraft($frontMatter){
        $frontMatter = trim($frontMatter);
        if(preg_match('/^draft\s*:\s*(.*)\s*$/mi', $frontMatter, $matches)){
            $draft = strtolower(trim($matches[1]));
            return $draft=='true';
        }else{
            return "";
        }
    }
    public static function getMainContent($mainContent){
        $mainContent = trim($mainContent);
        if(preg_match_all('/^\s*([0-9A-Za-z-_]*.(jpg|png|jpeg))\s*$/mi', $mainContent, $matches)){
            $imgs = $matches[1];
            $imgs=array_map('trim',$imgs);
            $imgs= array_unique($imgs);
            foreach($imgs as $img){
                $mainContent=str_replace($img,"<img src='$img' alt='$img'/>",$mainContent);
            }
            return $mainContent;
        }else{
            return $mainContent;
        }
    }
}