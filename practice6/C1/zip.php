<?php
$file = $_FILES['files'];
$tmp_name = $file['tmp_name'];
$name = $file['name'];

$zip = new ZipArchive;
if ($zip->open('test.zip', ZipArchive::OVERWRITE | ZipArchive::CREATE) === TRUE) {
    for($i=0;$i<count($name);$i++){
        $zip->addFile($tmp_name[$i], $name[$i]);
    }
    $zip->close();
    header("Content-type:application/zip");
    header("Content-Dispoistion:attachment; filename=test.zip");
    header("Content-length: ".filesize('test.zip'));
    header("Location: test.zip");
} else {
    echo 'failed';
}