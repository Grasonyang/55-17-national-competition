<?php

namespace App\Services;


class Parse{
    public static $tags = [];
    public static function getBread($relativePath){
        $basepath = '';
        $paths = trim($relativePath);
        $paths = explode('/', $paths);
        $result = [];
        foreach($paths as $path){
            $cpath = rtrim($basepath, '/').'/'.$path;
            $basepath = $cpath;
            $result[$path] = [
                "show"=>$path,
                "path"=>ltrim($cpath, '/')
            ];
        }
        return $result;
    }
    public static function getContent($fullPath){
        $content = file_get_contents($fullPath);
        $content = trim($content);
        $extension = pathinfo($fullPath, PATHINFO_EXTENSION);
        if(preg_match('/^---\s*(.*)\s*?---(.*)/is',$content,$matches)){
            $frontmatter = $matches[1];
            $content = $matches[2];
            $result = [
                'name'=>basename($fullPath),
                'title'=>self::getTitle($fullPath, $frontmatter, $content),
                'draft'=>self::getDraft($frontmatter),
                'tags'=>self::getTags($frontmatter),
                'cover'=>self::getCover($frontmatter),
                'summary'=>self::getSummary($frontmatter),
                'content'=>self::getMainContent($content,$extension),
            ];
            return $result;
        }else{
            return [
                'name'=>basename($fullPath),
                'title'=>'',
                'draft'=>true,
                'tags'=>[],
                'cover'=>'',
                'summary'=>'',
                'content'=>'',
            ];
        }
        
    }
    public static function getTitle($fullPath, $frontmatter,$content){
        $content = trim($content);
        $frontmatter = trim($frontmatter);
        
        // 判斷是否有title: ?????
        if(preg_match('/^\s*title\s*:\s*(.*)/im',$frontmatter, $matches)){
            $title = $matches[1];
            $title = trim($title);
            return $title;
        }else{
            // 判斷是否有H1標題
            if(preg_match('/<h1\s*[^>]*>(.*?)<\/h1>/is',$content, $matches)){
                $title = $matches[1];
                $title = trim($title);
                return $title;
            }else{
                // 使用檔名，去除前方日期、-
                $filename = basename($fullPath);
                if(preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}-(.*)/',$filename, $matches)){
                    $title = $matches[1];
                    $title = trim($title);
                    return $title;
                }else{
                    return "";
                }
            }
        }
    }
    public static function getDraft($content){
        $content = trim($content);
        
        // 判斷是否有draft: ?????
        if(preg_match('/^\s*title\s*:\s*(.*)/im',$content, $matches)){
            $draft = $matches[1];
            $draft = trim($draft);
            $draft = strtolower($draft);
            if($draft=="true"){
                return true;
            }else{
                return false;
            }
        }
        return false;
    }
    public static function getTags($content){
        $content = trim($content);
        
        // 判斷是否有tags: ?????
        if(preg_match('/^\s*tags\s*:\s*(.*)/im',$content, $matches)){
            $tags = $matches[1];
            $tags = trim($tags);
            $tags = explode(',', $tags);
            $tags = array_map('trim', $tags);
            foreach($tags as $tag){
                self::$tags[] = $tag;
            }
            return $tags;
        }
        return [];
    }
    public static function getCover($content){
        $content = trim($content);
        
        // 判斷是否有tags: ?????
        if(preg_match('/^\s*cover\s*:\s*(.*)/im',$content, $matches)){
            $cover = $matches[1];
            $cover = trim($cover);
            return $cover;
        }
        return "";
    }
    public static function getSummary($content){
        $content = trim($content);
        
        // 判斷是否有tags: ?????
        if(preg_match('/^\s*summary\s*:\s*(.*)/im',$content, $matches)){
            $summary = $matches[1];
            $summary = trim($summary);
            return $summary;
        }
        return "";
    }
    public static function getMainContent($content, $extension){
        $content = trim($content);
        if($extension=="html"){
            return $content;
        }else{
            if(preg_match_all('/^\s*([0-9A-Za-z-_]+.(jpg|png|svg))/im',$content, $matches)){
                $arr = [];
                $imgs = $matches[1];
                foreach($imgs as $img){
                    $img = trim($img);
                    if(!empty($img)){
                        $arr[] = $img;
                    }
                }
                $arr = array_unique($arr);
                foreach($arr as $img){
                    $img = trim($img);
                    if(!empty($img)){
                        $content = str_replace($img, '<img src="'.$img.'" alt="'.$img.'">', $content);
                    }
                }
                return $content;
            }
            return "";
        }
        
    }

}