<?php

namespace App\Services;
use App\Services\Parse;
use Carbon\Carbon;
class Tree
{
    public $map = null;
    public $basePath = 'content-pages';
    public function __construct(){
        $this->map=[];
        $this->getFolders('');
    }
    public function getFolders($path){
        $fullPath = base_path($this->basePath."/".$path);
        // dd($fullPath);
        if(is_dir($fullPath)){
            foreach(scandir($fullPath) as $item){
                if($item == '.' || $item == '..')
                    continue;
                if(is_dir($fullPath."/".$item)){
                    // dd($item);
                    $this->map[$path."/"]['folders'][] = $item;
                    $this->getFolders($path."/".$item);
                }else{
                    $this->map[$path."/"]['files'][] = $item;
                    $file = [
                        "title"=>Parse::getTitle($path."/".$item),
                        "tags"=>Parse::getTags($path."/".$item),
                        "draft"=>Parse::getDraft($path."/".$item),
                        "summary"=>Parse::getSummary($path."/".$item),
                        "cover"=>Parse::getCover($path."/".$item),
                        "content"=>Parse::getContent($path."/".$item),
                        "date"=>Parse::getFileDate($path."/".$item),
                    ];
                    if($file['draft']==false && !Carbon::parse($file['date'])->isPast())
                    $this->map[$path."/".$item] = $file;
                }
            }
        }else{
            return ;
        }
    }
    
    
}
