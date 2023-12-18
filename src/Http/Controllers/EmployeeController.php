<?php

namespace TomatoPHP\TomatoHr\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class EmployeeController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \TomatoPHP\TomatoHr\Models\Employee::class;
    }

    /**
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request): View|JsonResponse
    {
        return Tomato::index(
            request: $request,
            model: $this->model,
            view: 'tomato-hr::employees.index',
            table: \TomatoPHP\TomatoHr\Tables\EmployeeTable::class,
            filters: [
                "department_id",
                "user_id"
            ]
        );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function api(Request $request): JsonResponse
    {
        return Tomato::json(
            request: $request,
            model: \TomatoPHP\TomatoHr\Models\Employee::class,
            filters: [
                "department_id",
                "user_id"
            ]
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-hr::employees.create',
        );
    }

    /**
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $response = Tomato::store(
            request: $request,
            model: \TomatoPHP\TomatoHr\Models\Employee::class,
            validation: [
                'department_id' => 'nullable|exists:departments,id',
                'attendance_shift_id' => 'nullable|exists:attendance_shifts,id',
                'user_id' => 'nullable|exists:users,id',
                'first_name' => 'required|max:255|string',
                'middle_name' => 'nullable|max:255|string',
                'last_name' => 'nullable|max:255|string',
                'position' => 'nullable|max:255|string',
                'email' => 'required|max:255|string|email',
                'phone' => 'nullable|max:255|min:12',
                'address' => 'nullable|max:65535',
                'has_education' => 'nullable',
                'education_type' => 'nullable|max:255|string',
                'university' => 'nullable|max:255|string',
                'college' => 'nullable|max:255|string',
                'department' => 'nullable|max:255|string',
                'nationality' => 'nullable|max:255|string',
                'national_id_type' => 'required|max:255|string',
                'national_id' => 'nullable|max:255|string',
                'has_links' => 'nullable',
                'links' => 'nullable',
                'salary' => 'nullable',
                'salary_subscription' => 'nullable',
                'salary_tax' => 'nullable',
                'salary_period' => 'nullable|max:255|string',
                'has_bank_account' => 'nullable',
                'bank_name' => 'nullable|max:255|string',
                'bank_branch' => 'nullable|max:255|string',
                'bank_iban' => 'nullable|max:255|string',
                'bank_swift' => 'nullable|max:255|string',
                'bank_account' => 'nullable|max:255|string',
                'has_insurance' => 'nullable',
                'insurance_number' => 'nullable|max:255|string',
                'has_medical_insurance' => 'nullable',
                'medical_insurance_company' => 'nullable|max:255|string',
                'medical_insurance_number' => 'nullable|max:255|string',
                'can_login' => 'nullable',
                'password' => 'nullable|max:255|confirmed|min:6',
                'otp_code' => 'nullable|max:255|string',
                'last_payment' => 'nullable',
                'vacations' => 'nullable',
                'contract_start' => 'nullable',
                'contract_end' => 'nullable',
                'is_activated' => 'nullable',
                'has_user' => 'nullable'
            ],
            message: __('Employee updated successfully'),
            redirect: 'admin.employees.index',
            hasMedia: true,
            collection: [
                "avatar" => false,
                "documents" => true
            ]
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\Employee $model
     * @return View|JsonResponse
     */
    public function show(\TomatoPHP\TomatoHr\Models\Employee $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-hr::employees.show',
            hasMedia: true,
            collection: [
                "avatar" => false,
                "documents" => true
            ]
        );
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\Employee $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoHr\Models\Employee $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-hr::employees.edit',
            hasMedia: true,
            collection: [
                "avatar" => false,
                "documents" => true
            ]
        );
    }

    /**
     * @param Request $request
     * @param \TomatoPHP\TomatoHr\Models\Employee $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \TomatoPHP\TomatoHr\Models\Employee $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                'department_id' => 'nullable|exists:departments,id',
                'attendance_shift_id' => 'nullable|exists:attendance_shifts,id',
                'user_id' => 'nullable|exists:users,id',
                'first_name' => 'sometimes|max:255|string',
                'middle_name' => 'nullable|max:255|string',
                'last_name' => 'nullable|max:255|string',
                'position' => 'nullable|max:255|string',
                'email' => 'sometimes|max:255|string|email',
                'phone' => 'nullable|max:255|min:12',
                'address' => 'nullable|max:65535',
                'has_education' => 'nullable',
                'education_type' => 'nullable|max:255|string',
                'university' => 'nullable|max:255|string',
                'college' => 'nullable|max:255|string',
                'department' => 'nullable|max:255|string',
                'nationality' => 'nullable|max:255|string',
                'national_id_type' => 'sometimes|max:255|string',
                'national_id' => 'nullable|max:255|string',
                'has_links' => 'nullable',
                'links' => 'nullable',
                'salary' => 'nullable',
                'salary_subscription' => 'nullable',
                'salary_tax' => 'nullable',
                'salary_period' => 'nullable|max:255|string',
                'has_bank_account' => 'nullable',
                'bank_name' => 'nullable|max:255|string',
                'bank_branch' => 'nullable|max:255|string',
                'bank_iban' => 'nullable|max:255|string',
                'bank_swift' => 'nullable|max:255|string',
                'bank_account' => 'nullable|max:255|string',
                'has_insurance' => 'nullable',
                'insurance_number' => 'nullable|max:255|string',
                'has_medical_insurance' => 'nullable',
                'medical_insurance_company' => 'nullable|max:255|string',
                'medical_insurance_number' => 'nullable|max:255|string',
                'can_login' => 'nullable',
                'password' => 'nullable|max:255|confirmed|min:6',
                'otp_code' => 'nullable|max:255|string',
                'last_payment' => 'nullable',
                'vacations' => 'nullable',
                'contract_start' => 'nullable',
                'contract_end' => 'nullable',
                'is_activated' => 'nullable',
                'has_user' => 'nullable'
            ],
            message: __('Employee updated successfully'),
            redirect: 'admin.employees.index',
            hasMedia: true,
            collection: [
                "avatar" => false,
                "documents" => true
            ]
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\Employee $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\TomatoPHP\TomatoHr\Models\Employee $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('Employee deleted successfully'),
            redirect: 'admin.employees.index',
            hasMedia: true,
            collection: [
                "avatar" => false,
                "documents" => true
            ]
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
