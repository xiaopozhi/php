<?php
if(!isset($_GET['file'])) {
    return 0;
}
$fileName = $_GET['file'];
echo $fileName;
//$file = 'example.pdf'; // 文件名
//$filepath = '/path/to/file/'; // 文件路径
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($fileName) . '"');
header('Content-Length: ' . filesize($fileName));
readfile($fileName);
?>