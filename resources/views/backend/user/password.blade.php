<x-app-layout>
    <x-card-input-update :icon="'person-fill'" :title="'Change User Password'" :link_back="route('users.index')" :action="route('users.passwordUpdate', $user->id)">
        <div class="row">
            <div class="col-6 mb-4">
                <h5>Nama : {{ $user->name }}</h5>
            </div>
            <div class="col-6 mb-4">
                <h5>Email : {{ $user->email }}</h5>
            </div>
        </div>
        <x-input-2column :label="'Password'" :name="'password'" :type="'password'" :value="''"></x-input-2column>
        <x-input-2column :label="'Confirm Password'" :name="'confpassword'" :type="'password'" :value="''"></x-input-2column>
    </x-card-input-update>
</x-app-layout>
