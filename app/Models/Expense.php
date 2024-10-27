<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\ExpenseCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    public function getEntryDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], 'Y-m-d');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format('Y-m-d');
        } else {
            return '';
        }
    }

    public function setEntryDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['entry_date'] = Carbon::createFromFormat('Y-m-d', $input)->format('Y-m-d');
        } else {
            $this->attributes['entry_date'] = null;
        }
    }

    public function expense_category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category_id');
    }

    public function expense_currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
