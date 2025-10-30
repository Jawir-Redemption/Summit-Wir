<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'orderDetail_id',
        'loan_date',
        'return_date',
        'duration',
        'status',
        'total_price',
        'total_fine',
    ];

    protected $appends = ['displayStatus'];

    public function getDisplayStatusAttribute()
    {
        // If already returned or cancelled, use stored status
        if (in_array($this->status, ['completed', 'cancelled'])) {
            return $this->status;
        }

        // Compute due date
        $dueDate = Carbon::parse($this->loan_date)->addDays($this->duration);

        // Check if overdue
        if (now()->greaterThan($dueDate)) {
            return 'overdue';
        }

        // Otherwise use the stored status (Pending, Confirmed, etc.)
        return $this->status;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
