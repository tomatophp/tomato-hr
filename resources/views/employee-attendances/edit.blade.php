<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('Employee Attendance')}} #{{$model->id}}">
    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.employee-attendances.update', $model->id)}}" method="post" :default="$model">

        <div class="grid grid-cols-2 gap-4">
            <x-splade-select  :label="__('Department')" :placeholder="__('Department')" name="department_id" remote-url="/admin/departments/api" remote-root="data" option-label="name" option-value="id" choices/>
            <x-splade-select :label="__('Employee')" v-bind:disabled="!form.department_id" :placeholder="__('Employee')" name="employee_id" remote-url="`/admin/employees/api?department_id=${form.department_id}`" remote-root="data" option-label="full_name" option-value="id" choices/>

            <x-splade-input time="{ time_24hr: false }"  :label="__('In at')" :placeholder="__('In at')" name="in_at" />
            <x-splade-input time="{ time_24hr: false }"  :label="__('Out at')" :placeholder="__('Out at')" name="out_at" />
        </div>

        <x-splade-input :label="__('Date')" :placeholder="__('Date')" name="date" date />

        <x-splade-textarea :label="__('Notes')" name="notes" :placeholder="__('Notes')" autosize />


        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button danger :href="route('admin.employee-attendances.destroy', $model->id)"
                                   confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                   confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                   confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                   cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                                   method="delete"  label="{{__('Delete')}}" />
            <x-tomato-admin-button secondary type="button" @click.prevent="modal.close" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
