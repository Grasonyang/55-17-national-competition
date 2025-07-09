<?php
$file = $_FILES['file'];
$tmp_name = $file['tmp_name'];
$name = $file['name'];

$zip = new ZipArchive;
if ($zip->open('test.zip', ZipArchive::CREATE) === TRUE) {
    for($i=0;$i<count($tmp_name);$i++){
        $zip->addFile($tmp_name[$i], $name[$i]);
    }
    $zip->close();
    // file_put_contents()
    $name = basename('test.zip');
    header("content-type:application/zip");
    header("content-disposition: attachment; filename='$name'");
    header("Content-Length: ".filesize($name));
    header("Location: ".$name);
    echo 'ok';
} else {
    echo 'failed';
}