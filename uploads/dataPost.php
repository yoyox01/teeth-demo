<?php
	extract($_POST);
	
	$myfile = fopen("data.txt", "w") or die("Unable to open file!");
	
	fwrite($myfile,$data);
	/*
	foreach($data as $key => $value){
		fwrite($myfile, $value);
		fwrite($myfile, ",");
		if(($key+1) %14 == 0){
			fwrite($myfile,"\n");
		}
	}
	
	/*
	//get a stop key
	$stopKey = 0;
	foreach ($data as $key => $value){
		if($value == 0){
			if(($data[$key+1]==0)&&($data[$key+2]==0)&&($data[$key+3]==0)){
				$stopKey = $key;
				break;
			}
		}
	}
	if ($stopKey<14*30)	$stopKey = 14*30;
	//write 30 rows of file before the zeros
	$startKey = $stopKey-14*30;
	if($startKey < 0)	$startKey = 0;
	
	//write file till the $stopKey (get rid of the zeros)
	for($i = $startKey; $i < $stopKey; $i++){
		echo $data[$i].',';
		fwrite($myfile, $data[$i]);
		fwrite($myfile, ",");
		if( ($i+1)%14 == 0){
			echo '<br>';
			fwrite($myfile, "\n");
		}
	}
	*/
	
	fclose($myfile);
?>