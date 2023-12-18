<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<!-- Popper CDN-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>

<!-- Link to Bootstrap CDN javaScript file -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- Link to ApexChart CDN -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!-- FullCalendar CDN-->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>

<!-- moment lib CDN-->
<script src='https://cdn.jsdelivr.net/npm/moment@2.27.0/min/moment.min.js'></script>

<!-- the moment-to-fullcalendar connector (must put below the moment lib) -->
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/moment@6.1.10/index.global.min.js'></script>

<!-- axios CDN -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<!-- fontawesome icons it -->
<script src="https://kit.fontawesome.com/b30c3ea7ee.js" crossorigin="anonymous"></script>


<!-- Charts Related -->
<script src="../../javascript/common/chart.js"></script>

<script src="../../javascript/common/tsort.min.js"></script>

<script type="module">
  import {
    io
  } from "https://cdn.socket.io/4.7.2/socket.io.esm.min.js";
</script>

<script type="text/javascript">
  // Store constants to be used in Frontend
  const monthNames = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
  ];
  const graphColors = ['#1c277e', '#003554', '#006494', '#0582ca', '#00a6fb']

  // This stores the base url of Frontend
  document.write("<base id='myBase' href='http://" + document.location.host + "' />");
  var baseUrl = document.getElementById("myBase").href;

  // Check login or not? 
  const checkLogin = () => {
    axios.defaults.baseURL = 'http://localhost:6500';
    axios.defaults.withCredentials = true;
    const token = localStorage.getItem('authToken');
    const type = ['client', 'paralegal', 'admin'].includes(localStorage.getItem("type")) ? localStorage.getItem("type") : null
    // axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
    if (token && type) {
      axios.defaults.headers.common['Authorization'] = token;
    }

    return token
  }

  // To protect not logged in routes
  const checkUnprotectedRoutes = () => {
    if (checkLogin()) {
      window.location.replace(baseUrl + 'php/dashboard.php');
    }
  }

  // To protect routes
  const checkProtectedRoutes = () => {
    if (!checkLogin()) {
      window.location.replace(baseUrl + 'php/auth/login.php');
    }
  }

  // Render correct greetings depends on time and username
  const renderUserGreeting = () => {
    var hour = new Date().getHours()
    var username = localStorage.getItem('name');
    var userGreeting;

    if (hour >= 4 && hour <= 11) {
      userGreeting = `Good Morning, ${username}`
    } else if (hour >= 12 && hour <= 16) {
      userGreeting = `Good Afternoon, ${username}`
    } else if (hour >= 17 && hour <= 20) {
      userGreeting = `Good Evening, ${username}`
    } else if (hour >= 21 || hour <= 3) {
      userGreeting = `Good Night, ${username}`
    }

    return userGreeting;
  }

  // Get correct user type. To show correct UI
  const getUserType = () => {
    return ['client', 'paralegal', 'admin', 'partner', 'associates'].includes(localStorage.getItem("type")) ? localStorage.getItem("type") : null
  }

  // Truncate too long text into ...
  const truncateIntoEllipse = (value, limit) => {
    return `${value.substr(0, limit)}...`
  }

  // Check whether text need to truncate or not
  const ensureTruncated = (str, limit) => {
    if (str.length >= limit) {
      truncateIntoEllipse(str, limit)
    } else return str
  }

  // Start loader animation
  const startLoader = () => {
    // document.querySelector("body").style.visibility = "hidden";
    document.querySelector(".main-content").style.filter = "blur(4px)";
    document.querySelector(".loader-div").style.visibility = "visible";
  }

  // End loader animation
  const endLoader = () => {
    // document.querySelector("body").style.visibility = "visible";
    document.querySelector(".loader-div").style.visibility = "hidden";
  }

  // Format into correct filesize to display
  function formatFileSize(bytes, decimalPoint) {
    if (bytes == 0) return '0 Bytes';
    var k = 1000,
      dm = decimalPoint || 2,
      sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
      i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
  }

  function changeToReadableFormat(datestring) {
    const requestDate = new Date(parseInt(datestring))
    const formatedUploadedDate = `${requestDate.getDate()}, ${monthNames[requestDate.getMonth()]} ${requestDate.getFullYear()}`
    return formatedUploadedDate
  }

  const launchErrorModal = (errorMsg = "Server Error :(", redirectUrl = baseUrl) => {
    const errorModal = `<!-- Button trigger modal -->
    <button type="button" style="display: none;" class="btn btn-primary btn-alert-error-msg" data-bs-toggle="modal" data-bs-target="#exampleModalCenter_error_msg">
        Launch
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter_error_msg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Encountered Issue..</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ${errorMsg}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="window.location = '${redirectUrl}'">Go to Dashboard</button>
      </div>
    </div>
  </div>
      </div>`

      $('body').prepend(errorModal)
      $('.btn-alert-error-msg').trigger("click")
  }
</script>