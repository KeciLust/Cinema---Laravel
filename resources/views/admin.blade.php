@extends('layouts.app')
@section('content')
    <main class="conf-steps">

        <x-add-hall :$halls />
        <x-conf-hall :$halls />
        <x-conf-price :$halls />
        <x-conf-session :$halls :$films />
        <x-valid :$halls />

    </main>
@endsection
