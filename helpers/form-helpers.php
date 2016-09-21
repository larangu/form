<?php

if (!function_exists('formNg')) {

    /**
     * Form ng helper function.
     *
     * @param \Illuminate\Database\Eloquent\Model|\Illuminate\Contracts\Support\Arrayable|array|null $model
     * @param array $data
     * @return \Larangu\FormNg\Contracts\FormBuilder|string
     */
    function formNg($model = null, array $data = [])
    {
        if (is_null($model)) {
            return app('formBuilderNg');
        }

        if (is_object($model)) {
            return app('formBuilderNg')->model($model, $data);
        }

        if (is_array($model) || $model instanceof \Illuminate\Contracts\Support\Arrayable) {
            if (!empty($data)) {
                return app('formBuilderNg')->model($model, $data);
            }
            return app('formBuilderNg')->open($model);
        }

        return app('formBuilderNg')->$model(...$data);
    }
}

if (!function_exists('formNgClose')) {

    /**
     * Form ng close tag helper function.
     *
     * @return \Larangu\FormNg\Contracts\FormBuilder|string
     */
    function formNgClose()
    {
        return app('formBuilderNg')->close();
    }
}
