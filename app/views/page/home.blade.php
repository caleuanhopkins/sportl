@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Sportl
@stop

{{-- Content --}}
@section('content')

    <div class="row">

        <div id="ng-app" ng-app="sportalApp" ng-cloak>

            <div ng-controller="searchCtrl">

                <div class="col-md-10 col-md-offset-1 text-center">
                    
                    <h3>Choose sports</h3>
                    <label>Tennis</label>
                    <input type="checkbox" ng-model="thesports" ng-true-value="Tennis" data-ng-false-value='' />
                    <label>Tennis Coaching</label>
                    <input type="checkbox" ng-model="thesports" ng-true-value="TENNIS COACHING" data-ng-false-value='' />
                    <label>Fitness</label>
                    <input type="checkbox" ng-model="thesports" ng-true-value="Fitness" data-ng-false-value='' />
                    <label>Ice</label>
                    <input type="checkbox" ng-model="thesports" ng-true-value="Ice" data-ng-false-value='' />
                    <label>Swimming</label>
                    <input type="checkbox" ng-model="thesports" ng-true-value="Swimming" data-ng-false-value='' />
                    <label>Exercise Class</label>
                    <input type="checkbox" ng-model="thesports" ng-true-value="Exercise Class" data-ng-false-value='' />

                    <h3>Activity level?</h3>
                    <label>Inactive</label>
                    <input type="checkbox" ng-model="theactivity" ng-true-value="1" data-ng-false-value='' />
                    <label>Active</label>
                    <input type="checkbox" ng-model="theactivity" ng-true-value="2" data-ng-false-value='' />
                    <label>Expert</label>
                    <input type="checkbox" ng-model="theactivity" ng-true-value="3" data-ng-false-value='' />
                    <!--
                    <h3>Location?</h3>
                    <button type="button" class="btn btn-default btn-cons">Find</button>
                    -->

                    <h3>When are you available?</h3>
                    <label>Monday</label>
                    <input type="checkbox" ng-model="thedays" ng-true-value="Monday" data-ng-false-value='' />
                    <label>Tuesday</label>
                    <input type="checkbox" ng-model="thedays" ng-true-value="Tuesday" data-ng-false-value='' />
                    <label>Wednesday</label>
                    <input type="checkbox" ng-model="thedays" ng-true-value="Wednesday" data-ng-false-value='' />
                    <label>Thursday</label>
                    <input type="checkbox" ng-model="thedays" ng-true-value="Thursday" data-ng-false-value='' />
                    <label>Friday</label>
                    <input type="checkbox" ng-model="thedays" ng-true-value="Friday" data-ng-false-value='' />
                    <label>Saturday</label>
                    <input type="checkbox" ng-model="thedays" ng-true-value="Saturday" data-ng-false-value='' />
                    <label>Sunday</label>
                    <input type="checkbox" ng-model="thedays" ng-true-value="Sunday" data-ng-false-value='' />

                    <h3><%filtered.length%> Result<%filtered.length == 1 | iif : "" : "s"%></h3>
                    <p><%filtered.length == 0 | iif : 'There are no search results matching your query at the moment' : ''%></p>
                    <hr>

                </div>
                <div class="col-md-10 col-md-offset-1">

                    <!--Masonry-->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Sport</th>
                                <th>Location</th>
                                <th>When</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="item in filtered = (sports | filter:{day_of_week: thedays} | filter:{activity: thesports} | filter:{effort_rating: theactivity})" ng-cloak>
                                <td><%item.name%></td>
                                <td><%item.activity.title%></td>
                                <td><%item.venue.name%></td>
                                <td><%item.day_of_week%> <%item.start_time%>-<%item.end_time%></td>
                                <td><a href="mailto:<%item.venue.email%>"><button type="button" class="btn btn-info">Contact</button></a></td>
                                <!--<td><a href="mailto:<%item.venue.email%>"><button type="button" class="btn btn-info">Directions</button></a></td>-->
                            </tr>
                        </tbody>
                    </table>
                 </div>
   
            </div>
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