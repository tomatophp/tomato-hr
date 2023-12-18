<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('Employee')}} #{{$model->id}}">
    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.employees.update', $model->id)}}" method="post" :default="$model">
        <div class="grid grid-cols-3 gap-4">
            <x-splade-file filepond preview class="col-span-3" name="avatar" label="{{__('Avatar Image')}}" />
            <x-splade-file filepond preview multiple class="col-span-3" name="documents[]" label="{{__('Documents')}}" />

            <x-splade-select class="col-span-2" :label="__('Department')" :placeholder="__('Department')" name="department_id" remote-url="/admin/departments/api" remote-root="data" option-label="name" option-value="id" choices/>
            <x-splade-select class="col-span-1" :label="__('Attendance shift')" v-bind:disabled="!form.department_id" :placeholder="__('Attendance shift')" name="attendance_shift_id" remote-url="`/admin/attendance-shifts/api?department_id=${form.department_id}`" remote-root="data" option-label="name" option-value="id" choices/>
            <x-splade-input :label="__('First name')" name="first_name" type="text"  :placeholder="__('First name')" />
            <x-splade-input :label="__('Middle name')" name="middle_name" type="text"  :placeholder="__('Middle name')" />
            <x-splade-input :label="__('Last name')" name="last_name" type="text"  :placeholder="__('Last name')" />

            <x-splade-input :label="__('Position')" name="position" type="text"  :placeholder="__('Position')" />
            <x-splade-input :label="__('Email')" name="email" type="email"  :placeholder="__('Email')" />
            <x-splade-input :label="__('Phone')" :placeholder="__('Phone')" type='tel' name="phone" />

            <x-splade-input :label="__('Nationality')" name="nationality" type="text"  :placeholder="__('Nationality')" />
            <x-splade-select choices :label="__('National id type')" name="national_id_type" :placeholder="__('National id type')" >
                <option value="national_id">{{__('National ID')}}</option>
                <option value="passport">{{__('Passport')}}</option>
            </x-splade-select>
            <x-splade-input :label="__('National id')" name="national_id" type="text"  :placeholder="__('National id')" />


            <x-splade-textarea class="col-span-3" :label="__('Address')" name="address" :placeholder="__('Address')" autosize />


            <x-splade-input  :label="__('Salary')" :placeholder="__('Salary')" type='number' name="salary" />
            <x-splade-input :label="__('Contract start')" :placeholder="__('Contract start')" name="contract_start" date />
            <x-splade-input :label="__('Contract end')" :placeholder="__('Contract end')" name="contract_end" date />
            <x-splade-input :label="__('Salary subscription')" :placeholder="__('Salary subscription')" type='number' name="salary_subscription" />
            <x-splade-input :label="__('Salary tax')" :placeholder="__('Salary tax')" type='number' name="salary_tax" />
            <x-splade-input :label="__('Salary period')" name="salary_period" type="text"  :placeholder="__('Salary period')" />


            <x-splade-checkbox class="col-span-3" :label="__('Has education')" name="has_education" label="Has education" />
            <div v-if="form.has_education" class="col-span-3 grid grid-cols-4 gap-4">
                <x-splade-input :label="__('Education type')" name="education_type" type="text"  :placeholder="__('Education type')" />
                <x-splade-input :label="__('University')" name="university" type="text"  :placeholder="__('University')" />
                <x-splade-input :label="__('College')" name="college" type="text"  :placeholder="__('College')" />
                <x-splade-input :label="__('Department')" name="department" type="text"  :placeholder="__('Department')" />
            </div>
            <x-splade-checkbox class="col-span-3" :label="__('Has bank account')" name="has_bank_account" label="Has bank account" />
            <div v-if="form.has_bank_account" class="col-span-3 grid grid-cols-2 gap-4">
                <x-splade-input :label="__('Bank name')" name="bank_name" type="text"  :placeholder="__('Bank name')" />
                <x-splade-input :label="__('Bank branch')" name="bank_branch" type="text"  :placeholder="__('Bank branch')" />
                <x-splade-input :label="__('Bank iban')" name="bank_iban" type="text"  :placeholder="__('Bank iban')" />
                <x-splade-input :label="__('Bank swift')" name="bank_swift" type="text"  :placeholder="__('Bank swift')" />
                <x-splade-input :label="__('Bank account')" class="col-span-2" name="bank_account" type="text"  :placeholder="__('Bank account')" />
            </div>

            <x-splade-checkbox class="col-span-3" :label="__('Has links')" name="has_links" label="Has links" />
            <div class="col-span-3" v-if="form.has_links">
                <x-tomato-admin-repeater name="links" :options="['name','link']">
                    <x-splade-input :label="__('Name')" v-model="repeater.main[key].name"  :placeholder="__('Name')" />
                    <x-splade-input :label="__('Link')" v-model="repeater.main[key].link"  :placeholder="__('Link')" />
                </x-tomato-admin-repeater>
            </div>

            <x-splade-checkbox class="col-span-3" :label="__('Has insurance')" name="has_insurance" label="Has insurance" />
            <x-splade-input v-if="form.has_insurance" class="col-span-3" :label="__('Insurance number')" name="insurance_number" type="text"  :placeholder="__('Insurance number')" />
            <x-splade-checkbox class="col-span-3" :label="__('Has medical insurance')" name="has_medical_insurance" label="Has medical insurance" />
            <div v-if="form.has_medical_insurance" class="col-span-3 flex flex-col gap-4">
                <x-splade-input :label="__('Medical insurance company')" name="medical_insurance_company" type="text"  :placeholder="__('Medical insurance company')" />
                <x-splade-input :label="__('Medical insurance number')" name="medical_insurance_number" type="text"  :placeholder="__('Medical insurance number')" />
            </div>
            <x-splade-checkbox class="col-span-3" :label="__('Can login')" name="can_login" label="Can login" />
            <div v-if="form.can_login" class="col-span-3  flex flex-col gap-4">
                <x-splade-input class="col-span-3" :label="__('Password')" name="password" type="password"  :placeholder="__('Password')" />
                <x-splade-input class="col-span-3" name="password_confirmation" :label="__('Password Confirmation')" type="password"  :placeholder="__('Password Confirmation')" />
            </div>
            <x-splade-checkbox class="col-span-3" :label="__('Has user')" name="has_user" label="Has user" />
            <x-splade-select v-if="form.has_user" class="col-span-3" :label="__('User')" :placeholder="__('User')" name="user_id" remote-url="/admin/users/api" remote-root="data" option-label="name" option-value="id" choices/>
            <x-splade-checkbox class="col-span-3" :label="__('Is activated')" name="is_activated" label="Is activated" />
        </div>

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button danger :href="route('admin.employees.destroy', $model->id)"
                                   confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                   confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                   confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                   cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                                   method="delete"  label="{{__('Delete')}}" />
            <x-tomato-admin-button secondary :href="route('admin.employees.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
