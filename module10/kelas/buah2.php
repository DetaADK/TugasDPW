<?php
class buah
{
    public $nama;
    protected $warna;
    private $berat;
    
    public function setName($n) {
        $this->nama = $n;
    }

    // method public untuk set warna
    public function inputWarna($w) {
        $this->setColor($w);
    }

    // method public untuk set berat
    public function inputBerat($b) {
        $this->setWeight($b);
    }

    protected function setColor($w) {
        $this->warna = $w;
    }

    private function setWeight($b) {
        $this->berat = $b;
    }

    // getter biar bisa lihat hasil
    public function getInfo() {
        return "Nama: {$this->nama}, Warna: {$this->warna}, Berat: {$this->berat}";
    }
}

$mango = new buah();
$mango->setName('Mangga');
$mango->inputWarna('Kuning');
$mango->inputBerat('300g');

echo $mango->getInfo();
?>