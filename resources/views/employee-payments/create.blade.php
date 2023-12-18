<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.create')}} {{__('Payment')}}">
    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.employee-payments.store')}}" method="post" :default="['type' => 'in', 'reason' => 'advance', 'date' => \Carbon\Carbon::now()->toDateTimeString()]">


        <div class="grid grid-cols-2 gap-4">
            <x-splade-select choices :label="__('Type')" name="type"  :placeholder="__('Type')">
                <option value="in">{{__('In')}}</option>
                <option value="out">{{__('Out')}}</option>
            </x-splade-select>
            <x-splade-select :label="__('Employee')" :placeholder="__('Employee')" name="employee_id" remote-url="/admin/employees/api" remote-root="data" option-label="full_name" option-value="id" choices/>
            <x-splade-input :label="__('Date')" :placeholder="__('Date')" name="date" date time="{ time_24hr: false }" />
            <x-splade-select choices :label="__('Reason')" name="reason" :placeholder="__('Reason')">
                <option value="advance">{{__('Advance')}}</option>
                <option value="custody">{{__('Custody')}}</option>
                <option value="deduction">{{__('Deduction')}}</option>
                <option value="reward">{{__('Reward')}}</option>
            </x-splade-select>
        </div>

        <x-splade-textarea :label="__('Description')" name="description" :placeholder="__('Description')" autosize />
        <x-splade-input :label="__('Total')" :placeholder="__('Total')" type='number' name="total" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button secondary :href="route('admin.employee-payments.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
