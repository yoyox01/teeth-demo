<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<header>
    <title>Statistics</title>
    <link rel="icon" type="image/png" href="favicon.png" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="js/Chart.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <!--
								 _oo8oo_
                                o8888888o
                                88" . "88
                                (| -_- |)
                                0\  =  /0
                              ___/'==='\___
                            .' \\|     |// '.
                           / \\|||  :  |||// \
                          / _||||| -:- |||||_ \
                         |   | \\\  -  /// |   |
                         | \_|  ''\---/''  |_/ |
                         \  .-\__  '-'  __/-.  /
                       ___'. .'  /--.--\  '. .'___
                    ."" '<  '.___\_<|>_/___.'  >' "".
                   | | :  `- \`.:`\ _ /`:.`/ -`  : | |
                   \  \ `-.   \_ __\ /__ _/   .-` /  /
               =====`-.____`.___ \_____/ ___.`____.-`=====
                                 `=---=`
-->
	<style>
		body{
			overflow-y:scroll;
			//background-color: #1F2739;
		}
		h2{
			text-align: center;
		}
		div.chart{
			width:90%;
			margin: auto;
		}
	</style>
</header>

<body>
    <!--Header Bar-->
    <?php include_once("header_bar.php"); ?>
    <script>
<?php
    $ac_M = array_fill(0, 16, 0);
    $ac_I = array_fill(0, 16, 0);
    $ac_S = array_fill(0, 16, 0);
    for($i=0; $i<16; $i++){
        $f = fopen("output/total/total".$i.".txt", "r") or die("Unable to open file!");
        $json="";
        while(!feof($f)){
            $json.=fgets($f);
        }
        $data = json_decode($json);
        
        if(array_sum($data->countMulti)==0){
            $ac_M[$i] = 0;
        }else{
            $ac_M[$i] = $data->countMulti[$i] / array_sum($data->countMulti);
        }
        if(array_sum($data->countImage)==0){
            $ac_I[$i] = 0;
        }else{
            $ac_I[$i] = $data->countImage[$i] / array_sum($data->countImage);
        }
        if(array_sum($data->countSensor)==0){
            $ac_S[$i] = 0;
        }else{
            $ac_S[$i] = $data->countSensor[$i] / array_sum($data->countSensor);
        }

        fclose($f);
    }
    $ac_M = json_encode($ac_M);
    $ac_I = json_encode($ac_I);
    $ac_S = json_encode($ac_S);
    echo "\t\tlet ac_M=$ac_M\n";
    echo "\t\tlet ac_I=$ac_I\n";
    echo "\t\tlet ac_S=$ac_S\n";
    

?>
        let names = [
            "1  右上頰側",
            "2  上排前牙",
            "3  左上頰側",
            "4  左上咬合面",
            "5  左上舌側",
            "6  上排前牙舌側",
            "7  右上舌側",
            "8  右上咬合面",
            "9  右下頰側",
            "10  下排前牙外側",
            "11  左下頰側",
            "12  左下咬合面",
            "13  左下舌側",
            "14  下排前牙舌側",
            "15  右下舌側",
            "16  右下咬合面"
        ]


		document.write(`
		<div class="chart">
			<canvas id="myChart"></canvas>`
		)
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: names,
                datasets: [{
                    label: 'Multi-model',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1,
                    data: ac_M
                }, {
                    type: 'line',
                    label: 'Image-model',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    data: ac_I
                }, {
                    type: 'line',
                    label: 'Sensor-model',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: ac_S
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true

                        }
                    }]
                }
            }

        });//end myChart
		document.write(`</div>`)
    </script>
</body>

</html>