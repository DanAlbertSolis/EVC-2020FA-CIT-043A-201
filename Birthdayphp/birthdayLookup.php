<?php

/*
 * Exaple PHP Code, Gabriel Solomon, 2020
 */

     /*
     * get the url parameters
     */
    // var_dump($_GET);

    if (count($_GET) == 0) {

        echo "<p>First name and last name were empty";

        return;

    }

    $searchFirst = $_GET['firstName'];
    $searchLast = $_GET['lastName'];

    echo "searchFirst = " . $searchFirst . "<br>";
    echo "searchLast = " . $searchLast . "<br>";
    echo "<br>";

    /*
     * read json file
     */

    // open file
    $fileName = "birthday.json";
    $jsonFile = fopen("birthday.json", "r") or die("Unable to open file!");

    // get json string from file
    $jsonData = file_get_contents($fileName);

    // decode json into array, returning fully-associative array (hash table/hash map)
    $arrData = json_decode($jsonData, true);

    
    for ($i = 0; $i < count($arrData); $i++) {

        // get a record
        $record = $arrData[$i];

        // print the name and birthday
        echo $record['name'] . " " . $record['birthday'];
        echo "<br>";

        if ($searchFirst == $record){
            echo $record['name'] . " " . $record['birthday'];
            echo "<br>";
        }

    }

    // close file
    fclose($jsonFile)

?>