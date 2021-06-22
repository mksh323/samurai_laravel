@extends('layouts.layouts')

@section('title', 'My Calendar')

@section('content')

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

@endsection
