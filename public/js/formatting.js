
$(document).ready(function () {
    //============  FOR DOLLAR ==============//
    //function for formatting the currency to number format
    function format(num) {
        var str = num.toString().replace("$", ""), parts = false, output = [], i = 1, formatted = null;
        if (str.indexOf(".") > 0) {
            parts = str.split(".");
            str = parts[0];
        }
        str = str.split("").reverse();
        for (var j = 0, len = str.length; j < len; j++) {
            if (str[j] != ",") {
                output.push(str[j]);
                if (i % 3 == 0 && j < (len - 1)) {
                    output.push(",");
                }
                i++;
            }
        }
        formatted = output.reverse().join("");
        return("$" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ".00"));
    }
    ;
    //formatting the currency to number format on blur/focus out
    $("body").on('blur', '.currency', function (e) {
        if ($(this).val())
            $(this).val(format($(this).val()));
    });
    //on click removing the currency format
    $("body").on('click', '.currency', function (e) {
        $(this).val($(this).val().replace('$', ''));
    });

    //============  END FOR DOLLAR ==============//


    //============  FOR PERCENATGE 2 DIGITS ==============//
    //function for formatting the currency to percentage format 2 digits 0.00%
    function formatPercentage(num) {
        var str = num.toString().replace("%", ""), parts = false, output = [], i = 1, formatted = null;
        if (str.indexOf(".") > 0) {
            parts = str.split(".");
            str = parts[0];
        }
        str = str.split("").reverse();
        for (var j = 0, len = str.length; j < len; j++) {
            if (str[j] != ",") {
                output.push(str[j]);
                if (i % 3 == 0 && j < (len - 1)) {
                    output.push(",");
                }
                i++;
            }
        }
        formatted = output.reverse().join("");
        return(formatted + ((parts) ? "." + parts[1].substr(0, 2) : ".00") + "%");
    }
    //formatting the currency to number format on blur/focus out for 2 digits
    $("body").on('blur', '.percentage', function (e) {
        if ($(this).val())
            $(this).val(formatPercentage($(this).val()));
    });
    //on click removing the percentage format from 2 digit percentage field
    $("body").on('click', '.percentage', function (e) {
        $(this).val($(this).val().replace('%', ''));
    });
    //============  END FOR PERCENTAGE 2 DIGITS ==============//

    //============  FOR PERCENATGE 3 DIGITS ==============//
    //function for formatting the currency to percentage format 3 digits 0.000%
    function formatPercentageThreeDigits(num) {
        var str = num.toString().replace("%", ""), parts = false, output = [], i = 1, formatted = null;
        if (str.indexOf(".") > 0) {
            parts = str.split(".");
            str = parts[0];
        }
        str = str.split("").reverse();
        for (var j = 0, len = str.length; j < len; j++) {
            if (str[j] != ",") {
                output.push(str[j]);
                if (i % 3 == 0 && j < (len - 1)) {
                    output.push(",");
                }
                i++;
            }
        }
        formatted = output.reverse().join("");
        return(formatted + ((parts) ? "." + parts[1].substr(0, 3) : ".000") + "%");
    }
    //formatting the percentage to three digit 0.000%
    $("body").on('blur', '.percentageThreeDigit', function (e) {
         if ($(this).val())
            $(this).val(formatPercentageThreeDigits($(this).val()));
    });
    //on click removing the percentage format from3 digit percentage field
    $("body").on('click', '.percentageThreeDigit', function (e) {
        $(this).val($(this).val().replace('%', ''));
    });
    //============  END FOR PERCENATGE 3 DIGITS ==============//

    //============  FOR PHONE NUMBER MASKING ==============//
    $(".phoneNo").mask("(999) 999-9999");
    //============  END FOR PHONE NUMBER MASKING ==============//
});





