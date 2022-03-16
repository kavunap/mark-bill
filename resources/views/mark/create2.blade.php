@extends('layouts.app')

@section('template_title')
    Create Mark
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Mark</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('marks.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            {{-- <input type="number" placeholder="Student Id" id="st"> --}}
                            @include('mark.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
