<?php

namespace TomatoPHP\TomatoHr\Models;

use Illuminate\Database\Eloquent\Model;
use TomatoPHP\TomatoBranches\Models\Company;

/**
 * @property integer $id
 * @property integer $company_id
 * @property integer $department_head_id
 * @property string $name
 * @property string $icon
 * @property string $color
 * @property string $created_at
 * @property string $updated_at
 * @property AttendanceShift[] $attendanceShifts
 * @property Company $company
 * @property EmployeeAttendance[] $employeeAttendances
 * @property Employee[] $employees
 */
class Department extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['company_id', 'department_head_id', 'name', 'icon', 'color', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendanceShifts()
    {
        return $this->hasMany('TomatoPHP\TomatoHr\Models\AttendanceShift');
    }

    public function departmentHead()
    {
        return $this->belongsTo(Employee::class, 'department_head_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeeAttendances()
    {
        return $this->hasMany('TomatoPHP\TomatoHr\Models\EmployeeAttendance');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany('TomatoPHP\TomatoHr\Models\Employee');
    }
}
