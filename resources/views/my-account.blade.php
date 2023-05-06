@include('templates.header')

<div class="main-container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 justify-content-center">
                <div class="row  justify-content-center">
                    <div class="col-md-3">
                        <a href="/moje-konto/wizyty">
                            <div class="info-box">
                                <span class="info-box-icon bg-info">
                                    <svg style="height: 50px;" class="white-svg-filter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M441 7l32 32 32 32c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-15-15L417.9 128l55 55c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-72-72L295 73c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l55 55L422.1 56 407 41c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0zM210.3 155.7l61.1-61.1c.3 .3 .6 .7 1 1l16 16 56 56 56 56 16 16c.3 .3 .6 .6 1 1l-191 191c-10.5 10.5-24.7 16.4-39.6 16.4H97.9L41 505c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l57-57V325.3c0-14.9 5.9-29.1 16.4-39.6l43.3-43.3 57 57c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-57-57 41.4-41.4 57 57c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-57-57z"/></svg>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text"  style="color: black;">Zaplanowany test</span>
                                    <span class="info-box-number"  style="color: black;">{{$visits}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="/moje-konto/wizyty">
                            <div class="info-box">
                                <span class="info-box-icon bg-success">
                                    <svg style="height: 50px;" class="white-svg-filter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M441 7l32 32 32 32c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-15-15L417.9 128l55 55c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-72-72L295 73c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l55 55L422.1 56 407 41c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0zM210.3 155.7l61.1-61.1c.3 .3 .6 .7 1 1l16 16 56 56 56 56 16 16c.3 .3 .6 .6 1 1l-191 191c-10.5 10.5-24.7 16.4-39.6 16.4H97.9L41 505c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l57-57V325.3c0-14.9 5.9-29.1 16.4-39.6l43.3-43.3 57 57c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-57-57 41.4-41.4 57 57c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-57-57z"/></svg>
                                </span>
                                <div class="info-box-content" style="color: black;">Najbliższy test</span>
                                    <span class="info-box-number"  style="color: black;">@if(isset($visitDate)){{date('d.m.Y H:i', strtotime($visitDate->date))}}@else Brak @endif</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="/zapisy">
                            <div class="info-box">
                                <span class="info-box-icon bg-danger">
                                    <svg style="height: 50px;" class="white-svg-filter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-96 55.2C54 332.9 0 401.3 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7c0-81-54-149.4-128-171.1V362c27.6 7.1 48 32.2 48 62v40c0 8.8-7.2 16-16 16H336c-8.8 0-16-7.2-16-16s7.2-16 16-16V424c0-17.7-14.3-32-32-32s-32 14.3-32 32v24c8.8 0 16 7.2 16 16s-7.2 16-16 16H256c-8.8 0-16-7.2-16-16V424c0-29.8 20.4-54.9 48-62V304.9c-6-.6-12.1-.9-18.3-.9H178.3c-6.2 0-12.3 .3-18.3 .9v65.4c23.1 6.9 40 28.3 40 53.7c0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.4 16.9-46.8 40-53.7V311.2zM144 448a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/></svg>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text"  style="color: black;">Zapisz się</span>
                                    <span class="info-box-text"  style="color: black;"> na test</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
       
            </div>
            <div class="col-md-4 justify-content-center"></div>
            <div class="col-md-4 justify-content-center">
                <div class="card card-success">
                    <div class="card-header">
                        <h3>Twoje dane</h3>

                    </div>
                    <div class="card-body">
                        <form method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">              
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">E-mail</label>
                                        <input type="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" id="exampleInputEmail1" value="{{$user->email}}">
                                        @if ($errors->has('email')) 
                                           <span class="text-danger" style="font-size: 15px;">{{$errors->first('email')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleName1">Imię</label>
                                        <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" id="exampleName1" value="{{$user->name}}">
                                        @if ($errors->has('name')) 
                                            <span class="text-danger" style="font-size: 15px;">{{$errors->first('name')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    
                                <div class="form-group">
                                    <label for="exampleSurname1">Nazwisko</label>
                                    <input type="text" name="surname" class="form-control @if($errors->has('surname')) is-invalid @endif" id="exampleSurname1" value="{{$user->surname}}">
                                    @if ($errors->has('surname')) 
                                        <span class="text-danger" style="font-size: 15px;">{{$errors->first('surname')}}</span>
                                    @endif
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleDate1">Data urodzenia</label>
                                        <input type="date" name="birthdate" class="form-control @if($errors->has('birthdate')) is-invalid @endif" id="exampleDate1" value="{{$user->birthdate}}">
                                        @if ($errors->has('birthdate')) 
                                            <span class="text-danger" style="font-size: 15px;">{{$errors->first('birthdate')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="examplePesel1">Pesel</label>
                                        <input type="text" name="pesel" class="form-control @if($errors->has('pesel')) is-invalid @endif" id="examplePesel1" value="{{$user->pesel}}">
                                        @if ($errors->has('pesel')) 
                                            <span class="text-danger" style="font-size: 15px;">{{$errors->first('pesel')}}</span>
                                        @endif
                                    </div>
                                </div>            
                            </div>
                            
                            @if(isset($message))
                            
                                <p style="color: green;">{{$message}}<p>
                            @endif

                            <div class="mt-4">
                                <button type="submit" class="btn btn-success">Edytuj</button>
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