<h1>Car Types List</h1>

@foreach (array_slice($car_Types, 0, 3) as $car_Type)
    <p>{{ $car_Type }}</p>
    {{-- @if(Str::startsWith($car_Type, 'A'))
    <p style="color: red;">{{ $car_Type }}</p>
    @endif --}}


@endforeach


@forelse ($number_to_ten as $number)
    <p>{{ $number }}</p>
@empty
    <p>No numbers</p>
@endforelse



@while ($x < 10)
    <p>{{ $x }}</p>
    @php
        $x++;
    @endphp

@endwhile