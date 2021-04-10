<?php

$countries = [
    [
        "name" => "France",
        "capital" => "Paris",
        "area" => 640679,
        "population" => [
            "2000" => 59278000,
            "2010" => 59278000,
        ],
    ],
    [
        "name" => "England",
        "capital" => "London",
        "area" => 130395,
        "population" => [
            "2000" => 58800000,
            "2010" => 63200000,
        ],
    ],
    [
        "name" => "Deutschland",
        "capital" => "Berlin",
        "area" => 357021,
        "population" => [
            "2000" => 82260000,
            "2010" => 81752000,
        ],
    ],
];

function search($countries, $data) {
    $result = array();
    foreach ($countries as $country_number => $country) {
        foreach ($country as $key => $value) {
            if (!is_array($value)) {
                if (stristr($value, $data)) {
                    $result[] = $country_number;
                }
            } else {
                foreach ($value as $k => $v) {
                    if (stristr($v, $data) || strstr($k, $data)) {
                        $result[] = $country_number;
                    }
                }
            }
        }
    }
    return array_unique($result);
}

function try_walk($country, $key_country, $data)
{
    static $i = 1; // статическая глобальная переменная-счетчик
    if ($i == 1) {
        echo "№  Название\tСтолица\t\tПлощадь\t\tНаселение\n";
    }

    echo $data . $i . " ";
    foreach ($country as $key => $value) {
        if (!is_array($value)) {
            echo "$key:$value\t";
        } else {
            echo "$key: ";
            foreach ($value as $k => $v) {
                echo "[{$k} год. - $v] ";
            }

        }
    }
    echo "\n";
    $i++;
}

$seach_result = array_flip(search($countries, "land"));
$countries_seach_result = array_intersect_key($countries, $seach_result);

array_walk($countries_seach_result, "try_walk", "№");