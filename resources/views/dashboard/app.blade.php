<!DOCTYPE html>
<html data-ng-app="myApp" style="height:100%;">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width" />


    <title>TutaPTR</title>
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <link href="/dist/css/addon/effect-light.min.css" rel="stylesheet" />
    <link href="/dist/css/quantumui.min.css" rel="stylesheet" />

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
</head>
<body data-ng-controller="indexController as ctrl" style="height:100%; padding-top:55px;">
    <div class="navbar navbar-default navbar-fixed-top" style="margin:0;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" style="padding:5px 15px;">
                    <img src="/images/angularui_logo.png" alt="AngularUI Logo" />
                </a>

            </div>
            <div class="pull-left" style="height:50px;">
                <a href="#" class="titip-right" data-title="Toggle Aside" data-aside-toggle="#leftMenuAside" style="padding-top:15px;">
                    <i class="glyphicon glyphicon-menu-hamburger"></i>
                </a>
            </div>
            <div class="collapse navbar-collapse" style="padding-right:40px;">
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="#" data-nq-dropdown="">
                            Dropdown
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" tabindex="-1" role="menu">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-nq-dropdown="" data-qo-show-arrow="true">
                            Dropdown Container
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-container" style="min-width:300px;">
                            <div class="dc-header">
                                <strong>Container Header</strong>
                            </div>
                            <div class="dc-body" style="max-height:250px; padding:0;">
                                <div class="list-group">
                                    <a href="#" class="list-group-item active">
                                        <h4 class="list-group-item-heading">List group item heading</h4>
                                        <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <h4 class="list-group-item-heading">List group item heading</h4>
                                        <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <h4 class="list-group-item-heading">List group item heading</h4>
                                        <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                    </a>
                                </div>
                            </div>
                            <div class="dc-footer">
                                <strong>Container Footer</strong>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-aside-toggle="#tasksAside">
                            Right Aside
                        </a>
                    </li>
                    <li class="active">
                        <a href="http://angularui.net">
                            Go Online
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div>
        <div id="leftMenuAside" data-nq-aside="" class="aside aside-with-menu aside-default"
             data-collapsible="true"
             data-top-offset="50px"
             data-pinnable="true"
             data-opened="true"
             data-collapsed="true"
             data-enlarge-hover="true"
             data-ng-swipe-left="$aside.toggleCollapse(true);"
             data-ng-swipe-right="$aside.toggleCollapse(false);">
            <div class="aside-header">
                <div class="aside-buttons">
                    <span ng-show="$aside.$collapsed" ng-click="$aside.toggleCollapse()"><i class="glyphicon glyphicon-arrow-right"></i></span>
                    <span ng-hide="$aside.$collapsed" ng-click="$aside.toggleCollapse()"><i class="glyphicon glyphicon-arrow-left"></i></span>
                    <span ng-hide="$aside.$collapsed" ng-click="$aside.close()"><i class="glyphicon glyphicon-remove"></i></span>
                </div>
                <span ng-hide="$aside.$collapsed" class="aside-title">Aside With Menu</span>

            </div>
            <div class="aside-body">
                <ul class="nav nav-stacked">
                    <li>
                        <a href="dashboard">
                            <i class="glyphicon glyphicon-home"></i>
                            <span ng-hide="$aside.$collapsed" class="menu-text">{{trans('menu.dashboard')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('dashboard/posts') }}">
                            <i class="glyphicon glyphicon-pushpin"></i>
                            <span ng-hide="$aside.$collapsed" class="menu-text">{{trans('menu.posts')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-cog"></i>
                            <span ng-hide="$aside.$collapsed" class="menu-text">Menu Example</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-nq-collapse="" data-target-id="#collapseExample">
                            <i class="glyphicon glyphicon-folder-close"></i>
                            <span ng-hide="$aside.$collapsed" class="menu-text">Collapse Example</span>
                        </a>
                        <ul id="collapseExample" class="nav nav-stacked" ng-hide="$aside.$collapsed">
                            <li>
                                <a href="#">
                                    Sub Menu Collapse
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Sub Menu Collapse
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Sub Menu Collapse
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Sub Menu Collapse
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="aside-footer">
                <strong ng-hide="$aside.$collapsed">Aside Footer</strong>
            </div>
        </div>
        @yield('content')
        
        <div id="tasksAside" class="aside" data-nq-aside="" data-width="260px" data-container="body"
             data-side="right" data-effect="slide-right" style="border-width:1px;">
            <div class="aside-header">
                <div class="aside-buttons">
                    <span ng-click="$aside.close()"><i class="glyphicon glyphicon-remove"></i></span>
                </div>
                <span class="aside-title">Tasks</span>
            </div>
            <div class="aside-body">
                <div class="" data-nq-scroll="" data-qo-hide-rail="true" data-qo-vertical-placement="left">
                    <div class="list-group">
                        <h4 style="padding-left:10px; padding-right:10px;">
                            Urgent <span class="badge bg-danger-light pull-right">2</span>
                        </h4>
                        <div class="list-group-item" style="display:table;">
                            <span style="width:50px; vertical-align:middle; display:table-cell">
                                <img src="http://dummyimage.com/40x40/eee/000000" />
                            </span>
                            <a href="javascript:;" style="display:table-cell; width:100%; padding-left:10px;">
                                <strong style="display:block">Office Rental</strong>
                                <span class="help-block text-sm">
                                    lorem impus dolor sit amet...
                                </span>
                            </a>
                        </div>
                        <div class="list-group-item" style="display:table;">
                            <span style="width:50px; vertical-align:middle; display:table-cell">
                                <img src="http://dummyimage.com/40x40/eee/000000" />
                            </span>
                            <a href="javascript:;" style="display:table-cell; width:100%; padding-left:10px;">
                                <strong style="display:block">Office Rental</strong>
                                <span class="help-block text-sm">
                                    lorem impus dolor sit amet...
                                </span>
                            </a>
                        </div>
                        <div class="list-group-item" style="display:table;">
                            <span style="width:50px; vertical-align:middle; display:table-cell">
                                <img src="http://dummyimage.com/40x40/eee/000000" />
                            </span>
                            <a href="javascript:;" style="display:table-cell; width:100%; padding-left:10px;">
                                <strong style="display:block">Office Rental</strong>
                                <span class="help-block text-sm">
                                    lorem impus dolor sit amet...
                                </span>
                            </a>
                        </div>
                        <h4 style="padding-left:10px; padding-right:10px;">
                            Urgent <span class="badge bg-danger-light pull-right">2</span>
                        </h4>
                        <div class="list-group-item" style="display:table;">
                            <span style="width:50px; vertical-align:middle; display:table-cell">
                                <img src="http://dummyimage.com/40x40/eee/000000" />
                            </span>
                            <a href="javascript:;" style="display:table-cell; width:100%; padding-left:10px;">
                                <strong style="display:block">Office Rental</strong>
                                <span class="help-block text-sm">
                                    lorem impus dolor sit amet...
                                </span>
                            </a>
                        </div>
                        <div class="list-group-item" style="display:table;">
                            <span style="width:50px; vertical-align:middle; display:table-cell">
                                <img src="http://dummyimage.com/40x40/eee/000000" />
                            </span>
                            <a href="javascript:;" style="display:table-cell; width:100%; padding-left:10px;">
                                <strong style="display:block">Office Rental</strong>
                                <span class="help-block text-sm">
                                    lorem impus dolor sit amet...
                                </span>
                            </a>
                        </div>
                        <div class="list-group-item" style="display:table;">
                            <span style="width:50px; vertical-align:middle; display:table-cell">
                                <img src="http://dummyimage.com/40x40/eee/000000" />
                            </span>
                            <a href="javascript:;" style="display:table-cell; width:100%; padding-left:10px;">
                                <strong style="display:block">Office Rental</strong>
                                <span class="help-block text-sm">
                                    lorem impus dolor sit amet...
                                </span>
                            </a>
                        </div>
                        <h4 style="padding-left:10px; padding-right:10px;">
                            Urgent <span class="badge bg-danger-light pull-right">2</span>
                        </h4>
                        <div class="list-group-item" style="display:table;">
                            <span style="width:50px; vertical-align:middle; display:table-cell">
                                <img src="http://dummyimage.com/40x40/eee/000000" />
                            </span>
                            <a href="javascript:;" style="display:table-cell; width:100%; padding-left:10px;">
                                <strong style="display:block">Office Rental</strong>
                                <span class="help-block text-sm">
                                    lorem impus dolor sit amet...
                                </span>
                            </a>
                        </div>
                        <div class="list-group-item" style="display:table;">
                            <span style="width:50px; vertical-align:middle; display:table-cell">
                                <img src="http://dummyimage.com/40x40/eee/000000" />
                            </span>
                            <a href="javascript:;" style="display:table-cell; width:100%; padding-left:10px;">
                                <strong style="display:block">Office Rental</strong>
                                <span class="help-block text-sm">
                                    lorem impus dolor sit amet...
                                </span>
                            </a>
                        </div>
                        <div class="list-group-item" style="display:table;">
                            <span style="width:50px; vertical-align:middle; display:table-cell">
                                <img src="http://dummyimage.com/40x40/eee/000000" />
                            </span>
                            <a href="javascript:;" style="display:table-cell; width:100%; padding-left:10px;">
                                <strong style="display:block">Office Rental</strong>
                                <span class="help-block text-sm">
                                    lorem impus dolor sit amet...
                                </span>
                            </a>
                        </div>
                        <span></span>
                    </div>

                </div>
            </div>
            <div class="aside-footer no-border height-auto bordered-h bg-base-lighter">
                <div class="row" style="height:100%; display:table;">
                    <div class="col-xs-9" style="display:table-cell; vertical-align:middle;">
                        <form name="searchTask">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon" style="background-color:transparent; border:0;">
                                    <i class="fic fu-search"></i>
                                </span>
                                <input type="text" data-ng-model="searchTerm" placeholder="search" class="form-control" style="background-color:transparent; border:0;" />
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-3" style="display:table-cell; vertical-align:middle; text-align:right">
                        <a href="javascript:;" class="titip-top-left" data-title="Delete">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script src="https://code.angularjs.org/1.3.13/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.3.13/angular-sanitize.min.js"></script>
    <script src="https://code.angularjs.org/1.3.13/angular-animate.min.js"></script>

    <script src="/dist/js/quantumui-nojq.min.js"></script>


    <script src="/doc/js/app.js"></script>
    <script src="/doc/js/indexController.js"></script>



</body>
</html>
