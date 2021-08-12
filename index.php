<?php 

/* ==================================== Função 1 ======================================= */
$teste = array(1, 2, 3, 4, 5, 6);

function rotaciona($quantidade_posicoes, $array) {
    while ($quantidade_posicoes > 0) {
        $qtddArray = count($array);
        $aux = $array[0];

        for ($i = 0; $i < $qtddArray - 1; $i++) {
            $array[$i] = $array[$i + 1];
        }

        $array[$qtddArray - 1] = $aux; 

        $quantidade_posicoes--;
    }
    echo '<br>';
    imprimeArray($array);
}


function imprimeArray($array) {
    $qtdArray = count($array);

    for ($j = 0; $j < $qtdArray; $j++) {
        echo $array[$j];
    }
}


imprimeArray($teste);
rotaciona(5, $teste);
/* ==================================== /Fim da Função 1 ======================================== */


/* ==================================== Função 2 ======================================== */
$teste = array(1, 9, 7, 17, 2, 5, 10, 8, 200, 305);

function reordenar($array) {
    $p = 0; //posição do array par
    $s = 0; //posição do array impar
    $pares = array();
    $impares = array();
    $nArray = count($array);

    for($i = 0; $i < $nArray; $i++){ 
        if($array[$i] % 2 == 0) { //Array par

            if($p == 0) {
                $pares[$p] = $array[$i];
                $p++;
            } else { //Verificações
                if($array[$i] > $pares[$p-1]) { //Se o número for maior que o útimo número do array, ou seja, o maior, ele insere na última posição
                    $pares[$p] = $array[$i];
                    $p++;
                } else { 
                    for($z = 0; $z < $p; $z++) {
                        if($array[$i] < $pares[$z]) { //Se o número for menor que algum inserido no array 
                            for($x = $p; $x > $z; $x--) { 
                                $pares[$x] = $pares[$x - 1]; //Realoca todos indices para uma posição a mais
                            }
                            $pares[$x] = $array[$i]; //Insere o valor na posição que ficou vaga
                            $p++;
                            echo 'ARRAY DE PARES   {';
                                for ($j = 0; $j < $p; $j++) {
                                   echo ' ['.$pares[$j].'] ';
                                }
                            echo '} <br>';
                            break;
                        }
                    }
                }
            }
        // Fim do array par    
        } else { //Array impar
            if($s == 0) {
                $impares[$s] = $array[$i];
                $s++;
            } else { //Verificações
                if($array[$i] < $impares[$s-1]) { //Se o número for menor que o último número do array, ou seja, o menor, ele insere na ultima posição
                    $impares[$s] = $array[$i];
                    $s++;
                } else {
                    for($q = 0; $q < $s; $q++) {
                        if($array[$i] > $impares[$q]) { //Se o número for maior que algum inserido no array 
                            for($l = $s; $l > $q; $l--) { 
                                $impares[$l] = $impares[$l - 1]; //Realoca todos indices para uma posição a mais
                            }
                            $impares[$l] = $array[$i]; //Insere o valor na posição que ficou vaga
                            $s++;
                            echo 'ARRAY DE ÍMPARES {';
                                for ($j = 0; $j < $s; $j++) {
                                   echo ' ['.$impares[$j].'] ';
                                }
                            echo '} <br>';
                            break;
                        }
                    }
                }
            }
        } // Fim do array ímpar
    } // Fim da separação

    for($m = 0; $m < $p; $m++) {
        $array[$m] = $pares[$m];
    }
    
    $imp = $p;
    for ($n = 0; $n < $s; $n++) {
        $array[$imp] = $impares[$n];
        $imp ++;
    }

    echo 'Array completo {';
        for ($j = 0; $j < $nArray; $j++) {
           echo ' ['.$array[$j].'] ';
        }
    echo '} ';
}

function imprime($teste){
    $tamanho = count($teste);
    echo 'Array completo {';
        for ($j = 0; $j < $tamanho; $j++) {
           echo ' ['.$teste[$j].'=>('.$j.')] ';
        }
    echo '} ';
}


reordenar($teste);
echo '<br>';
/* ==================================== /Fim da Função 2 ======================================== */


/* ==================================== Função 3 ======================================== */
$data_inicial = '03082021';
$data_final = '28082021';

function calculaData ($data_i, $data_f) {

    $dia_i = substr($data_i, 0, 2);
    $mes_i = substr($data_i, 2, 2);
    $ano_i = substr($data_i, -4);

    $dia_f = substr($data_f, 0, 2);
    $mes_f = substr($data_f, 2, 2);
    $ano_f = substr($data_f, -4);

    $ano_ic = calculaAno($ano_i);
    $mes_ic = calculaMes($mes_i);

    $ano_fc = calculaAno($ano_f);
    $mes_fc = calculaMes($mes_f);

    $data_ =  ($dia_f + $mes_fc + $ano_fc) - ($dia_i + $mes_ic + $ano_ic);

    echo 'Data Inicial: '.$dia_i.'/'.$mes_i.'/'.$ano_i.'<br>';
    echo 'Data Final: '.$dia_f.'/'.$mes_f.'/'.$ano_f;

    echo '<hr>Dias entre as datas: '.$data_;
    echo '<hr>';
}

function calculaAno($ano) {
    $ano = $ano * 365;
    return $ano;
}

function calculaMes($mes) {
    switch($mes) {
        case 1:
            $mes = 31;
            break;
        case 2:
            $mes = 59;
            break;
        case 3:
            $mes = 90;
            break;
        case 4:
            $mes = 120;
            break;
        case 5:
            $mes = 151;
            break;
        case 6:
            $mes = 181;
            break;
        case 7:
            $mes = 212;
            break;
        case 8:
            $mes = 243;
            break;
        case 9:
            $mes = 273;
            break;
        case 10:
            $mes = 304;
            break;
        case 11:
            $mes = 334;
            break;
        case 12:
            $mes = 365;
            break;
    }
    return $mes;
}

calculaData($data_inicial, $data_final);
/* ==================================== /Fim da Função 3 ======================================== */

//Não consegui finalizar as outras por falta de tempo e pela complexidade

?>
