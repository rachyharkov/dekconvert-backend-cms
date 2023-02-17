<div class="white_box_tittle list_header">
    <h4>Simcard Provider</h4>
    <div class="box_right d-flex lms_block">
        <div class="serach_field_2">
            <div class="search_inner">
                <form action="#">
                    <div class="search_field">
                        <input type="text" placeholder="Search content here...">
                    </div>
                    <button type="submit"> <i class="ti-search"></i> </button>
                </form>
            </div>
        </div>
        <div class="add_button ml-10">
            <button type="button" class="btn_1" wire:click="setPage('create')">Add Simcard Provider</button>
        </div>
    </div>
</div>
<table class="table table-striped table-bordered" id="simcard_providers-table">
    <thead>
        <tr>
            <th>Simcard Provider</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>
</table>
