<!DOCTYPE html>
<html lang="en" ng-app="myApp">
    <head>
        <title>Carlos Soto Prueba</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body ng-controller="songsCtrl">
        <header>
            <div class="col-md-12 navigation">
                <div class="col-md-7 col-lg-7 visible-md visible-lg"></div>
                <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                    <div class="navigation-tabs">Now Playing</div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                    <div class="navigation-tabs">Rate Songs</div>
                </div>
            </div>
            <div class="col-md-12">
                <img class="logo" src="/imgs/logo.png">
                <h1 class="heading">HANGAR O'CLOCK SONGS</h1>    
            </div>     
        </header>
        <div class="container">
            <div class="first-cloud"></div>
            <div class="second-cloud"></div>
            <div class="row">
                <div class="col-md-3 col-lg-4"></div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="search">
                        <input id="search-text" class="search" ng-keyup="resetSearch()" type="search" placeholder="Search Music" ng-enter="customSearch()">
                        <span class="glyphicon glyphicon-search btn-search" ng-click="customSearch()"></span>
                    </div>
                </div>
                <div class="col-md-3 col-lg-4"></div>
            </div>
            <div class="row">
                <div class="col-md-3 col-lg-4"></div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="content">
                            <div class="row song" ng-repeat="song in songs"  ng-class-odd="'odd'" ng-class-even="'even'">
                                <div class="col-md-12">
                                    <a href="{{getSpotifyLink(song.url)}}" target="_blank">
                                        <span class="glyphicon glyphicon-play btn-play"></span>
                                    </a>
                                    <div class="song-info">
                                        <span class="song-title">{{song.songname}}</span>
                                        <span class="song-artist">{{song.artistname}}</span>
                                    </div>
                                    <div class="buttons">
                                        <form id="{{song.$$hashKey}}">
                                            <div class="radio-type">
                                                <input id="today-{{song.$$hashKey}}" type="radio" name="radio">
                                                <label for="today-{{song.$$hashKey}}">
                                                    <span class="left-btn" id="radio-span">Today</span>
                                                </label>
                                            </div>
                                            <div class="radio-type">
                                                <input id="friday-{{song.$$hashKey}}" type="radio" name="radio">
                                                <label for="friday-{{song.$$hashKey}}">
                                                    <span class="right-btn">Friday</span>
                                                </label>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-4"></div>
            </div>
        </div>
        <footer ng-class="{'fixed_footer': songsCount<3}">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><h5>© 2011 The Hangar Interactive. All rights reserved.</h5></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><h5>Privacy Policy | Terms of Use | Contact Us</h5></div>
        </footer>
    </body>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/controllers/songsCtrl.js"></script>
</html>
