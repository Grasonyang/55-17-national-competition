<?php

namespace App\Services;

class Parse{
    public static function getTitle($path){
        $content=file_get_contents(base_path($path));
        if(preg_match('/^\s*---[\s\S]*?\btitle\s*:\s*(.+?)\r?\n[\s\S]*?---/i',$content,$match)){
            return $match[1];
        }else{
            if(preg_match('/<\s*h1[^>]*>(.*?)<\s*\/h1\s*>/i',$content,$match)){
                return $match[1];
            }else{
                if(preg_match('/([0-9]{4}-[0-9]{2}-[0-9]{2})/i',pathinfo($path, PATHINFO_FILENAME),$match))
                    return $match[1];
                else
                    return "Untitled";
            }
        }
    }
    public static function getTags($path){
        $content=file_get_contents(base_path($path));
        if(preg_match('/^\s*---[\s\S]*?\btags\s*:\s*(.+?)\r?\n[\s\S]*?---/i',$content,$match)){
            $tag_str = $match[1];
            $tags = explode(',', $tag_str);
            $tags = array_map('trim', $tags); // 去除每個標籤的空格
            $tags = array_filter($tags); // 移除空標籤
            return $tags;
        }
        return [];
    }
    
    public static function getCover($path){
        $content=file_get_contents(base_path($path));
        if(preg_match('/^\s*---[\s\S]*?\bcover\s*:\s*(.+?)\r?\n[\s\S]*?---/i',$content,$match)){
            return $match[1];
        }
        return "";
    }
    
    public static function getSummary($path){
        $content=file_get_contents(base_path($path));
        if(preg_match('/^\s*---[\s\S]*?\bsummary\s*:\s*(.+?)\r?\n[\s\S]*?---/i',$content,$match)){
            return $match[1];
        }
        return "";
    }
    

    public static function getDraft($path){
        $content=file_get_contents(base_path($path));
        if(preg_match('/^\s*---[\s\S]*?\bdraft\s*:\s*(.+?)\r?\n[\s\S]*?---/i',$content,$match)){
            if(strtolower($match[1]) == 'true')
                return true;
            else
                return false;
        }
        return false;
    }
    public static function getContent($path){
        $content=file_get_contents(base_path($path));
        if(preg_match('/^\s*---[\s\S]*?---([\s\S]*)/i',$content,$match)){
            $main_content = $match[1];
        }else{
            return "";
        }
        $info = pathinfo(base_path($path));
        if($info['extension'] == 'txt'){
            if(preg_match_all('/^\s*([\w\-]+\.(jpg|jpeg|png|gif|webp))\s*$/im',$main_content,$matches)){
                $images = $matches[1];
                // dd($images);
                foreach($images as $image){
                    $main_content = str_replace($image, "<img src='$image' alt='$image' />", $main_content);
                }
                return "<p>$main_content</p>";
            }else{
                return "<p>$main_content</p>";
            }
        }else if($info['extension'] == 'html'){
            return $main_content;
        }
    }
    
}