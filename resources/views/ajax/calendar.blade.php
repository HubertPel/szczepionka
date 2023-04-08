@php
    $hour = 24;
    $maxHour = 0;

    foreach ($openDate as $day => $hours) {
        if ($hour > $hours->start) {
            $hour = $hours->start;
        }

        if ($maxHour < $hours->end) {
            $maxHour = $hours->end;
        }
    }
    $maxHour++;
@endphp
<tr>
    <td></td>
    <td>Poniedziałek</td>
    <td>Wtorek</td>
    <td>Środa</td>
    <td>Czwartek</td>
    <td>Piątek</td>
    <td>Sobota</td>
    <td>Niedziela</td>
</tr>


@while ($maxHour > $hour)
    @for ($i = 0; $i < 60; $i += 10)
        <tr>
            <td></td>
            @foreach ($openDate as $item)
                @if ($hour >= $item->start && $hour <= $item->end)
                    <td class="with-data" onClick="registerUser('{{$hour . ':' . ($i == 0 ? '00' : $i)}}'   )">
                        {{$hour . ':' . ($i == 0 ? '00' : $i)}} Zapisz się
                    </td>
                @else    
                    <td></td>
                @endif
            @endforeach
        </tr>
    @endfor
    @php $hour++ @endphp
@endwhile