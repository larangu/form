<div class="help-block" @ngIf("{$name}.errors && ({$name}.dirty || {$name}.touched)")>
    @foreach($nodeRules as $nodeRule)
        @if(array_key_exists($nodeRule, ['required' => true, 'pattern' => true]))
            <span @ngAttr('hidden', "!{$name}.errors.{$nodeRule}")>@lang('validation.' . $nodeRule)</span>
        @elseif(array_key_exists($nodeRule, ['min' => true, 'max' => true]))
            <span @ngAttr('hidden', "!{$name}.errors.required")>@lang('validation.' .$nodeRule, [":{$nodeRule}" => last(explode(':', $nodeRule))])</span>
        @endif
    @endforeach
</div>