<?php
/**
 * Created by PhpStorm.
 * User: Shibly
 * Date: 3/7/2015
 * Time: 2:54 AM
 */

namespace Keeper\Services\Forms;


class AccountForm extends AbstractForm
{

    protected $rules = array(
        'account_name' => 'required|min:3',
        'description' => 'required|min:5',
        'balance' => 'required|numeric'
    );

}