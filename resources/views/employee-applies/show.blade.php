<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.view')}} {{__('Employee Apply')}} #{{$model->id}}">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">




          <x-tomato-admin-row :label="__('First name')" :value="$model->first_name" type="string" />

          <x-tomato-admin-row :label="__('Last name')" :value="$model->last_name" type="string" />

          <x-tomato-admin-row :label="__('Address')" :value="$model->address" type="text" />

          <x-tomato-admin-row :label="__('Phone')" :value="$model->phone" type="tel" />

          <x-tomato-admin-row :label="__('Email')" :value="$model->email" type="email" />

          <x-tomato-admin-row :label="__('Birthday')" :value="$model->birthday" type="text" />

          <x-tomato-admin-row :label="__('Id type')" :value="$model->id_type" type="string" />

          <x-tomato-admin-row :label="__('Id number')" :value="$model->id_number" type="string" />

          <x-tomato-admin-row :label="__('Education type')" :value="$model->education_type" type="string" />

          <x-tomato-admin-row :label="__('University')" :value="$model->university" type="string" />

          <x-tomato-admin-row :label="__('College')" :value="$model->college" type="string" />

          <x-tomato-admin-row :label="__('Department')" :value="$model->department" type="string" />

          <x-tomato-admin-row :label="__('Position')" :value="$model->position" type="string" />

          <x-tomato-admin-row :label="__('Hr cover letter')" :value="$model->hr_cover_letter" type="text" />

          <x-tomato-admin-row :label="__('Has insurance')" :value="$model->has_insurance" type="bool" />

          <x-tomato-admin-row :label="__('Insurance number')" :value="$model->insurance_number" type="string" />

          <x-tomato-admin-row :label="__('Explicated salary')" :value="$model->explicated_salary" type="number" />

          <x-tomato-admin-row :label="__('Status')" :value="$model->status" type="string" />

          <x-tomato-admin-row :label="__('Hr notes')" :value="$model->hr_notes" type="text" />

          <x-tomato-admin-row :label="__('Tech notes')" :value="$model->tech_notes" type="text" />

          <x-tomato-admin-row :label="__('Is activated')" :value="$model->is_activated" type="bool" />

          <x-tomato-admin-row :label="__('Ready for interview')" :value="$model->ready_for_interview" type="bool" />

          <x-tomato-admin-row :label="__('Hr approved')" :value="$model->hr_approved" type="bool" />

          <x-tomato-admin-row :label="__('Tech approved')" :value="$model->tech_approved" type="bool" />

          <x-tomato-admin-row :label="__('Is approved')" :value="$model->is_approved" type="bool" />

    </div>
    <div class="flex justify-start gap-2 pt-3">
        <x-tomato-admin-button warning label="{{__('Edit')}}" :href="route('admin.employee-applies.edit', $model->id)"/>
        <x-tomato-admin-button danger :href="route('admin.employee-applies.destroy', $model->id)"
                               confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                               confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                               confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                               cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                               method="delete"  label="{{__('Delete')}}" />
        <x-tomato-admin-button secondary :href="route('admin.employee-applies.index')" label="{{__('Cancel')}}"/>
    </div>
</x-tomato-admin-container>
