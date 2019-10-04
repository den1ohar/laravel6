<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reimbursement extends Model
{
    protected $fillable = [
        'expense_id',
        'date',
        'amount',
        'comment'
    ];

    public function expense()
    {
        return $this->belongsTo(Expense::class);
    }
}
