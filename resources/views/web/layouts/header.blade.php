<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('web.index')}}"><img class="logo p-2" src="{{asset('web/assets/images/logo.png')}}" alt="{{env('APP_NAME')}}"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse stroke" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto ">
              <li class="nav-item">
                <a class="nav-link active text-dark fs-5" aria-current="page"  href="{{route('web.about')}}">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark fs-5" href="{{route('web.programs')}}">Programs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark fs-5" href="{{route('web.sponsors')}}">Sponsors</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark fs-5" href="{{route('web.contact')}}">Contact Us</a>
              </li>
                @guest
                <li class="nav-item">
                    <a href="{{route('login')}}" class="nav-link text-dark fs-5">Login</a>
                </li>
                @endguest 
                @auth
                <a href="{{route('user_profile')}}" title="Go to Dashboard" class="nav-link text-dark fs-5"><i class="fa fa-dashboard"></i></a>
                
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                @endauth
            </ul>
            
            <a href="{{route('web.donation')}}" class="donation-btn">Donation</a>
          </div>
        </div>
      </nav>
