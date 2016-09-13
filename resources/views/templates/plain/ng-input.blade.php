<div class="{{$containerClass or 'form-group'}}" [ngClass]="{has-error: ({{$name}}.errors && ({{$name}}.dirty || {{$name}}.touched)}">
    <label class="col-md-2 control-label">{{$label}}</label>

    <div class="col-md-10">
        <input type="{{$type or 'text'}}"
               class="{{$inputClass or 'form-control'}}"
               [(ngModel)]="{{$model}}.{{$name}}"
               name="{{$name}}"
        @if(isset($rules) && ($nodeRule = array_get($rules, $name)) && ($nodeRules = explode('|', $nodeRule)))
            @foreach($nodeRules as $nodeRule)
                @if($nodeRule == 'required')
                    required
                @elseif(array_key_exists($nodeRule, ['min' => true, 'max' => true]))
                    {{$nodeRule}}length="{{last(explode(':', $nodeRule))}}"
                @elseif($nodeRule == 'pattern')
                    pattern="{{$nodeRule}}"
                @endif
            @endforeach
        @endif
        />
        <small>{{$description or ''}}</small>
        @if(!empty($nodeRules))
            @include('kernel::_misc.form._private.error-container')
        @endif
    </div>
</div>