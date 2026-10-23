<?php

class BanqueManager {
    private PDO $cnx;

    public function __construct(PDO $cnx){
        $this->cnx = $cnx;
    }

    //creation d'une nouvelle transaction
    public function createTransaction(Banque $banque): int | false{
        $sql = "INSERT INT banque (date, amount, cartId, typeId) VALUES (:date, :amount, :catId, :typeId)";
        try {
            $req = $this->cnx->prepare($sql);
            $req->execute([
                ':date' => $banque->getDate(),
                ':amount' => $banque->getAmount(),
                ':catId' => $banque->getcartId(),
                ':typeId' => $banque->gettypeId(),
            ]);
            return $this->cnx->lastInsertId();
        } catch (PDOException $e) {
            return false;
        }
    }
}