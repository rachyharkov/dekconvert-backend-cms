<div class="white_box_tittle list_header">
    <h4>List Data</h4>
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
            <button type="button" class="btn_1" wire:click="setPage('create')">Add TESTIMONI</button>
        </div>
    </div>
</div>
<style>
    #testimonis-table {
        background: #fff;
        border-radius: 10px;
        margin-bottom: 35px;
        padding-top: 20px;
    }
</style>
    <table class="table table-borderless" id="testimonis-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Rating</th>
                <th>Testimoni</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
