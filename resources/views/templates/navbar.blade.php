<nav class="main-header navbar navbar-expand-md navbar-light navbar-white" style="margin-left: 0;">
    <div class="container">

        <div class="collapse navbar-collapse order-3" id="navbarCollapse" style="justify-content: space-between; margin-right: -100px;">
        
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/" class="nav-link">Home</a>
                </li>
                {{-- <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="#" class="dropdown-item">Some action </a></li>
                        <li><a href="#" class="dropdown-item">Some other action</a></li>
                        <li class="dropdown-divider"></li>
            
                        <li class="dropdown-submenu dropdown-hover">
                            <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                <li>
                                    <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                                </li>
                                <li class="dropdown-submenu">
                                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                                        <li><a href="#" class="dropdown-item">3rd level</a></li>
                                        <li><a href="#" class="dropdown-item">3rd level</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" class="dropdown-item">level 2</a></li>
                                <li><a href="#" class="dropdown-item">level 2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}
            </ul>
            @if(!session('user_id'))
            <form class="form-inline ml-0 ml-md-5" style="gap: 10px" method="POST" action="/logowanie">
                @csrf
                <input class="form-control form-control-navbar" placeholder="E-mail" type="email" name="email" aria-label="Search">
                <input class="form-control form-control-navbar" placeholder="Hasło" type="password" name="password" aria-label="Search">
                <button class="btn btn-success">Zaloguj się</button>
            </form>
            @else   
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Witaj, <strong>{{session('user_name')}}</strong></a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                            <li><a href="/moje-konto" class="dropdown-item">Moje konto</a></li>
                            <li><a href="/moje-konto/wizyty" class="dropdown-item">Moje wizyty</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a href="/wyloguj" class="dropdown-item">Wyloguj</a></li>
                
                        </ul>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>