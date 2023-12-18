<?php


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class EmployeeMetaController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \TomatoPHP\TomatoHr\Models\EmployeeMeta::class;
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
            view: 'tomato-hr::employee-metas.index',
            table: \TomatoPHP\TomatoHr\Tables\EmployeeMetaTable::class
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
            model: \TomatoPHP\TomatoHr\Models\EmployeeMeta::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-hr::employee-metas.create',
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
            model: \TomatoPHP\TomatoHr\Models\EmployeeMeta::class,
            validation: [
                            'employee_id' => 'required|exists:employees,id',
            'key' => 'required|max:255|string',
            'value' => 'nullable',
            'type' => 'nullable|max:255|string',
            'group' => 'nullable|max:255|string'
            ],
            message: __('EmployeeMeta updated successfully'),
            redirect: 'admin.employee-metas.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\EmployeeMeta $model
     * @return View|JsonResponse
     */
    public function show(\TomatoPHP\TomatoHr\Models\EmployeeMeta $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-hr::employee-metas.show',
        );
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\EmployeeMeta $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoHr\Models\EmployeeMeta $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-hr::employee-metas.edit',
        );
    }

    /**
     * @param Request $request
     * @param \TomatoPHP\TomatoHr\Models\EmployeeMeta $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \TomatoPHP\TomatoHr\Models\EmployeeMeta $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                            'employee_id' => 'sometimes|exists:employees,id',
            'key' => 'sometimes|max:255|string',
            'value' => 'nullable',
            'type' => 'nullable|max:255|string',
            'group' => 'nullable|max:255|string'
            ],
            message: __('EmployeeMeta updated successfully'),
            redirect: 'admin.employee-metas.index',
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\EmployeeMeta $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\TomatoPHP\TomatoHr\Models\EmployeeMeta $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('EmployeeMeta deleted successfully'),
            redirect: 'admin.employee-metas.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
