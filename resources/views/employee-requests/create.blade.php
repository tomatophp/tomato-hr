<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.create')}} {{__('Employee Request')}}">
    <x-splade-form :default="['type' => 'vacations']" class="flex flex-col space-y-4" action="{{route('admin.employee-requests.store')}}" method="post">

        <div class="grid grid-cols-2 gap-4">
            <x-splade-select :label="__('Employee')" :placeholder="__('Employee')" name="employee_id" remote-url="/admin/employees/api" remote-root="data" option-label="full_name" option-value="id" choices/>
            <x-splade-select choices :label="__('Type')" name="type"   :placeholder="__('Type')">
                <option value="vacations">{{__('Vacations')}}</option>
                <option value="advance">{{__('Advance')}}</option>
                <option value="complaint">{{__('Complaint')}}</option>
            </x-splade-select>

            <x-splade-input v-show="form.type === 'vacations'" :label="__('From')" :placeholder="__('From')" name="from" date time="{ time_24hr: false }" />
            <x-splade-input v-show="form.type === 'vacations'" :label="__('To')" :placeholder="__('To')" name="to" date time="{ time_24hr: false }" />
        </div>

          <x-splade-input v-show="form.type === 'advance'" name="amount" :label="__('Amount')" type="number" :placeholder="__('Amount')" />
          <x-splade-textarea :label="__('Request message')" name="request_message" :placeholder="__('Request message')" autosize/>
          <x-splade-checkbox :label="__('Is activated')" name="is_activated" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button secondary :href="route('admin.employee-requests.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
