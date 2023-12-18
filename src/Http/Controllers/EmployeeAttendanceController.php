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

class EmployeeAttendanceController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \TomatoPHP\TomatoHr\Models\EmployeeAttendance::class;
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
            view: 'tomato-hr::employee-attendances.index',
            table: \TomatoPHP\TomatoHr\Tables\EmployeeAttendanceTable::class
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
            model: \TomatoPHP\TomatoHr\Models\EmployeeAttendance::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-hr::employee-attendances.create',
        );
    }

    /**
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $total = 0;
        $delay = 0;
        $overtime = 0;
        if(!empty($request->get('out_at')) && !empty($request->get('in_at')) && !empty($request->get('employee_id'))){
            $total = Carbon::parse($request->get('out_at'))->diffInMinutes(Carbon::parse($request->get('in_at')));
            $employee = Employee::find($request->get('employee_id'));
            if($employee){
                $delay = Carbon::parse($employee->attendanceShift->start_at)->diffInMinutes(Carbon::parse($request->get('in_at')));
                $overtime = Carbon::parse($employee->attendanceShift->end_at)->diffInMinutes(Carbon::parse($request->get('out_at')));
            }
        }
        $request->merge([
           "user_id" => auth('web')->user()->id,
           "note_by" => !empty($request->get('note')) ? auth('web')->user()->id : null,
           "total" => $total/60,
           "delay" => $delay/60,
           "overtime" => $overtime/60,
           "source" => "HR"
        ]);

        $response = Tomato::store(
            request: $request,
            model: \TomatoPHP\TomatoHr\Models\EmployeeAttendance::class,
            validation: [
                'user_id' => 'nullable|exists:users,id',
                'employee_id' => 'required|exists:employees,id',
                'department_id' => 'required|exists:departments,id',
                'note_by' => 'nullable',
                'in_at' => ['required', 'before:out_at'],
                'out_at' => ['required', 'after:in_at'],
                'date' => ['required', 'date'],
                'source' => 'nullable|max:255|string',
                'delay' => 'nullable',
                'overtime' => 'nullable',
                'total' => 'nullable',
                'notes' => 'nullable|max:65535'
            ],
            message: __('EmployeeAttendance updated successfully'),
            redirect: 'admin.employee-attendances.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return back();
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\EmployeeAttendance $model
     * @return View|JsonResponse
     */
    public function show(\TomatoPHP\TomatoHr\Models\EmployeeAttendance $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-hr::employee-attendances.show',
        );
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\EmployeeAttendance $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoHr\Models\EmployeeAttendance $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-hr::employee-attendances.edit',
        );
    }

    /**
     * @param Request $request
     * @param \TomatoPHP\TomatoHr\Models\EmployeeAttendance $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \TomatoPHP\TomatoHr\Models\EmployeeAttendance $model): RedirectResponse|JsonResponse
    {
        $total = 0;
        $delay = 0;
        $overtime = 0;
        if(!empty($request->get('out_at')) && !empty($request->get('in_at')) && !empty($request->get('employee_id'))){
            $total = Carbon::parse($request->get('out_at'))->diffInMinutes(Carbon::parse($request->get('in_at')));
            $employee = Employee::find($request->get('employee_id'));
            if($employee){
                $delay = Carbon::parse($employee->attendanceShift->start_at)->diffInMinutes(Carbon::parse($request->get('in_at')));
                $overtime = Carbon::parse($employee->attendanceShift->end_at)->diffInMinutes(Carbon::parse($request->get('out_at')));
            }
        }
        $request->merge([
            "user_id" => auth('web')->user()->id,
            "note_by" => !empty($request->get('note')) ? auth('web')->user()->id : null,
            "total" => $total/60,
            "delay" => $delay/60,
            "overtime" => $overtime/60,
            "source" => "HR"
        ]);

        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                'user_id' => 'nullable|exists:users,id',
                'employee_id' => 'sometimes|exists:employees,id',
                'department_id' => 'sometimes|exists:departments,id',
                'note_by' => 'nullable',
                'in_at' => ['required', 'before:out_at'],
                'out_at' => ['required', 'after:in_at'],
                'date' => ['required', 'date'],
                'source' => 'nullable|max:255|string',
                'delay' => 'nullable',
                'overtime' => 'nullable',
                'total' => 'nullable',
                'notes' => 'nullable|max:65535'
            ],
            message: __('EmployeeAttendance updated successfully'),
            redirect: 'admin.employee-attendances.index',
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return back();
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\EmployeeAttendance $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\TomatoPHP\TomatoHr\Models\EmployeeAttendance $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('EmployeeAttendance deleted successfully'),
            redirect: 'admin.employee-attendances.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return back();
    }
}
