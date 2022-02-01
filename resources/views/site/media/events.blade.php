@extends('layouts.app')

@section('head-script')

<link href="{{asset('node_modules/fullcalendar/main.css')}}" rel='stylesheet' />

@endsection

@section('script')
    

<script src="{{asset('node_modules/fullcalendar/main.js')}}"></script>

<script>

var eventData = [
    {
        title  : 'يوم الرقابة',
        start  : '2022-02-01T12:30:00',
        allDay : false
    },
    {
        title  : 'العيد الوطني',
        start  : '2022-02-05T12:30:00',
        allDay : false
    },
    {
        title  : 'حفل التكريم',
        start  : '2022-02-09T12:30:00',
        allDay : false // will make the time show
    }
]

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: '{{lang()}}',
        direction: '{{lang() == "ar"? "rtl": "ltr"}}',
        // themeSystem: 'bootstrap',
        initialView: 'dayGridMonth',
        buttonText: {
            today:    'اليوم',
            month:    'شهر',
            week:     'اسبوع',
            day:      'يوم',
            list:     'قائمة'
        },
        events: eventData,
        eventClick: function(info) {
            // alert('Event: ' + info.event.title);
            // alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
            // alert('View: ' + info.view.type);

            // change the border color just for fun
            // info.el.style.borderColor = 'red';

            var eventModal = new bootstrap.Modal(document.getElementById('eventModal'), {
                keyboard: false
            })

            var modalToggle = document.getElementById('eventModal');

            $('#eventModal.modal-body').find('div').remove();
            $('#eventModal.modal-body').append(`
            <div>
                <h4>${info.event.title}</h4>
            </div>
            `);

            eventModal.show(modalToggle);
            
        }
    });
    calendar.render();
});

</script>

@endsection

@section('style')

<style>

a {
    color: #710f11;
    text-decoration: none!important;
}

</style>

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 pt-5 pb-3">
            <h4 class="text-center">{{__('Events')}}</h4>
            <hr>
            <div id='calendar' ></div>

            <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0">
                        <div class="modal-header border-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center" id="eventModal">
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection