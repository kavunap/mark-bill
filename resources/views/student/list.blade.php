<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
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
                                    <th>St Code</th>
                                    @if ($classroom->courses->count() > 0)
                                        @foreach ($classroom->courses as $course)
                                        <th>{{$course->title}}</th>
                                        @endforeach
                                    @endif
                                    

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->st_code }}</td>
                                        @if ($classroom->courses->count() > 0)
                                            @foreach ($classroom->courses as $course)
                                                @if ($course->tests->count()>0)
                                                    @foreach ($course->tests as $test)
                                                        @if ($test->marks->where('student_id',$student->id)->count()>0)
                                                            <th>{{$test->marks->where('student_id',$student->id)->sum('marks')}}</th>
                                                        @else
                                                            <th>-</th>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <td>No tests</td>
                                                @endif
                                                
                                            @endforeach
                                        @endif
                                        <td>
                                            <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('students.show',$student->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('students.edit',$student->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                            </form>
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