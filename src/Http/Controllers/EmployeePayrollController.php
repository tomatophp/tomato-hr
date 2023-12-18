<?php

namespace TomatoPHP\TomatoHr\Http\Controllers;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;
use TomatoPHP\TomatoHr\Models\Employee;
use TomatoPHP\TomatoHr\Models\EmployeeAttendance;
use TomatoPHP\TomatoHr\Models\EmployeePayroll;
use TomatoPHP\TomatoHr\Models\EmployeeRequest;

class EmployeePayrollController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \TomatoPHP\TomatoHr\Models\EmployeePayroll::class;
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
            view: 'tomato-hr::employee-payrolls.index',
            table: \TomatoPHP\TomatoHr\Tables\EmployeePayrollTable::class
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
            model: \TomatoPHP\TomatoHr\Models\EmployeePayroll::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-hr::employee-payrolls.create',
        );
    }

    /**
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $request->validate([
            'date' => ['required', function($attrs, $value, $fail) use ($request){
                $checkValue = EmployeePayroll::where('employee_id', $request->get('employee_id'))
                    ->whereBetween('date', [
                        Carbon::parse($value)->startOfMonth(),
                        Carbon::parse($value)->endOfMonth(),
                    ])->first();
                if($checkValue){
                    return $fail(__('Sorry You Collect The Salary This Month!'));
                }
            }],
            'employee_id' => 'required|exists:employees,id',
        ]);

        $attends = EmployeeAttendance::where('employee_id', $request->get('employee_id'))
            ->whereBetween('created_at', [
                Carbon::parse($request->get('date'))->startOfMonth(),
                Carbon::parse($request->get('date'))->endOfMonth()
            ]);

        $offs = EmployeeRequest::where('type', 'vacations')->where('is_approved', true)
            ->where('from','>=', Carbon::parse($request->get('date'))->startOfMonth())
            ->where('to', '<=',Carbon::parse($request->get('date'))->endOfMonth());

        $employee = Employee::find($request->get('employee_id'));
        $request->merge([
            "user_id" => auth('web')->user()->id,
            "year" => (string)Carbon::parse($request->get('date'))->year,
            "month" => (string)Carbon::parse($request->get('date'))->month,
            "total_time" => $attends->sum('total'),
            "overtime_time" => $attends->sum('overtime'),
            "delay_time" => $attends->sum('delay'),
            "offs_time" => $offs->sum('total'),
            "out_date_payments" => $employee->balance < 1 ? $employee->balance : 0,
            "subscription" => $employee->salary_subscription,
            "tax" => $employee->salary_tax
        ]);

        $response = Tomato::store(
            request: $request,
            model: \TomatoPHP\TomatoHr\Models\EmployeePayroll::class,
            validation: [
                'user_id' => 'required|exists:users,id',
                'year' => 'required|max:255|string',
                'month' => 'required|max:255|string',
                'total_time' => 'nullable',
                'offs_time' => 'nullable',
                'overtime_time' => 'nullable',
                'delay_time' => 'nullable',
                'out_date_payments' => 'nullable',
                'subscription' => 'nullable',
                'tax' => 'nullable',
                'total' => 'nullable'
            ],
            message: __('EmployeePayroll updated successfully'),
            redirect: 'admin.employee-payrolls.index',
        );

        //Collect Salary
        $salary = $employee->salary;
        $hour = $salary/160;
        $total = $response->record->total_time * $hour;
        $overtime_delay = ($response->record->overtime_time - $response->record->delay_time) * $hour;
        $total+= $overtime_delay;
        $total-=($response->record->offs_time * 8) * $hour;
        $total+= $response->record->out_date_payments;
        $total-= $response->record->subscription;
        $total-= $response->record->tax;

        $response->record->total = $total;
        $response->record->save();

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\EmployeePayroll $model
     * @return View|JsonResponse
     */
    public function show(\TomatoPHP\TomatoHr\Models\EmployeePayroll $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-hr::employee-payrolls.show',
        );
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\EmployeePayroll $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoHr\Models\EmployeePayroll $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-hr::employee-payrolls.edit',
        );
    }

    /**
     * @param Request $request
     * @param \TomatoPHP\TomatoHr\Models\EmployeePayroll $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \TomatoPHP\TomatoHr\Models\EmployeePayroll $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                            'user_id' => 'sometimes|exists:users,id',
            'employee_id' => 'sometimes|exists:employees,id',
            'year' => 'sometimes|max:255|string',
            'month' => 'sometimes|max:255|string',
            'date' => 'sometimes',
            'total_time' => 'nullable',
            'offs_time' => 'nullable',
            'overtime_time' => 'nullable',
            'delay_time' => 'nullable',
            'out_date_payments' => 'nullable',
            'subscription' => 'nullable',
            'tax' => 'nullable',
            'total' => 'nullable'
            ],
            message: __('EmployeePayroll updated successfully'),
            redirect: 'admin.employee-payrolls.index',
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\EmployeePayroll $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\TomatoPHP\TomatoHr\Models\EmployeePayroll $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('EmployeePayroll deleted successfully'),
            redirect: 'admin.employee-payrolls.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
