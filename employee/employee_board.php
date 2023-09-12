<?php

define('TITLE', "CONSULTATION");
include "../layouts/header.php";
check_logged_in();
// check_verified();
include "employee_navbar.php";
mysqli_close($conn);
include "../php/functions.php";

?>
<link href='../fullcalendar/packages/core/main.css' rel='stylesheet' />
<link href='../fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
<link rel="stylesheet" href="../css/style.css">

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Welcome to RecoureoPro!</h1>
    </div>
</div>

<div class='row'>
    <div id='calendar'></div>
</div>
<script src='../fullcalendar/packages/core/main.js'></script>
    <script src='../fullcalendar/packages/interaction/main.js'></script>
    <script src='../fullcalendar/packages/daygrid/main.js'></script>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid' ],
      defaultDate: '2023-06-21',
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        {
          title: 'All Day Event',
          start: '2023-06-01'
        },
        {
          title: 'Long Event',
          start: '2023-06-07',
          end: '2023-06-10'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2023-06-09T16:00:00'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2023-06-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2023-06-11',
          end: '2023-06-13'
        },
        {
          title: 'Meeting',
          start: '2023-06-12T10:30:00',
          end: '2023-06-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2023-06-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2023-06-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2023-06-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2023-06-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2023-06-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2023-06-28'
        }
      ]
    });

    calendar.render();
  });

    </script>

    <script src="../js/cal_js/main.js"></script>
<?php require "../layouts/footer.php";  ?>