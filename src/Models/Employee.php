<?php

namespace TomatoPHP\TomatoHr\Models;

use App\Models\User;
use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Traits\HasWallet;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use TomatoPHP\TomatoNotifications\Traits\InteractWithNotifications;

/**
 * @property integer $id
 * @property integer $department_id
 * @property integer $attendance_shift_id
 * @property integer $user_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $position
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property boolean $has_education
 * @property string $education_type
 * @property string $university
 * @property string $college
 * @property string $department
 * @property string $nationality
 * @property string $national_id_type
 * @property string $national_id
 * @property boolean $has_links
 * @property mixed $links
 * @property float $salary
 * @property float $salary_subscription
 * @property float $salary_tax
 * @property string $salary_period
 * @property boolean $has_bank_account
 * @property string $bank_name
 * @property string $bank_branch
 * @property string $bank_iban
 * @property string $bank_swift
 * @property string $bank_account
 * @property boolean $has_insurance
 * @property string $insurance_number
 * @property boolean $has_medical_insurance
 * @property string $medical_insurance_company
 * @property string $medical_insurance_number
 * @property string $medical_insurance_start_at
 * @property string $medical_insurance_end_at
 * @property boolean $can_login
 * @property string $password
 * @property string $otp_code
 * @property string $last_payment
 * @property float $vacations
 * @property string $contract_start
 * @property string $contract_end
 * @property boolean $is_activated
 * @property boolean $has_user
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property EmployeeAttendance[] $employeeAttendances
 * @property EmployeeMeta[] $employeeMetas
 * @property EmployeePayment[] $employeePayments
 * @property EmployeePayroll[] $employeePayrolls
 * @property EmployeeRequest[] $employeeRequests
 * @property AttendanceShift $attendanceShift
 * @property Department $departmentHr
 * @property User $user
 */
class Employee extends Authenticatable implements HasMedia, Wallet
{
    use HasWallet;
    use HasApiTokens, Notifiable;
    use InteractWithNotifications;
    use InteractsWithMedia;

    /**
     * @var array
     */
    protected $fillable = ['department_id', 'attendance_shift_id', 'user_id', 'first_name', 'middle_name', 'last_name', 'position', 'email', 'phone', 'address', 'has_education', 'education_type', 'university', 'college', 'department', 'nationality', 'national_id_type', 'national_id', 'has_links', 'links', 'salary', 'salary_subscription', 'salary_tax', 'salary_period', 'has_bank_account', 'bank_name', 'bank_branch', 'bank_iban', 'bank_swift', 'bank_account', 'has_insurance', 'insurance_number', 'has_medical_insurance', 'medical_insurance_company', 'medical_insurance_number', 'medical_insurance_start_at', 'medical_insurance_end_at', 'can_login', 'password', 'otp_code', 'last_payment', 'vacations', 'contract_start', 'contract_end', 'is_activated', 'has_user', 'deleted_at', 'created_at', 'updated_at'];

    protected $casts = [
        "is_activated" => "boolean",
        "can_login" => "boolean",
        "has_education" => "boolean",
        "has_links" => "boolean",
        "has_bank_account" => "boolean",
        "has_insurance" => "boolean",
        "has_medical_insurance" => "boolean",
        "has_user" => "boolean",
        "links" => "json",
        "password" => "hashed"
    ];

    protected $hidden = [
        'password',
        'otp_code'
    ];

    protected $appends = [
        'full_name'
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
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
    public function employeeMetas()
    {
        return $this->hasMany('TomatoPHP\TomatoHr\Models\EmployeeMeta');
    }

    /**
     * @param string $key
     * @param string|null $value
     * @return mixed
     */
    public function meta(string $key, mixed $value=null): mixed
    {
        if($value !== null){
            return $this->employeeMetas()->updateOrCreate(['key' => $key], ['value' => $value]);
        }
        else {
            return $this->employeeMetas()->where('key', $key)->first()?->value ?? null;
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeePayments()
    {
        return $this->hasMany('TomatoPHP\TomatoHr\Models\EmployeePayment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeePayrolls()
    {
        return $this->hasMany('TomatoPHP\TomatoHr\Models\EmployeePayroll');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeeRequests()
    {
        return $this->hasMany('TomatoPHP\TomatoHr\Models\EmployeeRequest');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attendanceShift()
    {
        return $this->belongsTo('TomatoPHP\TomatoHr\Models\AttendanceShift');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departmentHr()
    {
        return $this->belongsTo('TomatoPHP\TomatoHr\Models\Department', 'department_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
