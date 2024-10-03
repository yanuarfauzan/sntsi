@extends('layouts.landing-page.app')
@section('content')
    @livewire('water', [
        'districts' => $districts
    ])
@endsection
