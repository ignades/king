@extends('layouts.app')

@section('test')
<h1>Ciao HTML</h1>
@php
$pippo="Scrivendo php in blade";
@endphp

{{ $pippo }}

@foreach ($test as $valore)
    <p>Questo è il valore di : {{ $valore }}</p>
@endforeach

@endsection