@extends('layouts.app')

@section('template_title')
    Update Test
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
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
                        <span class="card-title">Update Test</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{route('courses.show',$test->course_id)}}"> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tests.update', $test->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('test.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
