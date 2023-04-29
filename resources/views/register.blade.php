@include('templates.header')

<div class="main-container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 justify-content-center"></div>
            <div class="col-md-4 justify-content-center">
                <div class="card card-success">
                    <div class="card-header">
                        <h3>Zarejestruj się</h3>

                    </div>
                    <div class="card-body">
                        <form method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">              
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">E-mail</label>
                                        <input type="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" id="exampleInputEmail1" value="{{old('email')}}">
                                        @if ($errors->has('email')) 
                                           <span class="text-danger" style="font-size: 15px;">{{$errors->first('email')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleName1">Imię</label>
                                        <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" id="exampleName1" value="{{old('name')}}">
                                        @if ($errors->has('name')) 
                                            <span class="text-danger" style="font-size: 15px;">{{$errors->first('name')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    
                                <div class="form-group">
                                    <label for="exampleSurname1">Nazwisko</label>
                                    <input type="text" name="surname" class="form-control @if($errors->has('surname')) is-invalid @endif" id="exampleSurname1" value="{{old('surname')}}">
                                    @if ($errors->has('surname')) 
                                        <span class="text-danger" style="font-size: 15px;">{{$errors->first('surname')}}</span>
                                    @endif
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleDate1">Data urodzenia</label>
                                        <input type="date" name="birthdate" class="form-control @if($errors->has('birthdate')) is-invalid @endif" id="exampleDate1" value="{{old('birthdate')}}">
                                        @if ($errors->has('birthdate')) 
                                            <span class="text-danger" style="font-size: 15px;">{{$errors->first('birthdate')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="examplePesel1">Pesel</label>
                                        <input type="text" name="pesel" class="form-control @if($errors->has('pesel')) is-invalid @endif" id="examplePesel1" value="{{old('pesel')}}">
                                        @if ($errors->has('pesel')) 
                                            <span class="text-danger" style="font-size: 15px;">{{$errors->first('pesel')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="examplePassword1">Hasło</label>
                                        <input type="password" name="password" class="form-control @if($errors->has('password')) is-invalid @endif" id="examplePassword1" value="{{old('password')}}">
                                        @if ($errors->has('password')) 
                                            <span class="text-danger" style="font-size: 15px;">{{$errors->first('password')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="examplePassword2">Powtórz hasło</label>
                                        <input type="password" name="repeat_password" class="form-control @if($errors->has('repeat_password')) is-invalid @endif" id="examplePassword2" value="{{old('repeat_password')}}">
                                        @if ($errors->has('repeat_password')) 
                                            <span class="text-danger" style="font-size: 15px;">{{$errors->first('repeat_password')}}</span>
                                        @endif
                                    </div>
                                </div>                
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-success">Zarejestruj się</button>
                                <a href="/logowanie"  class="btn btn-info">Mam konto</a>
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