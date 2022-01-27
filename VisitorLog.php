<?php

/*
 * Logs IP address, date and time of visting users to your wesbite in a CSV file.
 * Christopher L Bonner, 2022.
 */

namespace VisitorLog;

date_default_timezone_set('UTC');

/*
 * When creating a new object you can set it to true/false, depending if you
 * want every visitor logged (false) or one log per day of each unique visitor 
 * (true, the default).
 * 
 */
class VisitorLog
{
    protected $UNIQUE;

    public function __construct($UNIQUE=true)
    {
        $this->UNIQUE = $UNIQUE;
    }

    public function log()
    {
        // if the client vists more than once a day, don't log their visit
        if (isset($_SESSION["last_visit"]) && $this->UNIQUE) {
            if ($_SESSION["last_visit"] == date("dmy")) {
                // don't log unique visitors more than once per day
            }
            else {
                $this->logVisit();
            }
        }
        else {
            $_SESSION["last_visit"] = date("dmy");
            $this->logVisit();
        }
    }

    private function logVisit()
    {
        try {
            $file = fopen("visitors.csv", "a");
            $visitor = $_SERVER['REMOTE_ADDR'] ."," .date('l jS \of F Y h:i:s A') ."\n";
            fwrite($file, $visitor);
        }
        catch (TypeError) {
            print("Could not open log file.");
        }
    }
}

?>
