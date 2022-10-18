    
    <header class="">
        <div class="container-xxl bg-dark">
            <div class="row text-white">
                <div class="col-xl-2 col-3 col-xxl-3  mt-3">
                    <a href="{{route('home')}}" class="logo"><h1 class="text-left text-darck">Новости</h1></a>
                </div>
                <div class="col-xl-7 col-5 col-xxl-7 ">
                    <nav class="navbar navbar-expand-md navbar-light bg-light mt-2 bg-dark ">
                        <div class="container-fluid p-0">
                          <a class="navbar-brand" href="#"></a>
                          <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                          <div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                              <li class="nav-item">
                                <a class="nav-link @if(Request::is('/')) active @endif text-white my-link" aria-current="page" href="{{route('home')}}">Главная</a>
                              </li>
                              <li class="nav-item ">
                                <a class="nav-link @if(Request::is('news')) active @endif text-white my-link" href="{{route('news')}}">Все новости</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link @if(Request::is('contact')) active @endif text-white my-link" href="{{route('contact')}}" tabindex="-1" aria-disabled="true">Контакты</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </nav>
                </div>
                <div class="col-xl-3 col-4 col-xxl-2   mt-3 px-2">
                    @auth('web')
                    <a href="{{route('logout')}}" class="btn btn-primary "><i class="icon-user-circle-o"></i>Выйти</a>
                    @endauth
                    @guest
                    <a href="{{route('login')}}" class="btn btn-primary "><i class="icon-user-circle-o"></i>Войти</a>
                    @endguest
                </div>
            </div>
        </div>
    </header>