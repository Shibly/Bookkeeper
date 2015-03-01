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
     * Get the prepared input data
     *
     * @return array
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


}