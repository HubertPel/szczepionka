@include('admin.templates.login')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @if (isset($item))
                    <h1>Edycja Wizyty</h1>
                @else
                    <h1>Nowa wizyta</h1>
                @endif
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/visits">Wizyty</a></li>
                    @if (isset($item))
                        <li class="breadcrumb-item active">Edycja</li>
                    @else
                        <li class="breadcrumb-item active">Nowa wizyta</li>
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
              <h3 class="card-title">{{isset($item) ? 'Edycja wizyty' : 'Tworzenie wizyty'}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @if (isset($item))
                <form method="POST" action="/admin/visits/edit">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="id" value="{{$item->id}}" />
            @else 
                <form method="POST" action="/admin/visits/create">
            @endif
                  @csrf
                  <div class="card-body">
                    <div class="row">

                      <div class="col-12">
                        <div class="form-group">
                            <label for="typeSelect">Użytkownik</label>
                            <select class="form-control" name="user_id" required>
                              <option value="">Wybierz</option>
                              @foreach($users as $user)
                                <option value="{{$user->id}}" @if(isset($item)){{$item->user_id == $user->id ? 'selected' : ''}}@else {{old('user_id') == $user->id ? 'selected' : ''}}@endif>{{$user->id . '# ' . $user->name . ' ' . $user->surname}}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                            <label for="typeSelect">Szpital</label>
                            <select class="form-control" name="hospital_id" required>
                              <option value="">Wybierz</option>
                              @foreach($hospitals as $hospital)
                                <option value="{{$hospital->id}}" @if(isset($item)){{$item->hospital_id == $hospital->id ? 'selected' : ''}}@else {{old('hospital_id') == $hospital->id ? 'selected' : ''}}@endif>{{$hospital->id . '# ' . $hospital->name}}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                            <label for="typeSelect">Status</label>
                            <select class="form-control" name="status" required>
                              <option value="">Wybierz</option>
                              @foreach($status as $kStat => $stat)
                                <option value="{{$kStat}}" @if(isset($item)){{$item->status == $kStat ? 'selected' : ''}}@else {{old('status') == $kStat ? 'selected' : ''}}@endif>{{$stat}}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                            <label for="typeSelect">Wynik</label>
                            <select class="form-control" name="result">
                              @foreach($results as $kResult => $result)
                                <option value="{{$kResult}}" @if(isset($item)){{$item->status == $kResult ? 'selected' : ''}}@else {{old('status') == $kResult ? 'selected' : ''}}@endif>{{$result}}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                            <label for="bdatDate">Data wizyty</label>
                            <input id="bdatDate" type="datetime-local" class="form-control" name="date" @if(isset($item))value="{{date('Y-m-d H:i', strtotime($item->date))}}"@else value="{{old('birthdate')}}" @endif />
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
          </div>
        </div>
      </div>
    </div>
</section>


@include('admin.templates.loginfooter')