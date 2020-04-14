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
        {{--<div class="col-md-4 col-lg-4 col-xl-4">--}}
            {{--<div class="widget-panel widget-style-2 bg-white">--}}
                {{--<i class="md md-people text-primary"></i>--}}
                {{--<h2 class="m-0 text-dark counter font-600">{{ \App\User::count('*') }}</h2>--}}
                {{--<div class="text-muted m-t-5">Users</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4 col-lg-4 col-xl-4">--}}
            {{--<div class="widget-panel widget-style-2 bg-white">--}}
                {{--<i class="md md-people text-pink"></i>--}}
                {{--<h2 class="m-0 text-dark counter font-600">{{ \App\Lead::where('status', 2)->count('*') }}</h2>--}}
                {{--<div class="text-muted m-t-5">Leads</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4 col-lg-4 col-xl-4">--}}
            {{--<div class="widget-panel widget-style-2 bg-white">--}}
                {{--<i class="md md-home text-danger"></i>--}}
                {{--<h2 class="m-0 text-dark counter font-600">{{ \App\Company::count('*') }}</h2>--}}
                {{--<div class="text-muted m-t-5">Companies</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="col-md-4 col-lg-4 col-xl-4">
            <a href="{{ route('leads.index', [2]) }}">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="md md-people text-pink"></i>
                <h2 class="m-0 text-dark counter font-600">{{ \App\Lead::where('status', 2)->count('*') }}</h2>
                <div class="text-muted m-t-5">Final Contact</div>
            </div>
            </a>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4">
            <a href="{{ route('leads.index', [1]) }}">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="md md-people text-pink"></i>
                <h2 class="m-0 text-dark counter font-600">{{ \App\Lead::where('status', 1)->count('*') }}</h2>
                <div class="text-muted m-t-5">New Contact</div>
            </div>
            </a>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4">
            <a href="{{ route('leads.index', [3]) }}">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="md md-people text-pink"></i>
                <h2 class="m-0 text-dark counter font-600">{{ \App\Lead::where('status', 3)->count('*')  }}</h2>
                <div class="text-muted m-t-5">Duplication Contacts</div>
            </div>
            </a>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4">
            <a href="{{ route('companies.index') }}">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="md md-home text-green"></i>
                <h2 class="m-0 text-dark counter font-600">{{ \App\Company::where('is_active', 1)->count('*') }}</h2>
                <div class="text-muted m-t-5">Active Companies</div>
            </div>
            </a>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4">
            <a href="{{ route('companies.index') }}">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="md md-home text-danger"></i>
                <h2 class="m-0 text-dark counter font-600">{{ \App\Company::where('is_active', 0)->count('*') }}</h2>
                <div class="text-muted m-t-5">Not Active Companies</div>
            </div>
            </a>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4">
            <a href="{{route('users.index') }}">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="md md-people text-primary"></i>
                <h2 class="m-0 text-dark counter font-600">{{ \App\User::count('*') }}</h2>
                <div class="text-muted m-t-5">Users</div>
            </div>
            </a>
        </div>

    </div>
@endsection