// const { data } = require("jquery");


//check admin current password right or wrong
$("#current_pwd").keyup(function(){
    var current_pwd = $("#current_pwd").val();
    // alert(current_pwd);
    $.ajax({
        type='post',
        url:'/admin/check-current-pwd',
        data:{current_pwd:current_pwd},
        success:function(resp){
            if(resp=="false"){
                $("#chkCurrentPwd").html("<font color=red>current password is incorrect</font>");
            }else if(resp=="true"){
                $("#chkCurrentPwd").html("<font color=red>current password is correct</font>");
            }
        }, error:function(){
            alert("ERROR");
        }
    });
});

// $('#section_id').change(function(){
//     var section_id=$(this).val();
//     $.ajax({
//     type:'post',
//     url:'/admin/append-categories-level',
//     data:{section_id:section_id},
//     success:function(resp){
//         $("appendCategoriesLevel").html(resp);
//     },error:function(){
//         alert("Error");
//     }
//     });
//     });

// $('.updateSectionStatus').on('click',function(){
//     var status = $(this).text();
//     var section_id = $(this).attr("section_id");

//     $.ajax({
//         type:'post',
//         url:'/admin/update-section-status',
//         data:{status:status,section_id:section_id},

//         success:function(resp)
//         {
//             // alert(resp['status']);
//             // alert(resp['section_id']);
//             // alert(resp['status']);
//             if(resp['status']==0){
//                 $("#section-"+section_id).html("<a class='updateSectionStatus'  href='JavaScript:void(0)'>Inactive</a>");
//             }else if(resp['status']==1){
//                 $("#section-"+section_id).html("<a class='updateSectionStatus'  href='JavaScript:void(0)'>Active</a>");
//             }
//         },error:function(){
//             alert("ERROR");
//         }
//     });
// });

