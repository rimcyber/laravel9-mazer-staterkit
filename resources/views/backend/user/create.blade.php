<x-app-layout>
    <x-card-input :icon="'person-fill'" :title="'Create User'" :link_back="route('users.index')" :action="route('users.store')">
        <x-input-2column :label="'User Name'" :name="'username'" :type="'text'" :value="old('username')"></x-input-2column>
        <x-input-2column :label="'Email'" :name="'email'" :type="'text'" :value="old('email')"></x-input-2column>
        <x-input-2column :label="'Password'" :name="'password'" :type="'password'" :value="old('password')"></x-input-2column>
        <x-input-2column :label="'Confirm Password'" :name="'confpassword'" :type="'password'" :value="old('confpassword')"></x-input-2column>
    </x-card-input>
</x-app-layout>
