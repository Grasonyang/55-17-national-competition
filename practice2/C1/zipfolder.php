<?php
if(isset($_GET['call']) && $_GET['call']=="zip") {
    print_r($_FILES);
    $zip = new ZipArchive();
    $date = date('Y-m-d_H-i-s');
    $zipFileName = "my_files$date.zip";
    $fileName= $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    if(1){
        $zip->open($zipFileName, ZipArchive::OVERWRITE | ZipArchive::CREATE);
        for($i=0;$i<count($fileName);$i++){
            $zip->addFile($fileTmpName[$i], $fileName[$i]);
        }
        $zip->close();
        if(file_exists($zipFileName) && filesize($zipFileName) > 0) {
            header("Content-type: application/zip");
            header("Content-Disposition: attechment; filename=$zipFileName");
            header("Content-Length: " . filesize($zipFileName));
            ob_clean();
            flush();
            readfile($zipFileName);
            unlink($zipFileName);
            exit();
        } else {
            echo "Error creating zip file.";
        }
    }else{
        echo "Failed to create zip file.";
    }
    
}