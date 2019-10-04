<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'date',
        'type_id',
        'category_id',
        'amount',
        'comment',
        'company_id',
        'project_id',
        'employee_id',
        'note'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
