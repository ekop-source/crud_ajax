<div class="modal-header">
        <h5 class="modal-title">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <form action="javascript:formSubmit('modal_edit')" id="modal_edit" 
        url="{{ route('penjualan.update') }}"
        method="post">
    <div class="modal-body">
        @csrf
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Id Barang</label>
                    <input type="text" class="form-control" name="id_barang" placeholder="Id Barang" value="{{ $data->id_barang }}" required>
                </div>
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" value="{{ $data->nama_barang }}" required>
                </div>
                <div class="form-group">
                    <label>Jenis Barang</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_barang" value="Baru" @if ($data->jenis_barang === 'Baru') checked @endif>
                        <label class="form-check-label">
                            Baru
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_barang" value="Bekas" @if ($data->jenis_barang === 'Bekasn') checked @endif>
                        <label class="form-check-label">
                            Bekas
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Harga Barang</label>
                    <input type="text" class="form-control"  name="harga_barang" value="{{ $data->harga_barang }}" placeholder="Harga Barang">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="formSubmit('modal_edit')" class="btn btn-primary"><i id="msg_modal_edit"></i>  Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    </form>