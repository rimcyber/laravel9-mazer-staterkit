<x-app-layout>
    <x-card-index :icon="'newspaper'" :title="'Posts'" :btn1_link="route('post.create')" :btn1_color="'success'" :btn1_title="'Add'"
        :btn1_icon="'plus-circle-fill'" :btn2_link="route('post.trash')" :btn2_color="'secondary'" :btn2_title="'View Trash'" :btn2_icon="'trash3-fill'">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>TITLE</th>
                    <th>CATEGORIES</th>
                    <th>STATUS</th>
                    <th>CREATE BY</th>
                    <th>PUBLISH AT</th>
                    <th class="text-center">ACTION</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </x-card-index>
</x-app-layout>
