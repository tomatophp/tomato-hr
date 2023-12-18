<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.view')}} {{__('Employee')}} #{{$model->id}}">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

        <x-tomato-admin-row :label="__('Avatar')" :value="$model->getMedia('avatar')->first()?->getUrl()" type="image"/>

        @foreach($model->getMedia('documents') as $key=>$doc)
            <x-tomato-admin-row :label="__('File') . '[' .$key. ']'" :value="$doc->getUrl()" type="image"/>
        @endforeach
        <x-tomato-admin-row :label="__('Department')" :value="$model->departmentHr?->name" type="text"/>

        <x-tomato-admin-row :label="__('Attendance shift')" :value="$model->attendanceShift?->name" type="text"/>


        <x-tomato-admin-row :label="__('First name')" :value="$model->first_name" type="string"/>

        <x-tomato-admin-row :label="__('Middle name')" :value="$model->middle_name" type="string"/>

        <x-tomato-admin-row :label="__('Last name')" :value="$model->last_name" type="string"/>

        <x-tomato-admin-row :label="__('Balance')" :value="$model->balance" type="number"/>
        <x-tomato-admin-row :label="__('Position')" :value="$model->position" type="string"/>

        <x-tomato-admin-row :label="__('Email')" :value="$model->email" type="email"/>

        <x-tomato-admin-row :label="__('Phone')" :value="$model->phone" type="tel"/>

        <x-tomato-admin-row :label="__('Address')" :value="$model->address" type="text"/>

        <x-tomato-admin-row :label="__('Has education')" :value="$model->has_education" type="bool"/>

        <x-tomato-admin-row :label="__('Education type')" :value="$model->education_type" type="string"/>

        <x-tomato-admin-row :label="__('University')" :value="$model->university" type="string"/>

        <x-tomato-admin-row :label="__('College')" :value="$model->college" type="string"/>

        <x-tomato-admin-row :label="__('Department')" :value="$model->department" type="string"/>

        <x-tomato-admin-row :label="__('Nationality')" :value="$model->nationality" type="string"/>

        <x-tomato-admin-row :label="__('National id type')" :value="$model->national_id_type" type="string"/>

        <x-tomato-admin-row :label="__('National id')" :value="$model->national_id" type="string"/>

        <x-tomato-admin-row :label="__('Salary')" :value="$model->salary" type="number"/>

        <x-tomato-admin-row :label="__('Contract start')" :value="$model->contract_start" type="text"/>

        <x-tomato-admin-row :label="__('Contract end')" :value="$model->contract_end" type="text"/>

        <x-tomato-admin-row :label="__('Salary subscription')" :value="$model->salary_subscription" type="number"/>

        <x-tomato-admin-row :label="__('Salary tax')" :value="$model->salary_tax" type="number"/>

        <x-tomato-admin-row :label="__('Salary period')" :value="$model->salary_period" type="string"/>

        <x-tomato-admin-row :label="__('Has bank account')" :value="$model->has_bank_account" type="bool"/>

        <x-tomato-admin-row :label="__('Bank name')" :value="$model->bank_name" type="string"/>

        <x-tomato-admin-row :label="__('Bank branch')" :value="$model->bank_branch" type="string"/>

        <x-tomato-admin-row :label="__('Bank iban')" :value="$model->bank_iban" type="string"/>

        <x-tomato-admin-row :label="__('Bank swift')" :value="$model->bank_swift" type="string"/>

        <x-tomato-admin-row :label="__('Bank account')" :value="$model->bank_account" type="string"/>

        <x-tomato-admin-row :label="__('Has insurance')" :value="$model->has_insurance" type="bool"/>

        <x-tomato-admin-row :label="__('Insurance number')" :value="$model->insurance_number" type="string"/>

        <x-tomato-admin-row :label="__('Has medical insurance')" :value="$model->has_medical_insurance" type="bool"/>

        <x-tomato-admin-row :label="__('Medical insurance company')" :value="$model->medical_insurance_company"
                            type="string"/>

        <x-tomato-admin-row :label="__('Medical insurance number')" :value="$model->medical_insurance_number"
                            type="string"/>

        <x-tomato-admin-row :label="__('Can login')" :value="$model->can_login" type="bool"/>

        <x-tomato-admin-row :label="__('Last payment')" :value="$model->last_payment" type="text"/>

        <x-tomato-admin-row :label="__('Vacations')" :value="$model->vacations" type="number"/>

        <x-tomato-admin-row :label="__('Has user')" :value="$model->has_user" type="bool"/>

        <x-tomato-admin-row :label="__('User')" :value="$model->user?->name" type="text"/>

        <x-tomato-admin-row :label="__('Has links')" :value="$model->has_links" type="bool"/>


        <x-tomato-admin-row :label="__('Is activated')" :value="$model->is_activated" type="bool"/>

        <x-tomato-admin-relations-group :relations="[
            'employeeAttendances' => __('Attendances'),
            'employeePayments' => __('Payments'),
            'employeePayrolls' => __('Payrolls'),
            'employeeRequests' => __('Requests')
        ]">
            <x-tomato-admin-relations
                name="employeeAttendances"
                :model="$model"
                :table="\Tomatophp\TomatoHr\Tables\EmployeeAttendanceTable::class"
                view="tomato-hr::employee-attendances.table"
            />
            <x-tomato-admin-relations
                name="employeePayments"
                :model="$model"
                :table="\Tomatophp\TomatoHr\Tables\EmployeePaymentTable::class"
                view="tomato-hr::employee-payments.table"
            />
            <x-tomato-admin-relations
                name="employeePayrolls"
                :model="$model"
                :table="\Tomatophp\TomatoHr\Tables\EmployeePayrollTable::class"
                view="tomato-hr::employee-payrolls.table"
            />
            <x-tomato-admin-relations
                name="employeeRequests"
                :model="$model"
                :table="\Tomatophp\TomatoHr\Tables\EmployeeRequestTable::class"
                view="tomato-hr::employee-requests.table"
            />
        </x-tomato-admin-relations-group>

    </div>
    <div class="flex justify-start gap-2 pt-3">
        <x-tomato-admin-button warning label="{{__('Edit')}}" :href="route('admin.employees.edit', $model->id)"/>
        <x-tomato-admin-button danger :href="route('admin.employees.destroy', $model->id)"
                               confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                               confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                               confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                               cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                               method="delete" label="{{__('Delete')}}"/>
        <x-tomato-admin-button secondary :href="route('admin.employees.index')" label="{{__('Cancel')}}"/>
    </div>
</x-tomato-admin-container>
