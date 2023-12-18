<x-tomato-admin-layout>
    <x-slot:header>
        {{ __('Employee Payroll') }}
    </x-slot:header>
    <x-slot:buttons>
        <x-tomato-admin-button :modal="true" :href="route('admin.employee-payrolls.create')" type="link">
            {{trans('tomato-admin::global.crud.create-new')}} {{__('Payroll')}}
        </x-tomato-admin-button>
    </x-slot:buttons>

    <div class="pb-12">
        <div class="mx-auto">
            <x-splade-table :for="$table" striped>
                <x-splade-cell total_time>
    <x-tomato-admin-row table type="number" :value="$item->total_time" />
</x-splade-cell>
<x-splade-cell offs_time>
    <x-tomato-admin-row table type="number" :value="$item->offs_time" />
</x-splade-cell>
<x-splade-cell overtime_time>
    <x-tomato-admin-row table type="number" :value="$item->overtime_time" />
</x-splade-cell>
<x-splade-cell delay_time>
    <x-tomato-admin-row table type="number" :value="$item->delay_time" />
</x-splade-cell>
<x-splade-cell out_date_payments>
    <x-tomato-admin-row table type="number" :value="$item->out_date_payments" />
</x-splade-cell>
<x-splade-cell subscription>
    <x-tomato-admin-row table type="number" :value="$item->subscription" />
</x-splade-cell>
<x-splade-cell tax>
    <x-tomato-admin-row table type="number" :value="$item->tax" />
</x-splade-cell>
<x-splade-cell total>
    <x-tomato-admin-row table type="number" :value="$item->total" />
</x-splade-cell>

                <x-splade-cell actions>
                    <div class="flex justify-start">
                        <x-tomato-admin-button success type="icon" title="{{trans('tomato-admin::global.crud.view')}}" modal :href="route('admin.employee-payrolls.show', $item->id)">
                            <x-heroicon-s-eye class="h-6 w-6"/>
                        </x-tomato-admin-button>
                        <x-tomato-admin-button warning type="icon" title="{{trans('tomato-admin::global.crud.edit')}}" modal :href="route('admin.employee-payrolls.edit', $item->id)">
                            <x-heroicon-s-pencil class="h-6 w-6"/>
                        </x-tomato-admin-button>
                        <x-tomato-admin-button danger type="icon" title="{{trans('tomato-admin::global.crud.delete')}}" :href="route('admin.employee-payrolls.destroy', $item->id)"
                           confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                           confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                           confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                           cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                           method="delete"
                        >
                            <x-heroicon-s-trash class="h-6 w-6"/>
                        </x-tomato-admin-button>
                    </div>
                </x-splade-cell>
            </x-splade-table>
        </div>
    </div>
</x-tomato-admin-layout>
