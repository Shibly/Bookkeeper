<?php
/**
 * Created by PhpStorm.
 * User: Shibly
 * Date: 3/4/2015
 * Time: 11:09 PM
 */

namespace Keeper\Services\Forms;


class PayeeForm extends AbstractForm
{


    protected $rules = array(
        'name' => 'required|min:3'
    );
}