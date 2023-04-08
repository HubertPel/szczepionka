@include('templates.header')

<div class="main-container">
    <div class="small-box">
        <h1>Zaloguj się</h1>
        <form method="POST">
            @csrf
            <div class="input-box">
                E-mail<br>
                <input type="text" name="email">
            </div>
            <div class="input-box">
                Hasło<br>
                <input type="password" name="password">
            </div>

            @if(session('message'))
                <p style="color: red;">{{session('message')}}<p>
            @endif

            <div class="button-box">
                <button type="submit">Zaloguj się</button>
                <a href="/rejestracja" style="background-color: rgba(255, 0, 0, 0.296); font-size: 16px">Zarejestruj się</a>
            </div>

        </form>
    </div>
</div>




@include('templates.footer')