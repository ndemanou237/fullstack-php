<?php

class Banque {
    private ?int $id = null;
    private string $date;
    private float $amount;
    private int $catId;
    private int $typeId;

    public function __construct(?int $id, string $date, float $amount, int $catId, int $typeId){
        $this->id = $id;
        $this->date = $date;
        $this->amount = $amount;
        $this->catId = $catId;
        $this->typeId = $typeId;

    }

    public function getID(): ?int{
        return $this->id;
    }
    public function getDate(): string{
        return $this->date;
    }
    public function getAmount(): float{
        return $this->amount;
    }
    public function getCatID(): int{
        return $this->catId;
    }
    public function gettypeID(): int{
        return $this->typeId;
    }
}