<?php


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class AttendanceShiftController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \TomatoPHP\TomatoHr\Models\AttendanceShift::class;
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
            view: 'tomato-hr::attendance-shifts.index',
            table: \TomatoPHP\TomatoHr\Tables\AttendanceShiftTable::class,
            filters: [
                'department_id'
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
            model: \TomatoPHP\TomatoHr\Models\AttendanceShift::class,
            filters: [
                'department_id'
            ]
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-hr::attendance-shifts.create',
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
            model: \TomatoPHP\TomatoHr\Models\AttendanceShift::class,
            validation: [
                'department_id' => 'nullable|exists:departments,id',
                'name' => 'required|max:255|string',
                'start_at' => 'required|string',
                'end_at' => 'required|string',
                'type' => 'nullable|max:255|string',
                'offs' => 'nullable|array',
                'is_activated' => 'nullable'
            ],
            message: __('AttendanceShift updated successfully'),
            redirect: 'admin.attendance-shifts.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\AttendanceShift $model
     * @return View|JsonResponse
     */
    public function show(\TomatoPHP\TomatoHr\Models\AttendanceShift $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-hr::attendance-shifts.show',
        );
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\AttendanceShift $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoHr\Models\AttendanceShift $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-hr::attendance-shifts.edit',
        );
    }

    /**
     * @param Request $request
     * @param \TomatoPHP\TomatoHr\Models\AttendanceShift $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \TomatoPHP\TomatoHr\Models\AttendanceShift $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                'department_id' => 'nullable|exists:departments,id',
                'name' => 'sometimes|max:255|string',
                'start_at' => 'sometimes|string',
                'end_at' => 'sometimes|string',
                'type' => 'nullable|max:255|string',
                'offs' => 'nullable',
                'is_activated' => 'nullable'
            ],
            message: __('AttendanceShift updated successfully'),
            redirect: 'admin.attendance-shifts.index',
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\AttendanceShift $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\TomatoPHP\TomatoHr\Models\AttendanceShift $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('AttendanceShift deleted successfully'),
            redirect: 'admin.attendance-shifts.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
