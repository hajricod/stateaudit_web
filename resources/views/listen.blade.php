@extends('layouts.app')

@section('content')
    
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            Echo.private('complainChannel')
                .listen('SendComplaintNotification', (e) => {
                console.log(e);
            }); 
        })
        
    </script>
@endsection