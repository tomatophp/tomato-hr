<x-tomato-admin-layout>
    <x-slot:header>
        {{ __('Employee Apply') }}
    </x-slot:header>
    <x-slot:buttons>
        <x-tomato-admin-button :modal="true" :href="route('admin.employee-applies.create')" type="link">
            {{trans('tomato-admin::global.crud.create-new')}} {{__('Apply')}}
        </x-tomato-admin-button>
    </x-slot:buttons>

    <div class="pb-12">
        <div class="mx-auto">
            <x-splade-table :for="$table" striped>
                <x-splade-cell phone>
    <x-tomato-admin-row table type="tel" :value="$item->phone" />
</x-splade-cell>
<x-splade-cell email>
    <x-tomato-admin-row table type="email" :value="$item->email" />
</x-splade-cell>
<x-splade-cell has_insurance>
    <x-tomato-admin-row table type="bool" :value="$item->has_insurance" />
</x-splade-cell>
<x-splade-cell explicated_salary>
    <x-tomato-admin-row table type="number" :value="$item->explicated_salary" />
</x-splade-cell>
<x-splade-cell is_activated>
    <x-tomato-admin-row table type="bool" :value="$item->is_activated" />
</x-splade-cell>
<x-splade-cell ready_for_interview>
    <x-tomato-admin-row table type="bool" :value="$item->ready_for_interview" />
</x-splade-cell>
<x-splade-cell hr_approved>
    <x-tomato-admin-row table type="bool" :value="$item->hr_approved" />
</x-splade-cell>
<x-splade-cell tech_approved>
    <x-tomato-admin-row table type="bool" :value="$item->tech_approved" />
</x-splade-cell>
<x-splade-cell is_approved>
    <x-tomato-admin-row table type="bool" :value="$item->is_approved" />
</x-splade-cell>

                <x-splade-cell actions>
                    <div class="flex justify-start">
                        <x-tomato-admin-button success type="icon" title="{{trans('tomato-admin::global.crud.view')}}" modal :href="route('admin.employee-applies.show', $item->id)">
                            <x-heroicon-s-eye class="h-6 w-6"/>
                        </x-tomato-admin-button>
                        <x-tomato-admin-button warning type="icon" title="{{trans('tomato-admin::global.crud.edit')}}" modal :href="route('admin.employee-applies.edit', $item->id)">
                            <x-heroicon-s-pencil class="h-6 w-6"/>
                        </x-tomato-admin-button>
                        <x-tomato-admin-button danger type="icon" title="{{trans('tomato-admin::global.crud.delete')}}" :href="route('admin.employee-applies.destroy', $item->id)"
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
