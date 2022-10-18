@extends('layouts.app')

@section('template_title')
    Student
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Student') }}
                            </span>
                            <form method="GET" action="{{ route('beh.classList',request('classroom_id')) }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="search" class="form-control" placeholder="Search" value="{{request('search')}}">
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-primary btn-sm">Search</button>
                                        
                                    </div>
                                </div>
                            </form>
                             <div class="float-right">
                                
                                
                                <a href="{{ route('beh.list') }}" class="btn btn-primary btn-sm float-left"  data-placement="left">
                                    {{ __('Back') }}
                                  </a>
                              </div>
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
                                        <th>No</th>
                                        
										<th>Name</th>
										<th>Parent Phone</th>
										<th>Classroom</th>
                                        <th>Behavior term1</th>
                                        <th>Behavior term2</th>
                                        <th>Behavior term3</th>

                                        <th colspan="4">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $student->name }}</td>
											<td>{{ $student->parent_phone }}</td>
											<td>{{ $student->classroom->name }}</td>
                                            <td>@if ($student->behaviors->where('term','Term1')->count() !=0)
                                                    {{$student->behaviors->where('term','Term1')->sortByDesc('created_at')->first()->marks}}
                                                @else
                                                -
                                                @endif
                                            </td>

                                            <td>
                                                @if ($student->behaviors->where('term','Term2')->count() !=0)
                                                    {{$student->behaviors->where('term','Term2')->sortByDesc('created_at')->first()->marks}}
                                                @else
                                                -
                                                @endif
                                            </td>

                                            <td>
                                                @if ($student->behaviors->where('term','Term3')->count() !=0)
                                                    {{$student->behaviors->where('term','Term3')->sortByDesc('created_at')->first()->marks}}
                                                @else
                                                -
                                                @endif
                                            </td>
                                            @php
                                                
                                                
                                            @endphp
                                            <td colspan="4">
                                                @if (Auth::user()->user_role=='admin')
                                                    
                                                    <a class="btn btn-sm btn-info" href="{{ route('students.show',$student->id) }}"><i class="fa fa-fw fa-eye"></i> Edit</a>
                                                    <a href="{{ route('student.addBehavior',$student->id)}}" class="btn btn-sm btn-success"><i class="fa fa-fw fa-edit"></i> Behavior</a>
                                                    
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $students->links() !!}
            </div>
        </div>
    </div>
@endsection
