<?php
namespace app\lib;
use PDO;

class Db 
{
    protected $db;

    public function __construct()
    {
        $config = require 'app/config/db.php';
        $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'].'', $config['user'], $config['password']);        
    }

    /**
     * @param $sql
     * @param array $params
     */
    public function query($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        if(!empty($params)){
            foreach ($params as $key => $val) {
                 $stmt->bindValue(':'.$key, $val);
            }
        }
        $stmt->execute();

        return $stmt;
    }

    /**
     * @param $sql
     * @param array $params
     * @return array
     */
    public function row($sql, $params = []): array
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $sql
     * @param array $params
     * @return mixed
     */
    public function column($sql, $params = []): mixed
    {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }
}
