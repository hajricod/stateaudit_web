@extends('layouts.app')

@section('head-script')

<link href="{{asset('node_modules/fullcalendar/main.css')}}" rel='stylesheet' />

@endsection

@section('script')
    

<script src="{{asset('node_modules/fullcalendar/main.js')}}"></script>

<script>

var date = new Date();
var fullYear = date.getFullYear();

var eventData = {!!$data!!};

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: '{{lang()}}',
        direction: '{{lang() == "ar"? "rtl": "ltr"}}',
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

            var eventModal = new bootstrap.Modal(document.getElementById('eventModal'), {
                keyboard: false
            })

            var modalToggle = document.getElementById('eventModal');

            console.log(info.event)

            $('#eventModal.modal-body').find('div').remove();
            $('#eventModal.modal-body').append(`
            <div>
                <h4>${info.event.title}</h4>
                <hr>
                <p>${info.event.startStr}</p>
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
        <div class="col-md-8 offset-md-2 pb-3">
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