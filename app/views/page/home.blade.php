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
            <h1>Explanation of Sportl</h1>

        </div>
        <div class="col-lg-8 col-lg-offset-2 w">
            <h3>What do you want to play?</h3>
            <button type="button" class="btn btn-default btn-cons">Football</button>
            <button type="button" class="btn btn-default btn-cons">Tennis</button>
            <button type="button" class="btn btn-default btn-cons">Gynmastics</button>
            <button type="button" class="btn btn-default btn-cons">Rugby</button>
            <button type="button" class="btn btn-default btn-cons">Squash</button>
            <button type="button" class="btn btn-default btn-cons">Table-Tennis</button>
        </div>

        <div class="col-lg-8 col-lg-offset-2 w">
            <h3>Activity Level?</h3>
            <button type="button" class="btn btn-default btn-cons">Inactive</button>
            <button type="button" class="btn btn-default btn-cons">Active</button>
            <button type="button" class="btn btn-default btn-cons">Expert</button>
        </div>
        <div class="col-lg-8 col-lg-offset-2 w">
            <h3>Location?</h3>
            <button type="button" class="btn btn-default btn-cons">Find</button>
        </div>
        <div class="col-lg-8 col-lg-offset-2 w">
            <h3>When?</h3>
            <button type="button" class="btn btn-default btn-cons">Monday</button>
            <button type="button" class="btn btn-default btn-cons">Tuesday</button>
            <button type="button" class="btn btn-default btn-cons">Wednesday</button>
            <button type="button" class="btn btn-default btn-cons">Thursday</button>
            <button type="button" class="btn btn-default btn-cons">Friday</button>
            <button type="button" class="btn btn-default btn-cons">Saturday</button>
            <button type="button" class="btn btn-default btn-cons">Sunday</button>
        </div>

        <div class="col-lg-8 col-lg-offset-2 w">
            <h3>Results</h3>
            <hr>
        </div>
         <div class="col-lg-8 col-lg-offset-2 w">
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th>Name</th>
                        <th>Location</th>
                        <th>Availability</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mr Jones</td>
                        <td>Westhill</td>
                        <td>Mon - Fri</td>
                        <td><button type="button" class="btn btn-info">More</button></td>
                    </tr>
                    <tr>
                        <td>Mr Jones</td>
                        <td>City Centre</td>
                        <td>Wed - Fri</td>
                        <td><button type="button" class="btn btn-info">More</button></td>
                    </tr>
                    <tr>
                        <td>Mrs Jones</td>
                        <td>Cove</td>
                        <td>Mon - Thur</td>
                        <td><button type="button" class="btn btn-info">More</button></td>
                    </tr>
                </tbody>
            </table>
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