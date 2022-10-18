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
                            <form action="{{route('st.search')}}" role="form" enctype="multipart/form-data" method="GET">
                                
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" value="{{request()->name}}">
                                </div>
                                
                                <input type="hidden" name="class_id" value="{{$classroom->id}}">
                            </form>
                        </div>
                        <div float-right>
                            
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
                                                    {{$student->behaviors->where('term','Term1')->first()->marks}}
                                                @else
                                                -
                                                @endif
                                            </td>

                                            <td>
                                                @if ($student->behaviors->where('term','Term2')->count() !=0)
                                                    {{$student->behaviors->where('term','Term2')->first()->marks}}
                                                @else
                                                -
                                                @endif
                                            </td>

                                            <td>
                                                @if ($student->behaviors->where('term','Term3')->count() !=0)
                                                    {{$student->behaviors->where('term','Term3')->first()->marks}}
                                                @else
                                                -
                                                @endif
                                            </td>

                                            <td colspan="4">
                                                @if (Auth::user()->user_role=='admin' || Auth::user()->user_role=='super_admin')
                                                    
                                                
                                                    <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " href="{{ route('students.show',$student->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('students.edit',$student->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                        <a href="{{ route('student.addBehavior',$student->id)}}" class="btn btn-sm btn-success"><i class="fa fa-fw fa-edit"></i> Behavior</a>
                                                    </form>
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
