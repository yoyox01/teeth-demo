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
        function add(a, b) {
            return a + b;
        }

        function acu(a, b) {
            return a / b.reduce(add, 0) * 100;
        }
<?php
    print_r($_GET);
    $totalId = $_GET["totalId"];

    $f1 = fopen("output/total/total".$totalId.".txt", "r") or die("Unable to open file!");
    $json="";
    while(!feof($f1)){
        $json.=fgets($f1);
    }
    fclose($f1);
    echo "\t\tlet data=$json\n";

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

        let stats_multi = data.countMulti
        let stats_image = data.countImage
        let stats_sensor = data.countSensor
        let recordId = data.recordId

        let accuracy_M = acu(stats_multi[recordId], stats_multi);
        let accuracy_I = acu(stats_image[recordId], stats_image);
        let accuracy_S = acu(stats_sensor[recordId], stats_sensor);

		document.write(`
		<h2 style="display:flex;justify-content:space-around">
            <div>#${names[recordId]}</div>
            <div>Multi: ${accuracy_M.toFixed(2)}%</div>
            <div>Image: ${accuracy_I.toFixed(2)}%</div>
            <div>Sensor: ${accuracy_S.toFixed(2)}%</div>
        </h2>
		<div class="chart">
			<canvas id="myChart"></canvas>`
		)
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: names,
                datasets: [{
                    label: 'Multi-model',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1,
                    data: stats_multi
                }, {
                    type: 'bar',
                    label: 'Image-model',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    data: stats_image
                    
                }, {
                    type: 'bar',
                    label: 'Sensor-model',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: stats_sensor
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