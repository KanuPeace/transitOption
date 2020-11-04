function setRegInputValue(){

    return element.val(value);
}


$(".setRegInputValue").on("click" , function(e){
    e.preventDefault();
    $(".setRegInputValue").removeClass("selected_reg");
    $(this).addClass("selected_reg");
    $("#userRoleInput").val($(this).attr("data-value"));
})