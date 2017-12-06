<?php

    $pyscript = 'C:\\Users\\huang403\\QQ\\image.py';
    //$pyscript = 'H:\\xampp\\htdocs\\brushTeeth\\demo\\test.py';
    $python = 'C:\\Python27\\python.exe';
    //$filePath = 'H:\\xampp\\htdocs\\brushTeeth\\demo\\test.py';

    $cmd = "$python $pyscript";
    echo exec("$cmd", $output);
    print_r(exec("$cmd", $output));
?>