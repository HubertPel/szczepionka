@include('templates.header')

<div class="main-container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 justify-content-center"></div>
            <div class="col-md-4 justify-content-center">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3>Zaloguj się</h3>

                    </div>
                    <div class="card-body">
                        <form method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">E-mail</label>
                                <input type="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" id="exampleInputEmail1">
                                @if ($errors->has('name')) 
                                    <span class="text-danger" style="font-size: 15px;">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="examplePassword1">Hasło</label>
                                <input type="password" name="password" class="form-control @if($errors->has('password')) is-invalid @endif" id="examplePassword1">
                                @if ($errors->has('password')) 
                                    <span class="text-danger" style="font-size: 15px;">{{$errors->first('password')}}</span>
                                @endif
                            </div>
                            @if(session('message'))
                                <p style="color: red;">{{session('message')}}<p>
                            @endif

                            <div class="mt-4">
                                <button type="submit" class="btn btn-success">Zaloguj się</button>
                                <a href="/rejestracja"  class="btn btn-info">Zarejestruj się</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 justify-content-center"></div>
        </div>
    </div>
</div>




@include('templates.footer')