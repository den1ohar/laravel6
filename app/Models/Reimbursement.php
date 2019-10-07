<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reimbursement extends Model
{
    protected $fillable = [
        'expense_id',
        'date',
        'amount',
        'comment'
    ];

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }

    public function expense()
    {
        return $this->belongsTo(Expense::class);
    }
}
