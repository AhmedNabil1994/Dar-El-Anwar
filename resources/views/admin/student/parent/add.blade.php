<h2>{{trans("website.parents_information")}}</h2>
<br>
<div class="col-md-6">
    <div class="input__group mb-25">
        <label>{{trans('website.guardian_Relationship')}} <span class="text-danger">*</span></label>
        <select name="guardian_relationship[]"  class="form-control" >
            <option value="1" {{$parent->relationship == 1? 'selected' : ''}}>{{trans('website.father')}}</option>
            <option value="2" {{$parent->relationship == 2? 'selected' : ''}}>{{trans('website.mother')}}</option>
            <option value="3" {{$parent->relationship == 3? 'selected' : ''}}>{{trans('اخري')}}</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-25">
            <label for="guardian_name">{{trans("website.guardian_name")}}</label>
            <input type="text" name="guardian_name[]" value="{{$parent->name}}" placeholder='{{trans("website.guardian_name")}}' class="form-control">
            @if ($errors->has('guardian_name'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_name') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-25">
            <label for="guardian_phone_number">{{trans("website.guardian_phone_number")}}</label>
            <input type="text" name="guardian_phone_number[]" value="{{$parent->phone_number}}" placeholder="{{trans('website.guardian_phone_number')}}" class="form-control">
            @if ($errors->has('guardian_phone_number'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_phone_number') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-25">
            <label for="guardian_whatsapp_number">{{trans("website.guardian_whatsapp_number")}}</label>
            <input type="text" name="guardian_whatsapp_number[]" value="{{$parent->whatsapp_number}}" placeholder='{{trans("website.guardian_whatsapp_number")}}' class="form-control">
            @if ($errors->has('guardian_whatsapp_number'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_whatsapp_number') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-25">
            <label for="id_number">{{trans("website.id_number")}}</label>
            <input type="number" name="id_number[]" value="{{$parent->national_id}}" placeholder="{{trans('website.id_number')}}" class="form-control"/>
            @if ($errors->has('id_number'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('id_number') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-25">
            <label for="profession">{{trans('website.profession')}}</label>
            <input type="text" name="profession[]" value="{{$parent->profession}}" placeholder="{{trans('website.profession')}}" class="form-control"/>
            @if ($errors->has('profession'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('profession') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="input__group mb-25">
            <label>{{trans('website.guardian_email')}} <span class="text-danger">*</span></label>
            <input type="email" name="guardian_email[]" value="{{$parent->email}}" placeholder="{{ trans('website.guardian_email') }}" class="form-control" />
            @if ($errors->has('guardian_email'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_email') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <label>{{trans('website.receiving_officer')}} <span class="text-danger">* </span></label>
        <input type="checkbox" name="receiving_officer[]" placeholder="{{ trans('website.receiving_officer') }}" class="input__checkbox" {{$parent->student_pickup_optional ? 'checked' : ''}}/>
        @if ($errors->has('receiving_officer'))
            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('receiving_officer') }}</span>
        @endif
    </div>
    <div class="col-md-6">
        <label>{{trans('website.followup_officer')}} <span class="text-danger">* </span></label>
        <input type="checkbox" name="followup_officer[]"  placeholder="{{ trans('website.followup_officer') }}" class="input__checkbox" {{$parent->follow_up_person ? 'checked' : ''}}/>
        @if ($errors->has('followup_officer'))
            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('followup_officer') }}</span>
        @endif
    </div>

</div>
