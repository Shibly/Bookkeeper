<?php

namespace Keeper\Services\Forms;

class CategoryForm extends AbstractForm
{

    /**
     * The validation rules to validate the input data against
     *
     * @var array
     */

    protected $rules = array(
        'name' => 'required',
        'type' => 'required|min:4'
    );

}