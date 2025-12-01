<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = ['user_id', 'loan_date', 'return_date', 'duration', 'status', 'total_price', 'total_fine'];

    protected $dates = ['loan_date', 'return_date'];

    protected $appends = ['displayStatus'];

    public function getDisplayStatusAttribute()
    {
        // If already returned or cancelled, use stored status
        if (in_array($this->status, ['completed', 'cancelled'])) {
            return $this->status;
        }

        // Compute due date
        $dueDate = Carbon::parse($this->loan_date)->addDays((int) $this->duration);

        // Check if overdue
        if (now()->greaterThan($dueDate)) {
            return 'overdue';
        }

        // Otherwise use the stored status (Pending, Confirmed, etc.)
        return $this->status;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }
}
