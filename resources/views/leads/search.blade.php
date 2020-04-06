<form method="get" id="life-search-form" action="{{ route('leads.index') }}" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="null_company_name">
                    Null Company name
                </label>
                <input id="null_company_name" type="checkbox" class="form-control life-search-input" name="null_company_name" value="1">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="company_name">Company name</label>
                <input id="company_name" type="text" autocomplete="off" class="form-control life-search-input" name="company_name" value="{{ request('company_name') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="owner">Type</label>
                <select id="owner" class="select2 form-control life-search-input" name="owner">
                    <option disabled selected>Choose</option>
                    <option @if(request('owner') == 'Contractor') selected @endif value="Contractor">Contractor</option>
                    <option @if(request('owner') == 'Consultant') selected @endif value="Consultant">Consultant</option>
                    <option @if(request('owner') == 'Owner') selected @endif value="Owner">Owner</option>
                    <option @if(request('owner') == 'Supplier') selected @endif value="Supplier">Supplier</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="sub_type">Sub type</label>
                <select id="sub_type" class="select2 form-control life-search-input" name="sub_type">
                    <option disabled selected>Choose</option>
                    <option @if(request('sub_type') == 'GENERAL') selected @endif value="GENERAL">GENERAL</option>
                    <option @if(request('sub_type') == 'FIRE') selected @endif value="FIRE">FIRE</option>
                    <option @if(request('sub_type') == 'HVAC') selected @endif value="HVAC">HVAC</option>
                    <option @if(request('sub_type') == 'INFRA') selected @endif value="INFRA">INFRA</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="contact_engineer">Contact Name</label>
                <input id="contact_engineer" type="text" autocomplete="off" class="form-control life-search-input" name="contact_engineer" value="{{ request('contact_engineer') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="title">Title</label>
                <select id="title" class="select2 form-control life-search-input" name="title">
                    <option disabled selected>Choose</option>
                    <option @if(request('title') == 'Office Engineer') selected @endif value="Office Engineer">Office Engineer</option>
                    <option @if(request('title') == 'Office Manager') selected @endif value="Office Manager">Office Manager</option>
                    <option @if(request('title') == 'Site Engineer') selected @endif value="Site Engineer">Site Engineer</option>
                    <option @if(request('title') == 'Site Manager') selected @endif value="Site Manager">Site Manager</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="class">Class</label>
                <select id="class" class="select2 form-control life-search-input" name="class">
                    <option disabled selected>Choose</option>
                    <optgroup label="Class A">
                        <option @if(request('class') == 'AA') selected @endif value="AA">AA</option>
                        <option @if(request('class') == 'AB') selected @endif value="AB">AB</option>
                        <option @if(request('class') == 'AC') selected @endif value="AC">AC</option>
                        <option @if(request('class') == 'AD') selected @endif value="AD">AD</option>
                    </optgroup>
                    <optgroup label="Class B">
                        <option @if(request('class') == 'BA') selected @endif value="BA">BA</option>
                        <option @if(request('class') == 'BB') selected @endif value="BB">BB</option>
                        <option @if(request('class') == 'BC') selected @endif value="BC">BC</option>
                        <option @if(request('class') == 'BD') selected @endif value="BD">BD</option>
                    </optgroup>
                    <optgroup label="Class C">
                        <option @if(request('class') == 'CA') selected @endif value="CA">CA</option>
                        <option @if(request('class') == 'CB') selected @endif value="CB">CB</option>
                        <option @if(request('class') == 'CC') selected @endif value="CC">CC</option>
                        <option @if(request('class') == 'CD') selected @endif value="CD">CD</option>
                    </optgroup>
                    <optgroup label="Class D">
                        <option @if(request('class') == 'DA') selected @endif value="DA">DA</option>
                        <option @if(request('class') == 'DB') selected @endif value="DB">DB</option>
                        <option @if(request('class') == 'DC') selected @endif value="DC">DC</option>
                        <option @if(request('class') == 'DD') selected @endif value="DD">DD</option>
                    </optgroup>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="sales1">Sales 1</label>
                <select id="sales1" class="select2 form-control life-search-input" name="sales1">
                    <option disabled selected>Choose</option>
                    @foreach($sales as $user)
                        @if($user->id != 1)
                            <option @if(request('sales1') == $user->id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="sales2">Sales 2</label>
                <select id="sales2" class="select2 form-control life-search-input" name="sales2">
                    <option disabled selected>Choose</option>
                    @foreach($sales as $user)
                        @if($user->id != 1)
                            <option @if(request('sales2') == $user->id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="date_from">Date from</label>
                <input id="date_from" type="date" autocomplete="off" class="form-control life-search-input" name="date_from" value="{{ request('date_from') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="date_to">Date to</label>
                <input id="date_to" type="date" autocomplete="off" class="form-control life-search-input" name="date_to" value="{{ request('date_to') }}">
            </div>
        </div>

        {{----}}
        {{--<div class="col-md-4">--}}
            {{--<div class="form-group">--}}
                {{--<label class="" for="mobile_1">Mobile 1</label>--}}
                {{--<input id="mobile_1" type="tel" autocomplete="off" class="form-control" name="mobile_1" value="{{ request('mobile_1') }}">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
            {{--<div class="form-group">--}}
                {{--<label class="" for="mobile_2">Mobile 2</label>--}}
                {{--<input id="mobile_2" type="tel" autocomplete="off" class="form-control" name="mobile_2" value="{{ request('mobile_2') }}">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
            {{--<div class="form-group">--}}
                {{--<label class="" for="email">Email</label>--}}
                {{--<input id="email" type="email" autocomplete="off" class="form-control" name="email" value="{{ request('email') }}">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
            {{--<div class="form-group">--}}
                {{--<label class="" for="address">Address</label>--}}
                {{--<input id="address" type="text" autocomplete="off" class="form-control" name="address" value="{{ request('address') }}">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
            {{--<div class="form-group">--}}
                {{--<label class="" for="tel">Tel</label>--}}
                {{--<input id="tel" type="tel" autocomplete="off" class="form-control" name="tel" value="{{ request('tel') }}">--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>

    {{--<div class="form-group m-b-0">--}}
        {{--<div>--}}
            {{--<button type="submit" class="btn btn-primary waves-effect waves-light">--}}
                {{--Search--}}
            {{--</button>--}}
        {{--</div>--}}
    {{--</div>--}}
</form>