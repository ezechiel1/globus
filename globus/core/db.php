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

    public function getTable($type)
    {
        if($type==1) {$tblName='admin';}
        else if($type==2) $tblName='ambassador';
        else if($type==3) $tblName='agent';
        else if($type==4) $tblName='it';
        else if($type==5) $tblName='supplier';
        else if($type==7) $tblName='seller';

        return $tblName;
    }

    public function parseJson($jsonFile)
    {
        $jsonData=file_get_contents($jsonFile);
        $json=json_decode($jsonData,true);
        //return the decoded to php array from json
        return $json;
    }

    public function createSubCatTable($subCat)
    {
        $query="CREATE TABLE ".$subCat." ( `productID` INT NOT NULL AUTO_INCREMENT , `product_name` VARCHAR(255) NOT NULL , `product_description` TEXT NOT NULL , `product_quantity` INT NOT NULL , `product_price` INT NOT NULL , `product_color` VARCHAR(255) NOT NULL , `product_status` INT NOT NULL , `product_picture` TEXT NOT NULL , `post_status` INT NOT NULL , `categoryID` INT NOT NULL , `subCategoryID` INT NOT NULL , `ownerID` INT NOT NULL , `owner_type` INT NOT NULL , `itID` INT NOT NULL , `c_date` DATETIME NOT NULL , PRIMARY KEY (`productID`)) ENGINE = InnoDB;";
        $validate=$this->db->query($query);
        return $validate?true:false;
    }

    public function createSubCatTablePicture($subCat)
    {
        $query="CREATE TABLE ".$subCat." ( `pictureID` INT NOT NULL AUTO_INCREMENT , `picture_name` VARCHAR(255) NOT NULL , `picture_status` INT NOT NULL , `productID` INT NOT NULL , `c_date` DATETIME NOT NULL , PRIMARY KEY (`pictureID`)) ENGINE = InnoDB;";
        $validate=$this->db->query($query);
        return $validate?true:false;
    }

    public function deleteSubCatTable($subCat)
    {
        $query="DROP TABLE ".$subCat."";
        $validate=$this->db->query($query);
        return $validate?true:false;
    }

    public function deleteSubCatTablePicture($subCat)
    {
        $query="DROP TABLE ".$subCat."";
        $validate=$this->db->query($query);
        return $validate?true:false;
    }

    public function renameTable($subCat)
    {
        $query="RENAME TABLE ".$oldName." TO `".$newName.";";
        $validate=$this->db->query($query);
        return $validate?true:false;
    }

    public function getTableProduct($cat,$subCat)
    {
        $condition=array( 'Order by' => 'subCategoryID asc',
                'where'=>array('subCategoryID'=>$subCat)
        );
        $res=$this->getRows('subcategory',$condition);
        if(!empty($res)):
            foreach($res as $row): 
                $tableName=$row['table_product']; 
            endforeach;
        endif;
        return !empty($res)?$tableName:false;   
    }

    public function getSubCatPath($cat,$subCat)
    {
        $condition=array( 'Order by' => 'subCategoryID asc',
                'where'=>array('subCategoryID'=>$subCat)
        );
        $res=$this->getRows('subcategory',$condition);
        if(!empty($res)):
            foreach($res as $row): 
                $path=$row['subCategory_path']; 
            endforeach;
        endif;
        return !empty($res)?$path:false;   
    }

    public function getTablePicture($cat,$subCat)
    {
        $sql ="SELECT * from  subcategory where subCategoryID='$subCat' and categoryID='$cat' ";
        $result = $this->db->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $tableName=$row['table_picture']; 
        }
        return !empty($data)?$tableName:false;   
    }

    
    public function showDate()
    {
            $gett = getdate();
            $annee=$gett['year'];
            $mois=$gett['mon']; 
            $jour=$gett['mday']; 
            $heure=$gett['hours'];
            $minutes=$gett['minutes'];
            $second=$gett['seconds'];
        
      $currentDate=$annee.'-'.$mois.'-'.$jour.' '.$heure.':'.$minutes.':'.$second;

      return $currentDate;
    }

    public function getType($type)
    {        
        if($type==1): $data='Admin';
        elseif($type==2): $data='Ambassador';
        elseif($type==3): $data='Agent';
        elseif($type==4): $data='It';
        elseif($type==5): $data='Supplier';
        elseif($type==6): $data='Seller';
        endif;
        return $data;
    }
    //....Code for the logs 
    public function registerLogIn($userID,$logs_type)
    {
        $query="INSERT INTO log(start_time, userID, logs_type) VALUES(NOW(),'$userID','$logs_type')";
        $validate=$this->db->query($query);
        return $validate?true:false;
    }

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
    // others functions 

     public function getListCategory(){
        $sql ="SELECT * from  category ";
        
        $result = $this->db->query($sql);
        
     
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            
        }
        return !empty($data)?$data:false;
    }



     public function getSellers(){
        $sql ="SELECT  * from seller inner join company on seller.companyID=company.companyID INNER JOIN country on seller.seller_country=country.countryID ";
        
        $result = $this->db->query($sql);
        
     
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            
        }
        return !empty($data)?$data:false;
    }

public function getSupplier(){
    $sql ="SELECT  * from supplier inner join company on supplier.companyID=company.companyID INNER JOIN country on supplier.supplier_country=country.countryID ";
    $result = $this->db->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
        }
        return !empty($data)?$data:false;
    }
     public function getAgent(){
        $sql ="SELECT  * from agent INNER JOIN country on agent.agent_country=country.countryID ";
        
        $result = $this->db->query($sql);
        
     
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            
        }
        return !empty($data)?$data:false;
    }

    public function getAmbassador(){
        $sql ="SELECT  * from ambassador INNER JOIN country on ambassador.ambassador_country=country.countryID ";
        
        $result = $this->db->query($sql);
        
     
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            
        }
        return !empty($data)?$data:false;
    }

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

    public function getIt(){
        $sql ="SELECT  * from it INNER JOIN country on it.it_country=country.countryID ";
        
        $result = $this->db->query($sql);
        
     
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            
        }
        return !empty($data)?$data:false;
    }
    public function getCompany(){
        $sql ="SELECT  * from company INNER JOIN country on company.company_country=country.countryID  inner join category on company.categoryID=category.categoryID";
        
        $result = $this->db->query($sql);
        
     
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            
        }
        return !empty($data)?$data:false;
    }

    //Function to get the Products --> supplier or seller
    public function sProduct($subCat,$ownerID,$owner_type){
        $sql ="SELECT  * from subcategory inner join category on subcategory.categoryID=category.categoryID WHERE subcategory.subCategoryID='$subCat'";
        $result = $this->db->query($sql);
            if($result->num_rows > 0){
                $gtbl = $result->fetch_assoc();
                $table_product=$gtbl['table_product'];

                $sqlP ="SELECT  * from ".$table_product." WHERE ownerID='$ownerID'  and owner_type='$owner_type' order by productID desc ";
                $resultP = $this->db->query($sqlP);
                if($resultP->num_rows > 0){
                    while($rowP = $resultP->fetch_assoc()){
                        $data[] = $rowP;
                    }
            
        }
            
        }
        return !empty($data)?$data:false;
    }

    public function iProduct($subCat){
        $sql ="SELECT  * from subcategory inner join category on subcategory.categoryID=category.categoryID WHERE subcategory.subCategoryID='$subCat'";
        $result = $this->db->query($sql);
            if($result->num_rows > 0){
                $gtbl = $result->fetch_assoc();
                $table_product=$gtbl['table_product'];

                $sqlP ="SELECT  * from ".$table_product."  order by productID desc ";
                $resultP = $this->db->query($sqlP);
                if($resultP->num_rows > 0){
                    while($rowP = $resultP->fetch_assoc()){
                        $data[] = $rowP;
                    }
            
        }
            
        }
        return !empty($data)?$data:false;
    }

    //Function to get the Products --> WebSite
    public function wProduct($cat,$subCat){
        $sql ="SELECT  * from subcategory inner join category on subcategory.categoryID=category.categoryID WHERE subcategory.subCategoryID='$subCat'";
        $result = $this->db->query($sql);
            if($result->num_rows > 0){
                $gtbl = $result->fetch_assoc();
                $table_product=$gtbl['table_product'];

                $sqlP ="SELECT  * from ".$table_product." order by productID desc ";
                $resultP = $this->db->query($sqlP);
                if($resultP->num_rows > 0){
                    while($rowP = $resultP->fetch_assoc()){
                        $data[] = $rowP;
                    }
            
        }
            
        }
        return !empty($data)?$data:false;
    }

    //Function to get the Product Description --> WebSite
    public function wProductDescription($categoryID,$subCategoryID,$productID){
        $sql ="SELECT  * from subcategory inner join category on subcategory.categoryID=category.categoryID WHERE subcategory.subCategoryID='$subCategoryID'";
        $result = $this->db->query($sql);
            if($result->num_rows > 0){
                $gtbl = $result->fetch_assoc();
                $table_product=$gtbl['table_product'];

                $sqlP ="SELECT  * from ".$table_product." where categoryID='$categoryID' and subCategoryID='$subCategoryID' and productID='$productID' ";
                $resultP = $this->db->query($sqlP);
                if($resultP->num_rows > 0){
                    while($rowP = $resultP->fetch_assoc()){
                        $data[] = $rowP;
                    }
            
        }
            
        }
        return !empty($data)?$data:false;
    }

     public function iCategory(){
        $sql ="SELECT  *, date_format(c_date, '%d/%m/%Y') as cdate from  category ";
        $result = $this->db->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
        }
        return !empty($data)?$data:false;
    }

    public function isubCategory($catID){
        $sql ="SELECT  *, date_format(c_date, '%d/%m/%Y') as cdate from  subcategory WHERE categoryID='$catID'";
        $result = $this->db->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
        }
        return !empty($data)?$data:false;
    }

    public function wsubCategory(){
        $sql ="SELECT  *, date_format(c_date, '%d/%m/%Y') as cdate from  subcategory";
        $result = $this->db->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
        }
        return !empty($data)?$data:false;
    }

    public function wcsubCategory($category){
        $sql ="SELECT  *, date_format(c_date, '%d/%m/%Y') as cdate from  subcategory where categoryID='$category'";
        $result = $this->db->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
        }
        return !empty($data)?$data:false;
    }

    public function getTotalSubCategory($category){
        $sql ="SELECT  COUNT(*) AS totSub from  subcategory where categoryID='$category'";
        $result = $this->db->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                    $data = $row['totSub'];
        }
        return !empty($data)?$data:0;
    }

    public function getTotalSubProduct($subcat){
        $sql ="SELECT  * from subcategory inner join category on subcategory.categoryID=category.categoryID WHERE subcategory.subCategoryID='$subcat'";
        $result = $this->db->query($sql);
            if($result->num_rows > 0){
                $gtbl = $result->fetch_assoc();
                $table_product=$gtbl['table_product'];

            $sql ="SELECT  COUNT(*) AS totSub from  ".$table_product." where subCategoryID='$subcat'";
            $result = $this->db->query($sql);
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                        $data = $row['totSub'];
            }
        }
        return !empty($data)?$data:0;
    }

    public function getLastID($tbl,$ID){
        $sql ="SELECT  ".$ID." AS ID from ".$tbl." order by ".$ID." desc limit 1";
        $result = $this->db->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                    $data = $row['ID'];
        }
        return !empty($data)?$data:false;
    }

    public function security($auth_session)
    {
        if($auth_session=='') 
            header("location: ../../index.php");
    }

    public function getCro($element){
        $sql ="SELECT  * from  rwagri_crop
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