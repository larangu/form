<div class="{{$containerClass or 'form-group'}}" [ngClass]="{has-error: ({{$name}}.errors && ({{$name}}.dirty || {{$name}}.touched)}">
    <label class="col-md-2 control-label">{{$label}}</label>
    <div class="col-md-10">
        <select type="{{$type or 'text'}}"
                class="{{$inputClass or 'form-control'}}"
                [ngModel]="{{$model}}.{{$name}}"
                name="{{$name}}"
        @if(isset($rules) && ($nodeRule = array_get($rules, $name)) && ($nodeRules = explode('|', $nodeRule)))
            @foreach($nodeRules as $nodeRule)
                @if($nodeRule == 'required')
                    required
                @endif
            @endforeach
        @endif
        >
        @foreach($options as $value => $optionName)
            <option value="{{$value}}">{{$optionName}}</option>
        @endforeach
        </select>
        <small>{{$description or ''}}</small>
        @include('kernel::_misc.form._private.error-container')
    </div>
</div>