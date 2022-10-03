<x-app-layout>
    <x-card-index :icon="'people-fill'" :title="'Users in Trash'" :btn1_link="''" :btn1_color="''" :btn1_title="''"
        :btn1_icon="''" :btn2_link="route('users.index')" :btn2_color="'warning'" :btn2_title="'Back'" :btn2_icon="'reply-fill'">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>AVATAR</th>
                    <th>Delete At</th>
                    <th>Delete By</th>
                    <th class="text-center">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->profile->name ?? null }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="avatar avatar-xl">
                                @if (empty($user->profile->avatar))
                                    <img src="{{ Vite::asset('public/images/faces/1.jpg') }}" alt="avatar">
                                @else
                                    <img src="{{ url('storage/avatar/' . $user->profile->avatar) }}" alt="avatar">
                                @endif
                            </div>
                        </td>
                        <td>
                            <small class="text-muted">
                                {{ \Carbon\Carbon::parse($user->deleted_at)->diffForHumans() }}
                            </small>
                        </td>
                        <td>{{ $user->deleted_by }}</td>
                        <td class="text-center">
                            <x-btn-icon-form :action="route('users.restore', $user->id)" :method="'post'" :color="'success'" :title="'Restore'"
                                :icon="'recycle'">
                            </x-btn-icon-form>
                            <x-btn-icon-form :action="route('users.force', $user->id)" :method="'delete'" :color="'danger'" :title="'Delete'"
                                :icon="'trash-fill'">
                            </x-btn-icon-form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-card-index>
</x-app-layout>
