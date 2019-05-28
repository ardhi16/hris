$(function(){

  var url_student = document.URL + '/getStudent';
  var url_studentAll = document.URL + '/getStudentAll';
  var url_month = document.URL + '/getPayMonth';
  var url_bebas = document.URL + '/getPayBebas';
  var url_monthId = document.URL + '/getPayMonthById';
  var url_bebasId = document.URL + '/getPayBebasById';
  var url_history = document.URL + '/getHistory';
  var url_bayar = document.URL + '/transaction';
  var url_cetak = document.URL + '/printInv/';


  $(document).on("click", ".btnSelect", function() {
    const id = $(this).data('id');
    var selNis = $('.selectNis'+id).text();
    $("#nis").focus();
    $('#nis').val(selNis);
    
    
  })

  $('.btnList').on('click', function(){
    $('#dataSiswa').html('');
    $('.tblSiswa').hide();
    $('#search-input').val('');
  });

  $(document).on("click", "#search-button", function() {
    $('.tblSiswa').show();
    listStudent();
  });

  $(document).on("input", "#search-input", function() {
    $('.tblSiswa').show();
    listStudent();
  });

  $('#bayar').on('click', function(e){
    e.preventDefault();
    $('#tunai').val('');
    const periodId = $('.periodSelect').val();
    const period = $('.period').text();
    var confirmed =  confirm('Pembayaran akan dilakukan?');

    if(confirmed){
      $('#payCash').modal('show');
      var total = $('.sumTotal').text().replace(/,/g, '');
      $('#tunai').val(total);
      $('.tunaisep').inputmask("numeric", {
        removeMaskOnSubmit: true,
        radixPoint: ".",
        groupSeparator: ",",
        digits: 2,
        min: total,
        autoGroup: true,
        rightAlign: false,
      });
      $('.btnTunai').on('click', function(){
        var tunai_str = $('#tunai').val();
        var tunai = tunai_str.replace(/,/g, '');
        $('#cash').val(tunai);
        $('#trx_period').val(period);
        var data = $("#formBayar").serialize();
        $.ajax({
          url: url_bayar,
          data: data,
          method: 'post',
          dataType: 'json',
          success: function(response) {
            if(response.status){
              flashData(response.alert, response.message);
              listBill(response.result.nis, periodId, period, true);
              $('#bayar').hide();
              $('.btnCetak').show();
              $('#cetak').attr('href', url_cetak+response.result.uid_trans);
              $('.rmBtn').remove();
              $('.totalBebas').attr('disabled', 'disable'); 
            } else {
              flashData(response.alert, response.message);
              $('#bayar').hide();
            }
          }
        });
      });
    }
  });


  $('.btnSubmit').on('click', function() {
    $('.rmv').remove();
    $('.finish').hide();
    $('.btnCetak').hide();

    const nis = $('#nis').val();
    const periodId = $('.periodSelect').val();
    var period = "";
    $(".periodSelect option:selected").each(function() {
      period += $(this).text();
    });
    $('.period').html(period);

    $.ajax({
      url: url_student,
      data: {nis : nis},
      method: 'post',
      dataType: 'json',
      success: function(data) {
        $('.nisSiswa').html(data.nis);
        $('#student_nis').val(data.nis);
        $('.name').html(data.name);
        $('.classes').html(data.classes);
        $('.major').html(data.major);
        $('#photo').html('<img src="'+data.photo+'" alt="" class="img-thumbnail rounded-circle img-fluid">');
      }
    });

    listBill(nis, periodId, period, false);

  });

  $(document).on("click", ".addPay", function() {
    $(this).removeClass('addPay');
    $('.btnCetak').hide();
    $('.finish').show();
    $('.sumTotal').text(0);


    const id = $(this).data('id');
    $.ajax({
      url: url_monthId,
      data: {
        id : id,
      },
      method: 'post',
      dataType: 'html',
      success: function(data) {
        $('.tPay').append(data);
        total();
      }
    });

    $(document).on("click", ".remvBtn"+id, function() {
      $('.tbyar'+id).remove();
      $('#tbyr'+id).addClass('addPay');
      total();
    });

  });

  $(document).on("click", ".addBeb", function() {
    $(this).removeClass('addBeb');
    $('.finish').show();

    const id = $(this).data('id');
    $.ajax({
      url: url_bebasId,
      data: {
        id : id,
      },
      method: 'post',
      dataType: 'html',
      success: function(data) {
        $('.tPay').append(data);
        total();
      }
    });

    $(document).on("click", ".remvBtnBebas"+id, function() {
      $('.tbebas'+id).remove();
      $('#tbeb'+id).addClass('addBeb');
      total();
    });
  });

  $(document).on("input", ".totalBebas", function() {
    for (i = 0; i < $(".max").length; i++) {
      var max_str = $(".max").eq(i).text();
      var max_int = max_str.replace(/,/g, '');
      $('.totalBebas').eq(i).inputmask("numeric", {
        removeMaskOnSubmit: true,
        radixPoint: ".",
        groupSeparator: ",",
        digits: 2,
        max: max_int,
        autoGroup: true,
        rightAlign: false,
      });
    }
    total();
  });

  function listStudent(){
    var search = $('#search-input').val();
    $.ajax({
      url: url_studentAll,
      data: {
        search: search
      },
      method: 'post',
      dataType: 'html',
      success: function(response){
        $('#dataSiswa').html(response);
      }
    })
  }


  function total() {
    var total = 0;
    var bebas = 0;

    for (i = 0; i < $(".totalMonth").length; i++) {
      var str = $(".totalMonth").eq(i).text();
      var res = str.replace(/,/g, '');
      if(res != "") {
        total += parseInt(res);
      }
    }
    $(".sumTotal").text(number(total+bebas));

    for (j = 0; j < $(".totalBebas").length; j++) {
      var str_bebas = $(".totalBebas").eq(j).val();
      var res_bebas = str_bebas.replace(/,/g, '');
      if(res_bebas != "") {
        bebas += parseInt(res_bebas);
      }
    }
    $(".sumTotal").text(number(bebas+total));
  }


  function number(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  function listBill(nis, periodId, period, refresh=false){
    $.ajax({
      url: url_month,
      data: {
        nis : nis,
        period : periodId
      },
      method: 'post',
      dataType: 'html',
      success: function(data) {
        $('.dataMonth').html(data);
        if(refresh){
          $('.tBulan').removeClass('addPay');
        }
      }
    });

    $.ajax({
      url: url_bebas,
      data: {
        nis : nis,
        period : periodId
      },
      method: 'post',
      dataType: 'html',
      success: function(data) {
        $('.dataBebas').html(data);
        if(refresh){
          $('.tBebas').removeClass('addBeb');
        }
      }
    });

    $.ajax({
      url: url_history,
      data: {
        nis : nis,
        period : period
      },
      method: 'post',
      dataType: 'html',
      success: function(data) {
        $('.historyPay').html(data);
      }
    });
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