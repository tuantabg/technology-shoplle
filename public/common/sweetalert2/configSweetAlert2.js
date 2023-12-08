// Js SweetAlert2
$(function () {
    $(document).on('click', '.action-delete', actionDelete)
})

function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);

    Swal.fire({
        title: "Bạn có chắc không?",
        text: "Bạn sẽ không thể hoàn nguyên điều này!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Không xóa",
        confirmButtonText: "Ok, Xóa đi!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: urlRequest,
                success: function (data) {
                    if (data.code == 200) {
                        that.parent().parent().remove();
                        Swal.fire({
                            title: "Đã xóa!",
                            text: "Tập tin của bạn đã bị xóa.",
                            icon: "success"
                        });
                    }
                },
                error: function () {}
            })
        }
    });
}
