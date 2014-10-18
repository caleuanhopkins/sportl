@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Laravel Boilerplate.
@stop

{{-- Content --}}
@section('content')

    <div class="row centered">
        <div class="col-lg-8 col-lg-offset-2 w">
            <h1>Laravel Boilerplate.</h1>
        </div>
    </div>   
    
	@if (Sentry::check() && Sentry::getUser()->hasAccess('users'))

    <div class="row centered">
        <div class="col-lg-8 col-lg-offset-2 w">
           <p>This will only appear to users</p>
        </div>
    </div>

    @endif  
@stop