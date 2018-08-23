<?php
    interface Imybook
{
    function saveLetter($gname, $letter);
    function showLetter();
    function deleteLetter($id);
}

    class mybook  implements Imybook
{

    const  DB_NAME='mybook.db';
    private $_db;
    function __construct()
    {
    if (!file_exists(self::DB_NAME)) {
        $this->_db=new SQLite3(self::DB_NAME);
        $sql="CREATE TABLE letters(
            id INTEGER PRIMARY KEY,
            gname TEXT,
            letter TEXT,
            datetime INTEGER
            )";
            $this->_db->query($sql);
    } else {
        
            $this->_db=new SQLite3(self::DB_NAME);
        }
    }

    function __destruct()
{
    unset($this->_db);
}
    
    function  saveLetter($gname, $letter){
            $dt=time();
            $sql="INSERT INTO letters (gname ,letter, datetime)
                  VALUES('$gname', '$letter', '$dt')";
	    $this->_db->query($sql);
            return $errMessage="запись добавлена";
    }
    function showLetter()
    {
        $sql="SELECT id, gname, letter, datetime FROM letters 
        ORDER BY id DESC";

        $res=$this->_db->query($sql);
        $array = array();
        while ($data = $res->fetchArray(SQLITE3_ASSOC)) {
    
         $array[] = $data;
        }
            return $array;    
    }
    function deleteLetter($id) 
    {
        $sql = "DELETE FROM letters WHERE id=$id";
        $this->_db->query($sql);
    }
}