<!DOCTYPE html>
<html lang="en">
<!-- action here -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">

    <title>Admin_page</title>
    <!-- bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- CSS here -->
    <link rel="stylesheet" href="styles/styles_admin.css">
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <!--Top menu -->
    <header class="section">
      <div class="top_navbar align-items-center header-bar" >
        <div class="hamburger">
            <a href="main.html">
                <img src="images/meIT2.png" alt="" width="150" height="auto">
            </a>
        </div>      
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-start">
                <div class="d-flex align-items-center me-md-auto"></div>
                <div class="context">
                    <h1 class="text-dark fs-2">สถิติโดยรวม</h1>
                </div>
            </div>
        </div>
        <div class="dropdown" style="margin-right: 2.5rem;">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="images/man (2).png" alt="" width="40" height="auto" class="rounded-circle success" style="border: #000000 solid; ">
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownUser1" style="font-size: 1.35rem;">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li>
              <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>
      </div>
        <div class="sidebar">
            <!--menu item-->
            <ul>
                <li>
                    <a href="listprofile.html">
                        <span class="icon"><i class="fas fa-chart-line"></i></span>
                        <span class="item">โปรไฟล์ผู้ใช้งาน</span>
                    </a>
                </li>
                <li>
                    <a href="admin_page.html" class="active">
                        <span class="icon"><i class="fas fa-chart-line"></i></span>
                        <span class="item">สถิติโดยรวม</span>
                    </a>
                </li>
                <li>
                    <a href="admin_page_school.html">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item">สถิติการศึกษา</span>
                    </a>
                </li>
                <li>
                    <a href="admin_page_location.html">
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item">สถิติสถานที่ตั้งบริษัท</span>
                    </a>
                </li>
                <li>
                    <a href="admin_page_position.html">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">สถิติตำแหน่ง</span>
                    </a>
                </li>
                <li>
                    <a href="admin_page_skill.html">
                        <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="item">สถิติตามความสามารถ</span>
                    </a>
                </li>
                <li>
                    <a href="admin_page_salary.html">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">สถิติเงินเดือน</span>
                    </a>
                </li>

            </ul>
        </div>
    </header>
    <!-- body web -->
    <div class="mainContent">
        <div class="column">
            <div class="jobsearch rounded-25">
                <h2>บริษัท</h2>
                <div class="jobsearch_all">
                    <canvas id="skillChart" style="width:100%;max-width:600px"></canvas>
                    <script>
                        var xValues = ["HTML", "PHP", "JavaScript", "Java", "SQL"];
                        var yValues = [55, 49, 44, 24, 16];
                        var barColors = ["red", "green", "blue", "orange", "brown"];
                        new Chart("skillChart", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    backgroundColor: barColors,
                                    data: yValues
                                }]
                            },
                            options: {
                                legend: {
                                    display: false
                                },
                                title: {
                                    display: true,
                                    text: "ภาพรวมความสามารถที่บริษัทต้องการ"
                                }
                            }
                        });
                    </script>
                </div>
                <div class="jobsearch_want">
                    <canvas id="jobChart" style="width:100%;max-width:600px"></canvas>
                    <script>
                        var xValues = ["UX/UI", "Beck-end Dev.", "Font-end Dev.", "Android Dev.", "IOS Dev."];
                        var yValues = [60, 40, 36, 55, 50];
                        var barColors = ["red", "green", "blue", "orange", "brown"];
                        new Chart("jobChart", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    backgroundColor: barColors,
                                    data: yValues
                                }]
                            },
                            options: {
                                legend: {
                                    display: false
                                },
                                title: {
                                    display: true,
                                    text: "ภาพรวมตำแหน่งที่บริษัทต้องการ"
                                }
                            }
                        });
                    </script>
                </div>
            </div>

        </div>
        <div class="column">
            <div class="candidate rounded-25">
                <h2>หางาน</h2>
                <div class="candidate_all">
                    <canvas id="skillcandidateChart" style="width:100%;max-width:600px"></canvas>
                    <script>
                        var xValues = ["HTML", "PHP", "JavaScript", "Java", "SQL"];
                        var yValues = [40, 49, 21, 30, 25];
                        var barColors = ["red", "green", "blue", "orange", "brown"];
                        new Chart("skillcandidateChart", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    backgroundColor: barColors,
                                    data: yValues
                                }]
                            },
                            options: {
                                legend: {
                                    display: false
                                },
                                title: {
                                    display: true,
                                    text: "ภาพรวมความสามารถผู้สมัครงาน"
                                }
                            }
                        });
                    </script>
                </div>
                <div class="candidate_want">
                    <canvas id="jobcandidateChart" style="width:100%;max-width:600px"></canvas>
                    <script>
                        var xValues = ["UX/UI", "Beck-end Dev.", "Font-end Dev.", "Android Dev.", "IOS Dev."];
                        var yValues = [50, 30, 25, 30, 22];
                        var barColors = ["red", "green", "blue", "orange", "brown"];
                        new Chart("jobcandidateChart", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    backgroundColor: barColors,
                                    data: yValues
                                }]
                            },
                            options: {
                                legend: {
                                    display: false
                                },
                                title: {
                                    display: true,
                                    text: "ภาพรวมตำแหน่งที่ผู้หางานสนใจ"
                                }
                            }
                        });
                    </script>
                </div>

            </div>
        </div>
    </div>
    </div>
</body>

</html>
