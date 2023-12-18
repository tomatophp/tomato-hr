<?php

namespace TomatoPHP\TomatoHr\Tables;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class EmployeeAttendanceTable extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct(public mixed $query=null)
    {
        if(!$query){
            $this->query = \TomatoPHP\TomatoHr\Models\EmployeeAttendance::query();
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
                columns: ['id',]
            )
            ->bulkAction(
                label: trans('tomato-admin::global.crud.delete'),
                each: fn (\TomatoPHP\TomatoHr\Models\EmployeeAttendance $model) => $model->delete(),
                after: fn () => Toast::danger(__('EmployeeAttendance Has Been Deleted'))->autoDismiss(2),
                confirm: true
            )
            ->defaultSort('id', 'desc')
            ->column(
                key: 'id',
                label: __('Id'),
                sortable: true
            )
            ->column(
                key: 'user.name',
                label: __('HR'),
                sortable: true
            )
            ->column(
                key: 'employee.full_name',
                label: __('Employee'),
                sortable: true
            )
            ->column(
                key: 'department.name',
                label: __('Department'),
                sortable: true
            )
            ->column(
                key: 'date',
                label: __('Date'),
                sortable: true
            )
            ->column(
                key: 'in_at',
                label: __('In at'),
                sortable: true
            )
            ->column(
                key: 'out_at',
                label: __('Out at'),
                sortable: true
            )
            ->column(
                key: 'delay',
                label: __('Delay'),
                sortable: true
            )
            ->column(
                key: 'overtime',
                label: __('Overtime'),
                sortable: true
            )
            ->column(
                key: 'total',
                label: __('Total'),
                sortable: true
            )
            ->column(key: 'actions',label: trans('tomato-admin::global.crud.actions'))
            ->export()
            ->paginate(10);
    }
}
