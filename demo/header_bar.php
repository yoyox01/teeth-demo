<link rel="stylesheet" href="css/header_bar.css">

<div class="row preview-html" ng-show="screen == 'preview'" ng-hide="loading">
    <div class="col-md-12">
        <div id="cssmenu">
            <ul>
                <li class="active">
                    <a href="index.php" id="ch_font">
                        <div>
                            <img src="icon/tooth_white.svg" class="icon"></img>
                            <span><i class="fa fa-fw fa-home" ></i> 智慧刷牙辨識學習系統</span>
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
                        <li class="has-sub"><a href="show_total_ac.php" target="_blank"><span>Total Result</span></a>
                            <ul>
                            <script>
                                for(let i=0; i<16; i++){
                                    document.write(`
                                    <li><a href="show_total.php?totalId=${i}" target="_blank"><span>Result ${i+1}</span></a></li>
                                    `)
                                }
                            </script>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="has-sub"><a href="#" onclick="delComfirm()">
                    <div>
                        <img src="icon/init.svg" class="icon"></img>
                        <span><i class="fa fa-fw fa-cog"></i>Initial Data</span>
                    </div>
                </a></li>
                <li class="has-sub"><a href="#" onclick="startPause()">
                    <div>
                        <img src="icon/play.svg" class="icon"></img>
                        <span><i class="fa fa-fw fa-phone"></i>Start/Pause</span>
                    </div>
                </a></li>
            </ul>
        </div>
    </div>
</div>