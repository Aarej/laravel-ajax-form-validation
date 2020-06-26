$("#submit-Form").on('submit', function(e) {
   
    $.ajaxSetup({
        headers: {
            'X-XSRF-Token': $('meta[name="_token"]').attr('content')
        }
    })
    e.preventDefault(e)
    $("div#divLoading").addClass('show');
    $.ajax({
        type: "POST",
        url: $('#submit-route').val(),
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            if(data['code'] == '0'){
                swal('', data['msg'], 'error');
            }
            else{
                swal('', data['msg'], 'success');
                allData($('#all-data-route').val());
            }
            var formData = $('form').serialize().split('&');
          
            var sn = 0;
            formData.forEach(function(item) {
                if (sn != 0) {
                    let divId = item.split('=')[0];
                    $('#' + divId + '-err').html('');
                }
                sn++;
            });
            
            $("div#divLoading").removeClass('show');
        },
        error: function(data) {
            $("div#divLoading").removeClass('show');
          
            if (data.status == 419) {
                swal('Opps!', 'Session expired! Please login again', 'error');
            }
            else if (data.status == 422) {
                swal('Error!', 'Please review all error', 'error');
            } else if (data.status == 500) {
                swal('Opps!', 'Internal server error', 'error');
            }
            var formData = $('form').serialize().split('&');
            var sn = 0;
            formData.forEach(function(item) {
                if (sn != 0) {
                    let divId = item.split('=')[0];
                   
                    if (data.responseJSON.errors[divId]) {
                        $('#' + divId + '-err').html(data.responseJSON.errors[divId]);
                    }
                    else {
                        $('#' + divId + '-err').html('');
                    }
                    if(data.responseJSON.errors['service_img'] != ''){
                        $('#suser_img' + '-err').html(data.responseJSON.errors['service_img']);
                    }
                }
                sn++;
            });
        }
    });
});
