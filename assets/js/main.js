$(document).on("click", ".kegiatan-file-uploader", function () {
     var kegiatanId = $(this).data('idkegiatan');
     $(".modal-body #id_kegiatan_file").val( kegiatanId );
});
