<!-- Large modal -->
<div class="modal fade" id="addSurat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">Rekam Surat Masuk/Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form -->

                <form method="POST" enctype="multipart/form-data" action="{{ route('record.surat') }}">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input name="judul" type="text" class="form-control" id="judul" placeholder="Masukan judul">
                    </div>

                    <div class="form-group">
                        <label for="tgl_pembukuan">Tanggal Pembukuan</label>
                        <input name="tgl_pembukuan" type="date" class="form-control" id="tgl_pembukuan">
                    </div>

                    <div class="form-group">
                        <label for="tgl_surat">Tanggal Surat</label>
                        <input name="tgl_surat" type="date" class="form-control" id="tgl_surat"
                            placeholder="Masukan tanggal surat">
                    </div>

                    <div class="form-group">
                        <label for="asal_surat">Asal</label>
                        <input name="asal_surat" type="text" class="form-control" id="asal_surat"
                            placeholder="Masukan asal surat">
                    </div>

                    <div class="form-group">
                        <label for="no_surat">No Surat</label>
                        <input name="no_surat" type="text" class="form-control" id="no_surat"
                            placeholder="Masukan no surat">
                    </div>

                    <div class="form-group">
                        <label for="index_surat">Index</label>
                        <input name="index_surat" type="text" class="form-control" id="index_surat"
                            placeholder="Masukan index surat">
                    </div>

                    <div class="form-group">
                        <label for="nama_surat">Nama Surat</label>
                        <select name="nama_surat" class="form-control" id="nama_surat">
                            <option disabled selected value>Pilih nama surat</option>
                            <option value="disposisi">Surat Disposisi</option>
                            <option value="keterangan">Surat Keterangan</option>
                            <option value="pengantar">Surat Pengantar</option>
                            <option value="keputusan">Surat Keputusan</option>
                            <option value="undangan">Surat Undangan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jenis_surat">Jenis</label>
                        <select name="jenis_surat" class="form-control" id="jenis_surat">
                            <option disabled selected value>Pilih jenis surat</option>
                            <option value="masuk">Surat Masuk</option>
                            <option value="keluar">Surat Keluar</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="perihal">Perihal</label>
                        <input name="perihal" type="text" class="form-control" id="perihal"
                            placeholder="Masukan perihal">
                        <small id="emailHelp" class="form-text text-muted">Masukan tanda baca hubung (-) bila Perihal
                            tidak tersedia</small>
                    </div>

                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <input name="tujuan" type="text" class="form-control" id="tujuan"
                            placeholder="Ditujukan kepada">
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan" cols="5" rows="5"
                            placeholder="Masukan keterangan"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="penerima">Penerima</label>
                        <input name="penerima" type="text" class="form-control" id="penerima"
                            placeholder="Masukan penerima surat">
                    </div>

                    <div class="form-group">
                        <label for="nip_penerima">NIP</label>
                        <input name="nip_penerima" type="text" class="form-control" id="nip_penerima"
                            placeholder="Masukan NIP penerima">
                        <small id="emailHelp" class="form-text text-muted">Masukan tanda baca hubung (-) bila NIP tidak
                            tersedia</small>
                    </div>

                    <div class="form-group">
                        <label for="arsip">Arsip</label>
                        <input name="arsip" type="file" class="form-control" id="arsip">
                        <small class="form-text text-muted">Upload arsip berupa gambar hasil scan.</small>
                    </div>

                    <input type="submit" value="Submit" class="btn btn-primary">
                </form>

                <!-- End of Form -->
            </div>
        </div>
    </div>
</div>
<!-- End of large modal -->
