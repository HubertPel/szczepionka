<nav class="main-header navbar navbar-expand-md navbar-light navbar-white" style="margin-left: 0;">
    <div class="container">

        <div class="collapse navbar-collapse order-3" id="navbarCollapse" style="justify-content: space-between; margin-right: -100px;">
        
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/zapisy" class="nav-link">Zapisz się</a>
                </li>
            
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
                            @if(session('user_type') == 'user')
                                <li><a href="/moje-konto" class="dropdown-item">Moje konto</a></li>
                                <li><a href="/moje-konto/wizyty" class="dropdown-item">Moje wizyty</a></li>
                            @elseif(session('user_type') == 'worker')
                                <li><a href="/testy" class="dropdown-item">Testy</a></li>
                            @endif
                           
                            <li class="dropdown-divider"></li>
                            <li><a href="/wyloguj" class="dropdown-item">Wyloguj</a></li>
                
                        </ul>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>