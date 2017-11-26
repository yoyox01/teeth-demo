<?php
    $date = date("YmdHis");
    mkdir($date, 0700);
    $f1 = fopen("init.txt", "r") or die("Unable to open file1!");
    $data_init="";
    while(!feof($f1)){
        $data_init.=fgets($f1);
    }
    fclose($f1);
    
    for($i=0; $i<16; $i++){
        $file = "total".$i.".txt";
        copy($file, $date."/".$file);
        $f2 = fopen($file,"w")or die("Unable to open file2!");

        fwrite($f2,$data_init);
        fclose($f2);
    }
?>