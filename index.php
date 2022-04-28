<?php
//create a working list of arrays to work with
$input = array();


//fill the list from the input file <DONE>
$myFile = fopen("input/input.txt", "r") or die("Unable to open file!");
while (!feof($myFile)) {
    $line = fgets($myFile) . "<br>";
    array_push($input, $line);
}
fclose($myFile);

//sanitize input
////make all commands upper case <DONE>
$input = array_change_key_case($input, CASE_UPPER);
////remove white space from the side 

//get base value
////check if last input is APPLY 
if (getCommand($input[count($input) - 1]) == "APPLY") {
    ////set base value
    $returnValue = getValue($input[count($input) - 1]);
} else {
    //report an error
    echo "last command isn't APPLY";
}




//we are checking from the top to check every command apart from the last one, which we know is apply
for ($i = 0; $i < count($input) - 1; $i++) {

    $currentLine = $input[$i];
    //get the current command and it's value we are working with
    $command = getCommand($currentLine);
    $value = getValue($currentLine);

    //find what command we are working with

    if ($command == "ADD") {
        $returnValue = $returnValue + $value;
    }
    if ($command == "SUBTRACT") {
        $returnValue = $returnValue - $value;
    }

    if ($command == "MULTIPLY") {
        $returnValue = $returnValue * $value;
    }

    if ($command == "DEVIDE") {
        $returnValue = $returnValue / $value;
    }
}

echo $returnValue;





















function getCommand($line)
{
    //parse line into words
    $command = explode(" ", $line);
    return $command[0];
}
function getValue($line)
{
    //parse line into words
    $command = explode(" ", $line);
    return $command[1];
}
