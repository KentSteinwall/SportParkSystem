<div class="container">
<div class="p-3 mb-2 bg-success text-white">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Hasee'sArt</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="{{Request::is('home') ? 'active' : ''}}"><a href='home'>Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Production <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href='/vegetable'>Vegetables</a></li>
          <li><a href='/fruit'>Fruits</a></li>
          <li><a href='/others'>Others</a></li>
        </ul>
      </li>
      <li class="{{Request::is('messages') ? 'active' : ''}}"><a href='messages'>Messages</a></li>
      <li class="{{Request::is('contact') ? 'active' : ''}}"><a href='contact'>Contact</a></li>
      <li class="{{Request::is('about') ? 'active' : ''}}"><a href='about'>About</a></li>
    </ul>

    <div class="pull-right">
    <div class="col-sm-4"></div>
      <form class="form-inline md-form form-sm active-pink-2">
        <input type="text" class="form-control form-control-sm ml-3 w-75" placeholder="Search.." name="search" area-label="Search">
        <i class="fa fa-search" aria-hidden="true"></i>
    </form>
    </div>

  </div>
</nav>




</div>
