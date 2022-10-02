<x-sidebar :href="route('dashboard')" :logo="Vite::asset('resources/images/logo/logo.svg')">



    <li class="sidebar-title">Menu</li>
    <x-sidebar-item name="Dashboard" :link="route('dashboard')" :active="'dashboard'" icon="bi bi-speedometer">
    </x-sidebar-item>
    <li class="sidebar-item {{ request()->routeIs('posts*') ? 'active' : '' }} has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-file-text-fill"></i>
            <span>Article</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item ">
                <a href="#">Posts</a>
            </li>
            <li class="submenu-item ">
                <a href="#">Categories</a>
            </li>
        </ul>
    </li>
    <x-sidebar-item name="Tag" :link="route('dashboard')" :active="'tag'" icon="bi bi-tag-fill"></x-sidebar-item>
    <x-sidebar-item name="Comments" :link="route('dashboard')" :active="'comments'" icon="bi bi-wechat"></x-sidebar-item>
    <x-sidebar-item name="Notifications" :link="route('dashboard')" :active="'notifications'" icon="bi bi-bell-fill">
    </x-sidebar-item>

    <li class="sidebar-title">Management</li>
    <x-sidebar-item name="Setting" :link="route('settings.index')" :active="'settings.index'" icon="bi bi-wrench-adjustable-circle-fill">
    </x-sidebar-item>
    <x-sidebar-item name="Users" :link="route('users.index')" :active="'users*'" icon="bi bi-people-fill">
    </x-sidebar-item>
    <x-sidebar-item name="Profile" :link="route('profile', Auth::user()->id)" :active="'profile*'" icon="bi bi-people-fill">
    </x-sidebar-item>
</x-sidebar>
