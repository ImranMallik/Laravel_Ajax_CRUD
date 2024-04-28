$(function () {
    $(document).on("click", "#delete", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: "Are you sure?",
            text: "Delete This Data?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Deleted!", "Your file has been deleted.", "success");
            }
        });
    });
});

// $(document).ready(function () {
//     $.ajaxSetup({
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//         },
//     });

//     $("body").on("click", ".delet-item", function (event) {
//         // alert(event);
//         event.preventDefault();

//         let deleteUrl = $(this).attr("href");
//         // alert(deleteUrl);

//         Swal.fire({
//             title: "Are you sure?",
//             text: "You won't be able to revert this!",
//             icon: "warning",
//             showCancelButton: true,
//             confirmButtonColor: "#3085d6",
//             cancelButtonColor: "#d33",
//             confirmButtonText: "Yes, delete it!",
//         }).then((result) => {
//             if (result.isConfirmed) {
//                 // Ajax delete
//                 $.ajax({
//                     type: "DELETE",
//                     url: deleteUrl,

//                     success: function (data) {
//                         if (data.status == "success") {
//                             Swal.fire("Deleted!", data.message, "success");
//                             window.location.reload();
//                         } else if (data.status == "error") {
//                             Swal.fire("Can't Delete", data.message, "error");
//                         }
//                     },
//                     error: function (xhr, status, error) {
//                         console.log(error);
//                     },
//                 });
//             }
//         });
//     });
// });
