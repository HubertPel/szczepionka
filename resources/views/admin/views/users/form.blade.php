@include('admin.templates.login')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @if (isset($item))
                    <h1>Edycja użytkownika - {{$item->name . ' ' . $item->surname}}</h1>
                @else
                    <h1>Nowy użytkownik</h1>
                @endif
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/users">Użytkownicy</a></li>
                    @if (isset($item))
                        <li class="breadcrumb-item active">Edycja</li>
                    @else
                        <li class="breadcrumb-item active">Nowy użytkownik</li>
                    @endif
                </ol>
            </div>
        </div>
    </div>
</section>

<section style=" width: 95%;margin: auto;padding-top: 20px;">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-{{isset($item) ? 'warning' : 'success'}}">
            <div class="card-header">
              <h3 class="card-title">{{isset($item) ? 'Edycja użytkownia' : 'Tworzenie użytkownika'}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @if (isset($item))
                <form method="POST" action="/admin/users/edit">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="id" value="{{$item->id}}" />
            @else 
                <form method="POST" action="/admin/users/create">
            @endif
                  @csrf
                  <div class="card-body">
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                            <label for="nameInput">Imie</label>
                            <input id="nameInput" class="form-control" name="name" required @if(isset($item))value="{{$item->name}}"@else value="{{old('name')}}" @endif />
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                            <label for="nameSurname">Nazwisko</label>
                            <input id="nameSurname" class="form-control" name="surname" required @if(isset($item))value="{{$item->surname}}"@else value="{{old('surname')}}" @endif />
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                            <label for="emailInput">E-mail</label>
                            <input id="emailInput" class="form-control" name="email" required @if(isset($item))value="{{$item->email}}"@else value="{{old('email')}}" @endif />
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                            <label for="typeSelect">Typ</label>
                            <select class="form-control" name="type">
                              <option value="">Wybierz</option>
                              @foreach($types as $type => $typeName)
                                <option value="{{$type}}" @if(isset($item)){{$item->type == $type ? 'selected' : ''}}@else {{old('type') == $type ? 'selected' : ''}}@endif>{{$typeName}}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                            <label for="peselInput">Pesel</label>
                            <input id="peselInput" class="form-control" name="pesel"  @if(isset($item))value="{{$item->pesel}}"@else value="{{old('pesel')}}" @endif />
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                            <label for="bdatDate">Data urodzenia</label>
                            <input id="bdatDate" type="date" class="form-control" name="birthdate" required @if(isset($item))value="{{$item->birthdate}}"@else value="{{old('birthdate')}}" @endif />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                            <label for="passwordInput">Hasło</label>
                            <input id="passwordInput" type="password" class="form-control" name="password" />
                        </div>
                      </div>

     

                      @if($errors->any())
                        @foreach($errors->all() as $error)
                          <span style="color: red">{{$error}}<span><br>
                        @endforeach
                    @endif
                    </div>
                  </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-{{isset($item) ? 'warning' : 'success'}}">Submit</button>
              </div>
            </form>
              @if (isset($item) && $item->type == 'worker')
              <div class="col-12">
                <h2> Pracownik w</h2> 
                <div class="row">
                  <div class="col-6">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Szpital</th>
                          <th style="width: 40px">Akcja</th>
                        </tr>
                      </thead>
                        <tbody>
                          @foreach ($item->hospitals as $hospital)
                              <tr>
                                <td>{{$hospital->name}}</td>
                                <td>
                                  <form method="POST" action="/admin/users/deleteHospital">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="id" value="{{$hospital->id}}">
                                    <input type="hidden" name="user_id" value="{{$item->id}}">
                                    <button type="submit" class="btn btn-danger">Usuń</button>
                                  </form>
                                </td>
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
                
                  <div class="col-6">
                    <form action="/admin/users/addHospital" method="POST">
                      @csrf
                      <input type="hidden" name="user" value="{{$item->id}}">
                      <select name="hospital" class="form-control" required>
                        <option value="">Wybierz</option>
                        @foreach ($hospitals as $hospital)
                            <option value="{{$hospital->id}}">{{$hospital->name}}</option>
                        @endforeach
                      </select>
                      <button type="submit" class="btn btn-success">Dodaj</button>
                    </form>
                  </div>
                </div>
              </div>
            @endif
            
          </div>
        </div>
      </div>
    </div>
</section>


@include('admin.templates.loginfooter')