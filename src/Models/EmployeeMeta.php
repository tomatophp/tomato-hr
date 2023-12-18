<?php

namespace TomatoPHP\TomatoHr\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $employee_id
 * @property string $key
 * @property mixed $value
 * @property string $type
 * @property string $group
 * @property string $created_at
 * @property string $updated_at
 * @property Employee $employee
 */
class EmployeeMeta extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['employee_id', 'key', 'value', 'type', 'group', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('TomatoPHP\TomatoHr\Models\Employee');
    }
}
