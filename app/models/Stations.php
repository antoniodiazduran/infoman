<?php

class Stations extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'stations');
    }

    public function all($user) {
        // Selecting data
        $sql  = 'SELECT * FROM stations_view1 ORDER BY timestamp DESC';
        $result = $this->db->exec($sql);
        return $result;
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
