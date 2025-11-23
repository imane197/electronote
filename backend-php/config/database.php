 <?php
class Database {
 private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "composants_db";
    public $conn;
    public function getConnection() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die(json_encode(["error" => "Connexion échouée: " . $this->conn->connect_error]));
        }
        return $this->conn;
    }
}