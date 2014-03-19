<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#dalal-street-navbar">
        <span class="sr-only">TOGGLE NAVIGATION</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><strong>DALAL &middot; STREET</strong></a>
    </div>
    @if(isset($broker))
    <div class="collapse navbar-collapse" id="dalal-street-navbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Howdy <strong>Broker #{{ $broker->id }}</strong> <b class="caret"></b></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('logout') }}">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
    @endif
  </div>
</nav>