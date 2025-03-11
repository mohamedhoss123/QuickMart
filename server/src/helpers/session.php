<?php
require_once(__DIR__."/../database/connection.php");
class SessionHelper
{
    protected $sid;
    public $data;
    private $conn;
    public function __construct()
    {
        $this->conn = (new DatabaseConnection())->getPdo();

    }
    public function isAuth(){
        $sessionId = $_COOKIE['sid'] ?? null;

        if (isset($sessionId)) {
            $stmt = $this->conn->prepare("SELECT data FROM sessions WHERE sid = :sid");
            $stmt->execute([':sid' => $sessionId]);
            $result = $stmt->fetchColumn();

            if ($result !== false) {
                $this->data = json_decode($result, true);
                return true;
            }
        }
    }

    public function createSession($data)
    {
        $this->sid = bin2hex(random_bytes(16)); // Generate a random session ID
        $data = json_encode($data);
        header('Set-Cookie: sid=' . $this->sid . '; expires=' . gmdate('D, d-M-Y H:i:s', time() + 3600) . '; path=/; domain=localhost; secure; httponly');
        $this->conn->prepare("INSERT INTO sessions (sid, data) VALUES (:sid, :data)")
            ->execute([':sid' => $this->sid, ':data' => $data]);
        $this->data = $data;
    }

    
    public function updateSession($data)
    {
        // Merge current session data with new data
        $mergedData = array_merge((array)$this->data, $data);
        $jsonData = json_encode($mergedData);

        // Update session in the database
        $this->conn->prepare("UPDATE sessions SET data = :data WHERE sid = :sid")
            ->execute([':sid' => $this->sid, ':data' => $jsonData]);

        // Update the current session data
        $this->data = $mergedData;
    }

    
    public function destroySession()
    {
        $this->conn->prepare("DELETE FROM sessions WHERE sid = :sid")
            ->execute([':sid' => $this->sid]);
        $this->sid = null;
        $this->data = [];
    }

}




