<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Calendar</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->

        <link rel='stylesheet' href="{{asset('/css/main.css')}}" />
        <script src="{{asset('js/main.js')}}"></script>
        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous">
        </script>
    </head>
    <body>
        <div id="app">
            <main>
                <div id="calendar"></div>
            </main>
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function() {
                                var calendarEl = document.getElementById('calendar');
                                    var calendar = new FullCalendar.Calendar(calendarEl, {
                                        initialView: 'dayGridMonth',
                                        headerToolbar: {
                                            left: 'prev,next today',
                                            center: 'title',
                                            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                                        },
                                        navLinks: true,
                                        businessHours: true,
                                        editable: true,
                                        nowIndicator: true,
                                        eventSources: [{
                                            googleCalendarApiKey:'AIzaSyDdtHl3DkpOmA0ZQWVh9GjTBFsEMkECJUw',
                                            googleCalendarId: 'japanese__ja@holiday.calendar.google.com',
                                            display: 'background',
                                        }]
                                    });
                                    calendar.render();
                });
            </script>
        </div>
    </body>
</html>
