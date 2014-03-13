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
          <a href="#!/admin">Home</a></li>

      </ul>
<!-- {{UserService.isLogged}} -->
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown" ng-if="UserService.isLogged">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> <b class="caret"></b> </a>
          <ul class="dropdown-menu">
            <li><a href="#!/">Change Password</a></li>
            <li class="divider"></li>
            <li><a href="#!/"></a></li>
          </ul>
        </li>

        <li ng-if="UserService.isLogged"><a href="#!/logout">Logout</a></li>
        <li ng-if="!UserService.isLogged"><a href="#!/">Login</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->

</nav>
</div>