<div class="container-fluid">
    <div class="card-box">
        <form action="" method="post">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Karyawan</label>
                        <select name="status" id="" class="form-control">
                            <option value="1">Karyawan Aktif</option>
                        </select>
                    </div>
                    <button class="btn btn-success" type="submit">Download</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $('form').submit(function(event) {
        if ($(this).hasClass('submitted')) {
            event.preventDefault();
        } else {
            $(this).find(':submit')
                .html('<i class="fa fa-spinner fa-spin"></i> Loading...')
                .attr('disabled', 'disabled');
            $(this).addClass('submitted');
        }
    });
</script>