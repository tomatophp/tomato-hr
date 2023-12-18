<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.create')}} {{__('Department')}}">
    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.departments.store')}}" method="post">
        
          <x-splade-select :label="__('Company id')" :placeholder="__('Company id')" name="company_id" remote-url="/admin/companies/api" remote-root="data" option-label="name" option-value="id" choices/>
          
          <x-splade-input :label="__('Name')" name="name" type="text"  :placeholder="__('Name')" />
          <x-splade-input :label="__('Icon')" name="icon" type="icon"  :placeholder="__('Icon')" />
          <x-tomato-admin-color :label="__('Color')" :placeholder="__('Color')" type='number' name="color" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button secondary :href="route('admin.departments.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
