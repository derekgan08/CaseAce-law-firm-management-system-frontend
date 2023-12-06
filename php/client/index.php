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
</head>

<body>
    <!-- Add neccessary components, such as navbars, footer, header, etc.. -->
    <?php include "../../components/common/navbar.php"; ?>
    <div class="main-content">
        <h1 class="h1-main-title">User</h1>
        <h2 class="h2-user-greeting">Greeting, user!</h2>
        <div class="flex-con">
            <div class="col-8 row-1 nested-flex-con-col">
                <div class="float-card row-1" style="min-height: 380px;">
                    <h3 class="h3-semibold-24">User Info</h3>
                    <div class="nested-flex-con-row">
                        <div class="col-7">
                            <div class="chart-div" id="client-clientInfo-chart">

                            </div>
                        </div>
                        <div class="col-5">
                            <div class="nested-flex-con-col row-1-statistics">
                                <div class="nested-flex-con-row row-1-statistics">
                                    <div class="col-4 two-line-statistics">
                                        <div style="width: 85px;">
                                            <p>Total Num of Users</p>
                                            <div class="big-number-statistics-block">
                                                <span class="big-number-statistics">45</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 two-line-statistics">
                                        <div style="width: 85px;">
                                            <p>Client Onboarding</p>
                                            <div class="big-number-statistics-block">

                                                <span class="big-number-statistics">21</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 three-line-statistics">
                                        <div style="width: 70px;">
                                            <p>Num of Archived Client</p>
                                            <div class="big-number-statistics-block">

                                                <span class="big-number-statistics">12</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nested-flex-con-row row-1-statistics">
                                    <div class="col-6 two-line-statistics">
                                        <div style="width: 80px;">
                                            <p>Client Satisfaction</p>
                                            <div class="big-number-statistics-block">

                                                <span class="big-number-statistics">4.78</span>
                                                <span class="small-number-statistics">/5.0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 two-line-statistics">
                                        <div style="width: 80px;">
                                            <p>Active Cases</p>
                                            <div class="big-number-statistics-block">

                                                <span class="big-number-statistics">1.3</span>
                                                <span class="small-number-statistics">/client</span>
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
                    <h3 class="h3-semibold-24">Client Status</h3>
                    <div class="chart-div" id="client-clientStatus-chart">

                    </div>
                </div>
            </div>
        </div>
        <h3 class="h3-semibold-24 non-float-card">All Users</h3>
        <div class="table-section">
            <table id="client-allClient-table" class="table-general">
                <thead>
                    <tr>
                        <th class="col-1">Name </th>
                        <th class="col-1">Type </th>
                        <th class="col-2">Contact Number </th>
                        <th class="col-2">Email </th>
                        <th class="col-2">Address </th>
                        <th class="col-2">Last Comm. Date </th>
                        <th class="col-2">Next Follow-up Date </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>
    </div>
    <script>
        $('.h2-user-greeting').text(renderUserGreeting())
        var caseOption = {
            series: [44, 20, 30],
            colors: graphColors.slice(0, 3),
            fill: {
                colors: graphColors.slice(0, 3)
            },
            labels: ["halo", "closed", "pending"],
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

                renderChart('client-clientInfo-chart', userOption)
                renderChart('client-clientStatus-chart', clientOption)
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
    

        // Get all documents
        axios.get('/api/crm', )
            .then(function(response) {

                // TODO: Convert into data and render it
                const clientData = response.data
                clientData.forEach(client => {
                    const markup = '<tr>' +
                        '<td><a href="' + baseUrl + '/php/client/view.php?id=' + client._id + '">' + client.username + '</a></td>' +
                        '<td>' + client.type + '</td>' +
                        '<td>' + client.number + '</td>' +
                        '<td>' + client.email + '</td>' +
                        '<td>' + client.address + '</td>' +
                        '<td>aaa</td>' +
                        '<td>aaa</td>' +
                        '</tr>';

                    $('#client-allClient-table tbody').append(markup);
                });

                $('#client-allClient-table').tableSort({
                    animation: 'slide',
                    speed: 500
                });
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


        endLoader();
    </script>
</body>

</html>