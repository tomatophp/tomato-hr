<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.view')}} {{__('Employee Payroll')}} #{{$model->id}}">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

          <x-tomato-admin-row :label="__('User')" :value="$model->user?->name" type="text" />

          <x-tomato-admin-row :label="__('Employee')" :value="$model->employee?->full_name" type="text" />

          <x-tomato-admin-row :label="__('Year')" :value="$model->year" type="string" />

          <x-tomato-admin-row :label="__('Month')" :value="$model->month" type="string" />

          <x-tomato-admin-row :label="__('Date')" :value="$model->date" type="text" />

          <x-tomato-admin-row :label="__('Total time')" :value="$model->total_time" type="number" />

          <x-tomato-admin-row :label="__('Offs time')" :value="$model->offs_time" type="number" />

          <x-tomato-admin-row :label="__('Overtime time')" :value="$model->overtime_time" type="number" />

          <x-tomato-admin-row :label="__('Delay time')" :value="$model->delay_time" type="number" />

          <x-tomato-admin-row :label="__('Out date payments')" :value="$model->out_date_payments" type="number" />

          <x-tomato-admin-row :label="__('Subscription')" :value="$model->subscription" type="number" />

          <x-tomato-admin-row :label="__('Tax')" :value="$model->tax" type="number" />

          <x-tomato-admin-row :label="__('Total')" :value="$model->total" type="number" />

    </div>
    <div class="flex justify-start gap-2 pt-3">
        <x-tomato-admin-button warning label="{{__('Edit')}}" :href="route('admin.employee-payrolls.edit', $model->id)"/>
        <x-tomato-admin-button danger :href="route('admin.employee-payrolls.destroy', $model->id)"
                               confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                               confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                               confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                               cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                               method="delete"  label="{{__('Delete')}}" />
        <x-tomato-admin-button secondary :href="route('admin.employee-payrolls.index')" label="{{__('Cancel')}}"/>
    </div>
</x-tomato-admin-container>
