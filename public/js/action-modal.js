// jika modal dengan #actionModal tampil (shown)
$('#actionModal').on('shown.bs.modal', function (e) {
    // element button
    var button = $(e.relatedTarget);

    // mengambil nilai button pada attribut action 
    var method = button.data('method');
    var action = button.data('action');
    var title = button.data('title');

    // element modal
    var modal = $(this);
    var form = modal.find('form');

    // pesan body
    if (method == "delete") {
        modal.find('.modal-title').text("Yakin akan dihapus ?");
        modal.find('.modal-body').text("Pilih 'Delete' jika anda ingin menghapus.");
        modal.find('.modal-footer #submit').text("Delete");
        if (form.find('input[name="_method"][value="DELETE"]').length === 0) {
            form.append('<input type="hidden" name="_method" value="DELETE">');
        }
    } else if (method == "put") {
        if (title == "setujui") {
            modal.find('.modal-title').text("Yakin akan disetujui ?");
            modal.find('.modal-body').text("Pilih 'Yes' jika anda ingin menyetujui ajuan.");
            modal.find('.modal-footer #submit').text("Yes");
        }
        else if (title == "pengembalian") {
            modal.find('.modal-title').text("Yakin akan dikembalikan ?");
            modal.find('.modal-body').text("Pilih 'Yes' jika anda ingin menyetujui pengembalian buku.");
            modal.find('.modal-footer #submit').text("Yes");
        }
        else if (title == "batal") {
            modal.find('.modal-title').text("Yakin akan dibatalkan ?");
            modal.find('.modal-body').text("Pilih 'Yes' jika anda ingin membatalkan ajuan.");
            modal.find('.modal-footer #submit').text("Yes");
        }

        if (form.find('input[name="_method"][value="PUT"]').length === 0) {
            form.append('<input type="hidden" name="_method" value="PUT ">');
        }
    }

    // mengisi nilai atribut action pada tag form
    modal.find('form').attr('action', action);
});