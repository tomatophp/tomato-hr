<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.create')}} {{__('Employee Apply')}}">
    <x-splade-form :default="['id_type' => 'national_id', 'education_type'=> 'university']" class="flex flex-col space-y-4" action="{{route('admin.employee-applies.store')}}" method="post">
        <div class="grid gird-cols-2 gap-4">
            <x-splade-input :label="__('First name')" name="first_name" type="text"  :placeholder="__('First name')" />
            <x-splade-input :label="__('Last name')" name="last_name" type="text"  :placeholder="__('Last name')" />
            <x-splade-input  :label="__('Phone')" :placeholder="__('Phone')" type='tel' name="phone" />
            <x-splade-input :label="__('Email')" name="email" type="email"  :placeholder="__('Email')" />
            <x-splade-textarea class="col-span-2" :label="__('Address')" name="address" :placeholder="__('Address')" autosize />
            <x-splade-select choices :label="__('Id type')" name="id_type" type="text"  :placeholder="__('Id type')">
                <option value="national_id">{{__('National ID')}}</option>
                <option value="passport">{{__('Passport')}}</option>
            </x-splade-select>
            <x-splade-input :label="__('Id number')" name="id_number" type="text"  :placeholder="__('Id number')" />
            <x-splade-input :label="__('Birthday')" :placeholder="__('Birthday')" name="birthday" date />
            <x-splade-input :label="__('Position')" name="position" type="text"  :placeholder="__('Position')" />
            <x-splade-select class="col-span-2" choices :label="__('Education type')" name="education_type" type="text"  :placeholder="__('Education type')">
                <option value="primary">{{__('Primary')}}</option>
                <option value="secondary">{{__('Secondary')}}</option>
                <option value="higher">{{__('Higher')}}</option>
                <option value="university">{{__('University')}}</option>
            </x-splade-select>
            <x-splade-input class="col-span-2" v-if="form.education_type === 'university'" :label="__('University')" name="university" type="text"  :placeholder="__('University')" />
            <x-splade-input v-if="form.education_type === 'university'"  :label="__('College')" name="college" type="text"  :placeholder="__('College')" />
            <x-splade-input v-if="form.education_type === 'university'"  :label="__('Department')" name="department" type="text"  :placeholder="__('Department')" />
            <x-splade-input class="col-span-2" :label="__('Explicated salary')" :placeholder="__('Explicated salary')" type='number' name="explicated_salary" />

        </div>
        <x-splade-checkbox :label="__('Has insurance')" name="has_insurance" label="Has insurance" />
        <x-splade-input v-if="form.has_insurance" :label="__('Insurance number')" name="insurance_number" type="text"  :placeholder="__('Insurance number')" />

        <x-splade-textarea :label="__('Hr cover letter')" name="hr_cover_letter" :placeholder="__('Hr cover letter')" autosize />
        <x-splade-checkbox :label="__('Is activated')" name="is_activated" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button secondary :href="route('admin.employee-applies.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
