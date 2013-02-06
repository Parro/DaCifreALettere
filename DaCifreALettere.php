<?php
/**
 * Classe che converte un numero in cifre in lettere.
 * Es. 777 -> settecentosettantasette
 *
 * @author Parro <mauro@bjmaster.com>
 */
class DaCifreALettere
{
    /**
     * Stringhe per i numeri da 0 a 9
     *
     * @var array
     */
    public $numeriBase = array(
        0 => 'zero',
        1 => 'uno',
        2 => 'due',
        3 => 'tre',
        4 => 'quattro',
        5 => 'cinque',
        6 => 'sei',
        7 => 'sette',
        8 => 'otto',
        9 => 'nove'
   );

    /**
     * Stringhe per le i numeri da 11 a 19
     *
     * @var array
     */
    public $dieciVenti=array(
        10 => 'dieci',
        11 => 'undici',
        12 => 'dodici',
        13 => 'tredici',
        14 => 'quattordici',
        15 => 'quindici',
        16 => 'sedici',
        17 => 'diciassette',
        18 => 'diciotto',
        19 => 'diciannove'
    );

    /**
     * Stringhe per i numeri da 20 a 90
     *
     * @var array
     */
    public $decine=array(
        2 => 'venti',
        3 => 'trenta',
        4 => 'quaranta',
        5 => 'cinquanta',
        6 => 'sessanta',
        7 => 'settanta',
        8 => 'ottanta',
        9 => 'novanta'
    );

    /**
     * Suffissi mila, milioni, miliardi
     *
     * @var array
     */
    public $suffissi = array(
        1 => 'mila',
        2 => 'milioni',
        3 => 'miliardi'
    );

    /**
     * Prefisso per mille, un milione, un miliardo
     *
     * @var array
     */
    public $prefissiUno = array(
        1 => 'mille',
        2 => 'unmilione',
        3 => 'unmiliardo',
    );

    /**
     * Converte la cifra nella stringa
     *
     * @param $numero int Numero in cifre
     * @return string Numero in stringa
     */
    public function converti($numero){
        $gruppiCifre=$this->getCifreNumeri($numero);

        $stringaLettere=$this->getStringaLettere($gruppiCifre);

        return $stringaLettere;
    }

    /**
     * Spezza il numero in un'array di singole cifre, ne inverte l'ordine e lo divide in gruppi di tre cifre
     *
     * @param $numero int Numero in cifre
     * @return array Array con le cifre divise in gruppi di tre
     */
    public function getCifreNumeri($numero){
        $cifre=str_split($numero);

        $cifre=array_reverse($cifre);

        $gruppiCifre=array_chunk($cifre,3);

        return $gruppiCifre;
    }

    /**
     * Genera la stringa a partire dai gruppi di cifre
     *
     * @param $gruppiCifre array Array con le cifre divise in gruppi di tre
     * @return string Numero in stringa
     */
    public function getStringaLettere($gruppiCifre){
        $stringaArray=array();

        foreach($gruppiCifre as $indice=>$gruppoCifre){
            if($indice>0){
                if(count($gruppoCifre)==1 && $gruppoCifre[0]==1){
                    $stringaArray[]=$this->prefissiUno[$indice];

                    continue;
                }else{
                    $stringaArray[]=$this->suffissi[$indice];
                }
            }

            $stringaArrayZeroCento=$this->getStringaZeroCento($gruppoCifre);

            $stringaArray=array_merge($stringaArray,$stringaArrayZeroCento);
        }

        $stringaArray=array_reverse($stringaArray);

        $stringa=implode('',$stringaArray);

        return $stringa;
    }

    /**
     * Calcola le stringhe per le singole cifre da 0 a 100
     *
     * @param $gruppoCifre array Gruppo di tre cifre
     * @return array Array contenente le singole stringhe per le cifre
     */
    public function getStringaZeroCento($gruppoCifre){
        $stringaArray=array();

        $totCifre=count($gruppoCifre);

        if(count($gruppoCifre)==1 && $gruppoCifre[0]==0){
            $stringaArray[]='zero';
        }else{
            for($potenzaDiDieci=0;$potenzaDiDieci<$totCifre;$potenzaDiDieci++){
                if($potenzaDiDieci==0 && isset($gruppoCifre[$potenzaDiDieci+1]) && $gruppoCifre[$potenzaDiDieci+1]==1){
                    $stringaArray[$potenzaDiDieci]=$this->dieciVenti[$gruppoCifre[$potenzaDiDieci]+10];

                    $potenzaDiDieci++;
                }
                $numero=$gruppoCifre[$potenzaDiDieci];

                if($numero>0){
                    switch($potenzaDiDieci){
                        case 1:
                            if($numero>1){
                                $stringaArray[$potenzaDiDieci]=$this->decine[$numero];
                            }
                            break;

                        case 2:

                        case 3:
                            if($numero>1){
                                $stringaArray[$potenzaDiDieci]=$this->numeriBase[$numero].'cento';
                            }else{
                                $stringaArray[$potenzaDiDieci]='cento';
                            }

                            break;

                        default:
                            $stringaArray[$potenzaDiDieci]=$this->numeriBase[$numero];
                            break;
                    }
                }
            }
        }

        return $stringaArray;
    }
}
