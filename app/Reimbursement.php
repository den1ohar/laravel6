<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reimbursement extends Model
{
    protected $fillable = [
        'company_id',
        'project_id',
        'employee_id',
        'expense_id',
        'date',
        'amount',
        'comment'
    ];
}
