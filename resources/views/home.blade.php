{{-- <h1>Hello {{ $myname }} {{ $myLastName }}</h1>

@if(strlen($myname) > 3)

<p>The name is Too Long</p>

@elseif(strlen($myname) < 3) <p>The name is Short</p>

    @else

    <p>The name is just right</p>

    @endif

    @unless(strlen($myname) > 3)

    <p>The name is Too Long</p>

    @endunless --}}

    @extends('layouts.app')

    @section('title', 'الصفحة الرئيسية')

    @section('content')
        <h2>مرحبا بكم في ShopLite 👋</h2>
        @foreach($stats as $key => $value)
            <p>{{ $key }}: {{ $value }}</p>
        @endforeach
        <p>عدد مقالات المدوّنة: {{ $stats['posts'] }}</p>
        <p>عدد الزوار اليوم: {{ $stats['visitors'] }}</p>
    @endsection