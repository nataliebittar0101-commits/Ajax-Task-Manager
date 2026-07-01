$(document).ready(function () {

    $("#addTaskForm").submit(function (e) {
        e.preventDefault();

        let formData = $(this).serialize();
        let taskTitle = $("#taskTitle").val();

        $.ajax({
            url: "api/add.php",
            type: "POST",
            data: formData,
            success: function (response) {
                let newId = response;

                let newRow = `
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input status" data-id="${newId}">
                        </td>
                        <td>${taskTitle}</td>
                    </tr>
                `;

                $("tbody").append(newRow);
                $("#taskTitle").val("");
                $("#addTaskModal").modal("hide");
            },
            error: function () {
                alert("Error adding task");
            }
        });
    });

    $(document).on("change", ".status", function () {
        let taskId = $(this).data("id");
        let status = $(this).is(":checked") ? 1 : 0;

        $.ajax({
            url: "api/status.php",
            type: "POST",
            data: {
                id: taskId,
                status: status
            },
            success: function () {
                console.log("status updated");
            },
            error: function () {
                alert("Error updating status");
            }
        });
    });

});