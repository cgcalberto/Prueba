'use strict';


myApp.controller('songsCtrl', function($scope, $http, songService) {
	$scope.songs = {};
	songService.getSongs().then(function(data){
		$scope.songs = data;
	},function(error){
		console.log('error');
	});
	$scope.getSpotifyLink = function(url){
		var urlParts = url.split(':');
		var id = urlParts[urlParts.length-1]
		if(urlParts[1]==='track'){
			return 'http://open.spotify.com/track/'+id;
		}else{
			return 'http://open.spotify.com/album/'+id;
		}
	}
	$scope.customSearch = function(){
		songService.getSongs().then(function(data){
			var results = [];
			var params = $('#search-text').val().toLowerCase();
			var length = data.length;
			var i = 0;
			for(;i<length;i++){
				if(data[i].songname.indexOf(params)!==-1){
					results.push(data[i]);
				}
			}
			if(results.length>0){
				$scope.songs = results;
			}	
		},function(error){
			console.log('error');
		});
	}
	$scope.resetSearch = function(){
		var params = $('#search-text').val().trim();
		if(params.length===0){
			songService.getSongs().then(function(data){
				$scope.songs = data;
			},function(error){
				console.log('error');
			});
		}
	}
});


myApp.directive('ngEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if(event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.ngEnter);
                });
                event.preventDefault();
            }
        });
    };
});

myApp.factory('songService', function ($http, $q) {
        return {
            getSongs: function() {
                return $http.get('/songs')
                    .then(function(response) {
                        if (typeof response.data === 'object') {
                            return response.data;
                        } else {
                            return $q.reject(response.data);
                        }

                    }, function(response) {
                        return $q.reject(response.data);
                    });
            }
        };
    });
