$('.updateProductStatus').on('click',function(){
    var status = $(this).children("i").attr("status");
    var product_id = $(this).attr("product_id");
    console.log(status);

    $.ajax({
        type:'post',
        url:'/admin/update-product-status',
        data:{status:status,product_id:product_id, _token: '{{csrf_token()}}'},

        success:function(resp)
        {
            // alert(resp['status']);
            // alert(resp['category_id']);
            // alert(resp['status']);
            if(resp['status']==0){
                $("#product-"+product_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='InActive'></i>");
            }else if(resp['status']==1){
                $("#product-"+product_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='Active'></i>");
            }
        },
        error:function(){
            alert("ERROR");
        }
    });
});