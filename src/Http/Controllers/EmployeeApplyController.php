<?php

namespace TomatoPHP\TomatoHr\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class EmployeeApplyController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \TomatoPHP\TomatoHr\Models\EmployeeApply::class;
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
            view: 'tomato-hr::employee-applies.index',
            table: \TomatoPHP\TomatoHr\Tables\EmployeeApplyTable::class
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
            model: \TomatoPHP\TomatoHr\Models\EmployeeApply::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-hr::employee-applies.create',
        );
    }

    /**
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $request->merge([
           "status" => "pending"
        ]);
        $response = Tomato::store(
            request: $request,
            model: \TomatoPHP\TomatoHr\Models\EmployeeApply::class,
            validation: [
                'first_name' => 'required|max:255|string',
                'last_name' => 'required|max:255|string',
                'address' => 'required|max:65535',
                'phone' => 'required|max:255|min:12',
                'email' => 'required|max:255|string|email',
                'birthday' => 'nullable',
                'id_type' => 'required|max:255|string',
                'id_number' => 'required|max:255|string',
                'education_type' => 'nullable|max:255|string',
                'university' => 'nullable|max:255|string',
                'college' => 'nullable|max:255|string',
                'department' => 'nullable|max:255|string',
                'position' => 'required|max:255|string',
                'hr_cover_letter' => 'nullable|max:65535',
                'has_insurance' => 'required',
                'insurance_number' => 'nullable|max:255|string',
                'explicated_salary' => 'required',
                'status' => 'required|max:255|string',
                'is_activated' => 'nullable'
            ],
            message: __('EmployeeApply updated successfully'),
            redirect: 'admin.employee-applies.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\EmployeeApply $model
     * @return View|JsonResponse
     */
    public function show(\TomatoPHP\TomatoHr\Models\EmployeeApply $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-hr::employee-applies.show',
        );
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\EmployeeApply $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoHr\Models\EmployeeApply $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-hr::employee-applies.edit',
        );
    }

    /**
     * @param Request $request
     * @param \TomatoPHP\TomatoHr\Models\EmployeeApply $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \TomatoPHP\TomatoHr\Models\EmployeeApply $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                'hr_approved_by' => 'nullable',
                'tech_approved_by' => 'nullable',
                'is_approved_by' => 'nullable',
                'first_name' => 'sometimes|max:255|string',
                'last_name' => 'sometimes|max:255|string',
                'address' => 'sometimes|max:65535',
                'phone' => 'sometimes|max:255|min:12',
                'email' => 'sometimes|max:255|string|email',
                'birthday' => 'nullable',
                'id_type' => 'sometimes|max:255|string',
                'id_number' => 'sometimes|max:255|string',
                'education_type' => 'nullable|max:255|string',
                'university' => 'nullable|max:255|string',
                'college' => 'nullable|max:255|string',
                'department' => 'nullable|max:255|string',
                'position' => 'sometimes|max:255|string',
                'hr_cover_letter' => 'nullable|max:65535',
                'has_insurance' => 'sometimes',
                'insurance_number' => 'nullable|max:255|string',
                'explicated_salary' => 'sometimes',
                'status' => 'sometimes|max:255|string',
                'hr_notes' => 'nullable|max:65535',
                'tech_notes' => 'nullable|max:65535',
                'is_activated' => 'nullable',
                'ready_for_interview' => 'nullable',
                'hr_approved' => 'nullable',
                'tech_approved' => 'nullable',
                'is_approved' => 'nullable'
            ],
            message: __('EmployeeApply updated successfully'),
            redirect: 'admin.employee-applies.index',
        );

        if($model->ready_for_interview){
            $model->status = "ready for interview";
            $model->save();
        }

        if($model->hr_approved){
            $model->hr_approved_by = auth('web')->user()->id;
            $model->status = "hr reviewed";
            $model->save();
        }

        if($model->tech_approved){
            $model->tech_approved_by = auth('web')->user()->id;
            $model->status = "tech reviewed";
            $model->save();
        }

        if($model->is_activated){
            $model->is_approved_by = auth('web')->user()->id;
            $model->status = "done";
            $model->save();
        }

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoHr\Models\EmployeeApply $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\TomatoPHP\TomatoHr\Models\EmployeeApply $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('EmployeeApply deleted successfully'),
            redirect: 'admin.employee-applies.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
