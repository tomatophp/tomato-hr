<?php


use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class EmployeeRequestController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \TomatoPHP\TomatoHr\Models\EmployeeRequest::class;
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
            view: 'tomato-hr::employee-requests.index',
            table: \TomatoPHP\TomatoHr\Tables\EmployeeRequestTable::class
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
            model: \TomatoPHP\TomatoHr\Models\EmployeeRequest::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-hr::employee-requests.create',
        );
    }

    /**
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $request->merge([
            'user_id' => auth('web')->user()->id
        ]);

        if($request->get('to') && $request->get('from')){
            $request->merge([
                'total' => Carbon::parse($request->get('to'))->diffInDays(Carbon::parse($request->get('from'))) +1
            ]);
        }
        $response = Tomato::store(
            request: $request,
            model: \TomatoPHP\TomatoHr\Models\EmployeeRequest::class,
            validation: [
                'employee_id' => 'required|exists:employees,id',
                'user_id' => 'nullable|exists:users,id',
                'request_by' => 'nullable',
                'type' => 'nullable|max:255|string',
                'from' => [function($attribute, $value, $fail) use ($request) {
                    if($request->get('type') === 'vacations' && empty($value)){
                        return $fail(__('From Date Is Required!'));
                    }
                }],
                'to' => [function($attribute, $value, $fail) use ($request) {
                    if($request->get('type') === 'vacations' && empty($value)){
                        return $fail(__('To Date Is Required!'));
                    }
                }],
                'amount' => [function($attribute, $value, $fail) use ($request) {
                    if($request->get('type') === 'advance' && empty($value)){
                        return $fail(__('Amount Is Required!'));
                    }
                }],
                'total' => 'nullable',
                'request_message' => 'required|max:65535',
                'request_response' => 'nullable|max:65535',
                'status' => 'nullable|max:255|string',
                'is_activated' => 'nullable',
                'is_approved' => 'nullable'
            ],
            message: __('EmployeeRequest updated successfully'),
            redirect: 'admin.employee-requests.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\EmployeeRequest $model
     * @return View|JsonResponse
     */
    public function show(\TomatoPHP\TomatoHr\Models\EmployeeRequest $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-hr::employee-requests.show',
        );
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\EmployeeRequest $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoHr\Models\EmployeeRequest $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-hr::employee-requests.edit',
        );
    }

    /**
     * @param Request $request
     * @param \TomatoPHP\TomatoHr\Models\EmployeeRequest $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \TomatoPHP\TomatoHr\Models\EmployeeRequest $model): RedirectResponse|JsonResponse
    {
        $request->merge([
            'user_id' => auth('web')->user()->id
        ]);

        if($request->get('to') && $request->get('from')){
            $request->merge([
                'total' => Carbon::parse($request->get('to'))->diffInDays(Carbon::parse($request->get('from'))) +1
            ]);
        }

        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                'employee_id' => 'sometimes|exists:employees,id',
                'user_id' => 'nullable|exists:users,id',
                'request_by' => 'nullable',
                'type' => 'nullable|max:255|string',
                'from' => [function($attribute, $value, $fail) use ($request) {
                    if($request->get('type') === 'vacations' && empty($value)){
                        return $fail(__('From Date Is Required!'));
                    }
                }],
                'to' => [function($attribute, $value, $fail) use ($request) {
                    if($request->get('type') === 'vacations' && empty($value)){
                        return $fail(__('To Date Is Required!'));
                    }
                }],
                'amount' => [function($attribute, $value, $fail) use ($request) {
                    if($request->get('type') === 'advance' && empty($value)){
                        return $fail(__('Amount Is Required!'));
                    }
                }],
                'total' => 'nullable',
                'request_message' => 'sometimes|max:65535',
                'request_response' => 'nullable|max:65535',
                'status' => 'nullable|max:255|string',
                'is_activated' => 'nullable',
                'is_approved' => 'nullable'
            ],
            message: __('EmployeeRequest updated successfully'),
            redirect: 'admin.employee-requests.index',
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\EmployeeRequest $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\TomatoPHP\TomatoHr\Models\EmployeeRequest $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('EmployeeRequest deleted successfully'),
            redirect: 'admin.employee-requests.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
