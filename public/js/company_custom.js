/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    /*   var state = 'idle';
     $(document).on('click mousemove keypress mouseup mousedown keydown keypress keyup submit change mouseenter scroll resize dblclick', 'body', function () {
     state = 'active';
     
     });
     setInterval(function () {
     if (state == 'idle') {
     window.location.href = BASE_URL + 'login/logout';
     } else {
     state = 'idle';
     }
     
     }, 300000);*/
    setInterval(function () {
        var minutesAre = $("#logoutSetting").attr('value') * 60 * 1000;
        var logout_status = $("#logoutSetting").attr('not_auto_logout_users');
         if (logout_status == "no") {
            var state = 'idle';
            $(document).on('click mousemove keypress mouseup mousedown keydown keypress keyup submit change mouseenter scroll resize dblclick', 'body', function () {
                state = 'active';
            });
            var test=1;
            setInterval(function () {
                test++;
                if (state == 'idle') {
                    window.location.href = BASE_URL + 'login/logout';
                } else {
                    state = 'idle';
                }

            }, minutesAre);
        }

    }, 1000);

    $("body ").on('keyup', 'input', function () {
        $this = $(this);
        var len = $(this).val().length;
        if (len > 0)
        {
            //$this.next('.error-message').addClass('hide');
            $this.removeClass('error_border');
        }
        else
        {
            //$this.next('.error-message').removeClass('hide');
            // $this.addClass('error_border');
        }
    });
    function readURL(input, imageId) {
        console.log(imageId);
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#' + imageId).attr('src', e.target.result);

            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).on('click', '.addChildren', function () {
        var child = $('#childValue').val();
        var count = parseInt(child) + 1;
        $.ajax({
            type: 'POST',
            url: 'employee/addChild',
            data: {child: child},
            success: function (response) {
                $('#childValue').val(count);
                $('.childrn_sec').append(response);
            }
        });
    });
    $(document).on('change', '.newUpload', function () {
        $("#image_upload_preview").attr('src', '');
        readURL(this, 'image_upload_preview');
    });
    $(document).on('change', '.uploadNew', function () {
        $("#showimage").attr('src', '');
        readURL(this, 'showimage');
    });
    $(document).on('click', '.deleteChildren', function () {
        var child = $('#childValue').val();
        var count = parseInt(child) - 1;
        $('#childValue').val(count);
        $(this).parent().parent().remove();
    });

    $(document).on('blur', '.datepickerAge', function () {
//    $(document).on('blur', '.datepicker1', function () {
        var getDate = $(this).val();
        $this = $(this);
        dob = new Date(getDate);
        var today = new Date();
        var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
        if (age != -1) {
            $this.prev().html(age);
        }


//        $.ajax({
//            url: 'employee/getAge',
//            type: 'POST',
//            data: {getDate: getDate},
//            success: function (response) {
//                $this.prev().html(response);
//            }
//        });
    });
    $(document).on('blur', '.datepickerAge', function () {
//    $(document).on('blur', '.datepicker2', function () {
//    $(document).on('dp.change', '.datepicker2', function () {
        var getDate = $(this).val();
        $this = $(this);
        dob = new Date(getDate);
        var today = new Date();
        var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
        if (age != -1) {
            $this.closest('.childAdded').find('.age').html(age);
        }




//        $.ajax({
//            url: 'employee/getAge',
//            type: 'POST',
//            data: {getDate: getDate},
//            success: function (response) {
//                $this.closest('.childAdded').find('.age').html(response);
//            }
//        });
    });
    /* Reset Password */
    var optionsReset = {
        beforeSubmit: showRequestReset,
        success: showResponseReset
    };
    $("body").on('submit', '#resetData', function () {
        $(this).ajaxSubmit(optionsReset);
        return false;
    });
    $(document).on('change', '.uploadPdf', function () {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader)
            return;
        var $fname = files[0].name;
        var file_type = $fname.substr($fname.lastIndexOf('.')).toLowerCase();
        if (file_type == '.pdf') {
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);

        } else {
//                swal("Oops...", "Only pdf file is accepted!", "error");
            alert('Only pdf file is accepted!');
        }
    });
    function showRequestReset(formData, jqForm, options) {
    }
    function showResponseReset(responseText, statusText, xhr, $form) {
        dataReset = $.parseJSON(responseText);
        $('div.error-message').remove();
        if (dataReset.old_password) {
            errorDiv = '<div class="error-message">' + dataReset.old_password[0] + '</div>';
            $('input[name="data[User][old_password]"]').after(errorDiv);
        }
        if (dataReset.new_password) {
            errorDiv = '<div class="error-message">' + dataReset.new_password[0] + '</div>';
            $('input[name="data[User][new_password]"]').after(errorDiv);
        }
        if (dataReset.confirm_password) {
            errorDiv = '<div class="error-message">' + dataReset.confirm_password[0] + '</div>';
            $('input[name="data[User][confirm_password]"]').after(errorDiv);
        }
        if (dataReset.status == 'success') {
            swal("Success", dataReset.message, "success");
        }
    }
});

/* start Tabbing Script 
 $('#checkClasses').val('');
 $(document).on('click', '.sidebarMenus li a,#myTabs li a,.act_sbmenu li a', function () {
 var name = $(this).attr('data-class');
 if (name == undefined) {
 var link = $(this).attr('data-attr');
 var id = $(this).attr('data-id');
 var name = $(this).attr('data-name');
 addNewTab(link, id, name);
 }
 });
 $(document).on('click', '.close_tab i', function () {
 var name = $(this).attr('data-class');
 $('#' + name).remove();
 $('.' + name).hide();
 $(this).parent().parent().parent().remove();
 var string = $('#checkClasses').val();
 myString = string.replace(',' + name, '');
 $('#checkClasses').val(myString);
 myTabs = $('#myTabs li').first().attr('class');
 tabsLength = $('#myTabs li').length;
 if (tabsLength >= 1) {
 newClass = myTabs.replace('active in', '');
 $('#' + newClass).trigger('click');
 } else {
 addNewTab('company/software_licensing', 'showsoftwareLicensing', 'Software Licenses');
 }
 var link = $('#myTabs li').first().find('a').attr('data-attr');
 var id = $('#myTabs li').first().find('a').attr('data-id');
 var name = $('#myTabs li').first().find('a').attr('data-name');
 
 addNewTab(link, id, name);
 return false;
 });
 function addNewTab(link, id, name) {
 var test = document.getElementById(id);
 var classed = $('#myTabs').html();
 
 if (test == null) {
 $.ajax({
 type: 'POST',
 url: companyUrl + link,
 data: {test: 'true'},
 success: function (response) {
 getVal = $('#checkClasses').val();
 var length = $('#myTabs li').length;
 if (getVal.indexOf(id) == -1) {
 string = '<li role="presentation" class="active ' + id + '"><a href="#' + id + '" id="" role="tab" data-name="' + name + '" data-id="' + id + '" data-attr="' + link + '" data-toggle="tab" aria-controls="home" aria-expanded="true">' + name + '<span class="close_tab"><i class="fa fa-close active-i" data-class="' + id + '" ></i></span></a></li>';
 $('#checkClasses').val(getVal + ',' + id);
 $('#myTabs').append(string);
 }
 //                    moreString = '<li class="dropdown active more" role="presentation"><a aria-controls="myTabDrop1-contents" data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop1" href="#" aria-expanded="true">More <span class="caret"></span></a>\n\<ul class="dropdown-menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents"> </ul></li>';
 //                    if ($('li').hasClass('more') == false && length > 1) {
 //                        $('#myTabs').append(moreString);
 //                    }
 //                    if (length > 1) {
 //                        //addMoreTabs();
 //                        moreTabs = '<li><a href="#manage_profiles" role="tab" id="manageprofiles" data-toggle="tab" aria-controls="dropdown1">Manage_Profiles</a></li>';
 //                        $('#myTabDrop1-contents').append(moreTabs);
 //                    }
 $('#myTabs li').removeClass('active');
 $('#myTabContent').html(response);
 $('#' + id).addClass('active in');
 $('.' + id).addClass('active in');
 $('#' + id).parent().addClass('active');
 }
 });
 }
 }
 $(document).on('click', '#softwareLicensing', function () {
 $('.softwareLicense').remove();
 });
 /* end Tabbing Script */