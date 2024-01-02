<?php
      require_once('db.php');

      function login($id, $password)
      {
          $con = getConnection();
          $sql = "select * from user_info where id='{$id}' and password='{$password}'";
          $result = mysqli_query($con, $sql);
          $count = mysqli_num_rows($result);
      
          if ($count == 1) {
              $users = [];
              while ($row = mysqli_fetch_assoc($result)) {
                  array_push($users, $row);
              }
              $user = $users[0];
              print_r($user[0]);
      
              session_start();
              $_SESSION['user'] = ['id' => $user['id'], 'name' => $user['name'], 'password' => $user['password'], 'type' => $user['type']];
      
              $_SESSION['auth'] = "true";
              if ($user['type'] == 'User') {

                  header('location: ../view/user_home.php');
              } else {

                  header('location: ../view/admin_home.php');
              }
          } else {
      
              return false;
          }
      }
      
      function register($id, $name, $password, $type)
      {
      
      
          $con =getConnection();
      
      
          $sql = "select * from user_info where id='{$id}'";
          $result = mysqli_query($con, $sql);
          $count = mysqli_num_rows($result);
          if ($count == 1) {
              print_r("User already exists");
          } else {
              $sql = "insert into user_info (id,name,password,type) values ('{$id}','{$name}','{$password}','{$type}')";
              $result = mysqli_query($con, $sql);
      
      
              if ($result) {
                  header('location: ../view/login.php');
              } else {
      
                  echo "Error!";
              }
          }
      }
      
      function getUser($id)
      {
          session_start();
          if (isset($_SESSION['auth']) && $_SESSION['user']) {
              $id = $_SESSION['user']['id'];
          }
          $con = getConnection();
          $sql = "select * from user_info where id='{$id}'";
          $result = mysqli_query($con, $sql);
          $count = mysqli_num_rows($result);
      
          if ($count == 1) {
              $users = [];
              while ($row = mysqli_fetch_assoc($result)) {
                  array_push($users, $row);
              }
              $user = $users[0];
              print_r($user[0]);
      
              session_start();
              $_SESSION['user'] = ['id' => $user['id'], 'name' => $user['name'], 'password' => $user['password'], 'type' => $user['user_type']];
      
              $_SESSION['auth'] = "true";
              if ($user['type'] == 'admin') {
                  header('location: ../view/admin_home.php');
              } else {
                  header('location: ../view/user_home.php');
              }
          } else {
      
              return false;
          }
      }

      
      function getAllUser()
      {
          $con = getConnection();
          $sql = "select * from user_info";
          $result = mysqli_query($con, $sql);
          $users = [];
          while ($row = mysqli_fetch_assoc($result)) {
              array_push($users, $row);
          }
      
          return $users;
      }
      
      function updatepassword($id, $password)
      {
          session_start();
          if (isset($_SESSION['auth']) && $_SESSION['user']) {
              $id = $_SESSION['user']['id'];
          }
          $con = getConnection();
          $sql = "UPDATE users
          SET password='{$password}'
          WHERE id='{$id}';";
      }






      function DeleteUsers ($User_ID){
        $con = getConnection();
        $sql = "DELETE FROM users WHERE User_ID=' $User_ID';";
        $status = mysqli_query($con, $sql);
        return $status;
    }



      function UpdateUsers($updateuser)
      {
        $con= getConnection();
        $sql= "UPDATE users
        SET User_Name = '{$updateuser['User_Name']}', 
        User_Email= '{$updateuser['User_Email']}', 
        Mobile_Number= '{$updateuser['Mobile_Number']}', 
        Actions= '{$updateuser['Actions']}'
        WHERE User_ID = '{$updateuser['User_ID']}'";
        
        $result= mysqli_query($con,$sql);
  
        return $result;
      }
      
      function getviewuser(){
        $con = getConnection();
        $sql = "select * from users";
        $result = mysqli_query($con, $sql);
        $users = [];
  
        while($row = mysqli_fetch_assoc($result)){
            //$users = $row;
            array_push($users, $row);
        }
  
        return $users;
     
    }


  function AddUsers($UserInfo){
    $con = getConnection();
    $sql = "insert into users values('','{$UserInfo['User_Name']}','{$UserInfo['User_Email']}', '{$UserInfo['Mobile_Number']}','{$UserInfo['Actions']}')";
    $status = mysqli_query($con, $sql);
    return $status;
  }





  function getviewlibrian(){
    $con = getConnection();
    $sql = "select * from librian";
    $result = mysqli_query($con, $sql);
    $users = [];

    while($row = mysqli_fetch_assoc($result)){
        //$users = $row;
        array_push($users, $row);
    }

    return $users;
 
    }




  function AddLibrian($LibrianInfo){
    $con = getConnection();
    $sql = "insert into librian values('','{$LibrianInfo['Librian_Name']}','{$LibrianInfo['Librian_Email']}', '{$LibrianInfo['Contact_Number']}','{$LibrianInfo['Assigned_Role']}')";
    $status = mysqli_query($con, $sql);
    return $status;
  }


  function UpdateLibrian($updatelibrian)
      {
        $con= getConnection();
        $sql= "UPDATE librian
        SET Librian_Name = '{$updatelibrian['Librian_Name']}', 
        Librian_Email= '{$updatelibrian['Librian_Email']}', 
        Contact_Number= '{$updatelibrian['Contact_Number']}', 
        Assigned_Role= '{$updatelibrian['Assigned_Role']}'
        WHERE Librian_ID = '{$updatelibrian['Librian_ID']}'";
        
        $result= mysqli_query($con,$sql);
  
        return $result;
      }


      function DeleteLibrian ($Librian_ID){
        $con = getConnection();
        $sql = "DELETE FROM librian WHERE Librian_ID=' $Librian_ID';";
        $status = mysqli_query($con, $sql);
        return $status;
    }





    function getNL_Books(){
        $con = getConnection();
        $sql = "select * from books";
        $result = mysqli_query($con, $sql);
        $users = [];
  
        while($row = mysqli_fetch_assoc($result)){
            //$users = $row;
            array_push($users, $row);
        }
  
        return $users;
     
    }

/*
    function RecommendB($RecommendedB){
        $con = getConnection();
        $sql = "insert into recommended_books values('','{$RecommendedB['BookName']}','{$RecommendedB['Author']}', '{$RecommendedB['Genre']}','{$RecommendedB['Rating']}')";
        $status = mysqli_query($con, $sql);
        return $status;
      }
      */


      
      function BR($user)
{

    $con = getConnection();

    $sql = "insert into recommended_books(BookID,BookName,Author,Genre,Rating) values ('{$user->name}','{$user->phone}','{$user->author}','{$user-> genre}','{$user-> rating}')";
    $result = mysqli_query($con, $sql);


    if ($result) {
        return ['success' => "true"];
    } else {

        return ['error' => "error"];
    }
}




      function getviewRecommend(){
        $con = getConnection();
        $sql = "select * from recommended_books";
        $result = mysqli_query($con, $sql);
        $users = [];
    
        while($row = mysqli_fetch_assoc($result)){
            //$users = $row;
            array_push($users, $row);
        }
    
        return $users;
     
        }




        function SendMsg($Sndmsg){
            $con = getConnection();
            $sql = "insert into help_support values('{$Sndmsg['Name']}','{$Sndmsg['Email']}', '{$Sndmsg['Subject']}','{$Sndmsg['Messege']}')";
            $status = mysqli_query($con, $sql);
            return $status;
          }




          function getviewmsgUser(){
            $con = getConnection();
            $sql = "select * from help_support";
            $result = mysqli_query($con, $sql);
            $users = [];
        
            while($row = mysqli_fetch_assoc($result)){
                //$users = $row;
                array_push($users, $row);
            }
        
            return $users;
         
            }




            function RcvMsguser($rcvmsg){
                $con = getConnection();
                $sql = "insert into support_from_admin values('{$rcvmsg['From(Admin)']}','{$rcvmsg['To(User)']}', '{$rcvmsg['Admin_email']}','{$rcvmsg['Subject']}' ,'{$rcvmsg['Messege']}')";
                $status = mysqli_query($con, $sql);
                return $status;
              }






              function getviewmsgAdmin(){
                $con = getConnection();
                $sql = "select * from support_from_admin";
                $result = mysqli_query($con, $sql);
                $users = [];
            
                while($row = mysqli_fetch_assoc($result)){
                    //$users = $row;
                    array_push($users, $row);
                }
            
                return $users;
             
                }


function sndmsg($user)
{

    $con = getConnection();

    $sql = "insert into help_support(Name,Email,Subject,Messege) values ('{$user->name}','{$user->phone}','{$user->Subject}','{$user->DYP}')";
    $result = mysqli_query($con, $sql);


    if ($result) {
        return ['success' => "true"];
    } else {

        return ['error' => "error"];
    }
}


  function solnAdmin($user)
              {
              
                  $con = getConnection();
              
                  $sql = "insert into support_from_admin(Admin,User,Admin_email,Subject,Messege) values ('{$user->name}','{$user->phone}','{$user->Admin_email}','{$user->Subject}','{$user-> Message}')";
                  $result = mysqli_query($con, $sql);
              
              
                  if ($result) {
                      return ['success' => "true"];
                  } else {
              
                      return ['error' => "error"];
                  }
              }





            








    
















