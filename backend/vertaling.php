<?php


//require("functions.php");


$line = $_GET['text'];
$words = explode(" ",$line);
$letters = array();
$translation = "";
for ($i=0;$i<count($words);$i++) {
    array_push($letters,str_split($words[$i]));
}
//echo print_r($words);
//echo print_r($letters);

//gaat alle woorden uit de string bij langs
for ($i=0;$i<count($words);$i++) {
    //zoekt het woord zelf op
    echo sqlTranslationRequest($words[$i]) . " vertaling.php";

    // 2e en 3e pers. ev. o.t.t. uitgang (enkel de verandering van -en naar -t)
    if ($letters[$i][count($letters[$i])-1] == 't') {

        $stam = "";
        for ($k = 0; $k < count($letters[$i]) - 1; $k++) {
            $stam .= $letters[$i][$k];
        }
        //zoekt de stam van het woord op
        echo sqlTranslationRequest($stam . "en") . " vertaling.php";

        // verandering van korte naar lange klinker (zoals van lopen naar loopt)
        if (count($letters[$i]) > 3) {
            if ($letters[$i][count($letters[$i]) - 3] == $letters[$i][count($letters[$i]) - 4]) {

                $stam = "";
                for ($k = 0; $k < count($letters[$i]) - 3; $k++) {
                    $stam .= $letters[$i][$k];
                }
                $stam .= $letters[$i][count($letters[$i]) - 2];

                //zoekt de infinitief van het woord op
                for ($k = 0; $k < count($words); $k++) {
                    if ($words[$k] == "jij") {
                        echo sqlTranslationRequest($stam . "en");
                        $jij = TRUE;
                        break;
                    }
                }
                if ($jij === FALSE) {
                    echo sqlTranslationRequest($stam . "en") . "s ";
                }
            }
        }
    }

    //1e pers. ev. o.t.t. met verandering van korte naar lange klinker (zoals van lopen naar loop)
    if (count($letters[$i]) > 3) {
        if ($letters[$i][count($letters[$i]) - 2] == $letters[$i][count($letters[$i]) - 3]) {
            $stam = "";
            for ($k = 0; $k < count($letters[$i]) - 2; $k++) {
                $stam .= $letters[$i][$k];
            }
            $stam .= $letters[$i][count($letters[$i]) - 1];

            //zoekt de vertaling van infinitief van het woord op
            echo "am " . sqlTranslationRequest($stam . "en") . "ing";
        }
    }

    //sterke werkwoorden, o.v.t.
    echo sqlTranslationSterk($letters[$i], $words[$i]);

    // v.t.t.
    if ($letters[$i][0] . $letters[$i][1] == "ge") {
        $stam = "";
        for ($k = 2; $k < count($letters[$i]); $k++) {
            $stam .= $letters[$i][$k];
        }
        echo sqlTranslationRequest($stam) . "ed" . " ";
    }
    //hebben
    if ($words[$i] == "heb" OR $words[$i] == "hebt") {
	echo "have ";
    } elseif ($words[$i] == "heeft") {
	echo "has ";
    }

}
