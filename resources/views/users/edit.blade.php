@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-4">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Update User</h3>
                </div>
            </div>
        </div>
        <section class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @include('layouts.validation-errors')

                                <form action="{{ url('users', $user->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Full Name</label>
                                                <input type="text" name="name" value="{{ $user->name }}"
                                                    class="form-control" id="name" placeholder="Enter full name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" value="{{ $user->email }}"
                                                    class="form-control" id="email" placeholder="Enter email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" class="form-control" id="password"
                                                    placeholder="Enter password">
                                                <p><small class="text-muted">Leave blank if not changing the
                                                        password..</small></p>

                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
