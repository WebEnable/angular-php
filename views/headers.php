<div ng-controller="hdrCntrl">
  <nav class="navbar navbar-default  navbar-static-top clearfix" role="navigation">
    <div class="container-fluid">
     <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-1" >
        <span class="sr-only">Toggle Menu</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <h1 class="navbar-brand" href="#">Student 
      </h1>
    </div>
 <div class="collapse navbar-collapse" id="collapse-1">
      <ul class="nav navbar-nav" ng-if="UserService.isLogged">
      <li class="">
          <a href="#/admin">Home</a></li>
<!--    <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li> -->
      </ul>
<!-- {{UserService.isLogged}} -->
      <ul class="nav navbar-nav navbar-right">
        <li ng-if="UserService.isLogged"><a href="#/logout">Logout</a></li>
        <li ng-if="!UserService.isLogged"><a href="#/">Login</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->

</nav>
</div>