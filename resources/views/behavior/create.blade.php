@extends('layouts.app')

@section('template_title')
    Create Behavior
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                {{-- @includeif('partials.errors') --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Behavior</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ url()->previous() }}"> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('behaviors.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('behavior.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
