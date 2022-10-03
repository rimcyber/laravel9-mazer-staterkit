<x-app-layout>
    @include('backend.layouts.log-viewer-style')
    <x-card-index :icon="'journal-text'" :title="'Logs by Date'" :btn1_link="''" :btn1_color="''" :btn1_title="''"
        :btn1_icon="''" :btn2_link="url('admin/log-viewer')" :btn2_color="'warning'" :btn2_title="'Back'" :btn2_icon="'reply-fill'">
        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                @foreach ($headers as $key => $header)
                                    <th scope="col" class="{{ $key == 'date' ? 'text-left' : 'text-center' }}">
                                        @if ($key == 'date')
                                            {{ $header }}
                                        @else
                                            <span class="badge badge-level-{{ $key }}">
                                                {!! log_styler()->icon($key) . ' ' . $header !!}
                                            </span>
                                        @endif
                                    </th>
                                @endforeach
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($rows->count() > 0)
                                @foreach ($rows as $date => $row)
                                    <tr>
                                        @foreach ($row as $key => $value)
                                            <td class="{{ $key == 'date' ? 'text-left' : 'text-center' }}">
                                                @if ($key == 'date')
                                                    <a href="{{ route('log-viewer::logs.show', [$date]) }}">
                                                        <span class="badge bg-primary">{{ $value }}</span>
                                                    </a>
                                                @elseif ($value == 0)
                                                    <span class="badge empty">{{ $value }}</span>
                                                @else
                                                    <a href="{{ route('log-viewer::logs.filter', [$date, $key]) }}">
                                                        <span
                                                            class="badge badge-level-{{ $key }}">{{ $value }}</span>
                                                    </a>
                                                @endif
                                            </td>
                                        @endforeach
                                        <td class="text-center">
                                            <x-btn-icon :href="route('log-viewer::logs.show', [$date])" :color="'info'" :icon="'search'"
                                                :title="'Search'"></x-btn-icon>
                                            <x-btn-icon :href="route('log-viewer::logs.download', [$date])" :color="'success'" :icon="'download'"
                                                :title="'Download'"></x-btn-icon>
                                            <x-btn-icon :href="'#delete-log-modal'" :color="'danger'" :icon="'trash'"
                                                :title="'Delete'"></x-btn-icon>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="11" class="text-center">
                                        <span
                                            class="badge badge-secondary">{{ trans('log-viewer::general.empty-logs') }}</span>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-card-index>
</x-app-layout>

{{-- DELETE MODAL --}}
<div id="delete-log-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="delete-log-form" action="{{ route('log-viewer::logs.delete') }}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="date" value="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Delete Log File')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary mr-auto" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-danger" data-loading-text="Loading&hellip;">DELETE
                        FILE</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
<script>
    $(function() {
        var deleteLogModal = $('div#delete-log-modal'),
            deleteLogForm = $('form#delete-log-form'),
            submitBtn = deleteLogForm.find('button[type=submit]');

        $("a[href='#delete-log-modal']").on('click', function(event) {
            event.preventDefault();
            var date = $(this).data('log-date');
            deleteLogForm.find('input[name=date]').val(date);
            deleteLogModal.find('.modal-body p').html(
                'Are you sure you want to <span class="badge bg-danger">DELETE</span> this log file <span class="badge badge-primary">' +
                date + '</span> ?'
            );

            deleteLogModal.modal('show');
        });

        deleteLogForm.on('submit', function(event) {
            event.preventDefault();
            submitBtn.button('loading');

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                dataType: 'json',
                data: $(this).serialize(),
                success: function(data) {
                    submitBtn.button('reset');
                    if (data.result === 'success') {
                        deleteLogModal.modal('hide');
                        location.reload();
                    } else {
                        alert('AJAX ERROR ! Check the console !');
                        console.error(data);
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('AJAX ERROR ! Check the console !');
                    console.error(errorThrown);
                    submitBtn.button('reset');
                }
            });

            return false;
        });

        deleteLogModal.on('hidden.bs.modal', function() {
            deleteLogForm.find('input[name=date]').val('');
            deleteLogModal.find('.modal-body p').html('');
        });
    });
</script>
