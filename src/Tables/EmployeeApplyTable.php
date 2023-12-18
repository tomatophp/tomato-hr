<?php

namespace TomatoPHP\TomatoHr\Tables;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class EmployeeApplyTable extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct(public mixed $query=null)
    {
        if(!$query){
            $this->query = \TomatoPHP\TomatoHr\Models\EmployeeApply::query();
        }
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return $this->query;
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(
                label: trans('tomato-admin::global.search'),
                columns: ['id','phone','email',]
            )
            ->bulkAction(
                label: trans('tomato-admin::global.crud.delete'),
                each: fn (\TomatoPHP\TomatoHr\Models\EmployeeApply $model) => $model->delete(),
                after: fn () => Toast::danger(__('EmployeeApply Has Been Deleted'))->autoDismiss(2),
                confirm: true
            )
            ->defaultSort('id', 'desc')
            ->column(
                key: 'id',
                label: __('Id'),
                sortable: true
            )
            ->column(
                key: 'approvedBy.name',
                label: __('Is approved by'),
                sortable: true
            )
            ->column(
                key: 'first_name',
                label: __('First name'),
                sortable: true
            )
            ->column(
                key: 'last_name',
                label: __('Last name'),
                sortable: true
            )
            ->column(
                key: 'phone',
                label: __('Phone'),
                sortable: true
            )
            ->column(
                key: 'email',
                label: __('Email'),
                sortable: true
            )
            ->column(
                key: 'position',
                label: __('Position'),
                sortable: true
            )
            ->column(
                key: 'explicated_salary',
                label: __('Explicated salary'),
                sortable: true
            )
            ->column(
                key: 'status',
                label: __('Status'),
                sortable: true
            )
            ->column(
                key: 'is_activated',
                label: __('Is activated'),
                sortable: true
            )
            ->column(
                key: 'ready_for_interview',
                label: __('Ready for interview'),
                sortable: true
            )
            ->column(
                key: 'hr_approved',
                label: __('Hr approved'),
                sortable: true
            )
            ->column(
                key: 'tech_approved',
                label: __('Tech approved'),
                sortable: true
            )
            ->column(
                key: 'is_approved',
                label: __('Is approved'),
                sortable: true
            )
            ->column(key: 'actions',label: trans('tomato-admin::global.crud.actions'))
            ->export()
            ->paginate(10);
    }
}
