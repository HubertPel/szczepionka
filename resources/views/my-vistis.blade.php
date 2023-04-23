@include('templates.header')

<div class="main-container">
    <div class="medium-box" style="width: 60%">
        <table style="width: 100%;">
            <tr>
                <th>Placówka</th>
                <th>Data</th>
                <th>Status</th>
                <th>Akcje</th>
            </tr>
            @foreach ($visits as $visit)
                <tr style="text-align: center">
                    <td>{{$visit->hospital->name}}</td>
                    <td>{{$visit->date}}</td>
                    <td>{{__('page.' . $visit->status)}}</td>
                    <td>
                        @if ($visit->status == 'planned')
                            <a href="/moje-konto/wizyty/anuluj/<?= $visit->id ?>">Anuluj wizytę</a>
                        @elseif ($visit->status == 'finished')
                            <a href="/moje-konto/wizyty/certfikat/<?= $visit->id ?>" target="_blank">Certfikat</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@include('templates.footer')
