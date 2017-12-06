<html>

<head>
    <title>刷牙牙</title>
    <link rel="icon" type="image/png" href="favicon.png" />
    <link rel="stylesheet" href="css/header_bar.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="css/style.css">

    <!--
    ───────────▄▄▄█▄▄█▄▄█▄▄▄ 
    ────────▄▀▀═════════════▀▀▄ 
    ───────█═══════════════════█ 
    ──────█═════════════════════█ 
    ─────█═══▄▄▄▄▄▄▄═══▄▄▄▄▄▄▄═══█ 
    ────█═══█████████═█████████═══█ 
    ────█══██▀────▀█████▀────▀██══█ 
    ───██████──█▀█──███──█▀█──██████ 
    ───██████──▀▀▀──███──▀▀▀──██████ 
    ────█══▀█▄────▄██─██▄────▄█▀══█ 
    ────█════▀█████▀───▀█████▀════█ 
    ────█═════════════════════════█ 
    ────█═════════════════════════█ 
    ────█═══════▀▄▄▄▄▄▄▄▄▄▀═══════█ 
    ────█═════════════════════════█ 
    ───▐▓▓▌═════════════════════▐▓▓▌ 
    ───▐▐▓▓▌▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▐▓▓▌▌ 
    ───█══▐▓▄▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▄▓▌══█ 
    ──█══▌═▐▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌═▐══█ 
    ──█══█═▐▓▓▓▓▓▓▄▄▄▄▄▄▄▓▓▓▓▓▓▌═█══█ 
    ──█══█═▐▓▓▓▓▓▓▐██▀██▌▓▓▓▓▓▓▌═█══█ 
    ──█══█═▐▓▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▓▌═█══█ 
    ──█══█▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓█══█ 
    ─▄█══█▐▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌█══█▄ 
    ─█████▐▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌─█████ 
    ─██████▐▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌─██████ 
    ──▀█▀█──▐▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌───█▀█▀ 
    ─────────▐▓▓▓▓▓▓▌▐▓▓▓▓▓▓▌ 
    ──────────▐▓▓▓▓▌──▐▓▓▓▓▌
    ─────────▄████▀────▀████▄ 
    ─────────▀▀▀▀────────▀▀▀▀
-->
</head>

<body>
    <!--Header Bar-->
    <?php include_once("header_bar.php"); ?>
    <!--<h1><span class="blue">&lt;</span>Yoyo<span class="blue">&gt;</span> <span class="yellow">早~上7來刷刷牙</span></h1>-->
    <div id="root">
        <table class="container">
        </table>
    </div>
    <script>
        const replicate = (length, el) => {
            return Array.from({
                length
            }, () => el)
        }
        const range = (length => Array.from({
            length
        }, (_, i) => i))

        const delay = t => new Promise(res => setTimeout(res, t))

        let countMulti
        let countImage
        let countSensor
        let fetchMulti = ["./random.php",500]
        let fetchImage = ["./random.php",500]
        let fetchSensor = ["./random.php",500]
        let start_pause_flag = 0

        let teeth = [{
            id: 1,
            name: "右上頰側",
            hand: "右手"
        }, {
            id: 2,
            name: "上排前牙",
            hand: "右手"
        }, {
            id: 3,
            name: "左上頰側",
            hand: "左手"
        }, {
            id: 4,
            name: "左上咬合面",
            hand: "左手"
        }, {
            id: 5,
            name: "左上舌側",
            hand: "右手"
        }, {
            id: 6,
            name: "上排前牙舌側",
            hand: "右手"
        }, {
            id: 7,
            name: "右上舌側",
            hand: "左手"
        }, {
            id: 8,
            name: "右上咬合面",
            hand: "右手"
        }, {
            id: 9,
            name: "右下頰側",
            hand: "右手"
        }, {
            id: 10,
            name: "下排前牙外側",
            hand: "右手"
        }, {
            id: 11,
            name: "左下頰側",
            hand: "左手"
        }, {
            id: 12,
            name: "左下咬合面",
            hand: "左手"
        }, {
            id: 13,
            name: "左下舌側",
            hand: "右手"
        }, {
            id: 14,
            name: "下排前牙舌側",
            hand: "右手"
        }, {
            id: 15,
            name: "右下舌側",
            hand: "左手"
        }, {
            id: 16,
            name: "右下咬合面",
            hand: "右手"
        }]

        document.querySelector("table.container").innerHTML = range(4)
            .map(i => 4 * i)
            .map(i => teeth.slice(i, i + 4))
            .map(teeth => {
                let teethHtml = teeth.map(({
                    name,
                    hand,
                    id
                }) => `
					<td>
						<div>
							<a>
								<div>${id}</div>
								<div class="hand">${hand}</div>
								<div><button type="button" class="ggininder">追蹤</button></div>
							</a>
							<section>
								<img src='img/t${id}.png' class="teeth" />
								<div class="middle">
									<div class="text">${name} ${id}</div>
								</div>
							</section>
						</div>
					</td>
				`).join("")

                return `<tr>${teethHtml}</tr>`
            }).join("")

        let tds = document.querySelectorAll('.container td')
        let targets = Array.from(document.querySelectorAll(".container td button"));
        let recordId;
        targets.forEach((t, i) => (t.onclick = () => toggleTest(i)));
        let interval1
        let interval2
        let interval3
        
        const start = async() => {
            tds.forEach(td => td.classList.add("multi"))
            await delay(1000)
            tds.forEach(td => td.classList.remove("multi"))            
            tds.forEach(td => td.classList.add("image"))
            await delay(1000)
            tds.forEach(td => td.classList.remove("image"))
            tds.forEach(td => td.classList.add("sensor"))
            await delay(1000)
            tds.forEach(td => td.classList.remove("sensor"))
                        
            interval1 = setInterval(() => {
                fetch(fetchMulti[0]) // './output/res_multi.txt'
                    .then(res => res.text())
                    .then(i => {
                        tds.forEach(td => td.classList.remove("multi"))
                        tds[i - 1].classList.add("multi")
                        if (recordId !== undefined) {
                            countMulti[i - 1] += 1
                        }
                    })
            }, fetchMulti[1])
            interval2 = setInterval(() => {
                fetch(fetchImage[0]) // './output/res_image.txt'
                    .then(res => res.text())
                    .then(i => {
                        tds.forEach(td => td.classList.remove("image"))
                        tds[i - 1].classList.add("image")
                        if (recordId !== undefined) {
                            countImage[i - 1] += 1
                        }
                    })
            }, fetchImage[1])
            interval3 = setInterval(() => {
                fetch(fetchSensor[0])   // './output/res_sensor.txt'
                    .then(res => res.text())
                    .then(i => {
                        tds.forEach(td => td.classList.remove("sensor"))
                        tds[i - 1].classList.add("sensor")
                        if (recordId !== undefined) {
                            countSensor[i - 1] += 1
                        }
                    })
            }, fetchSensor[1])
        }

        start()

        function add(a, b) {
            return a + b
        }
        function acu(a, b) {
            return a / b.reduce(add, 0) * 100
        }
        function delComfirm() {
            if(confirm("Are you sure to initialize the total record data?")){
                fetch("output/total/init.php")
            }else{
                //alert("No");
            }
        }
        function startPause(){
            if (!start_pause_flag){
                fetchMulti[0] = "./output/res_multi.txt"
                fetchImage[0] = "./output/res_image.txt"
                fetchSensor[0] = "./output/res_sensor.txt"
                fetchMulti[1] = 500
                fetchImage[1] = 500
                fetchSensor[1] = 500
                start_pause_flag = 1
            }else{
                fetchMulti[0] = "./random.php"
                fetchImage[0] = "./random.php"
                fetchSensor[0] = "./random.php"
                fetchMulti[1] = 500
                fetchImage[1] = 500
                fetchSensor[1] = 500
                start_pause_flag = 0
            }
        }
        const toggleTest = id => {
            if (recordId == undefined) { //start of Trace button
                recordId = id
                countMulti = replicate(16, 0)
                countImage = replicate(16, 0)
                countSensor = replicate(16, 0)
                targets[id].classList.add("active");
                
                fetch(`../uploads/currentPos.php?id=${id}`)
            } else if (id == recordId) { //end of Trace button
                targets[id].classList.remove("active");

                let accuracy_M = acu(countMulti[id], countMulti);
                let accuracy_I = acu(countImage[id], countImage);
                let accuracy_S = acu(countSensor[id], countSensor);
                console.table([countMulti,
                    countImage,
                    countSensor
                ])
                console.log(teeth[id].name + "'s Accuracy : ")
                console.log("Multi-model = " + accuracy_M.toFixed(2) + "% !")
                console.log("Image-model = " + accuracy_I.toFixed(2) + "% !")
                console.log("Sensor-model = " + accuracy_S.toFixed(2) + "% !")
                
                // let body = countMulti.map(d => `resultMIS[]=${d}`).join("&")
                // 		+ "&" + countImage.map(d => `resultMIS[]=${d}`).join("&")
                // 		+ "&" + countSensor.map(d => `resultMIS[]=${d}`).join("&")
                //         + `&resultMIS[]=${id}`
                
                fetch("../uploads/currentPos.php?id=87")
                let body = `data=${encodeURI(JSON.stringify({recordId,countMulti,countImage,countSensor}))}`
                recordId = undefined;
                fetch("record.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body
                })
            }

        }
    </script>
</body>

</html>