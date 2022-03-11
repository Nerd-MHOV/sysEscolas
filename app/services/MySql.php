<?php

namespace App\Services;
use Exception;

class MySql
{
    private static $pdo;

    public static function connect()
    {
        if(self::$pdo == null){
            try
            {
                self::$pdo = new \PDO('mysql:host='.HOST.';dbname='.DATABASE, USER, PASSWORD,array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                self::$pdo -> setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            }
            catch(Exception $e)
            {
                echo '<h2>Erro ao conectar no BD</h2>';
            }

            return self::$pdo;
        }
    }

    public static function insert($arr, $order_id = false)
    {
        $certo = true;
        $nome_tabela = $arr['nome_tabela'];
        $query = "INSERT INTO `$nome_tabela` VALUES (null";
        foreach ($arr as $key => $value)
        {
            if($key == 'ação' || $key == 'nome_tabela')
                continue;
            if($value = ""){
                $certo = false;
                break;
            }
            $query.=",?";
            $parametros[] = $value;
        }
        $query.=")";
        if($certo == true)
        {
            $sql = self::connect()->prepare($query);
            $sql -> execute($parametros);
            if($order_id == true){
                $lastId = self::connect()->lastInsertId();
                $sql = self::connect()->prepare("UPDATE `$nome_tabela` SET order_id = ? WHERE id = ?");
                $sql->execute(array($lastId, $lastId));
            }
        }

        return $certo;
    }

    public static function update($arr, $single = true)
    {
        $certo = true;
        $first = false;
        $nome_tabela = $arr['nome_tabela'];
        $query = "UPDATE `$nome_tabela` SET ";
        foreach ($arr as $key => $value)
        {
            if($key == 'ação' || $key == 'nome_tabela' || $key == 'id')
                continue;
            if($value == '')
            {
                $certo = false;
                break;
            }
            if($first == false)
            {
                $first = true;
                $query .= "$key = ?";
            }
            else
            {
                $query .= ",$key = ?";
            }

            $parametros[] = $value;
        }
        if($certo == true)
        {
            if($single == true)
            {
                $parametros[] = $arr['id'];
                $sql = self::connect()->prepare($query." WHERE id=? ");
                $sql -> execute($parametros);
            }
            else
            {
                $sql = self::connect()->prepare($query);
                $sql -> execute($parametros);
            }
        }
    }

    public static function delete($tabela, $id = false)
    {
        if($id == false)
        {
            $sql = self::connect()->prepare("DELETE FROM `$tabela`");
        }
        else
        {
            $sql = self::connect()->prepare("DELETE FROM `$tabela` WHERE id = $id");
        }
        $sql->execute();
    }

    public static function select($tabela, $query = '', $arr = '')
    {
        if($query != false)
        {
            $sql = self::connect()->prepare("SELECT * FROM `$tabela` WHERE $query");
            $sql -> execute($arr);
        }
        else
        {
            $sql = self::connect()->prepare("SELECT * FROM `$tabela`");
            $sql -> execute();
        }
        return $sql->fetch();
    }

    public static function selectAll($tabela, $query = '', $arr = '')
    {
        if($query != false)
        {
            $sql = self::connect()->prepare("SELECT * FROM `$tabela` WHERE $query");
            $sql -> execute($arr);
        }
        else
        {
            $sql = self::connect()->prepare("SELECT * FROM `$tabela`");
            $sql -> execute();
        }
        return $sql->fetch();
    }

    public static function orderItem($tabela, $orderType, $idItem)
    {
        if ($orderType == 'up') {
            $infoItemAtual = self::select($tabela, 'id=?', array($idItem));
            $order_id = $infoItemAtual['order_id'];
            $itemBefore = self::connect()->prepare("SELECT * FROM `$tabela` WHERE order_id < $order_id ORDER BY order_id  DESC LIMIT 1");
            $itemBefore->execute();
            if ($itemBefore->rowCount() == 0) {
                return;
            }
            $itemBefore = $itemBefore->fetch();
            self::update(array('nome_tabela' => $tabela,'id' => $itemBefore['id'],'order_id' => $infoItemAtual['order_id']));
            self::update(array('nome_tabela' => $tabela,'id' => $infoItemAtual['id'],'order_id' => $itemBefore['order_id']));
        } elseif ($orderType == 'down') {
            $infoItemAtual = self::select($tabela, 'id=?', array($idItem));
            $order_id = $infoItemAtual['order_id'];
            $itemBefore = self::connect()->prepare("SELECT * FROM `$tabela` WHERE order_id > $order_id ORDER BY order_id ASC LIMIT 1");
            $itemBefore->execute();
            if ($itemBefore->rowCount() == 0) {
                return;
            }
            $itemBefore = $itemBefore->fetch();
            self::update(array('nome_tabela' => $tabela,'id' => $itemBefore['id'],'order_id' => $infoItemAtual['order_id']));
            self::update(array('nome_tabela' => $tabela,'id' => $infoItemAtual['id'],'order_id' => $itemBefore['order_id']));
        }
    }


}