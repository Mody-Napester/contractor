@extends('_layouts.dashboard')

@section('title') Manual for {{ $manual->role }} @endsection

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Manual for {{ $manual->role }}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="#">Manuals</a></li>
                <li class="breadcrumb-item active">{{ $manual->role }}</li>
            </ol>

        </div>
    </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">Read {{ $manual->role }} manual</h4>
                    <p class="text-muted font-14 m-b-30">
                        Read {{ $manual->role }} details from here.
                    </p>

                    <div class="">
                        {!! $manual->details !!}
                    </div>

                </div>
            </div>
        </div>

@endsection