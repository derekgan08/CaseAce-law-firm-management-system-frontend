<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../components/common/header.php"; ?>
    <?php include "../components/common/scripts.php" ?>

    <title>CaseAce Dashboard</title>
    <script>
        // Choose whether protected or unprotected
        checkProtectedRoutes();
        if (getUserType() !== 'admin' && getUserType() !== 'partner') window.location.href = baseUrl + 'php/case';
    </script>
</head>

<body>
    <!-- Add neccessary components, such as navbars, footer, header, etc.. -->
    <?php include "../components/common/navbar.php"; ?>

    <div class="main-content">
        <h1 class="h1-main-title">Dashboard</h1>
        <h2 class="h2-user-greeting">Good Morning, user</h2>
        <div class="flex-con">
            <div class="col-9 nested-flex-con-col" style="margin-top: 0px;">
                <div class="nested-flex-con-row">
                    <div class="col-6 row-1">
                        <!-- Overall Analytics for Cases -->
                        <div class="float-card inner-float-card">
                            <h3 class="h3-semibold-24">Cases</h3>
                            <div class="chart-div" id="chart-case">

                            </div>
                        </div>
                    </div>
                    <div class="col-6 row-1">
                        <!-- Overall Analytics for Users -->
                        <div class="float-card inner-float-card" style="margin-right: 0px;">
                            <h3 class="h3-semibold-24">Users</h3>
                            <div class="chart-div" id="chart-user">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="nested-flex-con-row row-1">
                    <div class="col-4 row-1">
                        <!-- Overall Analytics for Clients -->
                        <div class="float-card inner-float-card">
                            <h3 class="h3-semibold-24">Clients</h3>
                            <div class="chart-div" id="chart-client">

                            </div>
                        </div>

                    </div>
                    <div class="col-8 row-1">
                        <!-- Overall Board for appointment -->
                        <div class="float-card inner-float-card" style="margin-right: 0px;">
                            <h3 class="h3-semibold-24">Users Analytics</h3>
                            <div class="chart-div" id="chart-userss">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3" style="">
                <!-- Overall Analytics for Documents -->
                <div class="float-card">
                    <h3 class="h3-semibold-24">Documents Analytics</h3>
                    <div class="chart-div" id="chart-document">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.h2-user-greeting').text(renderUserGreeting())
        endLoader();

        // Get statistics data from server
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

                renderChart('chart-case', caseOption)
                renderChart('chart-user', userOption)
                renderChart('chart-client', clientOption)
                renderChart('chart-document', docOption)
                renderChart('chart-userss', userActOption)
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
    </script>
</body>

</html>