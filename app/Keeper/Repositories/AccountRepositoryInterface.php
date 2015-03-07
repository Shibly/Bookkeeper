<?php
/**
 * Created by PhpStorm.
 * User: Shibly
 * Date: 3/7/2015
 * Time: 2:52 AM
 */

namespace Keeper\Repositories;


interface AccountRepositoryInterface extends BaseRepositoryInterface
{
    public function getTotalAccountBalance();
}