@include('templates.header')

<div class="main-container">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Testy</h3>
                    </div>
            
                    <div class="card-body">
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Placówka</th>
                                    <th>Status</th>
                                    <th>Data</th>
                                    <th>Wynik</th>
                                    <th>Akcje</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visits as $visit)
                                    <tr>
                                        <td>{{$visit->id}}</td>
                                        <td>{{$visit->hospital->name}}</td>
                                        <td>{{__('page.' . $visit->status)}}</td>
                                        <td>{{date('Y-m-d H:i', strtotime($visit->date))}}</td>
                                        <td>
                                            @if ($visit->result == '')
                                                Nie podano 
                                            @else 
                                                {{__('page.' . $visit->result)}}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($visit->status == 'planned')
                                                <a href="/test/change-status/<?= $visit->id ?>?status=finished" class="btn btn-success">Odbył się</a>
                                                <a href="/test/change-status/<?= $visit->id ?>?status=canceled" class="btn btn-danger">Nie odbył się</a>
                                            @elseif($visit->status == 'finished' && $visit->result == '')
                                                <a href="/test/change-result/<?= $visit->id ?>?result=negative" class="btn btn-success">Wynik Negatywny</a>
                                                <a href="/test/change-result/<?= $visit->id ?>?result=positive" class="btn btn-danger">Wyniki Pozytywny</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            
                </div>
            </div>
        </div>
    </div>
</div>
<script>
let table = new DataTable('#myTable', {
    ordering: true
});
</script>

@include('templates.footer')