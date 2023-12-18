<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('Attendance Shift')}} #{{$model->id}}">
    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.attendance-shifts.update', $model->id)}}" method="post" :default="$model">

        <div class="grid grid-cols-2 gap-4">
            <x-splade-select  :label="__('Department')" :placeholder="__('Department')" name="department_id" remote-url="/admin/departments/api" remote-root="data" option-label="name" option-value="id" choices/>
            <x-splade-select :label="__('Employee')" v-bind:disabled="!form.department_id" :placeholder="__('Employee')" name="employee_id" remote-url="`/admin/employees/api?department_id=${form.department_id}`" remote-root="data" option-label="first_name" option-value="id" choices/>

            <x-splade-input time="{ time_24hr: false }"  :label="__('In at')" :placeholder="__('In at')" name="in_at" time />
            <x-splade-input time="{ time_24hr: false }"  :label="__('Out at')" :placeholder="__('Out at')" name="out_at" time />
        </div>

        <x-splade-input :label="__('Date')" :placeholder="__('Date')" name="date" date />

        <x-splade-textarea :label="__('Notes')" name="notes" :placeholder="__('Notes')" autosize />


        <x-tomato-admin-repeater label="{{__('Off Days')}}" name="offs" :options="['day']">
            <x-splade-select time :label="__('Off Day')" v-model="repeater.main[key].day"  :placeholder="__('Select Day')">
                <option value="saturday">{{__('Saturday')}}</option>
                <option value="sunday">{{__('Sunday')}}</option>
                <option value="monday">{{__('Monday')}}</option>
                <option value="tuesday">{{__('Tuesday')}}</option>
                <option value="wednesday">{{__('Wednesday')}}</option>
                <option value="thursday">{{__('Thursday')}}</option>
                <option value="friday">{{__('Friday')}}</option>
            </x-splade-select>
        </x-tomato-admin-repeater>

        <x-splade-checkbox :label="__('Is activated')" name="is_activated" label="Is activated" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button danger :href="route('admin.attendance-shifts.destroy', $model->id)"
                                   confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                   confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                   confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                   cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                                   method="delete"  label="{{__('Delete')}}" />
            <x-tomato-admin-button secondary :href="route('admin.attendance-shifts.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
