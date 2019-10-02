<link rel="stylesheet" href="<?php echo media_url('vendor/fullcalendar/core/main.min.css') ?>">
<link rel="stylesheet" href="<?php echo media_url('vendor/fullcalendar/daygrid/main.min.css') ?>">
<div class="container-fluid">
    <div class="card-box">
        <div id='calendar-container'>
            <div id='calendar'></div>
        </div>
    </div>
</div>

<div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="titleModal">Tambah <?php echo $title ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form" action="" method="post">
                <div class="modal-body">
                    <input type="hidden" name="add" value="1">
                    <label>Tanggal*</label>
                    <p id="labelDate"></p>
                    <input type="hidden" name="date" class="form-control" id="inputDate">
                    <label>Keterangan*</label>
                    <textarea name="info" id="inputDesc" class="form-control"></textarea><br />
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo media_url('vendor/fullcalendar/core/main.min.js') ?>"></script>
<script src="<?php echo media_url('vendor/fullcalendar/daygrid/main.min.js') ?>"></script>

<script>
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'prevYear,nextYear',
        },
        events: "<?php echo site_url('holiday/get'); ?>",

        dayClick: function(date, jsEvent, view) {

            var tanggal = date.getDate();
            var bulan = date.getMonth() + 1;
            var tahun = date.getFullYear();
            var fullDate = tahun + '-' + bulan + '-' + tanggal;

            $('#add').modal('toggle');
            $('#add').modal('show');

            $("#inputDate").val(fullDate);
            $("#labelDate").text(fullDate);
            $("#inputYear").val(date.getFullYear());
            $("#labelYear").text(date.getFullYear());
        },

        eventClick: function(calEvent, jsEvent, view) {
            $("#delModal").modal('toggle');
            $("#delModal").modal('show');
            $("#idDel").val(calEvent.id);
            $("#showYear").text(calEvent.year);

            var tgl = calEvent.start.getDate();
            var bln = calEvent.start.getMonth() + 1;
            var thn = calEvent.start.getFullYear();

            $("#showDate").text(tgl + '-' + bln + '-' + thn);
            $("#showDesc").text(calEvent.title);
        }


    });
</script>