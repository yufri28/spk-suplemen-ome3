<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Sub Kriteria</h4>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addSubkriteria"><i
                    class="bi bi-plus-circle"></i> Tambah Sub
                Kriteria</button>
        </div>
        <div class="card-body">
            <table id="subkriteriaTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Sub Kriteria</th>
                        <th>Bobot</th>
                        <th>Kriteria</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                    <?php foreach($subkriteria as $s): ?>
                    <tr>
                        <td><?= $i++?>. </td>
                        <td><?= $s->nama_sub_kriteria ?></td>
                        <td><?= $s->bobot_sub_kriteria ?></td>
                        <td><?= $s->nama_kriteria ?></td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#editSubkriteria<?= $s->id_sub_kriteria ?>"><i
                                    class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteSubkriteria<?= $s->id_sub_kriteria ?>"><i
                                    class="bi bi-trash3"></i></button>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="editSubkriteria<?= $s->id_sub_kriteria ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <form action="<?= site_url('subkriteria/update/'.$s->id_sub_kriteria) ?>" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Sub Kriteria</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label>Nama Sub Kriteria</label>
                                            <input type="text" name="nama_sub_kriteria"
                                                value="<?= $s->nama_sub_kriteria ?>" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Bobot</label>
                                            <input type="number" step="0.01" name="bobot_sub_kriteria"
                                                value="<?= $s->bobot_sub_kriteria ?>" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Kriteria</label>
                                            <select name="f_id_kriteria" class="form-control" required>
                                                <?php foreach($kriteria as $k): ?>
                                                <option value="<?= $k->id_kriteria ?>"
                                                    <?= ($s->f_id_kriteria == $k->id_kriteria ? 'selected' : '') ?>>
                                                    <?= $k->nama_kriteria ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal Delete -->
                    <div class="modal fade" id="deleteSubkriteria<?= $s->id_sub_kriteria ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <form action="<?= site_url('subkriteria/delete/'.$s->id_sub_kriteria) ?>" method="post">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p>Apakah anda yakin ingin menghapus <b><?= $s->nama_sub_kriteria ?></b>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="addSubkriteria" tabindex="-1">
    <div class="modal-dialog">
        <form action="<?= site_url('subkriteria/store') ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Sub Kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama Sub Kriteria</label>
                        <input type="text" name="nama_sub_kriteria" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Bobot</label>
                        <input type="number" step="0.01" name="bobot_sub_kriteria" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Kriteria</label>
                        <select name="f_id_kriteria" class="form-control" required>
                            <?php foreach($kriteria as $k): ?>
                            <option value="<?= $k->id_kriteria ?>"><?= $k->nama_kriteria ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>