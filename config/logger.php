<?php

namespace phpFTW\config;

class logger 
{
    /* Error Logging Threshold
      Enable error logging for your application by setting a number for $log_threshold
      variable. The number sets the level of errors that will be logged.

      0     = Disable logging 
      1     = Error messages , PHP errors 
      2     = Debug messages
      3     = Information messages 
    */
    public $log_threshold = 2;

    /* Error Log Date Time Format
     * Set date time format for your error messages 
     */
    public $log_date_format = 'Y-m-d H:i:s';

    /* Log File Path
     * Path where the log files will be saved 
     */
    public $log_path = 'phpFTW/log';
    
}