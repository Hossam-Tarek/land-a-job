  <!--header area start-->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand text-capitalize" href="{{route('admin.index')}}">land a job</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <div class="">
          <a class="btn my-2 my-sm-0 text-light" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> 
              {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </div>
    </nav>
  </header>
  <!--header area end-->