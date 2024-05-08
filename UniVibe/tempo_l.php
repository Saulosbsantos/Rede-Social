<?php

// Configurando o fuso horário
define('TIMEZONE', 'America/Sao_Paulo');
date_default_timezone_set(TIMEZONE);

function last_seen($date_time)
{
    if ($date_time === false) {
        return ''; // Se não houver data/hora, retorna uma string vazia
    }

    $timestamp = strtotime($date_time);

    $strTime = array("segundo", "minuto", "hora", "dia", "mês", "ano");

    $lenght = array("60","60","24","30","12","10");

    $currentTime = time();

    if($currentTime >= $timestamp)
    {
        $diff = $currentTime - $timestamp;
        for($i = 0; $diff >= $lenght[$i] && $i < count($lenght)- 1; $i++)
        {
            $diff = $diff / $lenght[$i];
        }

        $diff = round($diff);
        if ($diff < 59 && $strTime[$i] == "")
        {
            return 'Ativo';
        }
        else
        {
            return $diff. " ".$strTime[$i] . "(s) atrás";
        }
    }
}

?>
