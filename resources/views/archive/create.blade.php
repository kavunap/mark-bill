@extends('layouts.app')

@section('template_title')
    Create Archive
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Archive</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('archives.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('archive.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
