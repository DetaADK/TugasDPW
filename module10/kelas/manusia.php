<?php
class manusia
{
    protected $nama;
    protected $nik = "123212131243243";
    protected $umur = 0;

    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function getNIK()
    {
        return $this->nik;
    }

    public function getUmur()
    {
        return $this->umur;
    }

    public function setUmur($umur)
    {
        $this->umur = $umur;
    }
}
?>