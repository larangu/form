<?php namespace Larangu\FormNg\Form;

use Illuminate\Support\Traits\Macroable;
use Larangu\FormNg\Contracts\FormBuilder;
use Larangu\FormNg\Form;

class BuilderNg implements FormBuilder
{
    use Macroable {
        Macroable::__call as macroableCall;
    }

    /**
     * Instance of the current form.
     *
     * @var Form
     */
    protected $currentForm;

    /**
     * Get current form instance.
     *
     * @return Form
     */
    public function getForm()
    {
        if (!$this->currentForm) {
            $this->makeNewForm();
        }
        return $this->currentForm;
    }

    public function open(array $data = [])
    {
        $this->makeNewForm();

        return $this->currentForm;
    }

    public function model($model, array $data = [])
    {
        $this->open($data);

        $this->currentForm->setModel($model);

        return $this->currentForm;
    }

    public function close()
    {
        $this->resetForm();
    }

    public function __call($method, $parameters)
    {
        try {
            return $this->macroableCall($method, $parameters);
        } catch (\BadMethodCallException $e) {
        }

        throw new \BadMethodCallException("Method {$method} does not exist.");
    }

    protected function makeNewForm(array $data = [])
    {
        $this->currentForm = app(Form::class, [$data]);
    }

    protected function resetForm()
    {
        $this->currentForm = null;
    }
}
