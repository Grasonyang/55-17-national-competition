<?php
$file = $_FILES['file'];
$tmp_name = $file['tmp_name'];
$name = $file['name'];
$zip = new ZipArchive;
if ($zip->open('test.zip', ZipArchive::OVERWRITE) === TRUE) {
    for($i=0;$i<count($name);$i++){
        $zip->addFile($tmp_name[$i], $name[$i]);
    }
    $zip->close();
    header("Content-type: application/zip");
    header("Content-Disposition: attachment; filename=test.zip");
    header("Content-Length: ".filesize('test.zip'));
    header("location: test.zip");
    echo 'ok';
} else {
    echo 'failed';
}
