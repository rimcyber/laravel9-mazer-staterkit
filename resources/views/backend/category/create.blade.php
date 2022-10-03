<x-app-layout>
    <x-card-input :icon="'menu-button-fill'" :title="'Create Categories'" :link_back="route('category.index')" :action="route('category.store')">
        <x-input-1column :label="'Name'" :name="'name'" :type="'text'" :value="old('name')"></x-input-1column>
        <x-text-area-full :label="'Description'" :name="'description'" :type="'text'" :value="old('description')">
        </x-text-area-full>
    </x-card-input>
</x-app-layout>
