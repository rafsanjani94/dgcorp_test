<?php

    require_once 'libs.php';

    class Siswa
    {
        private string $nrp;
        private string $nama;
        private Nilai $daftarNilai;

        public function __construct(string $nrp, string $nama, array $daftarNilai) {
            $this->nrp = $nrp;
            $this->nama = $nama;
            $this->daftarNilai = new Nilai($daftarNilai['mapel'], $daftarNilai['nilai']);
        }
    }
    
    class Nilai 
    {
        private string $mapel;
        private int $nilai;
        const MAPEL = ['inggris', 'indonesia', 'jepang'];

        public function __construct(string $mapel, int $nilai) {
            $this->mapel = $mapel;
            $this->nilai = $nilai;
        }
    }

    $newStudent = new Siswa('123', 'ali', ['mapel' => 'inggris', 'nilai' => 100]);
    var_dump($newStudent);

    $students = [];
    for ($i=0; $i < 10; $i++) { 
        $students[$i] = new Siswa($i, Libs::generateRandomString(), [
            'mapel' => Nilai::MAPEL[rand(0, 2)],
            'nilai' => rand(0, 100),
        ]);
    }
    var_dump($students);

    