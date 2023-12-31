<h2>{{trans("website.parents_information")}}</h2>
<br>
<div class="row">
<div class="col-md-6">
    <div class="input__group mb-25">
        <label>{{trans('website.guardian_Relationship')}} <span class="text-danger">*</span></label>
        <select name="guardian_relationship[]"  class="form-control guardian_relationship" >
            <option value="1" {{$parent->relationship == 1? 'selected' : ''}}>{{trans('website.father')}}</option>
            <option value="2" {{$parent->relationship == 2? 'selected' : ''}}>{{trans('website.mother')}}</option>
            <option value="3" {{$parent->relationship == 3? 'selected' : ''}}>{{trans('اخري')}}</option>
        </select>
    </div>
</div>
<div class="col-md-6" style="display: none">
    <div class="form-group mb-25">
        <label
            for="guardian_relationship">{{trans("نوع الصلة")}}</label>
        <input type="text" name="guardian_relationship_type[]" value="{{$parent->relationship_type}}" id="guardian_relationship"
               placeholder='{{trans("نوع الصلة")}}'
               class="form-control">
        @if ($errors->has('guardian_relationship'))
            <span class="text-danger"><i
                    class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_relationship') }}</span>
        @endif
    </div>
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
            <label
                for="guardian_whatsapp_number">{{trans("website.guardian_whatsapp_number")}}</label>
            <select type="text" name="guardian_whatsapp_number_check[]"
                    class="form-control guardian_whatsapp_number_check">
                <option value="1" {{$parent->whatsapp_number_check == 1 ? 'selected' : ''}}>نفس رقم الهاتف</option>
                <option value="0"  {{$parent->whatsapp_number_check == 0 ? 'selected' : ''}}>اخر</option>
            </select>
            @if ($errors->has('guardian_whatsapp_number'))
                <span class="text-danger"><i
                        class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_whatsapp_number') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6" style="display: none">
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
            <input type="number" name="id_number[]" min="1" max="99999999999999" value="{{$parent->national_id}}" placeholder="{{trans('website.id_number')}}" class="form-control"/>
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
        <label>{{trans('website.receiving_officer')}} <span class="text-danger">* </span></label>
        <input type="checkbox" name="receiving_officer[]" placeholder="{{ trans('website.receiving_officer') }}" class="input__checkbox" {{$parent->student_pickup_optional ? 'checked' : ''}}/>
        @if ($errors->has('receiving_officer'))
            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('receiving_officer') }}</span>
        @endif
    </div>
    <div class="col-md-6">
        <label>{{trans('website.followup_officer')}} <span class="text-danger">* </span></label>
        <input type="checkbox" name="followup_officer[]"  placeholder="{{ trans('website.followup_officer') }}" data-email="{{$parent->email}}" class="input__checkbox followup_officer" {{$parent->follow_up_person ? 'checked' : ''}}/>
        @if ($errors->has('followup_officer'))
            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('followup_officer') }}</span>
        @endif
    </div>

    <div class="parent_credintials">

    </div>

</div>
