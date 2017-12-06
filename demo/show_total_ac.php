<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<header>
    <title>Total Accuracy</title>
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
    <script>
<?php
function avgAcu($a){
    return $a = $a/16 * 100;
}
    $ac_M = array_fill(0, 16, 0);
    $ac_I = array_fill(0, 16, 0);
    $ac_S = array_fill(0, 16, 0);
    $ac_M_sum = 0;
    $ac_I_sum = 0;
    $ac_S_sum = 0;
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
            $ac_M_sum += $ac_M[$i];
        }
        if(array_sum($data->countImage)==0){
            $ac_I[$i] = 0;
        }else{
            $ac_I[$i] = $data->countImage[$i] / array_sum($data->countImage);
            $ac_I_sum += $ac_I[$i];
        }
        if(array_sum($data->countSensor)==0){
            $ac_S[$i] = 0;
        }else{
            $ac_S[$i] = $data->countSensor[$i] / array_sum($data->countSensor);
            $ac_S_sum += $ac_S[$i];
        }

        fclose($f);
    }
    $ac_M_sum = avgAcu($ac_M_sum);
    $ac_I_sum = avgAcu($ac_I_sum);
    $ac_S_sum = avgAcu($ac_S_sum);

    $ac_M = json_encode($ac_M);
    $ac_I = json_encode($ac_I);
    $ac_S = json_encode($ac_S);
    echo "\t\tlet ac_M=$ac_M\n";
    echo "\t\tlet ac_I=$ac_I\n";
    echo "\t\tlet ac_S=$ac_S\n";
    echo "\t\tlet ac_M_sum=$ac_M_sum\n";
    echo "\t\tlet ac_I_sum=$ac_I_sum\n";
    echo "\t\tlet ac_S_sum=$ac_S_sum\n";

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
		<h2 style="display:flex;justify-content:space-around">
            <div>Multi: ${ac_M_sum.toFixed(2)}%</div>
            <div>Image: ${ac_I_sum.toFixed(2)}%</div>
            <div>Sensor: ${ac_S_sum.toFixed(2)}%</div>
        </h2>
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