@extends('layouts.app')

@section('template_title')
    {{ $behavior->name ?? 'Show Behavior' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Behavior</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('behaviors.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Marks:</strong>
                            {{ $behavior->marks }}
                        </div>
                        <div class="form-group">
                            <strong>Term:</strong>
                            {{ $behavior->term }}
                        </div>
                        <div class="form-group">
                            <strong>Student Id:</strong>
                            {{ $behavior->student_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
