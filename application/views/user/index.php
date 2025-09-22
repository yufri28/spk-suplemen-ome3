<?php
$array = array();

$array = [];
foreach ($kriteria as $row) {
    $array[] = $row->nama_kriteria; // jika CI query->result()
}
?>
<div class="app-body">
    <div class="container-fluid">
        <div class="row gx-3">
            <div class="col-xxl-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Perbandingan Kriteria</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('pages/index') ?>" method="POST">
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" class="text-center">Pilih yang lebih penting</th>
                                            <th scope="col" class="text-center">Atau</th>
                                            <th scope="col" class="text-center">Nilai Perbandingan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $k = 0; ?>
                                        <?php for ($i = 0; $i <= (count($array) - 2); $i++): ?>
                                        <?php for ($j = ($i + 1); $j <= (count($array) - 1); $j++): ?>
                                        <?php $k++; ?>
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check d-inline-block">
                                                    <input class="form-check-input" required type="radio"
                                                        name="opsi<?= $k ?>" id="opsi<?= $k ?>_1" value="1">
                                                    <label class="form-check-label fw-bold" for="opsi<?= $k ?>_1">
                                                        <?= $array[$i]; ?>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="form-check d-inline-block">
                                                    <input class="form-check-input" required type="radio"
                                                        name="opsi<?= $k ?>" id="opsi<?= $k ?>_2" value="2">
                                                    <label class="form-check-label fw-bold" for="opsi<?= $k ?>_2">
                                                        <?= $array[$j]; ?>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center" style="width: 250px;">
                                                <select required class="form-select" name="bobot<?= $k ?>">
                                                    <option value="">-- Pilih --</option>
                                                    <?php foreach ($array_skala as $key => $value): ?>
                                                    <option value="<?= $value['nilai']; ?>">
                                                        <?= $value['keterangan']; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <?php endfor; ?>
                                        <?php endfor; ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-4 d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Simpan Perbandingan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php if(isset($hasilAHP) && isset($hasilMAUT)): ?>
            <div class="mt-5">

                <!-- Matriks Perbandingan -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Matriks Perbandingan Kriteria</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Kriteria</th>
                                    <?php foreach($kriteria as $k): ?>
                                    <th><?= $k->nama_kriteria ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($hasilAHP['matrik'] as $i => $row): ?>
                                <tr>
                                    <th><?= $kriteria[$i]->nama_kriteria ?></th>
                                    <?php foreach($row as $val): ?>
                                    <td><?= number_format($val, 4) ?></td>
                                    <?php endforeach; ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Matriks Normalisasi -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Matriks Normalisasi Kolom</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Kriteria</th>
                                    <?php foreach($kriteria as $k): ?>
                                    <th><?= $k->nama_kriteria ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                    // buat matriks normalisasi
                    $n = count($kriteria);
                    $jmlCol = array_fill(0,$n,0);
                    foreach($hasilAHP['matrik'] as $i=>$row){
                        foreach($row as $j=>$val){
                            $jmlCol[$j] += $val;
                        }
                    }
                    $matrikB = [];
                    foreach($hasilAHP['matrik'] as $i=>$row){
                        foreach($row as $j=>$val){
                            $matrikB[$i][$j] = $val / $jmlCol[$j];
                        }
                    }
                    foreach($matrikB as $i=>$row):
                    ?>
                                <tr>
                                    <th><?= $kriteria[$i]->nama_kriteria ?></th>
                                    <?php foreach($row as $val): ?>
                                    <td><?= number_format($val, 4) ?></td>
                                    <?php endforeach; ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Priority Vector / Bobot -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Bobot Kriteria (Priority Vector)</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Kriteria</th>
                                    <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($kriteria as $i=>$k): ?>
                                <tr>
                                    <td><?= $k->nama_kriteria ?></td>
                                    <td><?= number_format($hasilAHP['bobot'][$i], 4) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Hasil MAUT -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Hasil Perhitungan MAUT</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Alternatif</th>
                                    <th>Nilai Preferensi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($hasilMAUT as $alt): ?>
                                <tr>
                                    <td><?= $alt->nama_alternatif ?></td>
                                    <td><?= number_format($alt->preferensi, 4) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <?php endif; ?>

        </div>
    </div>
</div>