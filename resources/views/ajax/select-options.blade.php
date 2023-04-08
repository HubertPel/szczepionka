<option value="">Wybierz</option>
@foreach ($hospitals as $hospital)
    <option value="{{$hospital->id}}">{{$hospital->name}}</option>
@endforeach