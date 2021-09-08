    $(".btn-save").off();
    $(".btn-save").on("click", function(e) {
        e.preventDefault();
        var form = $(this).data("form");
        var action = $(this).data("action");
        var message = $(this).data("message");
        var $confirm = $(this).data("confirm");
        if (form == null)
            alert("No form defined");
        else {
            if ($(form).length > 0) {
                if (action != null)
                    $(form).attr("action", action);
                if ($confirm != null && !$confirm) {
                    $(".preloader").show();
                    var submit = $(form).trigger("submit");
                    if (submit)
                        $(".preloader").hide();
                } else {
                    confirmDialog({
                        content: (message == null) ? "Anda yakin menyimpan data?" : message,
                        yes: function() {
                            $(".preloader").show();
                            var submit = $(form).trigger("submit");
                            if (submit)
                                $(".preloader").hide();
                        }
                    });
                }
            } else {
                alert(form + " Not Found");
            }
        }
    });

    $(".btn-remove-row").off();
    $(".btn-remove-row").on("click", function(e) {
        e.preventDefault();
        var target = $(this).attr("data-target");
        if (target != null)
            $(target).remove();
        else {
            var parent = $(this).parent().parent();
            parent.remove();
        }
    });

    $(".btn-delete").off();
    $(".btn-delete").on("click", function(e) {
        e.preventDefault();
        var link = $(this).data("href");
        if (link == null)
            link = $(this).attr("href");
        var msg = $(this).data("message");
        deleteDialog(link, msg);
    });

    $(".alert").off();
    $(".alert").on("click", function() {
        $(this).hide();
    });

    function showPassword(param) {
        let form = param.parentElement.previousElementSibling;
        let icon = param.firstElementChild;
        if (form.type === "password") {
            form.type = "text";
            icon.className = "fa fa-eye";
        } else {
            form.type = "password";
            icon.className = "fa fa-eye-slash";
        }
    }
