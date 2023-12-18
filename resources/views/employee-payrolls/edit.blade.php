<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('Employee Payroll')}} #{{$model->id}}">
    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.employee-payrolls.update', $model->id)}}" method="post" :default="$model">

          <x-splade-select :label="__('User id')" :placeholder="__('User id')" name="user_id" remote-url="/admin/users/api" remote-root="data" option-label="name" option-value="id" choices/>
          <x-splade-select :label="__('Employee id')" :placeholder="__('Employee id')" name="employee_id" remote-url="/admin/employees/api" remote-root="data" option-label="name" option-value="id" choices/>
          <x-splade-input :label="__('Year')" name="year" type="text"  :placeholder="__('Year')" />
          <x-splade-input :label="__('Month')" name="month" type="text"  :placeholder="__('Month')" />
          <x-splade-input :label="__('Date')" :placeholder="__('Date')" name="date" date time="{ time_24hr: false }" />
          <x-splade-input :label="__('Total time')" :placeholder="__('Total time')" type='number' name="total_time" />
          <x-splade-input :label="__('Offs time')" :placeholder="__('Offs time')" type='number' name="offs_time" />
          <x-splade-input :label="__('Overtime time')" :placeholder="__('Overtime time')" type='number' name="overtime_time" />
          <x-splade-input :label="__('Delay time')" :placeholder="__('Delay time')" type='number' name="delay_time" />
          <x-splade-input :label="__('Out date payments')" :placeholder="__('Out date payments')" type='number' name="out_date_payments" />
          <x-splade-input :label="__('Subscription')" :placeholder="__('Subscription')" type='number' name="subscription" />
          <x-splade-input :label="__('Tax')" :placeholder="__('Tax')" type='number' name="tax" />
          <x-splade-input :label="__('Total')" :placeholder="__('Total')" type='number' name="total" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button danger :href="route('admin.employee-payrolls.destroy', $model->id)"
                                   confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                   confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                   confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                   cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                                   method="delete"  label="{{__('Delete')}}" />
            <x-tomato-admin-button secondary :href="route('admin.employee-payrolls.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
