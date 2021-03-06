<?php
/*
 * DB Class
 * This class is used for database related (connect, insert, update, and delete) operations
 * @author    Boniface Kaghusa 
  */
//require_once '../phpqrcode/qrlib.php';
class DB{
    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName     = "globusdb";
    
    public function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){;
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }

     /*
     * variable to handle the main page 
     */
   public  $url="globus/views/";
    
    /*
     * Returns rows from the database based on the conditions
     * @param string name of the table
     * @param array select, where, order_by, limit and return_type conditions
     */
    public function getRows($table,$conditions = array()){
        $sql = 'SELECT ';
        $sql .= array_key_exists("select",$conditions)?$conditions['select']:'*';
        $sql .= ' FROM '.$table;
        if(array_key_exists("where",$conditions)){
            $sql .= ' WHERE ';
            $i = 0;
            foreach($conditions['where'] as $key => $value){
                $pre = ($i > 0)?' AND ':'';
                $sql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }
        
        if(array_key_exists("order_by",$conditions)){
            $sql .= ' ORDER BY '.$conditions['order_by']; 
        }
        
        if(array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
            $sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit']; 
        }elseif(!array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
            $sql .= ' LIMIT '.$conditions['limit']; 
        }
        
        $result = $this->db->query($sql);
        
        if(array_key_exists("return_type",$conditions) && $conditions['return_type'] != 'all'){
            switch($conditions['return_type']){
                case 'count':
                    $data = $result->num_rows;
                    break;
                case 'single':
                    $data = $result->fetch_assoc();
                    break;
                default:
                    $data = '';
            }
        }else{
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }
        }
        return !empty($data)?$data:false;
    }
    
    /*
     * Insert data into the database
     * @param string name of the table
     * @param array the data for inserting into the table
     */
    public function insert($table,$data){
        if(!empty($data) && is_array($data)){
            $columns = '';
            $values  = '';
            $i = 0;
            
            foreach($data as $key=>$val){
                $pre = ($i > 0)?', ':'';
                $columns .= $pre.$key;
                $values  .= $pre."'".$val."'";
                $i++;
            }
            $query = "INSERT INTO ".$table." (".$columns.") VALUES (".$values.")";
            $insert = $this->db->query($query);
            return $insert?$this->db->insert_id:false;
        }else{
            return false;
        }
    }
    
    /*
     * Update data into the database
     * @param string name of the table
     * @param array the data for updating into the table
     * @param array where condition on updating data
     */
    public function update($table,$data,$conditions){
        if(!empty($data) && is_array($data)){
            $colvalSet = '';
            $whereSql = '';
            $i = 0;
           
            foreach($data as $key=>$val){
                $pre = ($i > 0)?', ':'';
                $colvalSet .= $pre.$key."='".$val."'";
                $i++;
            }
            if(!empty($conditions)&& is_array($conditions)){
                $whereSql .= ' WHERE ';
                $i = 0;
                foreach($conditions as $key => $value){
                    $pre = ($i > 0)?' AND ':'';
                    $whereSql .= $pre.$key." = '".$value."'";
                    $i++;
                }
            }
            $query = "UPDATE ".$table." SET ".$colvalSet.$whereSql;
            $update = $this->db->query($query);
            return $update?$this->db->affected_rows:false;
        }else{
            return false;
        }
    }
    
    /*
     * Delete data from the database
     * @param string name of the table
     * @param array where condition on deleting data
     */
    public function delete($table,$conditions){
        $whereSql = '';
        if(!empty($conditions)&& is_array($conditions)){
            $whereSql .= ' WHERE ';
            $i = 0;
            foreach($conditions as $key => $value){
                $pre = ($i > 0)?' AND ':'';
                $whereSql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }
        $query = "DELETE FROM ".$table.$whereSql;
        $delete = $this->db->query($query);
        return $delete?true:false;
    }

/*
     * Returns rows from the database based on the conditions if the login success
     * @param string name of the table
     * @param array the condition email and password
     */
 public function login ($table,$conditions){
       $whereSql = '';
       $data;
            if(!empty($conditions) && is_array($conditions)){
                $whereSql .= ' WHERE ';
                $i = 0;
                foreach($conditions as $key => $value){
                    $pre = ($i > 0)?' AND ':'';
                    $whereSql .= $pre.$key." = '".$value."'";
                    $i++;
                }
            
            $query = "SELECT  *  FROM ".$table.$whereSql;
            $result = $this->db->query($query);

                 if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }

            return !empty($data)?$data:false;
        }
        else
        {
            return false;
        }
    }
    
    /*
     * Returns the decoded json
     * @param file name of format json
     * 
     */
    public function parseJson($jsonFile)
    {
        $jsonData=file_get_contents($jsonFile);
        $json=json_decode($jsonData,true);
        //return the decoded to php array from json
        return $json;
    }
    /*
     * Returns true or false depending on if the table is created or not
     * @param string name of the table
     * @param inside the method the query to create the new table
     */
    public function createTable($tableName)
    {
        $query="CREATE TABLE ".$tableName." ( `productID` INT NOT NULL AUTO_INCREMENT , `product_name` VARCHAR(255) NOT NULL , `product_description` TEXT NOT NULL , `product_quantity` INT NOT NULL , `product_price` INT NOT NULL , `product_color` VARCHAR(255) NOT NULL , `product_status` INT NOT NULL , `product_picture` TEXT NOT NULL , `post_status` INT NOT NULL , `categoryID` INT NOT NULL , `subCategoryID` INT NOT NULL , `ownerID` INT NOT NULL , `owner_type` INT NOT NULL , `itID` INT NOT NULL , `c_date` DATETIME NOT NULL , PRIMARY KEY (`productID`)) ENGINE = InnoDB;";
        $validate=$this->db->query($query);
        return $validate?true:false;
    }
     /*
     * Returns true or false depending on if the table is deleted or not
     * @param string name of the table
     *
     */
    public function deleteTable($tableName)
    {
        $query="DROP TABLE ".$tableName."";
        $validate=$this->db->query($query);
        return $validate?true:false;
    }
    /*
     * Returns true or false depending on if the table is renamed or not
     * @param string name of the table
     *
     */
    public function renameTable($oldName,$newName)
    {
        $query="RENAME TABLE ".$oldName." TO `".$newName.";";
        $validate=$this->db->query($query);
        return $validate?true:false;
    }
    /*
     * Returns the current  date 
     * @param string type example showDate('date') or showDate('datetime')
     *
     */
    public function showDate($type)
    {
            $gett = getdate();
            $annee=$gett['year'];
            $mois=$gett['mon']; 
            $jour=$gett['mday']; 
            $heure=$gett['hours'];
            $minutes=$gett['minutes'];
            $second=$gett['seconds'];

        if($type=='date')
            $currentDate=$annee.'-'.$mois.'-'.$jour;
        else if($type=='datetime')
            $currentDate=$annee.'-'.$mois.'-'.$jour.' '.$heure.':'.$minutes.':'.$second;

      return $currentDate;
    }

    /*
     * Returns true if the Logs has been registerd
     * @param string user ID
     * @param Int Logs type (ex. 1 for admin or 2 for lecture ...)
     */
    public function registerLogIn($userID,$logs_type)
    {
        $query="INSERT INTO log(start_time, userID, logs_type) VALUES(NOW(),'$userID','$logs_type')";
        $validate=$this->db->query($query);
        return $validate?true:false;
    }
    /*
     * Returns true if the Logs has been registerd
     * @param string user ID
     * @param Int Logs type (ex. 1 for admin or 2 for lecture ...)
     */
    public function registerLogOut($userID,$logs_type)
    {
        //Track
        $condition=array('Order by' => 'logsID  desc', 'where'=>array('userID'=>$userID, 'logs_type'=>$logs_type));
        $ck=$this->getRows('log',$condition);
        if(!empty($ck)):
            foreach($ck as $gt):
                $logsID=$gt['logsID'];
                $query="UPDATE  log SET end_time=NOW() WHERE logsID='$logsID'";
                $validate=$this->db->query($query);
            endforeach;
        endif;
        return $validate?true:false;
    }
    /*
     * Returns true if the Logs has been registerd
     * @param string user ID
     * @param Int Logs type (ex. 1 for admin or 2 for lecture ...)
     */
    public function getIdentityLog($type,$ID,$table)
    {
        if($type==1): $condition=array('where'=>array('adminID'=>$ID));
        elseif($type==2): $condition=array('where'=>array('ambassadorID'=>$ID));
        elseif($type==3): $condition=array('where'=>array('agentID'=>$ID));
        elseif($type==4): $condition=array('where'=>array('itID'=>$ID));
        elseif($type==5): $condition=array('where'=>array('supplierID'=>$ID));
        elseif($type==6): $condition=array('where'=>array('sellerID'=>$ID));
        endif;

        $query=$this->getRows($table,$condition);
        if(!empty($query)): 
            foreach($query as $getInfo):
                if($type==1): $names=$getInfo['admin_fname'].' '.$getInfo['admin_lname'];
                elseif($type==2): $names=$getInfo['ambassador_fname'].' '.$getInfo['ambassador_lname'];
                elseif($type==3): $names=$getInfo['agent_fname'].' '.$getInfo['agent_lname'];
                elseif($type==4): $names=$getInfo['it_fname'].' '.$getInfo['it_lname'];
                elseif($type==5): $names=$getInfo['supplier_fname'].' '.$getInfo['supplier_lname'];
                elseif($type==6): $names=$getInfo['seller_fname'].' '.$getInfo['seller_lname'];
                endif;
            endforeach;
        endif;
        return $names;
    }
    
    /*
     * Returns the array of data
     */

    public function getAdmin(){
        $sql ="SELECT  * from admin INNER JOIN country on admin.admin_country=country.countryID ";
        
        $result = $this->db->query($sql);
        
     
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
        }
        return !empty($data)?$data:false;
    }
    /*
     * Returns The Result of the search 
     * @param string name of Table
     * @param the element to search for
     */
    public function exampleOfSearch($tableName,$element){
        $sql ="SELECT  * from  ".$tableName."
        where rwagri_crop.Name  LIKE '%".$element."%' ";
        
        $result = $this->db->query($sql);
  
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
        }
        return !empty($data)?$data:false;
    }
}