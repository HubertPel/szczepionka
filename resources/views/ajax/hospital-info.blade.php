@if($hospital->name)
    <p>{{$hospital->name}}</p>
@endif

@if ($hospital->address)
    <p>{{$hospital->address}}</p>
@endif

@if ($hospital->phone)
    <p><a href="tel:{{$hospital->phone}}">{{$hospital->phone}}</a></p>
@endif

@if ($hospital->email)
    <p><a href="mailto:{{$hospital->email}}">{{$hospital->email}}</a></p>
@endif

@if ($hospital->hours)
    <p>
        @foreach (explode(',', $hospital->hours) as $day)
            {{$day}}<br>
        @endforeach
    </p>
@endif