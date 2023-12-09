<!DOCTYPE html>
<html lang="en">

<head>
    <!-- import common header and common scripts, using correct relative path -->
    <?php include "../../components/common/header.php"; ?>
    <?php include "../../components/common/scripts.php" ?>
    <title>Documents</title>
    <script>
        checkProtectedRoutes();
    </script>
    <style>
    th.col-1, th.col-2, td {
        /* width: 160px; */
        text-align: center;
        vertical-align: middle;
        /* white-space: nowrap; */
        overflow: hidden;
        text-overflow: ellipsis;
      }
    </style>
</head>

<body>
    <!-- Add neccessary components, such as navbars, footer, header, etc.. -->
    <?php include "../../components/common/navbar.php"; ?>
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h1-main-title">Cases</h1>
            <a class="btn btn-primary" id="create-case-button" style="background-color: #1c277e; font-family: 'Montserrat', sans-serif;">Create New Case</a>
        </div>
        <h2 class="h2-user-greeting">Greeting, user!</h2>
        <div class="flex-con" id="adminOnly-case-stats">
            <div class="col-8 row-1 nested-flex-con-col">
                <div class="float-card row-1" style="min-height: 380px;">
                    <h3 class="h3-semibold-24">Case Info</h3>
                    <div class="nested-flex-con-row">
                        <div class="col-7">
                            <div class="chart-div" id="document-documentInfo-chart">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="nested-flex-con-col row-1-statistics">
                                <div class="nested-flex-con-row row-1-statistics">
                                    <div class="col-4 two-line-statistics">
                                        <div style="width: 85px;">
                                            <p>Total Number of Cases</p>
                                            <div class="big-number-statistics-block">
                                                <span class="big-number-statistics total-number-of-cases">36</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 three-line-statistics">
                                        <div style="width: 85px;">
                                            <p>Number of High-Priority Cases</p>
                                            <div class="big-number-statistics-block">

                                                <span class="big-number-statistics">19</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 two-line-statistics">
                                        <div style="width: 70px;">
                                            <p>Archived Cases</p>
                                            <div class="big-number-statistics-block">

                                                <span class="big-number-statistics">12</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nested-flex-con-row row-1-statistics">
                                    <div class="col-6 three-line-statistics">
                                        <div style="width: 80px;">
                                            <p>Resolution Time (in Weeks)</p>
                                            <div class="big-number-statistics-block">

                                                <span class="big-number-statistics">2.4</span>
                                                <span class="small-number-statistics">/case</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 two-line-statistics">
                                        <div style="width: 80px;">
                                            <p>Cases Assigned</p>
                                            <div class="big-number-statistics-block">

                                                <span class="big-number-statistics">2.3</span>
                                                <span class="small-number-statistics">/lawyer</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 row-1" style="">
                <!-- Overall Analytics for Documents -->
                <div class="float-card row-only-one-col">
                    <h3 class="h3-semibold-24">Case Status</h3>
                    <div class="chart-div" id="document-documentStatus-chart">

                    </div>
                </div>
            </div>
        </div>
        <h3 class="h3-semibold-24 non-float-card">All Cases</h3>
        <div class="table-section" style="overflow-y: auto;">
            <table id="case-allCase-table" class="table-general">
                <thead>
                    <tr>
                        <th class="col-2" style="width: 5%;"></th>
                        <th class="col-2" style="width: 35%;">Case Title</th>
                        <th class="col-1" style="width: 15%;">Case Type</th>
                        <th class="col-1" style="width: 15%;">Case Status</th>
                        <th class="col-2" style="width: 15%; text-align: center;">Priority</th>
                        <th class="col-2" style="width: 15%;">Total Billed Hour</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <div id="record-not-found-div" style="display: block">
                <img src="../../assets/no_record_found.png" style="width:30rem;display:block; margin-left: auto; margin-right: auto; margin-top: 6rem; border-radius: 20px;" alt="">
                <h3 style="width:30rem;display:block; margin-left: auto; margin-right: auto;margin-top: 0.5rem; text-align: center; color: #959595;">No Record found yet..</h3>

            </div>
        </div>
    </div>
    <script>
        $('.h2-user-greeting').text(renderUserGreeting())
        if(getUserType() !== 'admin' && getUserType() !== 'partner') $('#adminOnly-case-stats').css("display", "none")
        if(getUserType() !== 'admin' && getUserType() !== 'partner') $('#create-case-button').css("display", "none")
        // Options for statistics graph later
        var caseOption = {
            series: [44, 20, 30],
            fill: {
                colors: ['#1A73E8', '#B32824', '#A42824']
            },
            labels: ["open", "closed", "pending"],
            distributed: true,
            borderWidth: 0,
            chart: {
                width: 380,
                type: 'donut',
            },
            dataLabels: {
                enabled: true
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        show: true
                    }
                }
            }],
            plotOptions: {
                pie: {
                    donut: {
                        size: '70%', // Adjust the size of the donut
                    },
                    customScale: 1, // Adjust the scale to remove the white borders
                    offsetX: 0,
                    offsetY: 0,

                },
            },
            stroke: {
                show: false,
            },
            legend: {
                position: 'right',
                offsetY: 0,
                height: 230,
            }
        };

        document.getElementById('create-case-button').href = baseUrl + 'php/case/createNewCase.php';

        document.addEventListener('DOMContentLoaded', function () {
            // Select the table-section element
            const tableSection = document.querySelector('.table-section');

            // Check the user type and set max-height accordingly
            if (getUserType() === 'admin' || getUserType() === 'partner') {
                tableSection.style.maxHeight = '900px';
                
            } else {
                // If not admin, remove the max-height property
                // tableSection.style.maxHeight = '';
            }
        });

        axios.get('/api/statistics/dashboard', )
            .then(function(response) {
                const {
                    caseStatistic,
                    userStatistic,
                    clientStatistic
                } = response.data
                var options = {
                    chart: {
                        type: 'bar'
                    },
                    series: [{
                        name: 'sales',
                        data: [30, 40, 45, 50, 49, 60, 70, 91, 125]
                    }],
                    xaxis: {
                        categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
                    }
                }
                var caseOption = {
                    series: [caseStatistic.open, caseStatistic.close, caseStatistic.pending],
                    colors: graphColors.slice(0, 3),
                    fill: {
                        colors: graphColors.slice(0, 3)
                    },
                    labels: ["Open Case", "Closed Case", "Pending Case"],
                    distributed: true,
                    borderWidth: 0,
                    chart: {
                        width: 380,
                        type: 'donut',
                    },
                    dataLabels: {
                        colors: graphColors.slice(0, 3),
                        enabled: true
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                show: true
                            }
                        }
                    }],
                    states: {
                        hover: {
                            filter: {
                                type: 'none'
                            }
                        }
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '70%', // Adjust the size of the donut
                            },
                            customScale: 1, // Adjust the scale to remove the white borders
                            offsetX: 0,
                            offsetY: 0,
                            dataLabels: {
                                style: {
                                    colors: graphColors.slice(0, 3)

                                }
                            }
                        },
                    },
                    stroke: {
                        show: false,
                    },
                    legend: {
                        position: 'right',
                        offsetY: 0,
                        height: 230,
                        labels: {
                            colors: graphColors.slice(0, 3)
                        },
                        markers: {
                            fillColors: graphColors.slice(0, 3)
                        }
                    },
                    tooltip: {
                        fillSeriesColor: true
                    }
                };
                var userOption = {
                    series: [userStatistic.admins, userStatistic.paralegals, userStatistic.clients, userStatistic.partners, userStatistic.associates],
                    colors: graphColors.slice(0, 5),
                    fill: {
                        colors: graphColors.slice(0, 5)
                    },
                    labels: ["Admins", "Paralegals", "Clients", "Partners", "Associates"],
                    distributed: true,
                    borderWidth: 0,
                    chart: {
                        width: 380,
                        type: 'donut',
                    },
                    dataLabels: {
                        colors: graphColors.slice(0, 5),
                        enabled: true
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                show: true
                            }
                        }
                    }],
                    states: {
                        hover: {
                            filter: {
                                type: 'none'
                            }
                        }
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '70%', // Adjust the size of the donut
                            },
                            customScale: 1, // Adjust the scale to remove the white borders
                            offsetX: 0,
                            offsetY: 0,
                            dataLabels: {
                                style: {
                                    colors: graphColors.slice(0, 5)

                                }
                            }
                        },
                    },
                    stroke: {
                        show: false,
                    },
                    legend: {
                        position: 'right',
                        offsetY: 0,
                        height: 230,
                        labels: {
                            colors: graphColors.slice(0, 5)
                        },
                        markers: {
                            fillColors: graphColors.slice(0, 5)
                        }
                    },
                    tooltip: {
                        fillSeriesColor: true
                    }
                };

                console.log(clientStatistic);
                var clientOption = {
                    series: [{
                        // name: 'Customer Scores',
                        data: [clientStatistic.clientOverallSatisfactoryRating,
                            clientStatistic.communication,
                            clientStatistic.professionalism,
                            clientStatistic.serviceQuality,
                            clientStatistic.performance,
                        ],
                    }],
                    chart: {
                        height: 350,
                        type: 'radar',
                        toolbar: {
                            show: false
                        }
                    },
                    xaxis: {
                        categories: ['Overall Satisfactory', 'Communication', 'Professionalism', 'Service Quality', 'Performance'],
                        labels: {
                            show: true,
                            style: {
                                colors: ["#a8a8a8"],
                                fontSize: "11px",
                                fontFamily: 'Arial',
                            }
                        }
                    },
                    // title: {
                    //     text: 'Customer Scores Chart'
                    // },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: graphColors.slice(0, 1),
                        dashArray: 0
                    },
                    fill: {
                        opacity: 0.7,
                        colors: graphColors.slice(0, 1)
                    },

                };

                const docOption = {
                    chart: {
                        type: 'bar',
                        height: '80%',
                        toolbar: {
                            show: false
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: true
                        }
                    },
                    series: [{
                        data: [{
                            x: 'category A',
                            y: 10
                        }, {
                            x: 'category B',
                            y: 18
                        }, {
                            x: 'category C',
                            y: 13
                        }, {
                            x: 'category D',
                            y: 11
                        }, {
                            x: 'category E',
                            y: 13
                        }, {
                            x: 'category F',
                            y: 12
                        }, {
                            x: 'category G',
                            y: 9
                        }]
                    }],
                    fill: {
                        opacity: 0.7,
                        colors: graphColors.slice(0, 1)
                    },
                }

                var userActOption = {
                    series: [{
                        name: "Number of Visits",
                        data: [31, 41, 35, 51, 49, 32, 39]
                    }],
                    chart: {
                        height: 250,
                        type: 'line',
                        zoom: {
                            enabled: false
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        colors: graphColors.slice(0, 1),
                        curve: 'straight'
                    },
                    title: {
                        text: 'User Activities by Days',
                        align: 'left'
                    },
                    grid: {
                        row: {
                            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                            opacity: 0.5
                        },
                    },
                    xaxis: {
                        categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    },
                    yaxis: {
                        min:0,
                        max:60
                    }
                };

                renderChart('document-documentInfo-chart', caseOption)
                renderChart('document-documentStatus-chart', userActOption)
            })
            .catch(function(error) {
                if (error.response.status === 401) {
                    launchErrorModal("Session Expired", baseUrl + 'php/auth/login.php')

                    setTimeout(function() {
                        localStorage.clear()
                        window.location.href = baseUrl + 'php/auth/login.php';
                    }, 1000);
                } else {
                    launchErrorModal(error.response.data.message)
                }
            });
    

        // Get cases from backend and display as table
        axios.get(`/api/cases/`, )
            .then(function(response) {
                const caseData = response.data

                document.querySelector('.total-number-of-cases').textContent = caseData.length;
                const uniqueCaseTypes = [...new Set(caseData.map(c => c.case_type))];


                if (caseData.length === 0)
                    $('#record-not-found-div').css("display", "block")
                else
                    $('#record-not-found-div').css("display", "none")
                caseData.forEach(c => {
                    // Convert every cases into rows 
                    // TODO: This is dummy data. Change the dummy data into real data rows to be shown.
                    const caseURL = baseUrl + '/php/case/view.php?cid=' + c._id;

                    const markup = '<tr>' +
                        '<td style="width: 5%; text-align: center;><a href="' + caseURL + '"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/document.png" alt="   " /></a></td>' +
                        '<td style="width: 35%; text-align: center;"><a href="' + caseURL + '">' + c.case_title + '</td>' +
                        '<td style="width: 15%; text-align: center;"><a href="' + caseURL + '">' + c.case_type + '</td>' +
                        '<td style="width: 15%; text-align: center;"><a href="' + caseURL + '">' + c.case_status + '</td>' +
                        '<td style="width: 15%; text-align: center;"><a href="' + caseURL + '">' + c.case_priority + '</td>' +
                        '<td style="width: 15% text-align: center;;"><a href="' + caseURL + '">' + c.case_total_billed_hour + '</td>' +
                        '</tr>';

                        jQuery(document).ready(function($) {
                            $(".clickable-row").click(function() {
                                window.location = $(this).data("href");
                            });
                        });
                    $('#case-allCase-table tbody').append(markup);
                });

                // prepare table so that it can be sorted
                $('#case-allCase-table').tableSort({
                    animation: 'slide',
                    speed: 500
                });
            })
            .catch(function(error) {

                if (error.response.status === 401) {
                    $('#record-not-found-div').css("display", "block")
                    launchErrorModal("Session Expired", baseUrl + 'php/auth/login.php')

                    setTimeout(function() {
                        localStorage.clear()
                        window.location.href = baseUrl + 'php/auth/login.php';
                    }, 1000);
                } else {
                    launchErrorModal(error.response.data.message)
                }
            });


        endLoader();
    </script>
</body>

</html>