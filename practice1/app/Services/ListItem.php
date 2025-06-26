<?php
namespace App\Services;
use App\Services\ParseText;

class ListItem{
    public static  function getFolder($filePath){
        $filePath = base_path($filePath);
        $items = scandir($filePath);
        $folders = [];
        foreach ($items as $item) {
            if ($item === '.' || $item === '..') continue;

            $fullPath = $filePath . "/" . $item;

            if (is_dir($fullPath)) {
                $folders[] = $item;
            }
        }
        usort($folders, function($a, $b) {
            return strcmp($a, $b);
        });
        return $folders;
    }
    public static function getFile($filePath){
        $relativePath = $filePath;
        $filePath = base_path($filePath);
        $items = scandir($filePath);
        $files = [];
        foreach ($items as $item) {
            if ($item === '.' || $item === '..') continue;
            if(!ParseText::checkFileDate($item)) continue; // 檢查檔案日期
            $draft = ParseText::getDraft($filePath . "/" . $item);
            if($draft=="true" || $draft=="True") continue;
            $fullPath = $filePath . "/" . $item;
            if (!is_dir($fullPath)) {
                $files[] = [
                    "path"=>$relativePath,
                    "name"=>$item,
                    "title"=>ParseText::getTitle($item, $filePath),
                    "summary"=>ParseText::getSummary($item, $filePath),
                ];
            }
        }
        // 排序資料夾
        usort($files, function($a, $b) {
            return strcmp($b['name'], $a['name']);
        });
        return $files;
    }
    public static function getEveryFolderPath($filePath){
        $paths = explode("/", $filePath);
        $currentPath="";
        $everyFolderPath = [];
        foreach ($paths as $path) {
            if ($path === '.' || $path === '..') continue;
            $currentPath .= $path . "/";
            $everyFolderPath[] = [
                "fullPath"=>trim($currentPath, "/"),
                "path"=>$path
            ];
        }
        return $everyFolderPath;
    }
}