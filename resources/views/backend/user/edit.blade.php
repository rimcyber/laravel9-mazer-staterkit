<x-app-layout>
    <x-card-input-update :icon="'person-fill'" :title="'Edit User'" :link_back="route('users.index')" :action="route('users.update', $user->id)">
        <x-input-2column :label="'User Name'" :name="'username'" :type="'text'" :value="old('username', $user->username)"></x-input-2column>
        <x-input-2column :label="'Email'" :name="'email'" :type="'text'" :value="old('email', $user->email)"></x-input-2column>
        <div class="col-sm-6 mb-4">
            <label>Change Password</label>
            <a href="{{ route('users.password', $user->id) }}" class="btn btn-outline-primary mx-5">Change Password</a>
        </div>
        <div class="col-sm-6 mb-4">
            <label>Update Profile</label>
            <a href="{{ route('profile', $user->id) }}" class="btn btn-outline-primary mx-5">Update Profile</a>
        </div>
    </x-card-input-update>
</x-app-layout>
