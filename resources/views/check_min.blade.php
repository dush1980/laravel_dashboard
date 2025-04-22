@extends('layouts.app')

@section('page_name', 'Check MIN');

@section('main_body')
    <div class="row g-4 mb-4">
        @component('partial.halfSection') <!-- LHS -->
            @slot('sectionTitle')
                Data in VLE
            @endslot

            @slot('sectionBody')
                {!! $view_data['moodle_body'] !!}
            @endslot
        @endcomponent

        @component('partial.halfSection') <!-- RHS -->
            @slot('sectionTitle')
                Recived by Mule
            @endslot

            @slot('sectionBody')
            {!! $view_data['mule_body'] !!}
            @endslot
        @endcomponent 	

    </div><!--//row-->
@endsection 