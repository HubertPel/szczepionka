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
