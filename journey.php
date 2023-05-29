<?php
$a=array(0=>"Tutuban",1=>"Blumentritt",2=>"Laong Laan",3=>"Espana",4=>"Santa Mesa",
        5=>"Pandacan",6=>"Paco",7=>"San Andres",8=>"Vito Cruz",9=>"Buendia",
        10=>"Pasay Road", 11=>"EDSA",12=>"Nichols",13=>"FTI",14=>"Bicutan",15=>"Sucat",16=>"Alabang");

$from = array_search($departure,$a);
$to = array_search($destination,$a);
$journey = abs($to - $from);

if($journey <= 5){
    $toPay = 15;
}elseif($journey >5 and $journey<=10){
    $toPay = 20;

}elseif($journey >10 and $journey<=15){
    $toPay = 25;

}elseif($journey ==16){
    $toPay = 30;

}

?>