
function rolePassword(item) {
    if($('#id').val() != '' && item.val() == '') {
        return true;
    }
    let valPassword = item.val();
    let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})/;
    if (regex.test(valPassword)) {
        item.removeClass("border-warning");
        return true;  
    }
    item.addClass("border-warning");
    return false;
}
function roleEmail(item) {
    let valEmail = item.val();
    let regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (regex.test(valEmail)) {
        item.removeClass("border-warning");
        return true;  
    }
    item.addClass("border-warning");
    return false;
}
function roleNoEmpty(item) {
    let valDOB = item.val();
    if(valDOB != '') {
        item.removeClass("border-warning");
        return true;
    }
    item.addClass("border-warning");
    return false;
}
function autoCheckRadio(item1, item2) {
    if(item1.prop('checked')==false && item2.prop('checked')==false) {
        item1.attr('checked', true);
    }
}
$(document).ready(function () {
    $("#addUser").on("click", function () {
        autoCheckRadio($("#inactive"), $("#active"));
        autoCheckRadio($("#Customer"), $("#Administrator"));
        let resultPass = rolePassword($("#password"));
        let resultUser = roleNoEmpty($("#username"));
        let resultName = roleNoEmpty($("#fullname"));
        let resultDOB = roleNoEmpty($("#dob"));
        let resultEmail = roleEmail($("#email"));
        if(resultPass && resultUser && resultName && resultDOB && resultEmail) {
            return true;
        }
        return false;
    })
});

//Submit xóa 1 sản phẩm
$(document).ready(function () {
    $(".delUser").on("click", function () {
        let obj = $(this).parent().attr('id');
        $('#' + obj).submit();
        return false;
    })
});
//Submit tìm kiếm
$(document).ready(function () {
    $(".submitSearch").on("click", function () {
        $('#formSearch').submit();
        return false;
    })
});