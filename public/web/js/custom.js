$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});


$(".setRegInputValue").on("click" , function(e){
    e.preventDefault();
    $(".setRegInputValue").removeClass("selected_reg");
    $(this).addClass("selected_reg");
    $("#userRoleInput").val($(this).attr("data-value"));
})



$(".loadLocationOptions").on("change" , function(){
    let url = $(this).attr('url')+'/'+$(this).val();
    let target = $($(this).attr('data-target'));
    getLocationData(url , target);

})


function getLocationData(url, targetElement, method = "GET"){
    $.ajax({
        url: url,
        type: method,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            console.log(data);
            if (data.success) {
                targetElement.empty()
               jQuery.each(data.data , function(index){
                    let item = data.data[index];
                    targetElement.append('<option value="'+ item.id +'">'+ item.name +'</option>');
               });
            }
        }

    });
}



