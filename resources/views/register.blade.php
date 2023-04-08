@include('templates.header')


<div class="main-container">
    <div class="small-box">
        <h1>Zarejestruj się</h1>
        <form method="POST">
            @csrf
            <div class="input-box">
                E-mail
                <input type="email" name="email" value="{{old('email')}}"><br><br>
            </div>
            <div class="input-box">
                Imię
                <input type="text" name="name" value="{{old('name')}}"><br><br>
            </div>
            <div class="input-box">
                Nazwisko
                <input type="text" name="surname" value="{{old('surname')}}"><br><br>
            </div>
            <div class="input-box">
                Data urodzenia
                <input type="date" name="birthdate" value="{{old('birthdate')}}"><br><br>
            </div>
            <div class="input-box">
                Pesel
                <input type="text" name="pesel" value="{{old('pesel')}}"><br><br>
            </div>
            <div class="input-box">
                Hasło
                <input type="password" name="password" value="{{old('password')}}"><br><br>
            </div>
            <div class="input-box">
                Powtórz hasło
                <input type="password" name="repeat_password" value="{{old('repeat_password')}}"><br><br>
            </div>

            @if(isset($message))
                <p style="color: green;">{{$message}}<p>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color: red">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="button-box">
                <button type="submit"  style="background-color: rgba(255, 0, 0, 0.296); font-size: 16px">Zarejestruj się</button>
                <a href="/logowanie">Mam konto</a>
            </div>
        </form>
        
    </div>
</div>


@include('templates.footer')
