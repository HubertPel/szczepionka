@include('templates.header')


<div class="main-container" style="align-items: flex-start">
    <div class="smaller-box">
        <div class="input-box">
            Miasto<br>
            <select id="vaccine-city" style="width: 250px; margin-bottom: 10px;">
                <option value="">Wybierz</option>
                @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{$city->city}}</option>
                @endforeach
            </select>
        </div>
        <div class="input-box">
            Placówka<br>
            <select id="vaccine-hospital" style="width: 250px" disabled></select>
        </div>
        <div id="vaccine-hospital-info" style="height: 200px">

        </div>
    </div>
    <div class="medium-box" style="width: 60%">
        <div class="week-select" style="display:none;">
            <div>
                <a class="previous-week">
                    <svg style="height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                </a>
            </div>
            <div id="date-info">Data</div>
            <div>
                <a class="next-week">
                    <svg style="height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                </a>
            </div>
        </div>
        <table class="register-table">
            <tr>
                <td>
                    @php
                        if (session('message')) { 
                            echo '<span style="color:' . (session('error') == '1' ? 'red' : 'green') . ';">' . session('message') . '</span>';
                        }  else {
                           echo 'Dostępne terminy pojawią się po wybraniu placówki';
                        } 
                    @endphp
                </td>
            </tr>
        </table>
    </div>
</div>

@include('templates.footer')
