<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public function expense()
    {
        return $this->belongsTo(Expense::class);
    }

    public function reimbursement()
    {
        return $this->belongsTo(Reimbursement::class);
    }
}
