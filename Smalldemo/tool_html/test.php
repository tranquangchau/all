<?php


//touch("test.txt");
$folder="file/data/";
$type='.txt';
$number=6;
$limit= 4;
$max=$number+$limit;
echo 'create file number from'.$number.' to '.$max.'<br>';
for ($index =$number; $index <= $max; $index++) {
    $filename=$folder.$index.$type;
    if(file_exists($filename)){
        echo '<br/>exit file '.$filename;
    }else{
        echo '<br/>create file '.$filename;
        touch($filename);
    }
}
?>