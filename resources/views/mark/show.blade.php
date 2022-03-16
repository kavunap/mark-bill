@extends('layouts.app')

@section('template_title')
    {{ $mark->name ?? 'Show Mark' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Mark</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('marks.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Marks:</strong>
                            {{ $mark->marks }}
                        </div>
                        <div class="form-group">
                            <strong>Term:</strong>
                            {{ $mark->term }}
                        </div>
                        <div class="form-group">
                            <strong>Type:</strong>
                            {{ $mark->type }}
                        </div>
                        <div class="form-group">
                            <strong>Student Id:</strong>
                            {{ $mark->student_id }}
                        </div>
                        <div class="form-group">
                            <strong>Course Id:</strong>
                            {{ $mark->course_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
