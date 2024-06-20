<div class="panel">
    <div class="panel-title"><strong>{{__("Customer/Guest Information")}}</strong></div>
    <div class="panel-body">
        @if(is_default_lang())
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">{{__("First Name")}}</label>
                    <input type="text" name="first_name" class="form-control" placeholder="{{__("First Name")}}" value="{{old('first_name', $row->first_name)}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">{{__("Last Name")}}</label>
                    <input type="text" name="last_name" class="form-control" placeholder="{{__("Last Name")}}" value="{{old('last_name', $row->last_name)}}">
                </div>
            </div>
        </div>
        @endif

        <div class="form-group">
            <label class="control-label">{{__("Email")}}</label>
            <input type="email" name="email" class="form-control" placeholder="{{__("Email")}}" value="{{old('email', $row->email)}}">
        </div>
        <div class="form-group">
            <label class="control-label">{{__("Phone")}}</label>
            <input type="text" name="phone" class="form-control" placeholder="{{__("Phone")}}" value="{{old('phone', $row->phone)}}">
        </div>
        <div class="form-group">
            <label class="control-label">{{__("Address Line 1")}}</label>
            <input type="text" name="address_line_1" class="form-control" placeholder="{{__("Address Line 1")}}" value="{{old('address_line_1', $row->address_line_1)}}">
        </div>
        <div class="form-group">
            <label class="control-label">{{__("Address Line 2")}}</label>
            <input type="text" name="address_line_2" class="form-control" value="{{old('address_line_2', $row->address_line_2)}}">
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">{{__("Country")}}</label>
                    <input type="text" name="country" class="form-control" placeholder="{{__("Country")}}" value="{{old('country', $row->country)}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">{{__("City")}}</label>
                    <input type="text" name="city" class="form-control" placeholder="{{__("City")}}" value="{{old('city', $row->city)}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">{{__("State")}}</label>
                    <input type="text" name="state" class="form-control" placeholder="{{__("State")}}" value="{{old('state', $row->state)}}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">{{__("ZIP / Postal Code")}}</label>
            <input type="text" name="zip" class="form-control" placeholder="{{__("ZIP / Postal Code")}}" value="{{old('zip', $row->zip)}}">
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label">{{__("Special Requirements")}}</label>
                    <textarea name="special_requirements" class="form-control" style="height: 200px;">{{old('special_requirements', $row->special_requirements)}}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
