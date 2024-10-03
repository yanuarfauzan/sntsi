@extends('layouts.landing-page.app')

@section('content')
    @livewire('landing-home', [
        'districts' => $districts,
    ])
@endsection
