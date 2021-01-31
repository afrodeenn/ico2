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

    //admin jurisdition.blade.php edit modal
    $(".editJurisdiction").click(function() {
        $("[name='juris_name']").val($(this).data('juris'));
        $("[name='lang_code']").val($(this).data('langcode')).trigger('change');
        $("[name='cur_code']").val($(this).data('curcode')).trigger('change');
        // console.log($(this).data('statue'));
        if ($(this).data('statue') == 'active') {
            $("[name='statue_switcher']").prop('checked', true);
            $("#btnEditJuris").show();
        } else {
            $("[name='statue_switcher']").prop('checked', false);
            $("#btnEditJuris").hide();
        }
        $("[name='juris_id']").val($(this).data('id'));
    });

    //admin article_detail.blade.php edit modal
    $("[data-target='#editArticle']").on("click", function() {
        $name = $(this).data('selector');
        if ($name == "empty") {
            $("#type").val('insert');
            $("#entityAll").show();
            $val = "";
        } else {
            $("#entityAll").hide();
            $('#textEditHide').val($name);
            $val = $('#' + $name).val();
            if ($val == 'null') {
                $val = "";
                $("#articleAll").show();
                $("#type").val('create');
            } else {
                $("#articleAll").hide();
                $("#type").val('update');
            }
        }
        $('#textEdit').trumbowyg('html', $val);
    });

    $("[name='selectionEntity']").on('change', function() {
        $val = $(this).val();
        $('[name^="column"]').hide();
        $.each($val, function(index, value) {
            $('[name="column' + value + '"]').show();
        })
    });


    //custom datatable search 
    $("#search_table").on('keyup', function() {
        var input, filter, table, tr, td, i, txtValue;
        input = $("#search_table").val() + "";
        filter = input.toUpperCase();
        tr = $(".data-table > tbody > tr");

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

    })
})