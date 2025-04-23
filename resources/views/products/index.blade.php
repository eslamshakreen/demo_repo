@extends('layouts.app')

@section('title', 'المنتجات')

@section('content')
    <h2>قائمة المنتجات</h2>
    <table style="width:100%;border-collapse:collapse">
        <thead>
            <tr style="background:#eee">
                <th style="padding:.5rem;border:1px solid #ccc">اسم المنتج</th>
                <th style="padding:.5rem;border:1px solid #ccc">السعر ($)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
                <tr>
                    <td style="padding:.5rem;border:1px solid #ccc">{{ $p['name'] }}</td>
                    <td style="padding:.5rem;border:1px solid #ccc">{{ $p['price'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection