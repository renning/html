<?php
phpinfo();
exit;
define('ROOT',dirname(__FILE__).'/');

$destination_folder=ROOT."bbb"; //上传文件路径

$file = $_FILES["upfile"];
mkdir($destination_folder);

?>
