<html>
<header>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</header>
<body>
	<button class="start">start</button>
	<button class="stop">stop</button>

<!-- Code -->
<script>
	let timer;
	document.querySelector(".start").onclick=()=>{
	  if(timer!=undefined){
		clearInterval(timer)
		timer=undifined
		fetch("output/res_sensor.txt")
			.then(res => res.text())
			.then(text => fetch("record.php", {
			
				method: 'POST',
				headers: {'Content-Type':'application/x-www-form-urlencoded'},
				body: body
				
			}))
		}
	 else{
		timer=setInterval
	  }
	}
</script>

</body>
</html>