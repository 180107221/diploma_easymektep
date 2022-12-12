<?php 
    session_start();

    include('../conn.php');

    if((empty($_SESSION['id']) && empty($_SESSION['token'])) && (empty($_COOKIE['id']) && empty($_COOKIE['token']))){
        header("Location: ../");
        exit();
    }
    else{
        if(!empty($_COOKIE['id']) && !empty($_COOKIE['token'])){
            $id = $_COOKIE['id'];
            $password = $_COOKIE['token'];
    
            $sql = "select * from student where id = '$id' and token = '$password'";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result);  
            $count = mysqli_num_rows($result);  
              
            if($count == 1){  

            }  
            else{  
                header("Location: ../");
                exit();
            }
        }
        else{
            $username = $_SESSION['id'];
            $password = $_SESSION['token'];  
          
            $sql = "select * from student where id = '$username' and token = '$password'";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result);  
            $count = mysqli_num_rows($result);  
              
            if($count == 1){  
            }  
            else{  
                header("Location: ../");
                exit();
            }
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Statistics - EasyMektep</title>
    <link rel="stylesheet" href="../lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/site.css" />
    <link rel="stylesheet" href="../views/shared/layout.css" />
</head>
<body>
    <header>
        <div class="wrapper">
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion mt-3" id="accordionSidebar">
                <li class="nav-item">
                    <a class="nav-link" href="../Dashboard/">
                        <i>
                            <img class="mainIcon" src="../icons/em.svg" />
                        </i>
                    </a>
                </li>
                <li class="nav-item mt-3">
                        <a class="nav-link" href="../Dashboard/">
                            <i>
                                <img class="icons" src="../icons/dashboardIcon.svg" />
                            </i>
                        </a>
                </li>
                <li class="nav-item mt-3">
                        <a class="nav-link" href="../Projects/">
                            <i>
                                <img class="icons" src="../icons/projectsIcon.svg" />
                            </i>
                        </a>
                </li>
                <li class="nav-item mt-3">
                        <a class="nav-link" href="../Statistics/">
                            <i>
                                <img class="icons" src="../icons/statisticsIconActive.svg" />
                            </i>
                        </a>
                </li>
                <li class="nav-item mt-3">
                        <a class="nav-link" href="../Timer/">
                            <i>
                                <img class="icons" src="../icons/timerIcon.svg" />
                            </i>
                        </a>
                </li>
                <li class="nav-item mt-3">
                        <a class="nav-link" href="../Settings/">
                            <i>
                                <img class="icons" src="../icons/settings_future.svg" />
                            </i>
                        </a>
                </li>
                <li style="margin-top: 300%;" class="nav-item">
                   
                        <a class="nav-link" href="../Exit/">
                                <i>
                                    <img style="width:45%" class="icons" src="../icons/logoutMain.svg" />
                                </i>
                        </a>
                </li>
            </ul>
        </div>
        <div class="wrapperMobile col-9" id="mobileWrapper" style="display:none">
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion ml-3" id="accordionSidebar">                
                <li class="nav-item mt-3">
                <a class="nav-link" href="../Dashboard/">
                    <i class="iconsMobile">
                        <img src="../icons/dashboardIcon.svg" />
                        Dashboard
                    </i>
                </a>
                </li>
                <li class="nav-item mt-3">
                <a class="nav-link" href="../Projects/">
                    <i class="iconsMobile">
                        <img src="../icons/dashboardIcon.svg" />
                        Projects
                    </i>
                    
                </a>
                </li>
                <li class="nav-item mt-3">
                    <a class="nav-link" href="../Statistics/">
                        <i class="iconsMobileActive">
                            <img src="../icons/dashboardIcon.svg" />
                            Statistics
                        </i>
                        
                    </a>
                </li>
                <li class="nav-item mt-3">
                <a class="nav-link" href="../Timer/">
                    <i class="iconsMobile">
                        <img src="../icons/dashboardIcon.svg" />
                        Timer
                    </i>
                    
                </a>
                </li>
                <li class="nav-item mt-3">
                        <a class="nav-link" href="../Settings/">
                            <i class="iconsMobile">
                                <img src="../icons/dashboardIcon.svg" />
                                Settings
                            </i>

                        </a>
                </li>
            </ul>
            <div class="logout ml-3">
                <img src="../icons/logout.svg" />
                Log out
            </div>
        </div>
        <div class="cover" onclick="hideWrapper()" id="cover" style="display:none">

        </div>
    </header>
    <section>
        <div class="container">
            <main role="main" class="pb-3">
                <div  class="mb-3 mt-3" style="display:flex">
                    <div class="col" style="padding-left:0px;">
                        <p class="title">Statistics</p>
                    </div>
                    <div class="float-right" style="display:flex;">
                        <div class="mr-2">
                            <img class="headImg" src="../icons/notif.svg" />
                        </div>
                        <div class="listHead mr-2">
                            <img onclick="showWrapper()" class="headImg" src="../icons/list.svg" />
                        </div>
                        <div class="mr-2">
                            <img class="headImg" src="../persons/2.svg" />
                        </div>
                        <div class="user align-self-center mr-2">
                            Betty Cooper
                        </div>
                        <div class="mr-2 align-self-center">
                            <div class="dropdown show">
                                <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../icons/arrow.svg" />
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <head>
    <link rel="stylesheet" href="../views/statistics/index.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
</head>
<div class="statisticDesktop mt-5" id="mainDiv" style="display:flex">
    <div class="block col-7" id="block">
        <div id="curveTitle" class="row" style="display: flex;">
            <div class="titleDiv col" style="white-space:nowrap">Number of completed tasks</div>

            <div class="col" style="font-size:12px">
                <input id="daterange" class="daterange float-right" type="text" name="daterange"/>
            </div>
        </div>
        <div style="width:100%; height: 100%" id="curve_chartPC"></div>
    </div>
    <div class="col">
        <div class="block" style="padding: 5%;">
            <div style="display:flex">
                <div class="prog col">Progress</div>
                <div class="prog col">Remaining</div>
                <div class="prog col">Time spent</div>
            </div>
            <div style="display:flex">
                <div class="progVal col">83%</div>
                <div class="progVal col">23 hrs</div>
                <div class="progVal col">113 hrs</div>
            </div>
        </div>

        <div class="block">
            <div class="chartTitle">Task plagiarism</div>
            <div class="row mt-3">
                <div style="display:inline-flex">
                    <div id="allTime" class="plagiarismRangeActive col" onclick="Plagiarism('allTime')" style="white-space:nowrap">All time</div>
                    <div id="month" class="plagiarismRange col" onclick="Plagiarism('month')" style="white-space:nowrap">Month</div>
                    <div id="year" class="plagiarismRange col" onclick="Plagiarism('year')" style="white-space:nowrap">Year</div>
                </div>
            </div>
            <div class="row mt-3">
                    <div id="All time" style="display:none">
                        <div class="plagiarism col" style="white-space:nowrap">Low - 87%</div>
                        <div class="plagiarism col" style="white-space:nowrap">Medium - 10%</div>
                        <div class="plagiarism col" style="white-space:nowrap">High - 3%</div>
                    </div>
                    <div id="Month" style="display:none">
                        <div class="plagiarism col" style="white-space:nowrap">Low - 70%</div>
                        <div class="plagiarism col" style="white-space:nowrap">Medium - 20%</div>
                        <div class="plagiarism col" style="white-space:nowrap">High - 10%</div>
                    </div>
                    <div id="Year" style="display:none">
                        <div class="plagiarism col" style="white-space:nowrap">Low - 83%</div>
                        <div class="plagiarism col" style="white-space:nowrap">Medium - 12%</div>
                        <div class="plagiarism col" style="white-space:nowrap">High - 5%</div>
                    </div>
            </div>
            <div class="mt-5" style="display:flex">
                <div class="donut col">
                    <div>
                        <div id="donutchartPC">
                        </div>
                        <div id="donutchartPC1"></div>
                    </div>

                </div>
                <div class="col align-self-center">
                    <div class="row">
                        <div class="plagiarismEx col">
                            High
                        </div>
                        <div class="col">
                            <img src="../img/highChart.svg" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="plagiarismEx col">
                            Medium
                        </div>
                        <div class="col">
                            <img src="../img/mediumChart.svg" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="plagiarismEx col">
                            Low
                        </div>
                        <div class="col">
                            <img src="../img/lowChart.svg" />
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="block">
            <div class="row-form" style="display: flex">

                <div class="chartTitle">Completed tasks</div>
            </div>
            <div class="row-form" style="display:flex;">
                <div class="col">
                    <div id="piechartPC"></div>
                </div>
                <div class="col align-self-center">
                    <div style="display:inline-flex">
                        <div onclick="Completed('completedTotal')" id="completedTotal" class="completedActive col">Total</div>
                        <div onclick="Completed('completedMonth')" id="completedMonth" class="completed col">Month</div>
                    </div>
                    <div class="mt-4" style="font-size:14px">Total amount of tasks 100</div>
                    <div class="mt-2" id="descCompleted" style="display:inline-flex">
                        <div class="col" style="display:flex">
                            <div class="col" style="padding-right: 0px;padding-left: 0px;"><img src="../img/green.svg" /></div>
                            <div class="col align-self-center" style="padding-right: 0px; font-size: 12px">Completed</div>
                        </div>
                        <div class="col" style="display:flex">
                            <div class="col" style="padding-right:0px;padding-left: 0px;"><img src="../img/purple.svg" /></div>
                            <div class="col align-self-center" style="padding-right: 0px; font-size: 12px">Uncompleted</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            </main>
        </div>
    </section>

    <script src="../lib/jquery/dist/jquery.min.js"></script>
    <script src="../lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/site.js?v=4q1jwFhaPaZgr8WAUSrux6hAuh0XDg9kPS3xIVq36I0"></script>
    <script>
        var oldWidth = window.innerWidth;
        window.onresize = function () {
            var newWidth = window.innerWidth;
            if (newWidth != oldWidth) {
                oldWidth = newWidth;
                location.reload();
            }
        };
        function showWrapper() {
            document.getElementById('mobileWrapper').style.display = '';
            document.getElementById('cover').style.display = '';
        }
        function hideWrapper() {
            document.getElementById('mobileWrapper').style.display = 'none';
            document.getElementById('cover').style.display = 'none';
        }
    </script>
    
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <script type="text/javascript">
        $('input[name="daterange"]').daterangepicker({
            locale: {
                format: 'DD MMM. YYYY'
            },
            startDate: '01 Feb. 2022',
            endDate: '01 Jun. 2022'
        },
            function (start, end, label) {
                window.location.href = "../Statistics/index.php?startDate=" + start.format('YYYY-MM-DD') + '&endDate=' + end.format('YYYY-MM-DD');
            });
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChartPie);
        google.charts.setOnLoadCallback(drawChartDonat);

        $(document).ready(function () {
            if (window.matchMedia("(max-width: 1200px)").matches) {
                document.getElementById('mainDiv').style.display = 'block';
                document.getElementById('block').className = 'block col';
                document.getElementById('curveTitle').className = '';
                document.getElementById('curveTitle').style.display = 'block';
                document.getElementById('daterange').className = 'daterange';
                document.getElementById('descCompleted').style.display = '';
            }
            document.getElementById('All time').style.display = 'inline-flex';
        });
        function Completed(id) {
            let completed = 0;
            let uncompleted = 0;
            if (id == 'completedTotal') {
                document.getElementById('completedTotal').className = 'completedActive col';
                document.getElementById('completedMonth').className = 'completed col';
                completed = 86;
                uncompleted = 14;
            }
            else
            {
                document.getElementById('completedMonth').className = 'completedActive col';
                document.getElementById('completedTotal').className = 'completed col';
                completed = 30;
                uncompleted = 70;
            }

            var data = google.visualization.arrayToDataTable([
                ['State', 'Percent'],
                ['86%', completed], ['14%', uncompleted]
            ]);

            var options = {
                legend: 'none',
                pieStartAngle: 90,
                pieSliceText: 'percentage',
                pieSliceTextStyle: { fontName: 'Poppins', fontSize: 14, fontWeight: 400 },
                slices: {
                    0: {
                        color: '#6B408C',
                    },
                    1: { color: '#37C24E', offset: 0.2 }
                }
            };

            /*var chart = new google.visualization.PieChart(document.getElementById('piechart'));*/
            var chartPC = new google.visualization.PieChart(document.getElementById('piechartPC'));
            /*chart.draw(data, options);*/
            chartPC.draw(data, options);
        }
        function Plagiarism(range) {
            let low = 0;
            let high = 0;
            let medium = 0;
            if (range == "month") {
                low = 70;
                high = 10;
                medium = 20;
                document.getElementById("month").className = 'plagiarismRangeActive col'
                document.getElementById("year").className = 'plagiarismRange col'
                document.getElementById("allTime").className = 'plagiarismRange col'
                document.getElementById('All time').style.display = 'none';
                document.getElementById('Month').style.display = 'inline-flex';
                document.getElementById('Year').style.display = 'none';
            }
            else if (range == "year") {
                low = 83;
                high = 5;
                medium = 12;
                document.getElementById("month").className = 'plagiarismRange col'
                document.getElementById("year").className = 'plagiarismRangeActive col'
                document.getElementById("allTime").className = 'plagiarismRange col'
                document.getElementById('All time').style.display = 'none';
                document.getElementById('Month').style.display = 'none';
                document.getElementById('Year').style.display = 'inline-flex';
            }
            else {
                low = 87;
                high = 3;
                medium = 10;
                document.getElementById("month").className = 'plagiarismRange col'
                document.getElementById("year").className = 'plagiarismRange col'
                document.getElementById("allTime").className = 'plagiarismRangeActive col'
                document.getElementById('All time').style.display = 'inline-flex';
                document.getElementById('Month').style.display = 'none';
                document.getElementById('Year').style.display = 'none';
            }


            let larguraGraficoFora = 0;
            let alturaGraficoFora = 0;
            if (window.matchMedia("(max-width: 1200px)").matches) {
                larguraGraficoFora = 150;
                alturaGraficoFora = 150;
            }
            else {
                larguraGraficoFora = 200;
                alturaGraficoFora = 200;
            }
            let furoGraficoFora = 0.7;
            var data = google.visualization.arrayToDataTable(
                [
                    ['Plagiarism', 'Percentage'],
                    ['Low', low],
                    ['', 5],
                    ['High', high],
                    ['', 5]
                ]);

            var options = {
                width: larguraGraficoFora,
                height: alturaGraficoFora,
                chartArea: { left: 0, top: 0, width: '100%', height: '100%' },
                title: "",
                pieHole: 0.9,
                pieSliceBorderColor: "none",
                colors: ['#0BC073', '#EFEFEF', '#EB5757', '#EFEFEF'],
                legend: {
                    position: "none"
                },
                pieSliceText: "percentage",
                tooltip: {
                    trigger: "none"
                }
            };

            var data1 = google.visualization.arrayToDataTable(
                [
                    ['Plagiarism', 'Percentage'],
                    ['Medium', medium],
                    ['', 90]
                ]);

            var options1 = {
                title: "",
                pieHole: 0.9,
                pieSliceBorderColor: "none",
                colors: ['#FB9818', '#EFEFEF'],
                legend: {
                    position: "none"
                },
                pieSliceText: "none",
                tooltip: {
                    trigger: "none"
                },
                width: larguraGraficoFora * furoGraficoFora,
                height: alturaGraficoFora * furoGraficoFora,
                chartArea: { left: 0, top: 0, width: '100%', height: '100%' },
                backgroundColor: 'transparent',
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchartPC'));
            var chart1 = new google.visualization.PieChart(document.getElementById('donutchartPC1'));
            chart.draw(data, options);
            chart1.draw(data1, options1);
            ajustePosicaoPieCentral(larguraGraficoFora, alturaGraficoFora, furoGraficoFora);
        }
        function drawChart() {
            var dataPC = new google.visualization.DataTable();
            dataPC.addColumn('date', 'Date');
            dataPC.addColumn('number', 'TopLine');
            dataPC.addColumn('number', 'BottomLine');
            var arr = [];
            	arr.push([new Date("31.01.2022 0:00:00"), parseInt("53"), parseInt("33")])
            	arr.push([new Date("01.02.2022 0:00:00"), parseInt("30"), parseInt("10")])
            	arr.push([new Date("02.02.2022 0:00:00"), parseInt("10"), parseInt("10")])
            	arr.push([new Date("03.02.2022 0:00:00"), parseInt("68"), parseInt("48")])
            	arr.push([new Date("04.02.2022 0:00:00"), parseInt("33"), parseInt("13")])
            	arr.push([new Date("05.02.2022 0:00:00"), parseInt("65"), parseInt("45")])
            	arr.push([new Date("06.02.2022 0:00:00"), parseInt("35"), parseInt("15")])
            dataPC.addRows(arr);

            var options = {
                curveType: 'function',
                hAxis: {
                    format: 'dd/MM',
                },
                colors: ['#6B408C','#FFD600'],
                'chartArea': { 'width': '90%', 'height': '80%' },
                legend: 'none',
                pointSize: 5
            };

            var chartPC = new google.visualization.LineChart(document.getElementById('curve_chartPC'));
            chartPC.draw(dataPC, options);
        }
        function drawChartPie() {
            let larguraGraficoFora = 0;
            let alturaGraficoFora = 0;
            if (window.matchMedia("(max-width: 1200px)").matches) {
                larguraGraficoFora = 130;
                alturaGraficoFora = 130;
            }
            else {
                larguraGraficoFora = 200;
                alturaGraficoFora = 200;
            }
            var data = google.visualization.arrayToDataTable([
                ['State', 'Percent'],
                ['86%', 86], ['14%', 14]
            ]);

            var options = {
                width: larguraGraficoFora,
                height: alturaGraficoFora,
                legend: 'none',
                pieStartAngle: 90,
                pieSliceText: 'percentage',
                pieSliceTextStyle: { fontName: 'Poppins', fontSize: 14, fontWeight: 400 },
                slices: {
                    0: {
                        color: '#6B408C',
                    },
                    1: { color: '#37C24E', offset: 0.2 }
                }
            };

            /*var chart = new google.visualization.PieChart(document.getElementById('piechart'));*/
            var chartPC = new google.visualization.PieChart(document.getElementById('piechartPC'));
            /*chart.draw(data, options);*/
            chartPC.draw(data, options);
        }
        function drawChartDonat() {
            //control is here
            let larguraGraficoFora = 0;
            let alturaGraficoFora = 0;
            if (window.matchMedia("(max-width: 1200px)").matches) {
                larguraGraficoFora = 150;
                alturaGraficoFora = 150;
            }
            else {
                larguraGraficoFora = 200;
                alturaGraficoFora = 200;
            }
            let furoGraficoFora = 0.7;
            var data = google.visualization.arrayToDataTable(
                [
                    ['Plagiarism', 'Percentage'],
                    ['Low', 87],
                    ['', 5],
                    ['High', 3],
                    ['', 5]
                ]);

            var options = {
                width: larguraGraficoFora,
                height: alturaGraficoFora,
                chartArea: { left: 0, top: 0, width: '100%', height: '100%' },
                title: "",
                pieHole: 0.9,
                pieSliceBorderColor: "none",
                colors: ['#0BC073', '#EFEFEF', '#EB5757', '#EFEFEF'],
                legend: {
                    position: "none"
                },
                pieSliceText: "percentage",
                tooltip: {
                    trigger: "none"
                }
            };

            var data1 = google.visualization.arrayToDataTable(
                [
                    ['Plagiarism', 'Percentage'],
                    ['Medium', 10],
                    ['', 90]
                ]);

            var options1 = {
                title: "",
                pieHole: 0.9,
                pieSliceBorderColor: "none",
                colors: ['#FB9818', '#EFEFEF'],
                legend: {
                    position: "none"
                },
                pieSliceText: "none",
                tooltip: {
                    trigger: "none"
                },
                width: larguraGraficoFora * furoGraficoFora,
                height: alturaGraficoFora * furoGraficoFora,
                chartArea: { left: 0, top: 0, width: '100%', height: '100%' },
                backgroundColor: 'transparent',
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchartPC'));
            var chart1 = new google.visualization.PieChart(document.getElementById('donutchartPC1'));
            chart.draw(data, options);
            chart1.draw(data1, options1);
            ajustePosicaoPieCentral(larguraGraficoFora, alturaGraficoFora, furoGraficoFora);
        }
        function ajustePosicaoPieCentral(largura, altura, furo) {

            yt = altura * (1 + furo) / 2.0;
            xt = largura * (1 - furo) / 2.0;

            var css = document.getElementById('donutchartPC1');
            css.style.transform = "translate(" + xt + "px, -" + yt + "px)";
        }
    </script>

</body>
</html>