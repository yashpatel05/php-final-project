<?php
namespace Humber\Models;

class Database
{
    // Database connection properties
    private static $user = 'root';      // Database username
    private static $pass = 'root';      // Database password
    private static $dsn = 'mysql:host=localhost;dbname=the_shoe_company';
    private static $dbcon;              // Database connection instance

    // Private constructor to prevent direct instantiation
    private function __construct()
    {
        
    }

    // Get a PDO database connection
    public static function getDb(){
        if(!isset(self::$dbcon)) {
            try {
                // Create a new PDO database connection if it doesn't exist
                self::$dbcon = new \PDO(self::$dsn, self::$user, self::$pass);
                self::$dbcon->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); // Enable error handling
                self::$dbcon->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ); // Set default fetch mode
            } catch (\PDOException $e) {
                $msg = $e->getMessage();
                include '../custom-error.php'; // Include a custom error handling page
                exit(); // Exit the script on database connection error
            }
        }
        return self::$dbcon; // Return the database connection instance
    }
}
?>