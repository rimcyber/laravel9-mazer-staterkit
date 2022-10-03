<x-app-layout>
    <x-card-index :icon="'menu-button-fill'" :title="'Categories'" :btn1_link="route('category.create')" :btn1_color="'success'" :btn1_title="'Add'"
        :btn1_icon="'plus-circle-fill'" :btn2_link="route('category.trash')" :btn2_color="'secondary'" :btn2_title="'View Trash'" :btn2_icon="'trash3-fill'">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NAME</th>
                    <th>CREATED AT</th>
                    <th>CREATED BY</th>
                    <th class="text-center">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $cat)
                    <tr>
                        <td></td>
                        <td>{{ $cat->name }}</td>
                        <td>{{ $cat->created_at }}</td>
                        <td>{{ $cat->created_by }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-card-index>
</x-app-layout>
