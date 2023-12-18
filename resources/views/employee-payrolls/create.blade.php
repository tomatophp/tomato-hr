<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.create')}} {{__('Employee Payroll')}}">
    <x-splade-form :default="['date' => \Carbon\Carbon::now()->toDateTimeString()]" class="flex flex-col space-y-4" action="{{route('admin.employee-payrolls.store')}}" method="post">

          <x-splade-select :label="__('Employee')" :placeholder="__('Employee')" name="employee_id" remote-url="/admin/employees/api" remote-root="data" option-label="full_name" option-value="id" choices/>
          <x-splade-input :label="__('Date')" :placeholder="__('Date')" name="date" date time="{ time_24hr: false }" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button secondary :href="route('admin.employee-payrolls.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
