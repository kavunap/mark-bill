@extends('layouts.app')

@section('template_title')
    {{ $test->name ?? 'Show Test' }}
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>

    <script>$.fn.poshytip={defaults:null}</script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Test</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('courses.show',$test->course->id) }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Done On:</strong>
                            {{ $test->done_on }}
                        </div>
                        <div class="form-group">
                            <strong>Term:</strong>
                            {{ $test->term }}
                        </div>
                        <div class="form-group">
                            <strong>Type:</strong>
                            {{ $test->type }}
                        </div>
                        <div class="form-group">
                            <strong>Course title:</strong>
                            {{ $test->course->title }}
                        </div>

                        <div class="form-group">
                            <strong>Max:</strong>
                            {{ $test->max }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="container">
    <div id="autocomplete"></div>

</div>





    <div class="row" >
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 id="h1">List of students in {{ $test->course->classroom->name }} </h2>
            </div>
            <div class="float-right">
                {{-- <form action="{{route('tests.show',$test->id)}}" role="form" enctype="multipart/form-data" method="GET">
                    
                    <input type="text" name="name" class="form-control">
                    <input type="hidden" name="class_id" value="{{$test->course->classroom->id}}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form> --}}
                <form method="GET" action="{{ route('tests.show',$test->id) }}">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="search" class="form-control" placeholder="Search" value="{{request('search')}}">
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            {{-- <div class="pull-right pl-5">
                <a class="btn btn-success text-light" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                    data-attr="{{ route('tests.edit',$test->id) }}" title="Edit test"> <i class="fas fa-edit"></i>
                </a>
            </div>
            <div class="pull-right">
                <a class="btn btn-success text-light" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                    data-attr="{{ route('students.create') }}" title="Create a student"> <i class="fas fa-plus-circle"></i>
                </a>
            </div> --}}
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('message-type') }} alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <i class="glyphicon glyphicon-{{ Session::get('message-type') == 'success' ? 'ok' : 'remove'}}"></i> {{ Session::get('message') }}
        </div>
    @endif

    @if($errors)
        @foreach ($errors->all() as $message) 
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endforeach
    @endif
    
        
    

    <table class="table table-bordered table-responsive-lg table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col" >Marks</th>
                <th scope="col" >Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td scope="row">{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    {{-- <td>@if($test->marks->where('student_id',$student->id)->first()!=null) {{ $test->marks->where('student_id',$student->id)->first()->marks }}@endif</td> --}}
                    <td>
                        @if($test->marks->where('student_id',$student->id)->first()!=null)
                        @php
                            $mark=$test->marks->where('student_id',$student->id)->first();
                        @endphp
                        <a href="" class="update" data-name="marks" data-type="number" data-pk="{{ $mark->id }}" data-title="Enter marks">{{ $mark->marks }}</a>
                        @endif

                    </td>
                    <td class="form-inline">
                        {{-- <form action="{{ route('students.destroy', $student->id) }}" method="POST">

                            

                            <a data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                                data-attr="{{ route('students.show', $student->id) }}" title="show">
                                <i class="fas fa-eye text-success  fa-lg"></i>
                            </a>

                            <a class="text-secondary" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                                data-attr="{{ route('students.edit', $student->id) }}">
                                <i class="fas fa-edit text-gray-300"></i>
                            </a>
                            @csrf
                            @method('DELETE')

                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                <i class="fas fa-trash fa-lg text-danger"></i>
                            </button>
                        </form> --}}

                        <a data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                            data-attr="{{ route('marks.create') }}" title="Record Marks" data-st-id="{{ $student->id }}" data-t-id="{{ $test->id }}">
                            <i class="fas fa-book text-success  fa-lg"></i>
                        </a>

                        <a data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                            data-attr="{{ route('students.show',$student->id) }}" title="Record Marks" data-st-id="{{ $student->id }}" data-t-id="{{ $test->id }}">
                            <i class="fas fa-book text-success  fa-lg"></i>
                        </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

    <!-- small modal -->
    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- medium modal -->
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $.fn.editable.defaults.mode = 'inline';
    
      
    
        $.ajaxSetup({
    
            headers: {
    
                'X-CSRF-TOKEN': '{{csrf_token()}}'
    
            }
    
        }); 
    
      
    
        $('.update').editable({
    
               url: "{{ route('marks.inline_update') }}",
    
               type: 'number',
    
               pk: 1,
    
               name: 'marks',
    
               title: 'Enter marks'
    
        });

        $(document).ajaxStop(function(){
            window.location.reload();
        });



    
    </script>

    <script>
        // display a modal (small modal)
        $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

        // display a modal (medium modal)
        $(document).on('click', '#mediumButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            let st = $(this).attr('data-st-id');
            let t = $(this).attr('data-t-id');
            // $('#st').html('js id');
            // $('#c').html('js course');
            // $.ajax({
            // url: "?rr=profile",
            // }).success(function(response) {
            // $('#st').html('Your new content');
            // });

            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#mediumModal').modal("show");
                    $('#mediumBody').html(result).show();
                    $('#st').val(st);
                    $('#test').val(t);
                },
                complete: function() {
                    $('#loader').hide();
                    // $('#st').val("");
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

    </script>
    <script type="module">
//         import { autocomplete, getAlgoliaResults } from '/@algolia/autocomplete-js';
// import algoliasearch from '/algoliasearch';

// import '/@algolia/autocomplete-theme-classic';

        const searchClient = algoliasearch(
        'latency',
        '6be0576ff61c053d5f9a3225e2a90f76'
        );

        autocomplete({
        container: '#autocomplete',
        placeholder: 'Search for products',
        getSources({ query }) {
            return [
            {
                sourceId: 'products',
                getItems() {
                return getAlgoliaResults({
                    searchClient,
                    queries: [
                    {
                        indexName: 'instant_search',
                        query,
                        params: {
                        hitsPerPage: 5,
                        attributesToSnippet: ['name:10', 'description:35'],
                        snippetEllipsisText: '…',
                        },
                    },
                    ],
                });
                },
                templates: {
                item({ item, components, html }) {
                    return html`<div class="aa-ItemWrapper">
                    <div class="aa-ItemContent">
                        <div class="aa-ItemIcon aa-ItemIcon--alignTop">
                        <img
                            src="${item.image}"
                            alt="${item.name}"
                            width="40"
                            height="40"
                        />
                        </div>
                        <div class="aa-ItemContentBody">
                        <div class="aa-ItemContentTitle">
                            ${components.Highlight({
                            hit: item,
                            attribute: 'name',
                            })}
                        </div>
                        <div class="aa-ItemContentDescription">
                            ${components.Snippet({
                            hit: item,
                            attribute: 'description',
                            })}
                        </div>
                        </div>
                        <div class="aa-ItemActions">
                        <button
                            class="aa-ItemActionButton aa-DesktopOnly aa-ActiveOnly"
                            type="button"
                            title="Select"
                        >
                            <svg
                            viewBox="0 0 24 24"
                            width="20"
                            height="20"
                            fill="currentColor"
                            >
                            <path
                                d="M18.984 6.984h2.016v6h-15.188l3.609 3.609-1.406 1.406-6-6 6-6 1.406 1.406-3.609 3.609h13.172v-4.031z"
                            />
                            </svg>
                        </button>
                        <button
                            class="aa-ItemActionButton"
                            type="button"
                            title="Add to cart"
                        >
                            <svg
                            viewBox="0 0 24 24"
                            width="18"
                            height="18"
                            fill="currentColor"
                            >
                            <path
                                d="M19 5h-14l1.5-2h11zM21.794 5.392l-2.994-3.992c-0.196-0.261-0.494-0.399-0.8-0.4h-12c-0.326 0-0.616 0.156-0.8 0.4l-2.994 3.992c-0.043 0.056-0.081 0.117-0.111 0.182-0.065 0.137-0.096 0.283-0.095 0.426v14c0 0.828 0.337 1.58 0.879 2.121s1.293 0.879 2.121 0.879h14c0.828 0 1.58-0.337 2.121-0.879s0.879-1.293 0.879-2.121v-14c0-0.219-0.071-0.422-0.189-0.585-0.004-0.005-0.007-0.010-0.011-0.015zM4 7h16v13c0 0.276-0.111 0.525-0.293 0.707s-0.431 0.293-0.707 0.293h-14c-0.276 0-0.525-0.111-0.707-0.293s-0.293-0.431-0.293-0.707zM15 10c0 0.829-0.335 1.577-0.879 2.121s-1.292 0.879-2.121 0.879-1.577-0.335-2.121-0.879-0.879-1.292-0.879-2.121c0-0.552-0.448-1-1-1s-1 0.448-1 1c0 1.38 0.561 2.632 1.464 3.536s2.156 1.464 3.536 1.464 2.632-0.561 3.536-1.464 1.464-2.156 1.464-3.536c0-0.552-0.448-1-1-1s-1 0.448-1 1z"
                            />
                            </svg>
                        </button>
                        </div>
                    </div>
                    </div>`;
                },
                },
            },
            ];
        },
        });
    </script>
@endsection
