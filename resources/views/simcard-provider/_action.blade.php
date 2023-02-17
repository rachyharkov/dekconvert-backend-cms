<td>
    <div class="btn-group">
        <button type="button" onclick="window.livewire.emit('setPage', 'edit', {{ $model->id }})" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
        <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $model->id }})"><i class="fa fa-trash"></i></button>
    </div>
    <button type="button" class="btn btn-primary btn-sm" onclick="window.livewire.emit('setPage', 'edit_kurs_rate', {{ $model->id }})"><i class="fa fa-money-bill"></i></button>
</td>
