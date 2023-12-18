<?php

namespace TomatoPHP\TomatoHr\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $employee_id
 * @property string $year
 * @property string $month
 * @property string $date
 * @property float $total_time
 * @property float $offs_time
 * @property float $overtime_time
 * @property float $delay_time
 * @property float $out_date_payments
 * @property float $subscription
 * @property float $tax
 * @property float $total
 * @property string $created_at
 * @property string $updated_at
 * @property Employee $employee
 * @property User $user
 */
class EmployeePayroll extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'employee_id', 'year', 'month', 'date', 'total_time', 'offs_time', 'overtime_time', 'delay_time', 'out_date_payments', 'subscription', 'tax', 'total', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('TomatoPHP\TomatoHr\Models\Employee');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
