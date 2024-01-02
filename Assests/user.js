function adduser(){
 
    let username = document.getElementById('adding').value;
     let xhttp = new XMLHttpRequest();
  
     xhttp.open('POST', '../views/Addusers.php', true);
     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xhttp.onreadystatechange = function(){
         if(this.readyState == 4 && this.status == 200){
             //alert(this.responseText);
             document.getElementById('add').innerHTML = this.responseText;
         }
     }
  
     xhttp.send('Uadd='+username);
 }


 function updateuser(){
 
    let username = document.getElementById('updating').value;
     let xhttp = new XMLHttpRequest();
  
     xhttp.open('POST', '../views/Updateusers.php', true);
     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xhttp.onreadystatechange = function(){
         if(this.readyState == 4 && this.status == 200){
             //alert(this.responseText);
             document.getElementById('update').innerHTML = this.responseText;
         }
     }
  
     xhttp.send('Uupp='+username);
 }


 function deleteuser(){
 
    let username = document.getElementById('deleting').value;
     let xhttp = new XMLHttpRequest();
  
     xhttp.open('POST', '../views/Deleteusers.php', true);
     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xhttp.onreadystatechange = function(){
         if(this.readyState == 4 && this.status == 200){
             //alert(this.responseText);
             document.getElementById('delete').innerHTML = this.responseText;
         }
     }
  
     xhttp.send('Udel='+username);
 }