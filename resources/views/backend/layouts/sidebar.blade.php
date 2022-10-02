<x-sidebar :href="route('dashboard')" :logo="Vite::asset('resources/images/logo/logo.svg')">
    <li class="sidebar-title">Menu</li>
    <x-sidebar-item name="Dashboard" :link="route('dashboard')" :active="'dashboard'" :icon="'speedometer'">
    </x-sidebar-item>
    <x-sidebar-dropdown name="Article" :active="'posts*'" :icon="'file-text-fill'">
        <x-sidebar-submenu :name="'Posts'" :link="'#'"></x-sidebar-submenu>
        <x-sidebar-submenu :name="'Categories'" :link="'#'"></x-sidebar-submenu>
    </x-sidebar-dropdown>
    <x-sidebar-item name="Tag" :link="route('dashboard')" :active="'tag'" :icon="'tag-fill'"></x-sidebar-item>
    <x-sidebar-item name="Comments" :link="route('dashboard')" :active="'comments'" :icon="'wechat'"></x-sidebar-item>
    <x-sidebar-item name="Notifications" :link="route('dashboard')" :active="'notifications'" :icon="'bell-fill'">
    </x-sidebar-item>

    <li class="sidebar-title">Management</li>
    <x-sidebar-item name="Setting" :link="route('settings.index')" :active="'settings.index'" :icon="'wrench-adjustable-circle-fill'">
    </x-sidebar-item>
    <x-sidebar-item name="Users" :link="route('users.index')" :active="'users*'" :icon="'people-fill'">
    </x-sidebar-item>
    <x-sidebar-item name="Profile" :link="route('profile', Auth::user()->id)" :active="'profile*'" :icon="'person-circle'">
    </x-sidebar-item>
    <x-sidebar-dropdown name="Log Viewer" :active="'log-viewer*'" :icon="'exclamation-octagon-fill'">
        <x-sidebar-submenu :name="'Dashboard'" :link="'log-viewer'"></x-sidebar-submenu>
        <x-sidebar-submenu :name="'Log by Days'" :link="'log-viewer/logs'"></x-sidebar-submenu>
    </x-sidebar-dropdown>
</x-sidebar>
