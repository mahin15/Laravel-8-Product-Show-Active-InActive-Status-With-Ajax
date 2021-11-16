// import swal from 'sweetalert';
$(".confirmDelete").click(function(){
    var record = $(this).attr("record");
    var recordid = $(this).attr("recordid");
    Swal.fire({
        title:'Are You Sure?',
        text:"You Won't Able to revert this!",
        icon:'warning',
        showCancelButton:true,
        confirmButtonColor:'#3085d6',
        cancelButtonColor:'#d33',
        confirmButtonText:'Yes, delete it!',
    }).then((result)=>{
        if(result.value){
            window.location.href="/admin/delete-"+record+"/"+recordid;
        }
    });
});