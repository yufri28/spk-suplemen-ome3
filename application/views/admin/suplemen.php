<!-- App body starts -->
<div class="app-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Daftar Suplemen</h4>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#addSuplemen">
                            <i class="bi bi-plus-circle"></i> Tambah Suplemen
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="custom-table" class="table nowrap table-bordered table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <?php foreach ($kriteria as $k): ?>
                                        <th><?= $k->nama_kriteria ?></th>
                                        <?php endforeach; ?>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($suplemen as $s): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <?php if($s->gambar): ?>
                                            <img src="<?= base_url('uploads/'.$s->gambar) ?>" class="img-thumbnail"
                                                width="60">
                                            <?php else: ?>
                                            <span class="badge bg-secondary">No Image</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $s->nama_alternatif ?></td>
                                        <?php foreach ($kriteria as $k): ?>
                                        <td><?= $s->nilai[$k->id_kriteria]['nama'] ?? '-' ?></td>
                                        <?php endforeach; ?>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                                data-bs-target="#editSuplemen<?= $s->id_alternatif ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteSuplemen<?= $s->id_alternatif ?>">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="editSuplemen<?= $s->id_alternatif ?>" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form action="<?= site_url('suplemen/update/'.$s->id_alternatif) ?>"
                                                    method="post" enctype="multipart/form-data">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Suplemen</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="old_gambar"
                                                            value="<?= $s->gambar ?>">

                                                        <div class="mb-3">
                                                            <label>Nama Alternatif</label>
                                                            <input type="text" class="form-control"
                                                                name="nama_alternatif"
                                                                value="<?= $s->nama_alternatif ?>" required>
                                                        </div>

                                                        <?php foreach($kriteria as $k): ?>
                                                        <?php 
                                                            $selected_sub = isset($s->nilai[$k->id_kriteria]['id']) 
                                                                            ? $s->nilai[$k->id_kriteria]['id'] 
                                                                            : '';
                                                        ?>
                                                        <div class="mb-3">
                                                            <label><?= $k->nama_kriteria ?></label>
                                                            <select class="form-control"
                                                                name="kriteria[<?= $k->id_kriteria ?>]">
                                                                <option value="">-- Pilih <?= $k->nama_kriteria ?> --
                                                                </option>
                                                                <?php foreach($subkriteria as $sk): ?>
                                                                <?php if ($sk->f_id_kriteria == $k->id_kriteria): ?>
                                                                <option value="<?= $sk->id_sub_kriteria ?>"
                                                                    <?= ($selected_sub == $sk->id_sub_kriteria) ? 'selected' : '' ?>>
                                                                    <?= $sk->nama_sub_kriteria ?>
                                                                </option>
                                                                <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <?php endforeach; ?>


                                                        <div class="mb-3">
                                                            <label>Gambar</label><br>
                                                            <?php if($s->gambar): ?>
                                                            <img src="<?= base_url('uploads/'.$s->gambar) ?>" width="80"
                                                                class="mb-2">
                                                            <?php endif; ?>
                                                            <input type="file" name="gambar" class="form-control">
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
                                    <div class="modal fade" id="deleteSuplemen<?= $s->id_alternatif ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="<?= site_url('suplemen/delete/'.$s->id_alternatif) ?>"
                                                    method="post">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin ingin menghapus
                                                            <b><?= $s->nama_alternatif ?></b>?
                                                        </p>
                                                        <?php if($s->gambar): ?>
                                                        <img src="<?= base_url('uploads/'.$s->gambar) ?>" width="80"
                                                            class="img-thumbnail">
                                                        <?php endif; ?>
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
<!-- App body ends -->

<!-- Modal Tambah -->
<div class="modal fade" id="addSuplemen" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= site_url('suplemen/store') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Suplemen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama Alternatif</label>
                        <input type="text" class="form-control" name="nama_alternatif" required>
                    </div>

                    <?php foreach($kriteria as $k): ?>
                    <div class="mb-3">
                        <label><?= $k->nama_kriteria ?></label>
                        <select class="form-control" name="kriteria[<?= $k->id_kriteria ?>]">
                            <option value="">-- Pilih <?= $k->nama_kriteria ?> --</option>
                            <?php foreach($subkriteria as $sk): ?>
                            <?php if ($sk->f_id_kriteria == $k->id_kriteria): ?>
                            <option value="<?= $sk->id_sub_kriteria ?>">
                                <?= $sk->nama_sub_kriteria ?>
                            </option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?php endforeach; ?>

                    <div class="mb-3">
                        <label>Gambar</label>
                        <input type="file" name="gambar" class="form-control">
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