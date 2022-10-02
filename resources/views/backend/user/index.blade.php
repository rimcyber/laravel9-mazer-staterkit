<x-app-layout>
    <x-card-index :icon="'people-fill'" :title="'Users'" :btn1_link="route('users.create')" :btn1_color="'success'" :btn1_title="'Add'"
        :btn1_icon="'plus-circle-fill'" :btn2_link="route('users.trash')" :btn2_color="'secondary'" :btn2_title="'View Trash'" :btn2_icon="'trash3-fill'">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>STATUS</th>
                    <th>LAST LOGIN</th>
                    <th>AVATAR</th>
                    <th class="text-center">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->profile->name ?? null }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->status === 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Blocked</span>
                            @endif
                        </td>
                        <td>
                            @if (Cache::has('user-is-online-' . $user->id))
                                <span class="text-success">Online</span>
                            @else
                                <span class="text-secondary">Offline</span>
                                <br>
                                @if ($user->last_seen === null)
                                    <small class="text-muted">
                                        never logged in
                                    </small>
                                @else
                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                                    </small>
                                @endif
                            @endif
                        </td>
                        <td>
                            <div class="avatar avatar-xl">
                                @if (empty($user->profile->avatar))
                                    <img src="{{ Vite::asset('resources/images/faces/1.jpg') }}" alt="avatar">
                                @else
                                    <img src="{{ url('storage/avatar/' . $user->profile->avatar) }}" alt="avatar">
                                @endif
                            </div>
                        </td>
                        <td class="text-center">
                            <x-btn-icon :href="route('users.show', $user->id)" :color="'success'" :icon="'eye-fill'" :title="'Show'">
                            </x-btn-icon>
                            <x-btn-icon :href="route('users.edit', $user->id)" :color="'primary'" :icon="'wrench-adjustable'" :title="'Edit'">
                            </x-btn-icon>
                            <x-btn-icon :href="route('users.password', $user->id)" :color="'info'" :icon="'key-fill'" :title="'Change Password'">
                            </x-btn-icon>
                            @if ($user->status === 1)
                                <x-btn-icon-form :action="route('users.status', $user->id)" :method="'put'" :color="'danger'"
                                    :title="'Block'" :icon="'x-circle-fill'">
                                </x-btn-icon-form>
                            @else
                                <x-btn-icon-form :action="route('users.status', $user->id)" :method="'put'" :color="'info'"
                                    :title="'Activate'" :icon="'check-circle-fill'">
                                </x-btn-icon-form>
                            @endif
                            <x-btn-icon-form :action="route('users.destroy', $user->id)" :method="'delete'" :color="'danger'" :title="'Delete'"
                                :icon="'trash-fill'">
                            </x-btn-icon-form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-card-index>
</x-app-layout>
