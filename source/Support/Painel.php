<?php

namespace Source\Support;

class Painel
{
    public static $cargos = [
        '0' => 'Colaborador',
        '1' => 'Sub Administrador',
        '2' => 'Administrador'
    ];
    public static function alert($tipo, $mensagem)
    {
        if ($tipo == 'sucesso') {
            echo '<div class="sucesso"><i class="fas fa-check"></i>' . $mensagem . '</div>';
        } elseif ($tipo == 'erro') {
            echo '<div class="erro"><i class="fas fa-times"></i>' . $mensagem . '</div>';
        } elseif ($tipo == 'atenção') {
            echo '<div class="box-alert atenção"><i class="fas fa-exclamation-triangle"></i>' . $mensagem . '</div>';
        }
    }
    public static function alertJS($msg){
        echo '<script>alert("'.$msg.'")</script>';
    }
    public static function redirect($url)
    {
        echo '<script>location.href="' . $url . '"</script>';
        die();
    }
    public static function uploadFile($file)
    {
        $formatoArquivo = explode('.', $file['name']);
        $imagemNome = uniqid() . '.' . $formatoArquivo[count($formatoArquivo) - 1];
        if (
            move_uploaded_file($file['tmp_name'], BASE_DIR_PAINEL . '/uploads/' . $imagemNome)
        ) {
            return $imagemNome;
        } else {
            return false;
        }
    }
    public static function deleteFile($file)
    {
        @unlink(BASE_DIR_PAINEL . '/uploads/' . $file);
    }
    public static function imagemValida($imagem)
    {
        if (
            $imagem['type'] == 'image/jpeg' ||
            $imagem['type'] == 'image/jpg' ||
            $imagem['type'] == 'image/png'
        ) {
            $tamanho = intval($imagem['size'] / 1024);
            if ($tamanho < 900) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public static function logado()
    {
        return isset($_SESSION['login']) ? true : false;
    }
    public static function loggout()
    {
        setcookie('lembrar', 'true', time() - 1, '/');
        session_destroy();
        header('location: ' . INCLUDE_PATH);
    }
    public static function listarUsuariosOnline()
    {
        self::limparUsuariosOnline();
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.online`");
        $sql->execute();
        return $sql->fetchAll();
    }
    public static function limparUsuariosOnline()
    {
        $date = date('Y-m-d H:i:s');
        $sql = MySql::conectar()->exec("DELETE FROM `tb_admin.online` WHERE ultima_ação < '$date' - INTERVAL 1 MINUTE");
    }
    public static function generateSlug($str)
    {
        $str = mb_strtolower($str);
        $str = preg_replace('/(â|á|ã)/', 'a', $str);
        $str = preg_replace('/(ê|é)/', 'e', $str);
        $str = preg_replace('/(í|Í)/', 'i', $str);
        $str = preg_replace('/(ú)/', 'u', $str);
        $str = preg_replace('/(ó|ô|õ|Ô)/', 'o', $str);
        $str = preg_replace('/(_|\/|!|\?|#)/', '', $str);
        $str = preg_replace('/( )/', '-', $str);
        $str = preg_replace('/ç/', 'c', $str);
        $str = preg_replace('/(-[-]{1,})/', '-', $str);
        $str = preg_replace('/(,)/', '-', $str);
        $str = strtolower($str);
        return $str;
    }

}