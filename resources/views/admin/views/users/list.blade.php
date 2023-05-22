@include('admin.templates.login')sfa
<section class="" style=" width: 95%;margin: auto;padding-top: 20px;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10"> <h3 class="card-title">Użytkownicy</h3></div>
                    <div class="col-2"><a href="/admin/users/create" class="btn btn-success" style="display: flex">Dodaj</a></div>
                </div>
             
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Imię i nazwisko</th>
                    <th>E-mail</th>
                    <th>Akcje</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($list as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name . ' ' . $item->surname}}</td>
                            <td>{{$item->email}}</td>
                            <td style="display: flex; gap: 20px;">
                              <a href="/admin/users/{{$item->id}}" class="btn btn-warning">Edytuj</a>
                              <form method="POST" action="/admin/users/delete">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <button type="submit" class="btn btn-danger">Usuń</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="{{$list->previousPageUrl()}}">&laquo;</a></li>
                @for ($i = 1; $i <= ceil($list->total() / $list->perPage()); $i++)
                    <li class="page-item"><a class="page-link" href="{{$list->url($i)}}">{{$i}}</a></li>
                @endfor
                <li class="page-item"><a class="page-link" href="{{$list->nextPageUrl()}}">&raquo;</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@include('admin.templates.loginfooter')