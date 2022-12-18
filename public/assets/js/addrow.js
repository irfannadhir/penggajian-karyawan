const AddRowController = (() => {
    const addRow = (data) => {
        let produks = JSON.parse(data);
        $("#addRow").click(function () {
            let html = `
            <div class="input-group mb-3 inputFormRow">
                <select name="produk_id[]" class="form-control">                 
                    ${produks.map(
                        (v) =>
                            `<option value="${v.id}">${v.nama_produk}</option>`
                    )}
                </select>
                <input type="number" name="qty[]" class="form-control m-input" required
                    placeholder="Masukkan qty">
                <div class="input-group-append">
                    <button id="removeRow" type="button"
                        class="btn btn-danger">Hapus</button>
                </div>
            </div>
           `;
            $("#newRow").append(html);
        });
    };

    return {
        init: (data) => {
            addRow(data);
        },
    };
})();
