// To determine whether to dislpay the charts
const appointmentChart_displayCharts = (isAdmin) => {

  // If the user is not an admin, hide the charts
  if(!isAdmin){
    document.getElementById('appointment-chartContainer').style.display = 'none';
  }

}


// To create a pie chart
const appointmentChart_createPieChart = (id, appointments) => {

  // To get the number of scheduled appointments and cancelled appointments
  const scheduledAppointments = appointments.filter(appointment => appointment.status === 'scheduled').length;
  const cancelledAppointments = appointments.length - scheduledAppointments;

  // Pie chart settings
  var options = {
    chart: {
      id: 'appointment-admin-pieChart',    // Id of chart, later used for reference to the chart when doing update of data
      type: 'donut',      // Use donut chart
      height: '90%',      // The height of the chart
    },
    colors: ['#1C277E', '#003554'],
    plotOptions: {
      pie: {
        donut: {
          labels: {           // To show the total number of appointments in the center of the pie chart
            show: true,
            name: {
              show: true
            },
            value: {
              show: true
            },
            total: {
              show: true,
              fontSize: '14px',
              label: 'Total Tasks'
            }
          },
        },
      },
    },
    labels: ['Scheduled Tasks', 'Cancelled Tasks'],   // Category label
    series: [scheduledAppointments, cancelledAppointments]          // The value for each category
  }

  var chart = new ApexCharts(document.getElementById(id), options);   // Apply the chart to the id

  chart.render();     // Render the chart
}


// Tp update the pie chart data because the chart cannot be recreated
const appointmentChart_updatePieChart = (pie_chart_id, appointments) => {

  // To get the number of scheduled appointments and cancelled appointments
  const scheduledAppointments = appointments.filter(appointment => appointment.status === 'scheduled').length;
  const cancelledAppointments = appointments.length - scheduledAppointments;

  // The new data to be used for updated the chart
  const newSeriesData = [scheduledAppointments, cancelledAppointments]

  // Update the pie chart using the chart id and the updateSeries function with data
  ApexCharts.exec(pie_chart_id, 'updateSeries', newSeriesData);
}


// To create an array of current week dates
const appointmentChart_createWeekDates = () => {

  const today = moment();

  // Get the start date of the current week (Sunday)
  const sundayOfThisWeek = today.clone().startOf('week');

  // Generate an array to store the dates for each day of the week
  const weekDates = [];

  // Add to the array with dates for each day of the week
  for (let i = 0; i < 7; i++) {
    const currentDate = sundayOfThisWeek.clone().add(i, 'days');
    const formattedDate = currentDate.format('YYYY-MM-DD');
    weekDates.push(formattedDate);
  }

  return weekDates;
}


// To create an area chart
const appointmentChart_createAreaChart = (id, appointments) => {

  // To get the scheduled appointments
  const scheduledAppointments = appointments.filter(appointment => appointment.status === 'scheduled');

  // Get the week dates
  const weekDates = appointmentChart_createWeekDates();

  // Hold the number of appointments for each day of the week
  const appointmentsByWeekDates = [];

  // To get the number of appointments for each day of the week
  weekDates.forEach(date => {
    const numberOfAppointments = scheduledAppointments.filter(appointment => appointment.dateStart === date).length;
    appointmentsByWeekDates.push(numberOfAppointments);
  });

  // Area chart settings
  options = {
    chart: {
      id: 'appointment-admin-areaChart',// Chart ID, later used for reference the chart when doing data updates
      type: 'area',   // Use Area chart
      height: '90%',  // The height of the chart
      zoom: {
        enabled: false  // Disable the zoom functionality
      }
    },
    colors: ['#1C277E'],
    dataLabels: {
      enabled: false    // Disable the label for each data's value
    },
    markers: {          // Show the markers for each data
      size: 6
    },
    stroke: {           // The line style
      curve: 'straight'
    },
    tooltip: {
      y: {
        formatter: function (value) {        // To ensure the value is integer
          return value;
        }
      }
    },
    xaxis: {
      categories: weekDates,       // x-axis
      labels: {
        formatter: function (value) {
          return moment(value).format("DD MMM");   // Change the format, example 12 Dec
        }
      }
    },
    series: [{
      name: 'Appointments',
      data: appointmentsByWeekDates  // y-axis
    }],

  };

  var chart = new ApexCharts(document.getElementById(id), options);   // Apply the chart to the id

  chart.render();     // Render the chart
}


// Update the area chart because the chart cannot be recreated
const appointmentChart_updateAreaChart = (area_chart_id, appointments) => {
  // To get the scheduled appointments
  const scheduledAppointments = appointments.filter(appointment => appointment.status === 'scheduled');

  // Get the week dates
  const weekDates = appointmentChart_createWeekDates();

  // Hold the number of appointments for each day of the week
  const appointmentsByWeekDates = [];

  // To get the number of appointments for each day of the week
  weekDates.forEach(date => {
    const numberOfAppointments = scheduledAppointments.filter(appointment => appointment.dateStart === date).length;
    appointmentsByWeekDates.push(numberOfAppointments);
  });

  // The new data to be used for updated the chart
  const newSeriesData = [{
    name: 'Appointments',
    data: appointmentsByWeekDates
  }]

  // Update the area chart using the chart id and the updateSeries function with data
  ApexCharts.exec(area_chart_id, 'updateSeries', newSeriesData);
}