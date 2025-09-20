<div class="app-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Kriteria</h4>
                        <div class="d-flex justify-content-start mb-2">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addKriteria">
                                <i class="bi bi-plus-circle"></i> Tambah Kriteria
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="kriteriaTable" class="table align-middle custom-table m-0 text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Kriteria</th>
                                        <th>Nama Kriteria</th>
                                        <th>Jenis</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($kriteria as $k): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $k->id_kriteria ?></td>
                                        <td><?= $k->nama_kriteria ?></td>
                                        <td><?= ucfirst($k->jenis_kriteria) ?></td>
                                        <td>
                                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editKriteria<?= $k->id_kriteria ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteKriteria<?= $k->id_kriteria ?>">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="editKriteria<?= $k->id_kriteria ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="<?= site_url('kriteria/update/'.$k->id_kriteria) ?>"
                                                    method="post">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Kriteria</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label>Kode Kriteria</label>
                                                            <input type="text" class="form-control" maxlength="3"
                                                                name="kode_kriteria" value="<?= $k->id_kriteria ?>"
                                                                disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Nama Kriteria</label>
                                                            <input type="text" class="form-control" name="nama_kriteria"
                                                                value="<?= $k->nama_kriteria ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Jenis</label>
                                                            <select name="jenis_kriteria" class="form-control" required>
                                                                <option value="cost"
                                                                    <?= $k->jenis_kriteria=='cost'?'selected':'' ?>>
                                                                    Cost</option>
                                                                <option value="benefit"
                                                                    <?= $k->jenis_kriteria=='benefit'?'selected':'' ?>>
                                                                    Benefit</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="deleteKriteria<?= $k->id_kriteria ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="<?= site_url('kriteria/delete/'.$k->id_kriteria) ?>"
                                                    method="post">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus
                                                        <b><?= $k->nama_kriteria ?></b>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="addKriteria" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= site_url('kriteria/store') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Kode Kriteria</label>
                        <input type="text" class="form-control" maxlength="3" name="id_kriteria" required>
                    </div>
                    <div class="mb-3">
                        <label>Nama Kriteria</label>
                        <input type="text" class="form-control" name="nama_kriteria" required>
                    </div>
                    <div class="mb-3">
                        <label>Jenis</label>
                        <select name="jenis_kriteria" class="form-control" required>
                            <option value="cost">Cost</option>
                            <option value="benefit">Benefit</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>