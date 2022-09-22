@extends('layouts.app')

@section('template_title')
    {{ $student->name ?? 'Show Student' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Student</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('beh.classList',$student->classroom->id) }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $student->name }}
                        </div>
                        <div class="form-group">
                            <strong>Parent Phone:</strong>
                            {{ $student->parent_phone }}
                        </div>
                        <div class="form-group">
                            <strong>St Code:</strong>
                            {{ $student->st_code }}
                        </div>
                        <a href="{{ route('classrooms.show',$student->classroom->id) }}">
                            <strong>Class:</strong>
                            {{ $student->classroom->name }}
                        </a>

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <div style="display: flex; justify-content: space-between; align-items: center;">
            
                                        <span id="card_title">
                                            {{ __('Behavior') }}
                                        </span>
            
                                    </div>
                                </div>
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
            
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead class="thead">
                                                <tr>
                                                    <th>Student name</th>
                                                    <th>Term</th>
                                                    <th>Marks</th>
                                                    
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($behaviors as $behavior)
                                                    <tr>
                                                        <td>{{ $behavior->student->name }}</td>
                                                        <td>{{ $behavior->term }}</td>
                                                        <td>{{ $behavior->marks }}</td>
                                                        
                                                        <td>
                                                            <a class="btn btn-sm btn-success" href="{{ route('behaviors.edit',$behavior->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                            
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
