@include('templates.header')


<div class="row">
    <div class="col-md-3">
    <div class="sticky-top mb-3">
    <div class="card">
    <div class="card-header">
    <h4 class="card-title">Draggable Events</h4>
    </div>
    <div class="card-body">
    
    <div id="external-events">
    <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">Lunch</div>
    <div class="external-event bg-warning ui-draggable ui-draggable-handle" style="position: relative;">Go home</div>
    <div class="external-event bg-info ui-draggable ui-draggable-handle" style="position: relative; z-index: auto; left: 0px; top: 0px;">Do homework</div>
    <div class="external-event bg-primary ui-draggable ui-draggable-handle" style="position: relative; z-index: auto; left: 0px; top: 0px;">Work on UI design</div>
    <div class="external-event bg-danger ui-draggable ui-draggable-handle" style="position: relative; z-index: auto; left: 0px; top: 0px;">Sleep tight</div>
    <div class="checkbox">
    <label for="drop-remove">
    <input type="checkbox" id="drop-remove">
    remove after drop
    </label>
    </div>
    </div>
    </div>
    
    </div>
    
    <div class="card">
    <div class="card-header">
    <h3 class="card-title">Create Event</h3>
    </div>
    <div class="card-body">
    <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
    <ul class="fc-color-picker" id="color-chooser">
    <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
    <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
    <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
    <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
    <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
    </ul>
    </div>
    
    <div class="input-group">
    <input id="new-event" type="text" class="form-control" placeholder="Event Title">
    <div class="input-group-append">
    <button id="add-new-event" type="button" class="btn btn-primary" style="background-color: rgb(0, 123, 255); border-color: rgb(0, 123, 255);">Add</button>
    </div>
    
    </div>
    
    </div>
    </div>
    </div>
    </div>
    
    <div class="col-md-9">
    <div class="card card-primary">
    <div class="card-body p-0">
    
        <div id="calendar">
    </div>
    
    </div>
    
    </div>
    
    </div>

{{-- <div class="main-container" style="align-items: flex-start">
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
</div> --}}

<script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.6/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridWeek',
  headerToolbar: {
    left: 'prev,next',
    center: 'title',
    right: 'dayGridWeek' // user can switch between the two
  }
        });

        calendar.render();
      });

    </script>

@include('templates.footer')
