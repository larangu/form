<div class="{{$containerClass or 'form-group'}}" @ngClass(Form::getHasErrors()))>
    <div class="col-md-10 col-md-offset-2">
        <label class="checkbox">
            <input type="checkbox"
                   class="{{$inputClass or 'form-control'}}"
                   @ngModel($model . '.' . $name)
                   name="{{$name}}"
            @if(isset($rules) && ($nodeRule = array_get($rules, $name)) && ($nodeRules = explode('|', $nodeRule)))
                @foreach($nodeRules as $nodeRule)
                    @if($nodeRule == 'required')
                        required
                    @endif
                @endforeach
            @endif
            />
            {{$label}}
        </label>
        <small>{{$description or ''}}</small>
        @if(!empty($nodeRules))
            @include('kernel::_misc.form._private.error-container')
        @endif
    </div>
</div>