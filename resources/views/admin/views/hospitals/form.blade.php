@include('admin.templates.login')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @if (isset($item))
                    <h1>Edycja Szpitala</h1>
                @else
                    <h1>Nowy szpital</h1>
                @endif
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/hospitals">Szpitale</a></li>
                    @if (isset($item))
                        <li class="breadcrumb-item active">Edycja</li>
                    @else
                        <li class="breadcrumb-item active">Nowy szpital</li>
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
              <h3 class="card-title">{{isset($item) ? 'Edycja szpitala' : 'Tworzenie szpitala'}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @if (isset($item))
                <form method="POST" action="/admin/hospitals/edit">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="id" value="{{$item->id}}" />
            @else 
                <form method="POST" action="/admin/hospitals/create">
            @endif
                  @csrf
                  <div class="card-body">
                    <div class="row">

                      <div class="col-12">
                        <div class="form-group">
                            <label for="">Nazwa</label>
                            <input type="text" id="" class="form-control" name="name" required @if(isset($item))value="{{$item->name}}"@endif />
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                            <label for="typeSelect">Miasto</label>
                            <select class="form-control" name="city_id" required>
                              <option value="">Wybierz</option>
                              @foreach($cities as $city)
                                <option value="{{$city->id}}" @if(isset($item)){{$item->city_id == $city->id ? 'selected' : ''}}@else {{old('city_id') == $city->id ? 'selected' : ''}}@endif>{{$city->id . '# ' . $city->city}}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                            <label for="">Telefon</label>
                            <input type="text" id="" class="form-control" name="phone" required @if(isset($item))value="{{$item->phone}}"@endif />
                        </div>
                      </div>
                      <div class="col-12">
                        <label for="">Adres</label>
                        <textarea name="address" class="form-control" required>@if(isset($item)){{$item->address}}@endif</textarea>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                            <label for="">Godziny otwarcia tekst</label>
                            <input type="text" id="" class="form-control" name="hours" required @if(isset($item))value="{{$item->hours}}"@endif />
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" id="" class="form-control" name="email" required @if(isset($item))value="{{$item->email}}"@endif />
                        </div>
                      </div>
                      <div class="col-12">
                        <h2>Godziny otwarcia w poszczegolne dni</h2>
                      </div>

                      <div class="col-12"><h3>Poniedziałek</h3></div>
                      <div class="col-6">
                        <label for="">Otwarcie</label>
                        <input type="number" id="" class="form-control" name="hours_data[0][start]" @if(isset($hours[0]['start']))value="{{$hours[0]['start']}}"@endif />
                      </div>
                      <div class="col-6">
                        <label for="">Zamknięcie</label>
                        <input type="number" id="" class="form-control" name="hours_data[0][end]" @if(isset($hours[0]['end']))value="{{$hours[0]['end']}}"@endif />
                      </div>

                      <div class="col-12"><h3>Wtorek</h3></div>
                      <div class="col-6">
                        <label for="">Otwarcie</label>
                        <input type="number" id="" class="form-control" name="hours_data[1][start]" @if(isset($hours[1]['start']))value="{{$hours[1]['start']}}"@endif />
                      </div>
                      <div class="col-6">
                        <label for="">Zamknięcie</label>
                        <input type="number" id="" class="form-control" name="hours_data[1][end]" @if(isset($hours[1]['end']))value="{{$hours[1]['end']}}"@endif />
                      </div>


                      <div class="col-12"><h3>Środa</h3></div>
                      <div class="col-6">
                        <label for="">Otwarcie</label>
                        <input type="number" id="" class="form-control" name="hours_data[2][start]" @if(isset($hours[2]['start']))value="{{$hours[2]['start']}}"@endif />
                      </div>
                      <div class="col-6">
                        <label for="">Zamknięcie</label>
                        <input type="number" id="" class="form-control" name="hours_data[2][end]" @if(isset($hours[2]['end']))value="{{$hours[2]['end']}}"@endif />
                      </div>

                      
                      <div class="col-12"><h3>Czawrtek</h3></div>
                      <div class="col-6">
                        <label for="">Otwarcie</label>
                        <input type="number" id="" class="form-control" name="hours_data[3][start]" @if(isset($hours[3]['start']))value="{{$hours[3]['start']}}"@endif />
                      </div>
                      <div class="col-6">
                        <label for="">Zamknięcie</label>
                        <input type="number" id="" class="form-control" name="hours_data[3][end]" @if(isset($hours[3]['end']))value="{{$hours[3]['end']}}"@endif />
                      </div>

                      <div class="col-12"><h3>Piątek</h3></div>
                      <div class="col-6">
                        <label for="">Otwarcie</label>
                        <input type="number" id="" class="form-control" name="hours_data[4][start]" @if(isset($hours[4]['start']))value="{{$hours[4]['start']}}"@endif />
                      </div>
                      <div class="col-6">
                        <label for="">Zamknięcie</label>
                        <input type="number" id="" class="form-control" name="hours_data[4][end]" @if(isset($hours[4]['end']))value="{{$hours[4]['end']}}"@endif />
                      </div>

                      <div class="col-12"><h3>Sobota</h3></div>
                      <div class="col-6">
                        <label for="">Otwarcie</label>
                        <input type="number" id="" class="form-control" name="hours_data[5][start]" @if(isset($hours[5]['start']))value="{{$hours[5]['start']}}"@endif />
                      </div>
                      <div class="col-6">
                        <label for="">Zamknięcie</label>
                        <input type="number" id="" class="form-control" name="hours_data[5][end]" @if(isset($hours[5]['end']))value="{{$hours[5]['end']}}"@endif />
                      </div>

                      <div class="col-12"><h3>Niedziela</h3></div>
                      <div class="col-6">
                        <label for="">Otwarcie</label>
                        <input type="number" id="" class="form-control" name="hours_data[6][start]" @if(isset($hours[6]['start']))value="{{$hours[6]['start']}}"@endif />
                      </div>
                      <div class="col-6">
                        <label for="">Zamknięcie</label>
                        <input type="number" id="" class="form-control" name="hours_data[6][end]" @if(isset($hours[6]['end']))value="{{$hours[6]['end']}}"@endif />
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
          </div>
        </div>
      </div>
    </div>
</section>


@include('admin.templates.loginfooter')