<?php

namespace Keeper\Services\Forms;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;


class AbstractForm
{

    protected $inputData;

    protected $rules = array();

    protected $validator;

    protected $messages = array();


    /**
     * Create a new form instance.
     *
     */
    public function __construct()
    {
        $this->inputData = App::make('request')->all();
    }

    /**
     * Return whether the input data in valid
     *
     * @return bool
     */
    public function getInputData()
    {
        return $this->inputData;
    }


    public function isValid()
    {
        $this->validator = Validator::make(
            $this->getInputData(),
            $this->getPreparedRules(),
            $this->getMessages()
        );

        return $this->validator->passes();
    }


    /**
     * Get the prepared validation rules
     *
     * @return array
     */

    protected function getPreparedRules()
    {
        return $this->rules;
    }


    /**
     * Get the custom validation messages
     *
     *
     * @return array
     */

    protected function getMessages()
    {
        return $this->messages;
    }


    /**
     * Get the validation errors off of the Validator instance
     *
     * @return mixed
     */

    public function getErrors()
    {
        return $this->validator->errors();
    }


}