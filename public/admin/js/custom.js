$(document).ready(function(){

    // datatable
    $(document).ready(function () {
        $('#sections').DataTable();
    });


    $(".nav-item").removeClass("active");
    $(".nav-link").removeClass("active");
    // Check Admin Password
    $('#current_password').keyup(function(){
        var current_password = $("#current_password").val();
        console.log(current_password);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"post",
            url:"/admin/check-admin-password",
            data:{current_password:current_password},
            success:function(res){
                console.log(res)
                if (res == "false") {
                    $("#check_password").html("<font color='red'>Current password is incorrect!</font>")
                } else if (res == "true"){
                    $("#check_password").html("<font color='green'>Current password is correct!</font>")
                }
            },
            error:function(err){
                console.log(err)
            }
        });
    })

    // Update Admin Status
    $(document).on("click",".updateAdminStatus",function(){
        var status = $(this).children("i").attr("status")
        console.log(status)
        var admin_id = $(this).attr("admin_id")
        console.log(admin_id)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"post",
            url:"/admin/update-admin-status",
            data:{status:status,admin_id:admin_id},
            success:function(resp){
                if(resp['status'] == 0){
                    $('#admin-'+admin_id).html("<i style='font-size:25px' class='mdi mdi-bookmark-outline' status='Inactive'></i>");
                } else {
                    $('#admin-'+admin_id).html("<i style='font-size:25px' class='mdi mdi-bookmark-check' status='Active' ></i>")
                }
            },
            error:function(err){
                console.log(err)
            }
        })

    })

        // Update Admin Status
        $(document).on("click",".updateSectionStatus",function(){
            var status = $(this).children("i").attr("status")
            var section_id = $(this).attr("section_id")
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"post",
                url:"/admin/update-section-status",
                data:{status:status,section_id:section_id},
                success:function(resp){
                    if(resp['status'] == 0){
                        $('#section-'+section_id).html("<i style='font-size:25px' class='mdi mdi-bookmark-outline' status='Inactive'></i>");
                    } else {
                        $('#section-'+section_id).html("<i style='font-size:25px' class='mdi mdi-bookmark-check' status='Active' ></i>")
                    }
                },
                error:function(err){
                    console.log(err)
                }
            })

        })
});
