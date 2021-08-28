<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid-19 || KT-Cake</title>
    <link rel="SHORTCUT ICON"  href="https://www.facebook.com/images/emoji.php/v9/f64/1/16/1f370.png">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- css -->
    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="./css/grid.css">
</head>

<body class="loading">
    <!-- top nav -->
    <div class="nav-wrapper">
        <div class="container">
            <div class="nav">
                <a href="" class="logo">
                    C<i class="bx bxs-virus-block bx-tada"></i>VID-19
                </a>
                <div class="darkmode-switch" id="darkmode-switch">
                    <span>
                        <i class="bx bxs-moon"></i>
                        <i class="bx bxs-sun"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- end top nav -->

    <!-- main content-->
    <div class="content">
        <div class="container">
            <!-- chọn quốc gia -->
            <div class="row">
                <div class="col-3 col-md-6 col-sm12">
                    <div class="box">
                        <div class="country-select" id="country-select">
                            <div class="country-select-toggle" id="country-select-toggle">
                                <span>Toàn cầu</span>
                                <i class="bx bx-chevron-down"></i>
                            </div>
                            <div class="country-select-list" id="country-select-list">
                                <input type="text" placeholder="Tìm tên quốc gia...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end chọn quốc gia -->

            <!-- thông tin theo dõi -->
            <div class="row">
                <!-- left content -->
                <div class="col-8 col-md-12 col-sm-12">
                    <div class="row">
                        <!-- counter -->
                        <div class="col-4 col-md-4 col-sm-12">
                            <div class="box box-hover">
                                <div class="count count-confirmed">
                                    <div class="count-icon">
                                        <i class="bx bxs-virus"></i>
                                    </div>
                                    <div class="count-info">
                                        <h5 id="confirmed-total"></h5>
                                        <span>Số ca dương tính</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end counter -->
                        <!-- counter -->
                        <div class="col-4 col-md-4 col-sm-12">
                            <div class="box box-hover">
                                <div class="count count-recovered">
                                    <div class="count-icon">
                                        <i class="bx bxs-smile"></i>
                                    </div>
                                    <div class="count-info">
                                        <h5 id="recovered-total"></h5>
                                        <span>Đã bình phục</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end counter -->
                        <!-- counter -->
                        <div class="col-4 col-md-4 col-sm-12">
                            <div class="box box-hover">
                                <div class="count count-death">
                                    <div class="count-icon">
                                        <i class="bx bxs-sad"></i>
                                    </div>
                                    <div class="count-info">
                                        <h5 id="death-total"></h5>
                                        <span>Số ca tử vong</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end counter -->

                        <!-- Chart -->
                        <div class="col-12">
                            <div class="box">
                                <div class="box-header">Số liệu thống kê</div>
                                <div class="box-body">
                                    <div id="all-time-chart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end Chart -->

                        <!-- video -->
                        <div class="col-6 col-md-6 col-sm-12">
                            <div class="box">
                                <div class="box-header">Covid-19 là gì?</div>
                                <div class="box-body">
                                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/OZcRD9fV7jo"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                        </div>
                        <!-- end video -->

                        <!-- video -->
                        <div class="col-6 col-md-6 col-sm-12">
                            <div class="box">
                                <div class="box-header">Cách bảo vệ bản thân</div>
                                <div class="box-body">
                                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/S0WT9LnoT2w"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <!-- end video -->


                    </div>
                </div>
                <!-- end left content -->

                <!-- right content -->
                <div class="col-4 col-md-12 col-sm-12">
                    <div class="box">
                        <div class="box-header">30 ngày gần đây</div>
                        <div class="box-body">
                            <div id="days-chart"></div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-header">Tỉ lệ bình phục</div>
                        <div class="box-body">
                            <div id="recover-rate-chart"></div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-header">Quốc Gia Có Nhiều Ca Mắc Bệnh</div>
                        <div class="box-body">
                            <table class="table-countries" id="table-countries">
                                <thead>
                                    <tr>
                                        <th>Quốc Gia</th>
                                        <th>Số ca dương tính</th>
                                        <th>Đã bình phục</th>
                                        <th>Số ca tử vong</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>test</td>
                                        <td>test</td>
                                        <td>test</td>
                                        <td>test</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end right content -->
            </div>
            <!-- end thông tin theo dõi -->
        </div>
    </div>
    <!--end main -->

    <!-- footer -->
    <div class="footer">
        Hãy chung tay thực hiện nghiêm túc việc chống dịch vì bản thân, vì gia đình và vì mọi người!!!
    </div>
    <!-- end footer -->

    <!-- loader -->
    <div class="loader">
        <i class="bx bxs-virus bx-spin"></i>
    </div>
    <!-- end loader -->

    <!-- apexchart -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- js -->
    <script src="./js/app.js"></script>
    <script src="./js/covidApi.js"></script>
    <script src="./js/fetchApi.js"></script>
</body>

</html>