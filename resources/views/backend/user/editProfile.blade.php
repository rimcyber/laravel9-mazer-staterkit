<x-app-layout>
    <x-card-input-update :icon="'person-fill'" :title="'Edit Profile'" :link_back="route('users.index')" :action="route('profile.update', $user->id)">
        <x-input-image :label="'Avatar'" :name="'avatar'" :value="$profile->avatar ?? null"></x-input-image>
        <div></div>
        <div class="col-sm-6 mb-4">
            <label>Username : {{ $user->username }}</label>
        </div>
        <div class="col-sm-6 mb-4">
            <label>Email : {{ $user->email }}</label>
        </div>
        <x-input-2column :label="'Full Name'" :name="'name'" :type="'text'" :value="old('name', $profile->name ?? null)"></x-input-2column>
        <x-input-2column :label="'Mobile Phone'" :name="'mobile'" :type="'text'" :value="old('mobile', $profile->mobile ?? null)"></x-input-2column>
        <x-dropdown :label="'Gender'" :name="'gender'">
            <option @selected('Laki-Laki' == old('gender', $profile->gender ?? null)) value="Laki-Laki">Laki-Laki</option>
            <option @selected('Perempuan' == old('gender', $profile->gender ?? null)) value="Perempuan">Perempuan</option>
        </x-dropdown>
        <x-input-2column :label="'Date Of Birth'" :name="'date_of_birth'" :type="'date'" :value="old('date_of_birth', $profile->date_of_birth ?? null)"></x-input-2column>
        <x-text-area :label="'Address'" :name="'address'" :type="'text'" :value="old('address', $profile->address ?? null)"></x-text-area>
        <x-text-area :label="'Bio'" :name="'bio'" :type="'text'" :value="old('bio', $profile->bio ?? null)"></x-text-area>
        <x-input-2column :label="'URL Website'" :name="'url_website'" :type="'text'" :value="old('url_website', $profile->url_website ?? null)"></x-input-2column>
        <x-input-2column :label="'URL Github'" :name="'url_github'" :type="'text'" :value="old('url_github', $profile->url_github ?? null)"></x-input-2column>
        <x-input-4column :label="'Url Facebook'" :name="'url_facebook'" :type="'text'" :value="old('url_facebook', $profile->url_facebook ?? null)"></x-input-4column>
        <x-input-4column :label="'Url Instagram'" :name="'url_twitter'" :type="'text'" :value="old('url_twitter', $profile->url_twitter ?? null)"></x-input-4column>
        <x-input-4column :label="'Url Twitter'" :name="'url_instagram'" :type="'text'" :value="old('url_instagram', $profile->url_instagram ?? null)"></x-input-4column>
        <x-input-4column :label="'Url Linkedin'" :name="'url_linkedin'" :type="'text'" :value="old('url_linkedin', $profile->url_linkedin ?? null)"></x-input-4column>
    </x-card-input-update>
</x-app-layout>
