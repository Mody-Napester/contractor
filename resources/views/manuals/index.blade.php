@extends('_layouts.dashboard')

@section('title') Manuals @endsection

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Manuals</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="#">Manuals</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>

        </div>
    </div>

    @foreach($resources as $resource)
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <!-- Create new -->
                    <h4 class="m-t-0 header-title">Edit manual for {{ $resource->role }}</h4>
                    <p class="text-muted font-14 m-b-30">
                        change {{ $resource->role }} details from here.
                    </p>

                    <form method="post" action="{{ route('manuals.update', $resource->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            {{--<div class="col-md-12">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="role{{$resource->id}}">Role</label>--}}
                                    {{--<select id="role{{$resource->id}}" name="role" class="select2" data-placeholder="Choose ..." tabindex="-1" aria-hidden="true" required>--}}
                                        {{--<option @if($resource->role == 'Admin') selected @endif value="Admin">Admin</option>--}}
                                        {{--<option @if($resource->role == 'Sales') selected @endif value="Sales">Sales</option>--}}
                                        {{--<option @if($resource->role == 'Reviewer') selected @endif value="Reviewer">Reviewer</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="" for="details{{$resource->id}}">Details</label>
                                    <textarea id="details{{$resource->id}}" name="details" class="form-control" required>{{ $resource->details }}</textarea>
                                    <script>CKEDITOR.replace('details{{$resource->id}}');</script>
                                </div>
                            </div>
                        </div>

                        <div class="form-group m-b-0">
                            <div>
                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                    <i class="fa fa-fe fa-edit"></i> Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

@endsection