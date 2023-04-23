@include('templates.header')

<div class="main-container">
    <div class="small-box">
        <h1>Twoje dane</h1>
        <form method="POST">
            @csrf
            <div class="input-box">
                E-mail
                <input type="email" name="email" value="{{$user->email}}"><br><br>
            </div>
            <div class="input-box">
                Imię
                <input type="text" name="name" value="{{$user->name}}"><br><br>
            </div>
            <div class="input-box">
                Nazwisko
                <input type="text" name="surname" value="{{$user->surname}}"><br><br>
            </div>
            <div class="input-box">
                Data urodzenia
                <input type="date" name="birthdate" value="{{$user->birthdate}}"><br><br>
            </div>
            <div class="input-box">
                Pesel
                <input type="text" name="pesel" value="{{$user->pesel}}"><br><br>
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
                <button type="submit"  style="background-color: rgba(255, 0, 0, 0.296); font-size: 16px">Edytuj</button>
            </div>
        </form>
        
    </div>
</div>


@include('templates.footer')
