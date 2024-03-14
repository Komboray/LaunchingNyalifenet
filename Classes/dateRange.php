<?php

//this is the date range calculator
Class dateRange{
    public $neededDate;
    public $daysDate;
    public $appointDate;

    function __construct($daysDate, $appointDate){
        $this->daysDate = $daysDate;
        $this->appointDate = $appointDate;
    }

    function calcDateRange($daysDate, $appointDate){
        $neededDate = $daysDate - $appointDate;

        if($neededDate < 0 ){
            // echo $neededDate ."<br>";
            // echo "The number is a negative number <br>";
            if($neededDate >= -7){
                echo "The appointment date is recent
                       ";
            }else{
                echo "The appointment is not recent";
            }
        }
        else{
            // echo $neededDate ."<br>";
            // echo "The no is a + no <br>";
            if($neededDate >= 7){
                echo "The appointment date is recent <br>";
            }else{
                echo "The appointment is not recent";
            }
        }

        
    }
}


