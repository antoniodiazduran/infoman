<?php

class Products extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'products');
    }

    public function all($user) {
        // Selecting data
        $sql  = "SELECT s.id, c.name as company, s.username, s.title, s.customer, s.description, s.transdate, s.timestamp ";
        $sql .= "FROM products s LEFT JOIN company c ON s.company = c.id ORDER BY c.name";
        $result = $this->db->exec($sql);
        return $result;
    }

    public function apiproducts($user) {
        // Selecting data
        $sql  = 'SELECT id,title FROM products ORDER BY title';
        $result = $this->db->exec($sql);
        echo json_encode($result);
    }

    public function add() {
        // Add data
        $this->copyFrom('POST');
        $this->save();
    }

    public function getById($id) {
        // Getting data
        $this->load(array('id=?',$id));
        $this->copyTo('POST');
    }

    public function edit($id) {
        // Updating data
        $this->load(array('id=?',$id));
        $this->copyFrom('POST');
        $this->update();
    }

    public function delete($id) {
	    // Removing expense
        $this->load(array('id=?',$id));
        $this->erase();
    }

}
?>
