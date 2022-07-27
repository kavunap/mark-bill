{{-- @extends('layouts.app') --}}

@extends('user dashboard.dashboard')

@section('template_title')
    {{ $user->name ?? 'Show User' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $user->status }}
                        </div>
                        <div class="form-group">
                            <strong>User Role:</strong>
                            {{ $user->user_role }}
                        </div>
                        <div class="form-group">
                            <strong>Profile:</strong>
                            <img src="{{asset('profiles/'.$user->profile)}}" alt="profile">
                        </div>
                        <div class="form-group">
                            <strong>Signature:</strong>
                            <img src="{{asset('signatures/'.$user->signature)}}" alt="Signature">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
