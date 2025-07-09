<?php


$files = $_FILES['file'];
$tmp_names = is_array($files['tmp_name']) ? $files['tmp_name'] : [$files['tmp_name']];
$names = is_array($files['name']) ? $files['name'] : [$files['name']];
$zip = new ZipArchive;
$zipFileName = uniqid() . '.zip';
if ($zip->open($zipFileName, ZipArchive::CREATE) === TRUE) {
    for($i=0;$i<count($tmp_names);$i++){
        if (is_uploaded_file($tmp_names[$i])) {
            $zip->addFile($tmp_names[$i], $names[$i]);
        }
    }
    $zip->close();
    // file_put_contents('zip.txt', $zipFileName);
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . basename($zipFileName) . '"');
    header('Content-Length: ' . filesize($zipFileName));
    flush();
    readfile($zipFileName);
    // Optionally, delete the zip file after download
    // unlink($zipFileName);
    echo 'ok';
} else {
    echo 'failed';
}