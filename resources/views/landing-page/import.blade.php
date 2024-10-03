@extends('layouts.landing-page.app')
@section('content')
    @livewire('Form', ['districts' => $districts])
@endsection
