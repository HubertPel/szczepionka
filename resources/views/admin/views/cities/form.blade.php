@include('admin.templates.login')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @if (isset($item))
                    <h1>Edycja miasta - {{$item->city}}</h1>
                @else
                    <h1>Nowe miasto</h1>
                @endif
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/cities">Miasta</a></li>
                    @if (isset($item))
                        <li class="breadcrumb-item active">Edycja</li>
                    @else
                        <li class="breadcrumb-item active">Nowe</li>
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
              <h3 class="card-title">{{isset($item) ? 'Edycja miasta' : 'Tworzenie miasta'}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @if (isset($item))
                <form method="POST" action="/admin/cities/edit">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="id" value="{{$item->id}}" />
            @else 
                <form method="POST" action="/admin/cities/create">
            @endif
                        @csrf
                        <div class="card-body">
                <div class="form-group">
                    <label for="cityInput">Miasto</label>
                    <input type="text" id="cityInput" class="form-control" name="city" required @if(isset($item))value="{{$item->city}}"@endif />
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