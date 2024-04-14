<?php

// Database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "coviddb";

$connection = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_errno()) {
    die("Data connection failed: " . mysqli_connect_error());
}

// API URL
$apiUrl = 'https://api.apify.com/v2/key-value-stores/tVaYRsPHLjNdNBu7S/records/LATEST?disableRedirect=true';

// Fetch data
$jsonData = file_get_contents($apiUrl);

if ($jsonData === false) {
    die("Failed reach to API.");
}

// JSON  decode
$data = json_decode($jsonData, true);

if ($data === null) {
    die("Failed compile to API.");
}



// Prepared statement for inserting data into MySql
$sql = "INSERT INTO covid_data (country, infected, tested, recovered, deceased) 
        VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($connection, $sql);
if (!$stmt) {
    die("Error preparing statement: " . mysqli_error($connection));
}

// Bind parameters
mysqli_stmt_bind_param($stmt, "siiii", $country, $infected, $tested, $recovered, $deceased);

foreach ($data as $item) {
    $country = mysqli_real_escape_string($connection, $item['country']);
    $infected = intval(mysqli_real_escape_string($connection, $item['infected']));
    $tested = intval(mysqli_real_escape_string($connection, $item['tested']));
    $recovered = intval(mysqli_real_escape_string($connection, $item['recovered']));
    $deceased = intval(mysqli_real_escape_string($connection, $item['deceased']));



    // Execute statement
    if (mysqli_stmt_execute($stmt)) {
        // Success
    } else {
        echo "Error: Something went wrong. " ; // for security didn't request detailed error message //echo "Error executing statement: " . mysqli_stmt_error($stmt);
    }
}

// Close statement and connection
//mysqli_stmt_close($stmt);
//mysqli_close($connection);
?>



<!--
 class DB {

    
    private $db;
    
    
private  $dbHost = "localhost";
private $dbUsername = "root";
private $dbPassword = "";
private $dbDatabase = "coviddb";


    public function __construct()
    {
        
        if(!isset($this->db)){
            $connection = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbDatabase);
            if($connection->connect_error){
                die('failed to connect with MySql:' . $connection->connect_error);
            }else{
                $this->db = $connection;
            }
        }

    }
        

    public function is_token_empty(){
        $result = $this->db->query("SELECT id FROM google_auth WHERE provider = 'google'");
        if ($result->num_rows){
            return false;
        }
        return true;
    }


    public function get_access_token(){

        $sql = $this->db->query("SELECT  provider_value FROM google_oauth WHERE provider='google'" );
        $result = $sql->fetch_assoc();
        return json_decode($result['provider_value']);
        
    }

    public function get_refresh_token(){ 

        $result = $this->get_access_token();
        return $result->refresh_token;
        
    }

    public function update_access_token($token){ 

       if($this->is_token_empty()){
         $this->db->query("INSERT INTO google_oauth(provider, provider_value) VALUES('google', '$token')");
        
       } else {
        $this->db->query("UPDATE google_oauth SET provider_value = '$token' WHERE provider = 'google'");
       }
        
    }

}

-->

