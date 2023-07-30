@extends('layouts.client')
@section('content')
    <x-client-page-date />
    <x-client-page-main :$halls :$films />
@endsection
