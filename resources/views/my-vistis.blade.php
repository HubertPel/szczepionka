@include('templates.header')

{{-- <div class="main-container">
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
</div> --}}

<div class="row justify-content-center pt-4">
    <div class="col-md-12 justify-content-center">
        <div class="row  justify-content-center">
            <div class="col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info">
                        <svg style="height: 50px;" class="white-svg-filter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M441 7l32 32 32 32c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-15-15L417.9 128l55 55c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-72-72L295 73c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l55 55L422.1 56 407 41c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0zM210.3 155.7l61.1-61.1c.3 .3 .6 .7 1 1l16 16 56 56 56 56 16 16c.3 .3 .6 .6 1 1l-191 191c-10.5 10.5-24.7 16.4-39.6 16.4H97.9L41 505c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l57-57V325.3c0-14.9 5.9-29.1 16.4-39.6l43.3-43.3 57 57c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-57-57 41.4-41.4 57 57c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-57-57z"/></svg>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text"  style="color: black;">Zaplanowany test</span>
                        <span class="info-box-number"  style="color: black;">{{$visitsCount}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success">
                        <svg style="height: 50px;" class="white-svg-filter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M441 7l32 32 32 32c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-15-15L417.9 128l55 55c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-72-72L295 73c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l55 55L422.1 56 407 41c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0zM210.3 155.7l61.1-61.1c.3 .3 .6 .7 1 1l16 16 56 56 56 56 16 16c.3 .3 .6 .6 1 1l-191 191c-10.5 10.5-24.7 16.4-39.6 16.4H97.9L41 505c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l57-57V325.3c0-14.9 5.9-29.1 16.4-39.6l43.3-43.3 57 57c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-57-57 41.4-41.4 57 57c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-57-57z"/></svg>
                    </span>
                    <div class="info-box-content" style="color: black;">Najbliższy test</span>
                        <span class="info-box-number"  style="color: black;">@if(isset($visitDate)){{date('d.m.Y H:i', strtotime($visitDate->date))}}@else Brak @endif</span>
                    </div>
                </div>
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
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Twoje wizyty</h3>
            </div>  
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr style="text-align: center">
                            <th>Placówka</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visits as $visit)
                            <tr style="text-align: center">
                                <td>{{$visit->hospital->name}}</td>
                                <td>{{$visit->date}}</td>
                                <td>{{__('page.' . $visit->status)}}</td>
                                <td>
                                    @if ($visit->status == 'planned')
                                        <a href="/moje-konto/wizyty/anuluj/<?= $visit->id ?>" class="btn btn-sm btn-danger">Anuluj wizytę</a>
                                    @elseif ($visit->status == 'finished')
                                        <a href="/moje-konto/wizyty/certfikat/<?= $visit->id ?>" target="_blank" class="btn btn-sm btn-success">Pobierz certfikat</a>
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

@include('templates.footer')
