<?php
namespace App\Services;

class ParseText{

    public static function checkFileDate(string $fileName){
        if(preg_match('/^\d{4}-\d{2}-\d{2}/mis', $fileName, $matches)){
            $date = $matches[0];
            if(strtotime($date) !== false){
                if (strtotime($date) < time()) {
                    // $date is less than current time
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    public static function getFileDate(string $fileName){
        if(preg_match('/^\d{4}-\d{2}-\d{2}/mis', $fileName, $matches)){
            $date = $matches[0];
            if(strtotime($date) !== false){
                if (strtotime($date) < time()) {
                    // $date is less than current time
                    return $date;
                } else {
                    return "";
                }
            } else {
                return "";
            }
        }
    }
    public static function getUnderContent($content){
        $content = explode("---",$content);
        return $content[2];
    }
    public static function getFileName(string $fileName){
        if(preg_match('/^\d{4}-\d{2}-\d{2}/mis', $fileName, $matches)){
            $date = $matches[0];
            $fileName = str_replace($date, "", $fileName);
            $fileName = str_replace("-", " ", $fileName);
            $fileName = trim($fileName);
            $fileName = strtoupper($fileName);
            return $fileName;
        }else{
            $fileName = str_replace("-", " ", $fileName);
            $fileName = trim($fileName);
            $fileName = strtoupper($fileName);
            return $fileName;
        }
    }
    public static function getTitle($fileName, $filePath): string
    {
        $content = file_get_contents($filePath."/".$fileName);
        if(preg_match('/^(.*?)title:(.*?)$/mis',$content, $matches)){
            $draft = $matches[2];
            return trim($draft);
        }else{
            $matches = preg_match('/<h1[^>]*>(.*?)<\/h1>/mis',$content, $matches);
            if(preg_match('/<h1[^>]*>(.*?)<\/h1>(.*?)/mis',$content, $matches)){
                $draft = $matches[1];
                return trim($draft);
            }else{
                return self::getFileName($fileName);
            }
        }
    }

    public static function getTags($content): array
    {
        if(preg_match('/^(.*?)tags:(.*?)$/mis',$content, $matches)){
            $Cover = $matches[2];
            $Cover = trim($Cover);
            
            $Cover = str_replace(" ", "", $Cover);
            
            return explode(",", $Cover);
        }else{
            return "";
        }
    }

    public static function getImgLinkFromText($content): array
    {
        // dd($content);
        preg_match_all('/([^\s]+)\.(jpg|jpeg|png|webp|gif)/i',$content, $matches);
        if($matches){
            return $matches[0];
        }else{
            return [];
        }
    }
    public static function getHTML($content): string
    {
        // dd($content);
        preg_match_all('/^([^\s]+)\.(jpg|jpeg|png|webp|gif)$/i',$content, $matches);
        if($matches){
            dd($matches);
        }else{
            dd(1);
            return "";
        }
    }

    public static function getCover(): string
    {
        $content = file_get_contents($filePath."/".$fileName);
        if(preg_match('/^(.*?)Cover:(.*?)$/mis',$content, $matches)){
            $Cover = $matches[2];
            return trim($Cover);
        }else{
            return "";
        }
    }

    public static function getSummary($fileName, $filePath): string
    {
        $content = file_get_contents($filePath."/".$fileName);
        if(preg_match('/^(.*?)summary:(.*?)$/mis',$content, $matches)){
            $draft = $matches[2];
            return trim($draft);
        }else{
            return "";
        }
    }
    public static function getDraft($content): string
    {
        if(preg_match('/^(.*?)draft:(.*?)$/mis',$content, $matches)){
            $draft = $matches[2];
            return trim($draft);
        }else{
            return "";
        }
    }
}