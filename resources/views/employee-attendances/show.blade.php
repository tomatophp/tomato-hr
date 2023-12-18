<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.view')}} {{__('Employee Attendance')}} #{{$model->id}}">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

          <x-tomato-admin-row :label="__('User')" :value="$model->user?->name" type="text" />

          <x-tomato-admin-row :label="__('Employee')" :value="$model->employee?->full_name" type="text" />

          <x-tomato-admin-row :label="__('Department')" :value="$model->department?->name" type="text" />


          <x-tomato-admin-row :label="__('In At')" :value="$model->in_at" type="time" />
          <x-tomato-admin-row :label="__('Out At')" :value="$model->out_at" type="time" />

          <x-tomato-admin-row :label="__('Date')" :value="$model->date" type="date" />

          <x-tomato-admin-row :label="__('Source')" :value="$model->source" type="string" />

          <x-tomato-admin-row :label="__('Delay')" :value="$model->delay" type="number" />

          <x-tomato-admin-row :label="__('Overtime')" :value="$model->overtime" type="number" />

          <x-tomato-admin-row :label="__('Total')" :value="$model->total" type="number" />

          <x-tomato-admin-row :label="__('Notes')" :value="$model->notes" type="text" />

    </div>
    <div class="flex justify-start gap-2 pt-3">
        <x-tomato-admin-button warning label="{{__('Edit')}}" :href="route('admin.employee-attendances.edit', $model->id)"/>
        <x-tomato-admin-button danger :href="route('admin.employee-attendances.destroy', $model->id)"
                               confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                               confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                               confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                               cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                               method="delete"  label="{{__('Delete')}}" />
        <x-tomato-admin-button secondary type="button" @click.prevent="modal.close"  label="{{__('Cancel')}}"/>
    </div>
</x-tomato-admin-container>
