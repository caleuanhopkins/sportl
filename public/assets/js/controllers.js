'use strict';

/* Controllers */
var sportalApp = angular.module('sportalApp', [], function($locationProvider, $sceProvider) {
    if (window.history && window.history.pushState) {
        $locationProvider.html5Mode(true);
    }
    $sceProvider.enabled(false);
});

sportalApp.config(function($interpolateProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
});

/* Factory */
sportalApp.factory('sportService', function($http, $q) {
    var sportService = {
        async: function() {
            var promise = $http.get('/opportunities').then(function(response) {
                return response.data;
            });
            return promise;
        },
        findAll: function() {
            var deferred = $q.defer();
            promise.success(function(data) {
                var plots = data;
                deferred.resolve(plots);
            });
            return deferred.promise;
        }

    };
    return sportService;
});

sportalApp.controller('searchCtrl', ['sportService', '$scope', 
    function(sportService, $scope) {
        sportService.async().then(function(data) {
            
            $scope.sports = data;

            $scope.thedays = "";
            
            $scope.thesports = "";

        });
    }
]);

/* Filters */
sportalApp.filter('searchFilter', function($filter) {
    return function(items, searchfilter) {
        var isSearchFilterEmpty = true;
        angular.forEach(searchfilter, function(searchstring) {
            if (searchstring != null && searchstring != "") {
                isSearchFilterEmpty = false;
            }
        });
        if (!isSearchFilterEmpty) {
            var result = [];
            angular.forEach(items, function(item) {
                var isFound = false;
                angular.forEach(item, function(term, key) {
                    if (term != null && !isFound) {
                        term = term.toLowerCase();
                        angular.forEach(searchfilter, function(searchstring) {
                            searchstring = searchstring.toLowerCase();
                            if (searchstring != "" && term.indexOf(searchstring) != -1 && !isFound) {
                                result.push(item);
                                isFound = true;
                            }
                        });
                    }
                });
            });
            return result;
        } else {
            return items;
        }
    }
});

sportalApp.filter('iif', function() {
    return function(input, trueValue, falseValue) {
        return input ? trueValue : falseValue;
    };
});

function geturlParams(value) {
  value = value.replace(/[\[]/,"\\\/[").replace(/[\]]/,"\\\/]");
  var regexS = "[\\?&]"+value+"=([^&#]*)";
  var regex = new RegExp(regexS);
  var results = regex.exec(window.location.href);
  if(results === null)
    return null;
  else
    return results[1];
}

var uniqueItems = function (data, key) {
    var result = new Array();
    for (var i = 0; i < data.length; i++) {
        var value = data[i][key];
 
        if (result.indexOf(value) == -1) {
            result.push(value);
        }
    
    }
    return result;
};