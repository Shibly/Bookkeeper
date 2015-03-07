<?php
/**
 * Created by PhpStorm.
 * User: Shibly
 * Date: 3/7/2015
 * Time: 3:23 AM
 */

namespace Keeper\Services\Forms;


class TransactionForm extends AbstractForm
{

    /**
     * No need to set any rules right now.
     *
     * @var array
     */

    protected $rules = array(
        'account' => 'required',
        'type' => 'required',
        'category' => 'required',
        'amount' => 'required',
        'payer' => 'required',
        'payee' => 'required',
        'method' => 'required',
        'ref' => 'required',
        'description' => 'required'
    );
}