<?php

namespace App\Services;

class Parse
{
    public static function getFileDate($path){
        if(preg_match('/[0-9]{4}-[0-9]{2}-[0-9]{2}/im',pathinfo($path,PATHINFO_FILENAME),$match)){
            return trim($match[0]);
        }else{
            return "";
        }
    }
    public static function getTitle($path){
        $path = 'content-pages'.$path;
        $content = file_get_contents(base_path($path));
        // dd($content);
        if(preg_match('/^\s*---\s*(.*?)\s*---(.*?)$/is', $content,$match)){
            $pre = $match[1];
            $main = $match[2];
            if(preg_match('/^\s*title:\s*(.*?)\s*$/im',$pre,$match)){
                return trim($match[1]);
            }else{
                if(preg_match('/<h1\s*[^>]*>(.*?)<\/h1>/is',$main,$match)){
                    return trim($match[1]);
                }else{
                    if(preg_match('/[0-9]{4}-[0-9]{2}-[0-9]{2}/im',pathinfo($path,PATHINFO_FILENAME),$match)){
                        return trim($match[0]);
                    }else{
                        return "Untitled";
                    }
                }
            }
        }else{
            abort('400',"整題格式不正確");
        }
    }
    public static function getTags($path){
        $path = 'content-pages'.$path;
        $content = file_get_contents(base_path($path));
        if(preg_match('/^\s*---\s*(.*?)\s*---\s*(.*?)$/is', $content,$match)){
            $pre = $match[1];
            $main = $match[2];
            if(preg_match('/^\s*tags:\s*(.*?)\s*$/im',$pre,$match)){
                $tags = explode(',',$match[1]);
                $tags = array_map('trim',$tags);
                return $tags;
            }else{
                return [];
            }
        }else{
            abort('400',"整題格式不正確");
        }
    }
    public static function getDraft($path){
        $path = 'content-pages'.$path;
        $content = file_get_contents(base_path($path));
        if(preg_match('/^\s*---\s*(.*?)\s*---\s*(.*?)$/is', $content,$match)){
            $pre = $match[1];
            $main = $match[2];
            if(preg_match('/^\s*tags:\s*(.*?)\s*$/im',$pre,$match)){
                $draft = trim($match[1]);
                if($draft=="true"){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            abort('400',"整題格式不正確");
        }
    }
    public static function getSummary($path){
        $path = 'content-pages'.$path;
        $content = file_get_contents(base_path($path));
        if(preg_match('/^\s*---\s*(.*?)\s*---\s*(.*?)$/is', $content,$match)){
            $pre = $match[1];
            $main = $match[2];
            if(preg_match('/^\s*summary:\s*(.*?)\s*$/im',$pre,$match)){
                $summary = trim($match[1]);
                return $summary;
            }else{
                return "";
            }
        }else{
            abort('400',"整題格式不正確");
        }
    }
    public static function getCover($path){
        $path = 'content-pages'.$path;
        $content = file_get_contents(base_path($path));
        if(preg_match('/^\s*---\s*(.*?)\s*---\s*(.*?)$/is', $content,$match)){
            $pre = $match[1];
            $main = $match[2];
            if(preg_match('/^\s*cover:\s*(.*?)\s*$/im',$pre,$match)){
                $cover = trim($match[1]);
                return $cover;
            }else{
                return "";
            }
        }else{
            abort('400',"整題格式不正確");
        }
    }
    public static function getContent($path){
        $path = 'content-pages'.$path;
        $content = file_get_contents(base_path($path));
        if(preg_match('/^\s*---\s*(.*?)\s*---\s*(.*?)$/is', $content,$match)){
            $pre = $match[1];
            $main = $match[2];
            return trim($main);
        }else{
            abort('400',"整題格式不正確");
        }
    }
}
