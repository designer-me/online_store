$("#register").submit(function (e){
    e.preventDefault();
    var data = $(this).serialize();
    $.ajax({
        type: 'POST',
        data:data,
        url: "api/user_registration",
        beforeSend: function () {
            $("#loader").html('<div class="loader loader-default is-active"></div>');
        },
        success: function (data) {
            if(data == "0"){
                    $.confirm({
                        title: 'Alert!',
                        content: 'This User is Already Exist.Please Login Your Account',
                        type: 'red',
                        buttons: {
                            Okay: function () {
                                
                            },
                        }
                    });
                }else{
                    $.confirm({
                        title: 'Success!',
                        content: 'You has been successfully registered. Please Login Your Account',
                        type: 'green',
                        buttons: {
                            Okay: function () {
                                $("#register")[0].reset();
                                $(".otp").addClass("hidden");
                            },
                        }
                    });
                }
        },
        complete: function () {
            $("#loader").html('<div class="loader loader-default"></div>');
        }
    });
});

$("#mobile_no").on('keyup',function (){
    
    var mob = $(this).val();
    var email_id = $("#email_id").val();
    
    if((mob).length=="10"){
        $.ajax({
            type: 'POST',
            data: {mob:mob,"email_id":email_id},
            url: "api/send_verfication_code",
            beforeSend: function () {
                $("#loader").html('<div class="loader loader-default is-active"></div>');
            },
            success: function (data) {
                if(data == "0"){
                    $.confirm({
                        title: 'Alert!',
                        content: 'This User is Already Exist.Please Login Your Account',
                        type: 'red',
                        buttons: {
                            Okay: function () {
                                $("#register_btn").attr("disabled",true);
                            },
                        }
                    });
                }else{
                    $("#register_btn").attr("disabled",false);
                    $(".otp").removeClass("hidden");
                    var enc = $.base64.decode(data);
                    $("#otp_code").val(enc);
                }
            },
            complete: function () {
                $("#loader").html('<div class="loader loader-default"></div>');
            }
        });
    }
});

$("#login").submit(function (e){
    e.preventDefault();
    var data = $(this).serialize();
    var url = $("#url").val();
    $.ajax({
        type: 'POST',
        data: data,
        url: "api/user_login",
        beforeSend: function () {
            $("#loader").html('<div class="loader loader-default is-active"></div>');
        },
        success: function (data) {
            if(data == "0"){
                $.confirm({
                    title: 'Alert!',
                    content: 'This user does\'n t Exist.',
                    type: 'red',
                    buttons: {
                        Okay: function () {

                        },
                    }
                });
            }else if(data == "00"){
                $.confirm({
                    title: 'Alert!',
                    content: 'Your password is incorrect.',
                    type: 'red',
                    buttons: {
                        Okay: function () {

                        },
                    }
                });
            }else if(data == "1"){
                if(url == ""){
                    window.location.href="user-dashboard";
                }else{
                    window.location.href=url;
                }
            }
        },
        complete: function () {
            $("#loader").html('<div class="loader loader-default"></div>');
        }
    });
});

$("#change_pass").submit(function (e){
    e.preventDefault();
    var data = $(this).serialize();
    $.ajax({
        type: 'POST',
        data: data,
        url: "api/user_change_password",
        beforeSend: function () {
            $("#loader").html('<div class="loader loader-default is-active"></div>');
        },
        success: function (data) {
            if(data == "0"){
                $.confirm({
                    title: 'Alert!',
                    content: 'Your old password is incorrect.',
                    type: 'red',
                    buttons: {
                        Okay: function () {

                        },
                    }
                });
            }else if(data == "1"){
                $.confirm({
                    title: 'Success!',
                    content: 'Your password has been successfully changed.',
                    type: 'green',
                    buttons: {
                        Okay: function () {
                            $("#change_pass")[0].reset();
                        },
                    }
                });
            }
        },
        complete: function () {
            $("#loader").html('<div class="loader loader-default"></div>');
        }
    });
});