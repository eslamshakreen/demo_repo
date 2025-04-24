

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

