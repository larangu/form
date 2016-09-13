<?php namespace Larangu\FormNg;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;

class Form
{
    /**
     * Options array.
     *
     * @var array
     */
    protected $options = [];

    /**
     * Form attributes.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Inputs array.
     *
     * @var array
     */
    protected $inputs = [];

    /**
     * Form constructor.
     *
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    /**
     * Form option getter.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function getOption($key, $default)
    {
        return array_get($this->options, $key, $default);
    }

    /**
     * Form's option setter.
     *
     * @param string $key
     * @param mixed $value
     */
    public function setOption($key, $value)
    {
        $this->options[$key] = $value;
    }

    /**
     * Model's setter.
     *
     * @param mixed $model
     */
    public function setModel($model)
    {
        if ($model instanceof Model) {
            $this->attributes = $model->getAttributes();
        }

        if ($model instanceof Arrayable) {
            $this->attributes = $model->toArray();
        }

        if (is_array($model)) {
            $this->attributes = $model;
        }
    }

    public function makeOpen()
    {

    }

    public function makeClose()
    {

    }
}
