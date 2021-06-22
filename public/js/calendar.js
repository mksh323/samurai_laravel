$(function(){
    $('.js-modal-open').on('click',function(){
        $('.js-modal').fadeIn();
        return false;
    });
    $('.js-modal-close').on('click',function(){
        $('.js-modal').fadeOut();
        return false;
    });
    $('.add').on('click', function(){
        $('.js-modal').fadeOut();
        return false;
    });
    $('#cancel').on('click', function(){
        $('.js-modal03').fadeOut();
        return false;
    });    
});
function delete_event(deleteEvent){
    var deleteConfirm = confirm('本当に削除しますか？');
    let event = calendar.getEventById(deleteEvent.event.id);
    if(deleteConfirm == true) {
    var clickEle = $(this)
    event.remove();
    $.ajax({
            url: '/schedule/delete/'+ event.id, 
            type: 'POST', 
            data : {"id":event.id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    })
    .done(function(data) {
        console.log(data);
    })
    .fail(function(data) {
        console.log(data.reponseText);
    });  
    }else{
        (function(e) {
            e.preventDefault()
        });
    };
}
$(function(){
    $('#add').click(function() {
        //データをJSONに変換する//
        var event = {
            start_date: $("#start_date").val(),
            end_date: $("#end_date").val(),
            start_time: $("#start_time").val(), 
            end_time: $("#end_time").val(),   
            title: $("#title").val(),
            content: $("#content").val(), 
            start_datetime: $("#start_date").val()+'T'+$("#start_time").val()+':00', 
            end_datetime: $("#end_date").val()+'T'+$("#end_time").val()+':00', 
        };
    //データをajaxで取得する//
    $.ajax({
        url: '/schedule/add', 
        type: 'POST', 
        data : event,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        })
        .done(function(data) {
            // window.location.href="http://localhost:8000/schedule/show";
            reload_calendar();
        })
        .fail(function(data) {
            console.log(data.reponseText);
        });  
    });
});
var calendar;
    function show_calendar(data){
        let clickCnt = 0;
        var calendarEl = document.getElementById('calendar');
                            calendar = new FullCalendar.Calendar(calendarEl, {
                                initialView: 'dayGridMonth',
                                selectable: true,
                                headerToolbar: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                                },
                                navLinks: true,
                                businessHours: true,
                                editable: true,
                                nowIndicator: true,
                                dayMaxEvents: true,
                                eventSources: [{
                                    googleCalendarApiKey:'AIzaSyDdtHl3DkpOmA0ZQWVh9GjTBFsEMkECJUw',
                                    googleCalendarId: 'japanese__ja@holiday.calendar.google.com',
                                    display: 'background',
                                }],
                                eventClick: function (event) {
                                    event_removeAndUpdate(event);
                                },
                                events:data
                                    // {title:"test1",start:"2021-05-01",end:"2021-05-02"},
                                    // {title:"test2",start:"2021-05-11T08:30:00",end:"2021-05-12T00:01:00"},
                            });
                            calendar.render();
    }
function event_removeAndUpdate(event){
$('.js-modal03').fadeIn();
$('#delete').on('click', function(){
        $('.js-modal03').fadeOut();
        delete_event(event);
});
$('#edit').on('click', function(){
    $('.js-modal03').fadeOut();
    $('.js-modal02').fadeIn();
    getevent_toedit(event);
});
$('#update').on('click', function(){
    update_event(event);
    $('.js-modal02').fadeOut();
});
}
function getevent_toedit(editevent){
let event = calendar.getEventById(editevent.event.id);
$.ajax({
        url: '/schedule/edit', 
        type: 'POST', 
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {"id":event.id}
        })
        .done(function(data) {
            // let date_startday=data.data[0].start_datetime.substr(0, 10);
            // let date_endday=data.data[0].end_datetime.substr(0, 10);
            // let date_starttime=data.data[0].start_datetime.substr( 11, 5);
            // let date_endtime=data.data[0].end_datetime.substr(11, 5);
            $("#start_date_edit").val(data.data.start_date);
            $("#end_date_edit").val(data.data.end_date);
            $("#start_time_edit").val(data.data.start_time); 
            $("#end_time_edit").val(data.data.end_time);
            $("#title_edit").val(data.data.title);
            $("#content_edit").val(data.data.content);
        })
        .fail(function(data) {
            console.log(data.reponseText);
        });  
}
function update_event(editEvent){
        //データをJSONに変換する//
        var event = {
            id: editEvent.event.id,
            start_date: $("#start_date_edit").val(),
            end_date: $("#end_date_edit").val(),
            start_time: $("#start_time_edit").val(), 
            end_time: $("#end_time_edit").val(),   
            title: $("#title_edit").val(),
            content: $("#content_edit").val(), 
            start_datetime: $("#start_date_edit").val()+'T'+$("#start_time_edit").val()+':00', 
            end_datetime: $("#end_date_edit").val()+'T'+$("#end_time_edit").val()+':00', 
        };
        $.ajax({
        url: '/schedule/update', 
        type: 'POST', 
        data : event,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        })
        .done(function(data) {
            // window.location.href="http://localhost:8000/schedule/show";
            reload_calendar();
        })
        .fail(function(data) {
            console.log(data.reponseText);
        });  
}
function reload_calendar(){
$.ajax({
        url: '/schedule/show', 
        type: 'GET', 
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        })
        .done(function(data) {
            let eventData=[];
            data.data.forEach(function(event){
                eventData.push({id:event.id,title:event.title,start:event.start_datetime,end:event.end_datetime});
            });
            show_calendar(eventData);
        })
        .fail(function(data) {
            console.log(data.reponseText);
        });  
}
window.onload=function(){
reload_calendar();
};