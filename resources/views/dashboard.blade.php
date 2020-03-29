@extends('_layouts.dashboard')

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Dashboard</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>

        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="md md-people text-primary"></i>
                <h2 class="m-0 text-dark counter font-600">{{ \App\User::count('*') }}</h2>
                <div class="text-muted m-t-5">Users</div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="md md-people text-pink"></i>
                <h2 class="m-0 text-dark counter font-600">{{ \App\Lead::count('*') }}</h2>
                <div class="text-muted m-t-5">Leads</div>
            </div>
        </div>
    </div>

@endsection