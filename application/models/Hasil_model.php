<?php 
class Hasil_model extends CI_Model {

    public function hitungAHP($kriteria, $input)
    {
        $n = count($kriteria);
        $matrik = [];

        // isi matriks perbandingan
        $urut = 0;
        for ($i=0; $i<$n-1; $i++) {
            for ($j=$i+1; $j<$n; $j++) {
                $urut++;
                $opsi = $input['opsi'.$urut];
                $bobot = $input['bobot'.$urut];

                if ($opsi == 1) {
                    $matrik[$i][$j] = $bobot;
                    $matrik[$j][$i] = 1/$bobot;
                } else {
                    $matrik[$i][$j] = 1/$bobot;
                    $matrik[$j][$i] = $bobot;
                }
            }
        }

        // diagonal = 1
        for ($i=0; $i<$n; $i++) {
            $matrik[$i][$i] = 1;
        }

        // normalisasi kolom
        $jmlCol = array_fill(0,$n,0);
        for ($i=0; $i<$n; $i++) {
            for ($j=0; $j<$n; $j++) {
                $jmlCol[$j] += $matrik[$i][$j];
            }
        }

        // hitung bobot (priority vector)
        $pv = [];
        for ($i=0; $i<$n; $i++) {
            $sumRow = 0;
            for ($j=0; $j<$n; $j++) {
                $matrikB[$i][$j] = $matrik[$i][$j] / $jmlCol[$j];
                $sumRow += $matrikB[$i][$j];
            }
            $pv[$i] = $sumRow / $n;
        }

        return [
            'matrik' => $matrik,
            'bobot'  => $pv
        ];
    }

    public function hitungMAUT($alternatif, $bobot)
    {
        $hasil = [];
        foreach ($alternatif as $alt) {
        
            $nilai = 0;
            foreach ($bobot as $i => $w) {
                // akses properti object
                $c = 'C' . ($i + 1);
                $nilai += $w * $alt->nilai[$c];
            }
            // buat object baru agar bisa ditambahkan properti preferensi
            $alt->preferensi = $nilai;
            $hasil[] = $alt;
        }

        // urutkan dari besar ke kecil
        usort($hasil, function($a, $b){
            return $b->preferensi <=> $a->preferensi;
        });

        return $hasil;
    }

}

?>