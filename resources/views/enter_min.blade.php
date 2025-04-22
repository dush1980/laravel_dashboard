@extends('layouts.app')

@section('page_name', 'Check MIN');

@section('main_body')
    
    <div class="row g-4 mb-4">
        @component('partial.inpage_notification') <!-- LHS -->
            @slot('msgTitle')
                {!! $view_data['msg_title'] !!}
            @endslot
            @slot('msgBody')
                {!! $view_data['msg_body'] !!}
            @endslot
        @endcomponent
    </div><!--//row-->
@endsection 