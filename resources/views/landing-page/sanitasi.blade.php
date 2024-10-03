@extends('layouts.landing-page.app')
@section('content')
    @livewire('sanitation', [
        'districts' => $districts,
    ]);
@endsection
