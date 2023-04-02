@include('templates.header')

<h1>Zaloguj sie</h1>
<form method="POST">
    @csrf
    E-mail
    <input type="text" name="email">
    Hasło
    <input type="password" name="password">
    <button type="submit">Zaloguj się</button>
</form>

<a href="/rejestracja">Zarejestruj się</a>

@include('templates.footer')
