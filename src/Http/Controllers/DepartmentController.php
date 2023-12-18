<?php


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class DepartmentController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \TomatoPHP\TomatoHr\Models\Department::class;
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
            view: 'tomato-hr::departments.index',
            table: \TomatoPHP\TomatoHr\Tables\DepartmentTable::class
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
            model: \TomatoPHP\TomatoHr\Models\Department::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-hr::departments.create',
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
            model: \TomatoPHP\TomatoHr\Models\Department::class,
            validation: [
                            'company_id' => 'nullable|exists:companies,id',
            'department_head_id' => 'nullable',
            'name' => 'required|max:255|string',
            'icon' => 'nullable|max:255',
            'color' => 'nullable|max:255'
            ],
            message: __('Department updated successfully'),
            redirect: 'admin.departments.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\Department $model
     * @return View|JsonResponse
     */
    public function show(\TomatoPHP\TomatoHr\Models\Department $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-hr::departments.show',
        );
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\Department $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoHr\Models\Department $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-hr::departments.edit',
        );
    }

    /**
     * @param Request $request
     * @param \TomatoPHP\TomatoHr\Models\Department $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \TomatoPHP\TomatoHr\Models\Department $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                            'company_id' => 'nullable|exists:companies,id',
            'department_head_id' => 'nullable',
            'name' => 'sometimes|max:255|string',
            'icon' => 'nullable|max:255',
            'color' => 'nullable|max:255'
            ],
            message: __('Department updated successfully'),
            redirect: 'admin.departments.index',
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\Department $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\TomatoPHP\TomatoHr\Models\Department $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('Department deleted successfully'),
            redirect: 'admin.departments.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
