$(document).ready(function() {
    $("[data-type='delete_user']").click(function() {
        $title = $(this).data("title");
        if (!$title) $title = "Are you sure?";
        $subtitle = $(this).data("subtitle");
        if (!$subtitle) $subtitle = "Once Delete, You will not get back this log in future!";
        swal({
            title: $title,
            text: $subtitle,
            icon: "warning",
            buttons: !0,
            dangerMode: !0
        }).then(t => {
            if (t) {
                var o = $(this).data("url");
                console.log(o, csrf_token);
                $.post(o).done(t => {
                    location.reload();
                }).fail(function(e, t, n) {
                    show_toast("error", "Network or Database Error."), _log(e, t, n)
                })
            }
        })
    });


    $("#tt").datepicker({ dateFormat: 'dd/mm/yy', minDate: 0 });


    // $("input[type='date'].alt-date").on("change", function(e) {
    //     $('#date').datepicker({ dateFormat: 'dd-mm-yy' }).val();
    // }).trigger("change")

    //custom datatable search
    $("#search_table").on('keyup', function() {
        var input, filter, table, tr, td, i, txtValue;
        input = $("#search_table").val() + "";
        filter = input.toUpperCase();
        tr = $(".data-table > tbody > tr");
        console.log("here");
        for (i = 0; i < tr.length; i++) {
            td = $(tr[i]).find("td")[0];
            console.log(td);
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    $(tr[i]).show();
                } else {
                    $(tr[i]).hide();
                }
            }
        }

    });

    //clipboard
    $(".clipboard").on("click", function() {
        var $temp = $("<input>");
        $("body").append($temp);
        var copyText = $(".clipboard-value").val();
        $temp.val(copyText).select();
        document.execCommand("copy");
        $temp.remove();
    });
    // common numerical input
    $(".comma").on("keydown", function(e) {
        var keycode = (event.which) ? event.which : event.keyCode;
        if (e.shiftKey == true || e.ctrlKey == true) return false;
        if ([8, 110, 39, 37, 46].indexOf(keycode) >= 0 || // allow tab, dot, left and right arrows, delete keys
            (keycode == 190 && this.value.indexOf('.') === -1) || // allow dot if not exists in the value
            (keycode == 110 && this.value.indexOf('.') === -1) || // allow dot if not exists in the value
            (keycode >= 48 && keycode <= 57) || // allow numbers
            (keycode >= 96 && keycode <= 105)) { // allow numpad numbers
            // check for the decimals after dot and prevent any digits
            var parts = this.value.split('.');
            if (parts.length > 1 && // has decimals
                parts[1].length >= 2 && // should limit this
                (
                    (keycode >= 48 && keycode <= 57) || (keycode >= 96 && keycode <= 105)
                ) // requested key is a digit
            ) {
                return false;
            } else {
                if (keycode == 110) {
                    this.value += ".";
                    return false;
                }
                return true;
            }
        } else {
            return false;
        }
    }).on("keyup", function() {
        var parts = this.value.split('.');
        parts[0] = parts[0].replace(/,/g, '').replace(/^0+/g, '');
        if (parts[0] == "") parts[0] = "0";
        var calculated = parts[0].replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
        if (parts.length >= 2) calculated += "." + parts[1].substring(0, 2);
        this.value = calculated;
        if (this.value == "NaN" || this.value == "") this.value = 0;
    });

    $(".numerical").on("keydown", function(e) {
        var keycode = (event.which) ? event.which : event.keyCode;
        if (e.shiftKey == true || e.ctrlKey == true) return false;
        if ([8, 39, 37, 46].indexOf(keycode) >= 0 || // allow tab, dot, left and right arrows, delete keys
            (keycode >= 48 && keycode <= 57) || // allow numbers
            (keycode >= 96 && keycode <= 105)) { // allow numpad numbers
            return true;
        } else {
            return false;
        }
    });

    // percent numerical input
    $('.percent').on("keydown", function(e) {
        var keycode = (event.which) ? event.which : event.keyCode;
        if (e.shiftKey == true || e.ctrlKey == true) return false;
        if ([8, 110, 39, 37, 46].indexOf(keycode) >= 0 || // allow tab, dot, left and right arrows, delete keys
            (keycode == 190 && this.value.indexOf('.') === -1) || // allow dot if not exists in the value
            (keycode == 110 && this.value.indexOf('.') === -1) || // allow dot if not exists in the value
            (keycode >= 48 && keycode <= 57) || // allow numbers
            (keycode >= 96 && keycode <= 105)) { // allow numpad numbers
            // check for the decimals after dot and prevent any digits
            var parts = this.value.split('.');
            if (parts.length > 1 && // has decimals
                parts[1].length >= 3 && // should limit this
                (
                    (keycode >= 48 && keycode <= 57) || (keycode >= 96 && keycode <= 105)
                ) // requested key is a digit
            ) {
                return false;
            } else {
                if (keycode == 110) {
                    this.value += ".";
                    return false;
                }
                if (this.value.indexOf("%") > -1) {
                    var part = this.value;
                    this.value = part.replace(/%/g, '').replace(/^0+/g, '');
                }

                return true;

            }
        } else {
            return false;
        }
    }).on("keyup", function() {
        if (this.value == "NaN" || this.value == "") this.value = "0";
        if (this.value[this.value.length - 1] != '%') this.value = this.value + '%';
    })
})