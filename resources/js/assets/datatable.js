$(document).ready(function () {
    $("#miTabla").DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json",
        },
        paging: true,
        ordering: true,
        searching: true,
    });
});

forms = document.querySelectorAll(".delete");

forms.forEach((form) => {
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        Swal.fire({
            title: "¿Estas seguro?",
            text: "Deseas eliminar este registro!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, eliminar!",
            cancelButtonText: "No, cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
