<?php
	print_r($_POST);
	extract($_POST);

	$f1 = fopen("output/record_temp.txt", "w") or die("Unable to open file1!");

	fwrite($f1,$data);
	fflush($f1);
	fclose($f1);
	
	$data_de = json_decode($data);
	$f2 = fopen("output/records/t".$data_de->recordId."_".date("YmdHis")."txt","w")or die("Unable to open file2!");
	
	fwrite($f2,$data);
	fflush($f2);
	fclose($f2);

	$f3 = fopen("output/total/total".$data_de->recordId.".txt", "r") or die("Unable to open file3!");
	$total_data="";
	while(!feof($f3)){
		$total_data.=fgets($f3);
	}
	fclose($f3);

	$total_data = json_decode($total_data);
	for($i=0; $i<16; $i++){
		$total_data->recordId = $data_de->recordId;
		$total_data->countMulti[$i] += $data_de->countMulti[$i];
		$total_data->countImage[$i] += $data_de->countImage[$i];
		$total_data->countSensor[$i] += $data_de->countSensor[$i];
	}
	$total_data = json_encode($total_data);
	
	$f4 = fopen("output/total/total".$data_de->recordId.".txt", "w") or die("Unable to open file4!");
	fwrite($f4,$total_data);
	fflush($f4);
	fclose($f4);
?>