<?php

namespace App\Services;

class Parse{
    public function __construct(){

    }
    public function getContent($filepath){
        $content = file_get_contents($filepath);
        return $content;
    }
    public function getTitle($content){

    }
    public function getTags($content){

    }
    
    public function getCover($content){

    }
    
    public function getSummary($content){

    }
    

    public function getDraft($content){

    }
    
    public function getMainContent($content){

    }
    
}