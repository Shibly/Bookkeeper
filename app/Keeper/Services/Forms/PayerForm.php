<?php
/**
 * Created by PhpStorm.
 * User: Shibly
 * Date: 3/5/2015
 * Time: 10:27 PM
 */

namespace Keeper\Services\Forms;


class PayerForm extends AbstractForm
{
    protected $rules = array(
        'name' => 'required|min:3'
    );

}