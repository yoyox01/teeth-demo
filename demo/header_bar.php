<link rel="stylesheet" href="css/header_bar.css">

<div class="row preview-html" ng-show="screen == 'preview'" ng-hide="loading">
    <div class="col-md-12">
        <div id="cssmenu">
            <ul>
                <li class="active">
                    <a href="index.php" id="ch_font">
                        <div>
                            <img src="icon/tooth_white.svg" class="icon"></img>
                            <span><i class="fa fa-fw fa-home" ></i> 基於深度學習智慧刷牙動作辨識</span>
                        </div>
                    </a>
                </li>
                <li class="has-sub">
                    <a href="show.php" target="_blank">
                        <div>
                            <img src="icon/statistics.svg" class="icon"></img>
                            <span><i class="fa fa-fw fa-bars"></i> Statistics</span>
                         </div>
                    </a>
                    <ul>
                        <li class="has-sub"><a href="show.php" target="_blank"><span>Current Result</span></a>
                            
                        </li>
                        <li class="has-sub"><a href="show_total_ac.php"><span>Total Result</span></a>
                            <ul>
                            <script>
                                for(let i=0; i<16; i++){
                                    document.write(`
                                    <li><a href="show_total.php?totalId=${i}" target="_blank"><span>Menu ${i+1}</span></a></li>
                                    `)
                                }
                            </script>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a>
                    <div>
                        <img src="icon/init.svg" class="icon"></img>
                        <script>
                        function delComfirm() {
                            if(confirm("Are you sure to initialize the total record data?")){
                                fetch("output/total/init.php")
                            }else{
                                //alert("No");
                            }
                        }
                        </script>
                        <span onclick="delComfirm()"><i class="fa fa-fw fa-cog"></i>Initial Data</span>
                    </div>
                </a></li>   
                <!--
                <li><a href=""><span><i class="fa fa-fw fa-phone"></i> Contact</span></a></li>
                -->
            </ul>
        </div>
    </div>
</div>