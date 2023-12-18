<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.view')}} {{__('Payment')}} #{{$model->id}}">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

          <x-tomato-admin-row :label="__('User')" :value="$model->user?->name" type="text" />

          <x-tomato-admin-row :label="__('Employee')" :value="$model->employee?->full_name" type="text" />

          <x-tomato-admin-row :label="__('Date')" :value="$model->date" type="text" />

          <x-tomato-admin-row :label="__('Reason')" :value="$model->reason" type="string" />

          <x-tomato-admin-row :label="__('Type')" :value="$model->type" type="string" />

          <x-tomato-admin-row :label="__('Description')" :value="$model->description" type="text" />

          <x-tomato-admin-row :label="__('Total')" :value="$model->total" type="number" />

          <x-tomato-admin-row :label="__('Status')" :value="$model->status" type="string" />

          <x-tomato-admin-row :label="__('Is approved')" :value="$model->is_approved" type="bool" />

    </div>
    <div class="flex justify-start gap-2 pt-3">
        <x-tomato-admin-button warning label="{{__('Edit')}}" :href="route('admin.employee-payments.edit', $model->id)"/>
        <x-tomato-admin-button danger :href="route('admin.employee-payments.destroy', $model->id)"
                               confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                               confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                               confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                               cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                               method="delete"  label="{{__('Delete')}}" />
        <x-tomato-admin-button secondary :href="route('admin.employee-payments.index')" label="{{__('Cancel')}}"/>
    </div>
</x-tomato-admin-container>
