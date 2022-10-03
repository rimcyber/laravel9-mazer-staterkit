<x-app-layout>
    <x-card-input :icon="'newspaper'" :title="'Create Post'" :link_back="route('post.index')" :action="route('post.store')">
        <x-input-1column :label="'Title'" :name="'title'" :type="'text'" :value="old('title')"></x-input-1column>
        <x-ckeditor :label="'Content'" :name="'content'" :type="'text'" :value="old('content', $setting->google_analytics ?? null)">
        </x-ckeditor>
        <x-input-1column :label="'Title'" :name="'title'" :type="'text'" :value="old('title')"></x-input-1column>
    </x-card-input>
</x-app-layout>
