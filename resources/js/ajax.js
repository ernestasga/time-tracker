$(".delete-task").on("click", function(){
    var id = $(this).data("id");
    var token = $(this).data("token");

    $.ajax({
        url: "task/destroy/"+id,
        type: "POST",
        dataType: "JSON",
        data: {
            "id": id,
            "_method": "DELETE",
            "_token": token,
        },
        success: function(response){
            $("#task-"+id).remove();
            $("#taskRemovedAlert")
                .addClass("alert alert-danger text-center")
                .text(response['success'])
                .fadeTo(2000, 500).slideUp(500, function(){
                $("#taskRemovedAlert").slideUp(500);
            });
            $("#taskCount").text(response['tasks_left'])

        }
    })
});
