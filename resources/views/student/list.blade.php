<div class="container-fluid" id="autocomplete">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">{{ $students->count() }} {{Str::plural('Student', $students->count())}}</span>
                    </div>
                    <div class="float-right">
                        {{-- <form action="{{route('st.search')}}" role="form" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="text" name="name">
                            <input type="hidden" name="class_id" value="{{$classroom->id}}">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form> --}}
                        <form method="GET" action="{{ route('classrooms.show',$classroom->id) }}">
                          <div class="row">
                              <div class="col-md-6">
                                  <input type="text" name="search" class="form-control" placeholder="Search">
                              </div>
                              <div class="col-md-6">
                                  <button class="btn btn-primary">Search</button>
                              </div>
                          </div>
                      </form>
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
                                    <th>Sex</th>
                                    
                                    
                                    

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
                                        <td>{{ $student->sex }}</td>
                                        
                                        <td>
                                            @if (Auth::user()->user_role=="admin")
                                            <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                                                <a class="btn btn-sm btn-success" href="{{ route('students.edit',$student->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                {{-- <a href="{{ route('student.addBehavior',$student->id)}}" class="btn btn-sm btn-success"><i class="fa fa-fw fa-edit"></i> Behavior</a> --}}
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
            <a href="{{route('student.excel',$classroom->id)}}" class="btn btn-sm btn-info">Download List</a>
            {!! $students->links() !!}
        </div>
    </div>
</div>
<script>
    import algoliasearch from 'algoliasearch/lite';
    import { autocomplete, getAlgoliaResults } from '@algolia/autocomplete-js';
    
    import '@algolia/autocomplete-theme-classic';
    
    const searchClient = algoliasearch(
      'latency',
      '6be0576ff61c053d5f9a3225e2a90f76'
    );
    
    autocomplete({
      container: '#autocomplete',
      placeholder: 'Search for students',
      getSources({ query }) {
        return [
          {
            sourceId: 'students',
            getItems() {
              return getAlgoliaResults({
                searchClient,
                queries: [
                  {
                    indexName: 'autocomplete',
                    query,
                    params: {
                      hitsPerPage: 5,
                    },
                  },
                ],
              });
            },
            // ...
          },
        ];
      },
    });
    
            </script>