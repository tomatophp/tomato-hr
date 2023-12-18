<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.create')}} {{__('Attendance Shift')}}">
    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.attendance-shifts.store')}}" method="post" :default="['offs' => [], 'type'=>'master']">

          <x-splade-select :label="__('Department')" :placeholder="__('Department')" name="department_id" remote-url="/admin/departments/api" remote-root="data" option-label="name" option-value="id" choices/>
          <x-splade-input :label="__('Name')" name="name" type="text"  :placeholder="__('Name')" />
            <x-splade-select choices :label="__('Type')" name="type" type="text"  :placeholder="__('Type')">
                <option value="master">{{__('Master')}}</option>
                <option value="sub">{{__('Sub')}}</option>
            </x-splade-select>
          <div class="grid grid-cols-2 gap-4">
              <x-splade-input time="{ time_24hr: false }" :label="__('Start At')" name="start_at"  :placeholder="__('Start At')" />
              <x-splade-input time="{ time_24hr: false }" :label="__('End At')" name="end_at"   :placeholder="__('End At')" />
          </div>

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
            <x-tomato-admin-button secondary :href="route('admin.attendance-shifts.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
