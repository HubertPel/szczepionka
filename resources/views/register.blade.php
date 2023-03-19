@include('templates.header')

<h1>Zaloguj sie</h1>
<form method="POST">
    @csrf
    E-mail
    <input type="email" name="email"><br><br>
    Imię
    <input type="text" name="name"><br><br>
    Nazwisko
    <input type="text" name="surname"><br><br>
    Data urodzenia
    <input type="date" name="birthdate"><br><br>
    Pesel
    <input type="text" name="pesel"><br><br>
    Hasło
    <input type="passoword" name="password"><br><br>
    Powtórz hasło
    <input type="passoword" name="repeat_password"><br><br>
    <button type="submit">Zarejestruj się</button>
</form>

<a href="/logowanie">Mam konto</a>

@if(isset($message))
    {{$message}}
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@include('templates.footer')