<?php

namespace App\Repositories\Eloquent;
use App\Models\BankAccount;
use App\Repositories\Interfaces\BankAccountRepositoryInterface;

class BankAccountRepository extends BaseRepository implements BankAccountRepositoryInterface
{

    public function __construct(BankAccount $model)
    {
        parent::__construct($model);
    }
}
