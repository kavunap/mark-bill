<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">{{ $students->count() }} {{Str::plural('Student', $students->count())}}</span>
                    </div>
                    <div class="float-right">
                        <a href="{{route('student.excel',$classroom->id)}}" class="btn btn-sm btn-info">Download List</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Student number</th>
                                    <th>Name</th>
                                    <th>Parent Phone</th>
                                    
                                    
                                    

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->parent_phone }}</td>
                                        
                                        <td>
                                            <form action="{{ route('students.destroy',$student->id) }}" method="POST">
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