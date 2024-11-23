<div class="modal-header">
        <h5 class="modal-title">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <form action="javascript:formSubmit('modal_input')" id="modal_input" 
        url="{{ route('penjualan.create') }}"
        method="post">
    <div class="modal-body">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Id Barang</label>
                    <input type="text" class="form-control" name="id_barang" placeholder="Id Barang" required>
                </div>
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" required>
                </div>
                <div class="form-group">
                    <label>Jenis Barang</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_barang" value="Baru">
                        <label class="form-check-label">
                            Baru
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_barang" value="Bekas">
                        <label class="form-check-label">
                            Bekas
                        </label>
                    </div>
                <div class="form-group">
                    <label>Harga Barang</label>
                    <input type="text" class="form-control"  name="harga_barang" placeholder="Harga Barang">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="formSubmit('modal_input')" class="btn btn-primary"><i id="msg_modal_input"></i>  Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    </form>