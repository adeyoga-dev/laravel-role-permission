<div class="col-md-12">
    <div class="card">
        <div class="card-header">Daftar User</div>
        <div class="card-body table-responsive">
            <table id="userTable" class="table-striped w-100">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">NIK</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        $("#userTable").DataTable({
            processing: true,
            serverSide: true,
            pageLength: 10,
            ajax: "{{ route('user.get.datatable') }}",
            "columnDefs": [
                { "searchable": false, "targets": [0,5] },
                { "orderable": false, "targets": [0,5] }
            ],
            columns: [{
                    "data": 'DT_RowIndex',
                },
                {
                    "data": "name"
                },
                {
                    "data": "email"
                },
                {
                    "data": "nik"
                },
                {
                    "data": "status"
                },
                {
                    "data": "action",
                },
            ],
        });
        //#########################################################################
        $(document).on("click", "#btnActive,#btnNonActive", function() {
            var userId = $(this).attr("data-id");
            // mereplace url dengan id
            var url = "{{ route('user.edit', '#id') }}";
            var newUrl = url.replace("#id", userId);
            // mengupdate status user
            $.ajax({
                type: "GET",
                url: newUrl,
                success: function(data) {
                    $('#userTable').DataTable().ajax.reload();
                    alert(data);
                }
            });
        });
        //#########################################################################
        $(document).on("click", "#btnDelete", function() {
            var userId = $(this).attr("data-id");
            // mereplace url dengan id
            var url = "{{ route('user.destroy', '#id') }}";
            var newUrl = url.replace("#id", userId);
            // mengupdate status user
            $.ajax({
                type: "DELETE",
                url: newUrl,
                data: {
                    "_token": token
                },
                success: function(data) {
                    $('#userTable').DataTable().ajax.reload();
                    alert(data);
                }
            });
        });
    });
</script>
