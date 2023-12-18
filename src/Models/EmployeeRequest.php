<?php

namespace TomatoPHP\TomatoHr\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

/**
 * @property integer $id
 * @property integer $employee_id
 * @property integer $user_id
 * @property integer $request_by
 * @property string $type
 * @property string $from
 * @property string $to
 * @property float $total
 * @property string $request_message
 * @property string $request_response
 * @property string $status
 * @property boolean $is_activated
 * @property boolean $is_approved
 * @property string $created_at
 * @property string $updated_at
 * @property Employee $employee
 * @property User $requestBy
 * @property User $user
 */
class EmployeeRequest extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['employee_id', 'user_id','amount', 'request_by', 'type', 'from', 'to', 'total', 'request_message', 'request_response', 'status', 'is_activated', 'is_approved', 'created_at', 'updated_at'];

    protected $casts = [
        'from' => 'date',
        'to' => 'date',
        'is_activated' => 'boolean',
        'is_approved' => 'boolean',
    ];
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
    public function requestBy()
    {
        return $this->belongsTo(\App\Models\User::class, 'request_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
