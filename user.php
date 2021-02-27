<?php 
class User{

    public $conn;
    public $salt1="uv**!";
    public $salt2="##zkt!";

    function __construct(){
        $this->conn=new Mysqli('localhost','root','','loanapp');
          session_start();
        if($this->conn->connect_error){
            die("There was an error connecting to the database");
        }
    }

    function login($user, $pwd){
        $password=md5($pwd);
        //Declare a variable with the login query
        $query="select * from cus_profile where email = '$user' && password = '$password'";
        //Run the query 
        $res=$this->conn->query($query);
        if($this->conn->error){
            //If there is a query error, stop execution and display the error
            die("There was a query error<br />".$this->conn->error);
        }

        //if the query returns 1 or more records
        if($res->num_rows > 0){
            //return the first record
            return $res->fetch_assoc();
        }
        return false;
    }

    function loanApplication($cus_id,$loanAmount,$purposeOfLoan,$loanType,$loanDuration){
        $query="INSERT INTO loanapplication (cus_id,loanAmount,purposeOfLoan,loanType,loanDuration) VALUES ('$cus_id',$loanAmount','$purposeOfLoan', '$loanType','$loanDuration') ";
    $this->conn->query($query);
    $app=$this->conn->insertApp;
    if($app>0){
        return $app;
    }else{
        return false;
    }
        
    }

    function register( $fname,$lname,$BVN,$gender,$dob,$address,$username,$password,$phone_num,$email){
        $pwd=md5($password);
        
        $query="INSERT INTO cus_profile SET fname='$fname',lname='$lname',BVN='$BVN',gender='$gender',dob='$dob',address='$address',username='$username',password='$pwd',phone_num='$phone_num',email='$email'";
        $this->conn->query($query);
        $id=$this->conn->insert_id;
        if($id > 0){
            return $id;
        }else{
            return false;
        }
        // return $id;

        // if(!empty($s)){
        //     foreach($s as$key=>$val){
        //         $qq="INSERT INTO cus_profile SET cus_profile='$id',cus_profile='$val'";
        //         $this->conn->query($qq);
        //     }
        // }
        
        // die('$query');
        // $res=$this->conn->query($query);
        // $result=array('msg'=>'','status'=>false);
        // if($this->conn->error){
        //     $result['msg']="System error! Query error. Please contact web admin";
        //     //die($this->conn->error);
        //    // $result['status']=false;
        //     return $result;
            
        // }
        
        // $cus_id=$this->conn->insert_id;
        // if($cus_id > 0)
        // {
        //     $result['msg']="Successfully registered";
        //     $result['status']=true;
        //     return $result;
        // }
    }

    function my_register($details){
        
        $fname=$details['fname'];
        $lname=$details['lname'];
        $email=$details['email'];
        $phone_num=$details['phone_num'];
        $password=md5($details['password']);
        $BVN=$details['BVN'];
        $gender=$details['gender'];
        $dob=$details['dob'];
        $username=$details['username'];
        $address=$details['address'];

        $query="insert into cus_profile set fname='$fname',lname='$lname',BVN='$BVN',gender='$gender', dob='$dob',address='$address',username='$username',password='$pwd',phone_num='$phone_num'email='$email'";
        $this->conn->query($query);
        if($this->conn->error){
            $result['msg']="System error! Query error. Please contact web admin";
            $result['status']=false;
            return $result;
        }
        
        $cus_id=$this->conn->insert_id;
        if($cus_id > 0)
        {
            $result['msg']="Successfully registered";
            $result['status']=true;
            return $result;
        }
    }

    function get_user($cus_id){
        $result=['status'=>false, 'msg'=>'No Message','details'=>[]];

        $query="select * from users where id='$cus_id'";
        $res=$this->conn->query($query);
        if($this->conn->error){
            $result['msg']="Sorry, there was a problem retrieving your profile. Please retry";  
            //handle error logging here         
            return $result;
        }

        $cus_details=$res->fetch_assoc();
        if(empty($cus_details)){
            $result['msg']="Unrecognized user";
            return $result;
        }
        //die(print_r($user_details,1));
        $result['status']=true;
        $result['details']=$cus_details;

        return $result;
    }

    function update_cus($cus_details){
        $result=[
            'status'=>false,
            'msg'=>'No update done'
        ];

        //die(print_r($user_details));
        $fname=$details['fname'];
        $lname=$details['lname'];
        $email=$details['email'];
        $phone_num=$details['phone_num'];
        $password=md5($details['password']);
        $BVN=$details['BVN'];
        $gender=$details['gender'];
        $dob=$details['dob'];
        $username=$details['username'];
        $address=$details['address'];

       $query="insert into cus_profile set fname='$fname',lname='$lname',BVN='$BVN',gender='$gender', dob='$dob',address='$address',username='$username',password='$pwd',phone_num='$phone_num'email='$email'";
        //die($query);
       $res=$this->conn->query($query);
        if($this->conn->error)
        {
            $result['msg']="System Error! Please retry";
            return $result;
        }

        $result['status']=true;
        $result['msg']="Update Successful";

        //Check if he tried to update his password
        if(!empty($cus_details['password'])){
            //If the password does not match the confirm password 
            if($cus_details['password'] != $cus_details['password2']){
                $result['status']=false;
                $result['msg']="Your new password does not match the confirm password";

                return $result;
            }
            //But if it matches
            $new_pw=md5($cus_details['password']);
            //look out for users*******
            $update_pw_query="Update users set password = '$new_pw' where id='$cus_id'";
            $this->conn->query($update_pw_query);
            if($this->conn->error){
                $result['msg']="System error. Please retry";
                return $result;
            }

        }        
        return $result;
    }

     
}
?>