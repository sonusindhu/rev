/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var raconfig = {
    warning: function () {

        swal({
            title: "Are you sure?",
            text: "Your will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function () {
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
        });

    },
    success: function (title, text) {
        swal(title, text, "success");
    },
    error: function (title, text) {
        swal(title, text, "warning");
    },
    timeinfo: function (time) {
        swal({
            title: "Auto close alert!",
            text: "I will close in 2 seconds.",
            timer: time,
            showConfirmButton: false
        });
    }
};

//raconfig.success('Good Job!', 'You will not be able to recover this imaginary file!');
//raconfig.error('Are you sure!', 'You will not be able to recover this imaginary file!');
//raconfig.warning();
//raconfig.timeinfo(4000);
