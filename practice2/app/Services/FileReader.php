<?php

namespace App\Services;
use App\Services\Parse;
class FileReader{
    public $tree = null;
    public function getTree($currentFolderPath){
        // 回傳資料夾的樹狀結構
        // 包含folders:[]
        // 包含files:[]
        $this->tree = [];
        $this->getCurrentFolder($currentFolderPath);
        $this->getCurrentFile($currentFolderPath);
        return $this->tree;
    }
    public function getCurrentFolder($currentFolderPath){
        // 獲取當前目錄中所有子檔案夾，並遞迴獲取
        $path = strtolower($currentFolderPath).'/';
        if(is_dir(base_path($currentFolderPath))){
            $this->tree[$path] = [
                'name'=> $currentFolderPath,
                'folders' => [],
                'files' => []
            ];
            foreach(scandir(base_path($currentFolderPath)) as $item){
                if($item =='.' || $item =='..')
                    continue;
                if(is_dir(base_path($currentFolderPath.'/'.$item))){
                    $this->tree[$path]['folders'][] = $currentFolderPath.'/'.$item;
                    $this->getCurrentFolder($currentFolderPath.'/'.$item);
                    $this->getCurrentFile($currentFolderPath.'/'.$item);
                }
            }
        }else{
            return;
        }
    }
    public function getCurrentFile($currentFolderPath){
        // 獲取當前目錄中所有子檔案
        $path = strtolower($currentFolderPath).'/';
        if(is_dir(base_path($currentFolderPath))){
            $this->tree[$path]['files'] = [];
            foreach(scandir(base_path($currentFolderPath)) as $item){
                if($item =='.' || $item =='..')
                    continue;
                if(is_file(base_path($currentFolderPath.'/'.$item))){
                    $this->tree[$path]['files'][] = $currentFolderPath.'/'.$item;
                    $this->tree[$path.$item]=[
                        "title"=>Parse::getTitle($currentFolderPath.'/'.$item),
                        "tags" =>Parse::getTags($currentFolderPath.'/'.$item),
                        "cover"=>Parse::getCover($currentFolderPath.'/'.$item),
                        "summary"=>Parse::getSummary($currentFolderPath.'/'.$item),
                        "draft"=>Parse::getDraft($currentFolderPath.'/'.$item),
                        "content"=>Parse::getContent($currentFolderPath.'/'.$item),
                    ];
                }
            }
        }else{
            return ;
        }
    }
    
}