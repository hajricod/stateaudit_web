@component('mail::message')

<h1 style="text-align: center">{{__('You have new complaint with number')}} <span style="color: rgb(62, 104, 158)">#{{$complaint->id}}</span></h1>
<br>
@component('mail::button', ['url' => config('app.url').'admin/complaint/'.$complaint->id])
{{__('View Complaint')}}
@endcomponent
<br>
<br>
<p style="text-align: center!important">{{__(config('app.name'))}}</p>

@endcomponent