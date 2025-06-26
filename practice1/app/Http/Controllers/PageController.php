<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ListItem;
use App\Services\ParseText;


class PageController extends Controller
{
    public function index(Request $request){
        $currentFolder = 'content-pages';
        return redirect()->route('handle', ['path' => $currentFolder]);
    }
    public function folder(Request $request, $path){
        $currentFolder = $path;
        $folder = ListItem::getFolder($currentFolder);
        $file = ListItem::getFile($currentFolder);
        $everyFolderPath = ListItem::getEveryFolderPath($currentFolder);
        // dd($everyFolderPath);
        $isEmpty = false;
        if(count($folder) === 0 && count($file) === 0){
            $isEmpty = true;
        }
        // dd($file);
        return view('home', [
            "currentFolder"=>$currentFolder,
            "folders"=>$folder,
            "files"=>$file,
            "everyFolderPath"=>$everyFolderPath,
            "isEmpty"=>$isEmpty
        ]);
    }
    public function handle(Request $request, $path){
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        // dd($path,$extension);
        if($extension == 'html'){
            $content = file_get_contents(base_path($path));
            $underContent = ParseText::getUnderContent($content);
            $aside=[
                "date"=>ParseText::getFileDate(basename($path)),
                "tags"=>ParseText::getTags($content),
                "draft"=>ParseText::getDraft($content),
            ];
            return view('page',[
                "html"=>$underContent,
                'title'=>ParseText::getTitle(basename($path), base_path(dirname($path))),
                'aside'=>$aside
            ]);
        }else if($extension == 'txt'){
            $content = file_get_contents(base_path($path));
            // dd(trim($content,"\""));
            $underContent = ParseText::getUnderContent($content);
            $imgLink=ParseText::getImgLinkFromText($underContent);
            $texts =  str_replace($imgLink, "", $underContent);
            $texts = explode("\n", $texts);
            $texts = array_filter($texts, function($text) {
                return trim($text) !== '';
            });
            $aside=[
                "date"=>ParseText::getFileDate(basename($path)),
                "tags"=>ParseText::getTags($content),
                "draft"=>ParseText::getDraft($content),
            ];
            // dd($aside);
            return view('page',[
                "texts"=>$texts,
                "imgLink"=>$imgLink,
                'title'=>ParseText::getTitle(basename($path), base_path(dirname($path))),
                'aside'=>$aside
            ]);
        }else{
            return self::folder($request, $path);
        }
    }
    public function tag(Request $request, $tag){

    }
    public function search(Request $request){

    }
    public function test(Request $request){
        return view('page', [
            "title"=>"測試頁面",
            "content"=>"這是測試頁面"
        ]);
    }
    
    
}
