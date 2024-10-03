@extends('layouts.landing-page.app')
@section('content')
    @livewire('area-location',[
        'neighborhood' => $neighborhood
    ])
@endsection
