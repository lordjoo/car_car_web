$(document).ready(function () {
    $(".confirm-del").click(function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'هل انت متأكد من هذا الاحراء',
            showDenyButton: true,
            confirmButtonText: `نعم اكمل`,
            denyButtonText: `لا الغاء`,
            icon:"info"
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location.href = $(this).attr('href')
            } else if (result.isDenied) {
                Swal.fire('تم التراجع عن هذا الاجراء', '', 'info')
            }
        })
    })
})
