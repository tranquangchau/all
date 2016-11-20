<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$return['status'] = false;
$return['content'] = 'Not id or something error';
if (isset($_REQUEST['id'])) {


    $folder = 'file/data/';
    $filetype = '.txt';
    $filename = $_REQUEST['id'];
    $filename = $folder . $filename . $filetype;
    if (file_exists($filename)) {
        $data = trim(file_get_contents($filename));
        $return['status'] = true;
        $return['content'] = $data;
    }else{
        $return['status'] = false;
        $return['content'] = 'file not exit';
    }
}
echo json_encode($return);
