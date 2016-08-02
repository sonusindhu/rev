/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).on('change', '#uploadLenderLogo', function () {
    $("#lenderLogo").html('');
    var files = !!this.files ? this.files : [];
    if (!files.length || !window.FileReader)
        return;
    if (/^image/.test(files[0].type)) {
        var reader = new FileReader();
        reader.readAsDataURL(files[0]);
        reader.onloadend = function () {
            $("#lenderLogo").html('<img class="img-responsive" alt="" src="' + this.result + '">');
        }
    } else {
        $(this).val('');
        swal("Oops...", "Only images are accepted!", "error");
    }
});

$(document).on('change', '.uploadDocFile', function () {
    var files = !!this.files ? this.files : [];
    if (!files.length || !window.FileReader)
        return;
    var reader = new FileReader();
    reader.readAsDataURL(files[0]);
    reader.onloadend = function () {
        $("#uploadDocFileName").val(files[0].name);
    }
});

$(document).on('change', '.lenderRateSheet', function () {
    var files = !!this.files ? this.files : [];
    if (!files.length || !window.FileReader)
        return;
    var $fname = files[0].name;
    var file_type = $fname.substr($fname.lastIndexOf('.')).toLowerCase();
    if (file_type == '.pdf') {
        var reader = new FileReader();
        reader.readAsDataURL(files[0]);
       
    } else {
        swal("Oops...", "Only pdf file is accepted!", "error");
    }
});

$(document).on('shown.bs.tab', '#myTabs1 a[data-toggle="tab"]', function (e) {
    $("#myTab1Content .tab-pane").removeClass('active in');
    tabClassId = $(this).attr('aria-controls');
    $("#myTab1Content #" + tabClassId).addClass('active in');
});

$(document).on('shown.bs.tab', '#myTabs2 a[data-toggle="tab"]', function (e) {
    $("#myTabContent2 .tab-pane").removeClass('active in');
    tabClassId = $(this).attr('aria-controls');
    $("#myTabContent2 #" + tabClassId).addClass('active in');
});

$(document).on('shown.bs.tab', '#myTabstip a[data-toggle="tab"]', function (e) {
    $("#myTabContenttip .tab-pane").removeClass('active in');
    tabClassId = $(this).attr('aria-controls');
    $("#myTabContenttip #" + tabClassId).addClass('active in');
});

$(document).on('shown.bs.tab', '#myTabsnotice a[data-toggle="tab"]', function (e) {
    $("#myTabContentnotice .tab-pane").removeClass('active in');
    tabClassId = $(this).attr('aria-controls');
    $("#myTabContentnotice #" + tabClassId).addClass('active in');
});

$(document).on('ifChecked ifUnchecked', 'input.all', function (event) {
    if (event.type == 'ifChecked') {
        $('input.check').iCheck('check');
    } else {
        $('input.check').iCheck('uncheck');
    }
});
$(document).on('ifUnchecked', 'input.check', function (event) {
    $('input.all').iCheck('uncheck');
});

$(document).on('click', '.clearallrange', function (event) {
    $('.emptyAllRange').val('');
});
$(document).on('click', '.clearMarginCl', function (event) {
    $('.emptyMarginC').val('');
});

$(document).ajaxStart(function () {
    console.log('started');
});
$(document).ajaxComplete(function () {
    console.log('ended');
});