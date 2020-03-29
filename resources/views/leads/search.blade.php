<form method="get" action="?" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="company_name">Company name</label>
                <input id="company_name" type="text" autocomplete="off" class="form-control" name="company_name" value="{{ old('company_name') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="owner">Type</label>
                <select id="owner" class="select2 form-control" name="owner">
                    <option disabled selected>Choose</option>
                    <option @if(old('owner') == 'Contractor') selected @endif value="Contractor">Contractor</option>
                    <option @if(old('owner') == 'Consultant') selected @endif value="Consultant">Consultant</option>
                    <option @if(old('owner') == 'Owner') selected @endif value="Owner">Owner</option>
                    <option @if(old('owner') == 'Supplier') selected @endif value="Supplier">Supplier</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="sub_type">Sub type</label>
                <select id="sub_type" class="select2 form-control" name="sub_type">
                    <option disabled selected>Choose</option>
                    <option @if(old('sub_type') == 'MEP') selected @endif value="MEP">MEP</option>
                    <option @if(old('sub_type') == 'FIRE') selected @endif value="FIRE">FIRE</option>
                    <option @if(old('sub_type') == 'HVAC') selected @endif value="HVAC">HVAC</option>
                    <option @if(old('sub_type') == 'INFRA') selected @endif value="INFRA">INFRA</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="contact_engineer">Contact Name</label>
                <input id="contact_engineer" type="text" autocomplete="off" class="form-control" name="contact_engineer" value="{{ old('contact_engineer') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="title">Title</label>
                <select id="title" class="select2 form-control" name="title">
                    <option disabled selected>Choose</option>
                    <option @if(old('title') == 'Office Engineer') selected @endif value="Office Engineer">Office Engineer</option>
                    <option @if(old('title') == 'Office Manager') selected @endif value="Office Manager">Office Manager</option>
                    <option @if(old('title') == 'Site Engineer') selected @endif value="Site Engineer">Site Engineer</option>
                    <option @if(old('title') == 'Site Manager') selected @endif value="Site Manager">Site Manager</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="class">Class</label>
                <select id="class" class="select2 form-control" name="class">
                    <option disabled selected>Choose</option>
                    <optgroup label="Class A">
                        <option value="AA">AA</option>
                        <option value="AB">AB</option>
                        <option value="AC">AC</option>
                        <option value="AD">AD</option>
                    </optgroup>
                    <optgroup label="Class B">
                        <option value="BA">BA</option>
                        <option value="BB">BB</option>
                        <option value="BC">BC</option>
                        <option value="BD">BD</option>
                    </optgroup>
                    <optgroup label="Class C">
                        <option value="CA">CA</option>
                        <option value="CB">CB</option>
                        <option value="CC">CC</option>
                        <option value="CD">CD</option>
                    </optgroup>
                    <optgroup label="Class D">
                        <option value="DA">DA</option>
                        <option value="DB">DB</option>
                        <option value="DC">DC</option>
                        <option value="DD">DD</option>
                    </optgroup>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="sales1">Sales 1</label>
                <select id="sales1" class="select2 form-control" name="sales1">
                    <option disabled selected>Choose</option>
                    @foreach($sales as $user)
                        @if($user->id != 1)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="sales2">Sales 2</label>
                <select id="sales2" class="select2 form-control" name="sales2">
                    <option disabled selected>Choose</option>
                    @foreach($sales as $user)
                        @if($user->id != 1)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        {{----}}
        {{--<div class="col-md-4">--}}
            {{--<div class="form-group">--}}
                {{--<label class="" for="mobile_1">Mobile 1</label>--}}
                {{--<input id="mobile_1" type="tel" autocomplete="off" class="form-control" name="mobile_1" value="{{ old('mobile_1') }}">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
            {{--<div class="form-group">--}}
                {{--<label class="" for="mobile_2">Mobile 2</label>--}}
                {{--<input id="mobile_2" type="tel" autocomplete="off" class="form-control" name="mobile_2" value="{{ old('mobile_2') }}">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
            {{--<div class="form-group">--}}
                {{--<label class="" for="email">Email</label>--}}
                {{--<input id="email" type="email" autocomplete="off" class="form-control" name="email" value="{{ old('email') }}">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
            {{--<div class="form-group">--}}
                {{--<label class="" for="address">Address</label>--}}
                {{--<input id="address" type="text" autocomplete="off" class="form-control" name="address" value="{{ old('address') }}">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
            {{--<div class="form-group">--}}
                {{--<label class="" for="tel">Tel</label>--}}
                {{--<input id="tel" type="tel" autocomplete="off" class="form-control" name="tel" value="{{ old('tel') }}">--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>

    <div class="form-group m-b-0">
        <div>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                Search
            </button>
        </div>
    </div>
</form>