<?php
/**
 * Created by PhpStorm.
 * User: Shibly
 * Date: 3/6/2015
 * Time: 12:32 AM
 */

namespace Keeper\Services\Forms;


class PaymentMethodForm extends AbstractForm
{
    protected $rules = array(
        'name' => 'required|min:3'
    );

}