$(function(){

  var url_add = document.URL + '/add';
  var url_getE = document.URL + '/getEmployee';
  var url_getEA = document.URL + '/getEmployeeAll';
  var url_getS = document.URL + '/getSchool';
  var url_getF = document.URL + '/getFamily';
  var url_getC = document.URL + '/getContract';

  $(document).on("click", ".btnSelect", function() {
    const id = $(this).data('id');
    var selNik = $('.selectNik'+id).text();
    $('#employee_nik').val(selNik);
  })

  $('#employee_nik').on('keyup', function (e) {
    if (e.which === 13) {
        alert('ok')
    }
});

  $(document).on("click", "#search-button", function() {
    $('.tblKaryawan').show();
    listEmployee();
  });

  $(document).on("input", "#search-input", function() {
    $('.tblKaryawan').show();
    listEmployee();
  });

  $('.btnSubmit').on('click', function() {
    const employee_nik = $('#employee_nik').val();
    $.ajax({
      url: url_getE,
      data: {employee_nik : employee_nik},
      method: 'post',
      dataType: 'json',
      success: function(data) {
        $('.btnlistpos').hide();
        $('.btnlistkas').hide();
        $('#employee_id').val(data.employee_id);
        $('#employee_name').val(data.employee_name);
        $('#employee_pob').val(data.employee_pob);
        $('#employee_bdate').val(data.employee_bdate);
        $("input[value='" + data.employee_gender + "']").prop('checked', true);
        $('#employee_married').val(data.employee_married);
        $('#employee_mother').val(data.employee_mother);
        $('#employee_ktp').val(data.employee_ktp);
        $('#employee_phone').val(data.employee_phone);
        $('#employee_email').val(data.employee_email);
        $('#employee_current_address').val(data.employee_current_address);
        $('#employee_current_postcode').val(data.employee_current_postcode);
        $('#employee_current_village').val(data.employee_current_village);
        $('#employee_current_district').val(data.employee_current_district);
        $('#employee_id_address').val(data.employee_id_address);
        $('#employee_id_postcode').val(data.employee_id_postcode);
        $('#employee_id_village').val(data.employee_id_village);
        $('#employee_id_district').val(data.employee_id_district);
        $('#employee_id_district').val(data.employee_id_district);
        $('#employee_id_district').val(data.employee_id_district);
        $('#employee_join_date').val(data.employee_join_date);
        $('#employee_join_date').removeClass('datepicker', true);
        $('#store_code').val(data.store_code);
        $('#store_code').attr('readonly', true);
        $('#store_name').val(data.store_name);
        $('#store_name').val(data.store_name);
        $('#employee_status').val(data.employee_status);
        $('#employee_status').val(data.employee_status);
        $('#position_code').val(data.position_code);
        $('#position_code').attr('readonly', true);
        $('#position_name').val(data.position_name);
        $('#grade_name').val(data.grade_name);
        $('#division_code').val(data.division_code);
        $('#division_name').val(data.division_name);
        $('#employee_acc_bank').val(data.employee_acc_bank);
        $('#employee_npwp').val(data.employee_npwp);
        $('#employee_no_bpjskes').val(data.employee_no_bpjskes);
        $('#employee_no_bpjstk').val(data.employee_no_bpjstk);
        $('#employee_tax_status').val(data.employee_tax_status);
        $('#employee_children').val(data.employee_children);
        $('#employee_ordner').val(data.employee_ordner);
        $.ajax({
          url: url_getS,
          data: {employee_id : data.employee_id},
          method: 'post',
          dataType: 'html',
          success: function(res) {
            if(res != null){
              $('#divSchool').html(res);
              $('.prSch').hide();
            }
          }
        });
        $.ajax({
          url: url_getF,
          data: {employee_id : data.employee_id},
          method: 'post',
          dataType: 'html',
          success: function(res) {
            if(res != null){
              $('#divFamily').html(res);
              $('.prFam').hide();
            }
            
          }
        });
        $.ajax({
          url: url_getC,
          data: {employee_id : data.employee_id},
          method: 'post',
          dataType: 'html',
          success: function(res) {
            if(res != null){
              $('#divContract').html(res);
              $('.prCon').hide();
            }
            
          }
        });
      }
    });
  });

  function listEmployee(){
    var search = $('#search-input').val();
    $.ajax({
      url: url_getEA,
      data: {
        search: search
      },
      method: 'post',
      dataType: 'html',
      success: function(response){
        $('#dataKaryawan').html(response);
      }
    })
  }





  function flashData(alert, msg){
    Command: toastr[alert](msg);
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
  }

});