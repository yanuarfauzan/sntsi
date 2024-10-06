@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">

    <style>
        @media (min-width: 30em) {
            .filepond--item {
                width: calc(50% - 0.5em);
            }
        }

        @media (min-width: 50em) {
            .filepond--item {
                width: calc(33.33% - 0.5em);
            }
        }
    </style>
@endpush
@section('content')
    <section class="row mb-4">
        <div class="col-12">
            @include('layouts.validation-errors')
            <form action="{{ url('do-import-neighborhood') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        {{-- <div class="col-12">
                                            <h6>
                                                Negatif List
                                            </h6>
                                        </div> --}}
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="neighborhood">Excel Neighborhood</label>
                                                <input type="file" id="neighborhood" class="form-control" name="neighborhood">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mx-1">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
