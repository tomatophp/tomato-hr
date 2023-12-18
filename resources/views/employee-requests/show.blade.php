<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.view')}} {{__('Employee Request')}} #{{$model->id}}">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

          <x-tomato-admin-row :label="__('Employee')" :value="$model->employee?->full_name" type="text" />

          <x-tomato-admin-row :label="__('User')" :value="$model->user?->name" type="text" />

          <x-tomato-admin-row :label="__('Type')" :value="$model->type" type="string" />

            @if($model->type === 'vacations')
              <x-tomato-admin-row :label="__('From')" :value="$model->from" type="text" />

              <x-tomato-admin-row :label="__('To')" :value="$model->to" type="text" />

            <x-tomato-admin-row :label="__('Total')" :value="$model->total" type="number" />

            @endif


            @if($model->type === 'advance')
                <x-tomato-admin-row :label="__('Amount')" :value="$model->amount" type="number" />
            @endif

          <x-tomato-admin-row :label="__('Request message')" :value="$model->request_message" type="text" />

          <x-tomato-admin-row :label="__('Request response')" :value="$model->request_response" type="text" />

          <x-tomato-admin-row :label="__('Status')" :value="$model->status" type="string" />

          <x-tomato-admin-row :label="__('Is activated')" :value="$model->is_activated" type="bool" />

          <x-tomato-admin-row :label="__('Is approved')" :value="$model->is_approved" type="bool" />

    </div>
    <div class="flex justify-start gap-2 pt-3">
        <x-tomato-admin-button warning label="{{__('Edit')}}" :href="route('admin.employee-requests.edit', $model->id)"/>
        <x-tomato-admin-button danger :href="route('admin.employee-requests.destroy', $model->id)"
                               confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                               confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                               confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                               cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                               method="delete"  label="{{__('Delete')}}" />
        <x-tomato-admin-button secondary :href="route('admin.employee-requests.index')" label="{{__('Cancel')}}"/>
    </div>
</x-tomato-admin-container>
