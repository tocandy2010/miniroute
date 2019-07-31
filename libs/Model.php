<?php

class Model {

    protected $table = null;
    protected $pk = null;
    protected $filter = '';

    public function __construct()
    {
        $this->db = new Database();
    }

    /*
     * 新增方法，傳入一組陣列，回傳影響行數
     */
    public function add($array)
    {
        $count = count($array);
        $sql = "insert into {$this->table} (";
        foreach ($array as $k => $v) {
            $sql .= "$k,";
        }
        $sql = rtrim($sql, ',');
        $sql .= ") values(";
        $sql .= str_repeat('?,', $count);
        $sql = rtrim($sql, ',') . ")";    
        $res = $this->db->prepare($sql);
         foreach (array_values($array) as $k => $v) {
            $res->bindValue(($k+1), $v);
        }
        $res->execute();
        return $this->affectedRows($res);
    }

    /*
     * 更新方法，傳入一組陣列和主健名稱，回傳影響行數
     */
    public function update($array, $id)
    {  
        $sql = "update {$this->table} set ";
        foreach ($array as $k => $v) {
            $sql .= "{$k} = ?,";
        }
        $sql = rtrim($sql, ',');
        $sql .= " where {$this->pk} = {$id}";
        $res = $this->db->prepare($sql);
        foreach (array_values($array) as $k => $v) {
            $res->bindValue($k + 1, $v);
        }
        $res->execute();
        return $this->affectedRows($res);
    }

    /*
     * 根據主鍵刪除，回傳影響行數
     */
    public function delete($id)
    {
        $sql = "delete from {$this->table} where {$this->pk} = ?";
        $res = $this->db->prepare($sql);
        $res->bindParam(1, $id);
        $res->execute();
        return $this->affectedRows($res);
    }

    /*
     * 獲得全部表資訊，參數1為where條件，參數2為接收方式(預設為關連陣列)
     */
    public function gettAll($where=1,$show = PDO::FETCH_ASSOC)
    {
        $sql = "select * from {$this->table} where {$where}";
        $res = $this->db->prepare($sql);
        $res->execute();
        if ($show == 'index') {
            $show = PDO::FETCH_NUM;
            return $res->fetchAll($show);
        }
        return $res->fetchAll($show);
    }

    /*
     * 獲得主鍵獲得，參數1為主見職，參數2為接收方式(預設為關連陣列)
     */
    public function gettOne($pkvalue, $show = PDO::FETCH_ASSOC)
    {
        $sql = "select * from {$this->table} where {$this->pk} = ?";
        $res = $this->db->prepare($sql);
        $res->bindParam(1, $pkvalue);
        $res->execute();
        if ($show == 'index') {
            $show = PDO::FETCH_NUM;
            return $res->fetch($show);
        }
        return $res->fetch($show);
    }

    /*
     * 返回受 insert update delete 所影響行數
     */
    public function affectedRows($res)
    {
        return $res->rowCount();
    }

    /*
     * 獲得最後一次insert的主鍵名稱
     */
    public function getinsertid(){   
        return $this->db->lastInsertId();
    }
    
}
