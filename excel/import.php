<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2018/11/8
 * Time: 18:26
 */
include "classes/PHPExcel.php";

$pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8","root","root");
$file = $_FILES['file'];
$filename = $file['tmp_name'];
$destination = './'.$file['name'];
move_uploaded_file($filename,$destination);
$excel = \PHPExcel_IOFactory::load($destination);

$sheet = $excel->getSheet(0);
$rows = $sheet->getHighestDataRow();
$cols = $sheet->getHighestDataColumn();

for ($i=2;$i<=$rows;$i++){
    $k=0;
    for ($j='A';$j<=$cols;$j++){

    }
}
