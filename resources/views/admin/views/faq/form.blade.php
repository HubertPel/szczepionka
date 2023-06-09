@include('admin.templates.login')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @if (isset($item))
                    <h1>Edycja FAQ - {{$item->question}}</h1>
                @else
                    <h1>Nowe FAQ</h1>
                @endif
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/faq">Faq</a></li>
                    @if (isset($item))
                        <li class="breadcrumb-item active">Edycja</li>
                    @else
                        <li class="breadcrumb-item active">Nowe FAQ</li>
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
              <h3 class="card-title">{{isset($item) ? 'Edycja Faq' : 'Tworzenie FAQ'}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @if (isset($item))
                <form method="POST" action="/admin/faq/edit">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="id" value="{{$item->id}}" />
            @else 
                <form method="POST" action="/admin/faq/create">
            @endif
                        @csrf
                        <div class="card-body">
                <div class="form-group">
                    <label for="questionInput">Pytanie</label>
                    <textarea id="questionInput" class="form-control" name="question" required>@if(isset($item)){{$item->question}}@endif</textarea>
                </div>
                <div class="form-group">
                  <label for="anwserInput">Odpowiedź</label>
                  <textarea id="anwserInput" class="form-control" name="answer" required>@if(isset($item)){{$item->answer}}@endif</textarea>
                </div>
        
                <div class="form-check">
                    <input type='hidden' value='0' name='active'>
                  <input type="checkbox" class="form-check-input" id="active" name="active" @if(isset($item)){{$item->active == 1 ? 'checked' : ''}}@endif value="1">
                  <label class="form-check-label" for="active">Aktywny</label>
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