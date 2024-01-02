var emailError = true;

function validate() {
  
  
    let name = document.getElementById("name").value;
    let phone = document.getElementById("phone").value;
  
    document.getElementById("error").innerHTML = "";
    let error = "";
    if (!name) {
        error += "<h3>Please enter Userid</h3> ";
    }
    if (!phone) {
        error += "<h3>Please enter Notification Data </h3>";
    }


    
    if (error) {
        document.getElementById("error").innerHTML = error;
    } else {
        register(name, phone);
    }
}

function register(name, phone) {
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../controller/NotificationrControl.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let data = {
        name: name,
        phone: phone,
     
        show : 'Successfully sent '
    };
    let dataToSend = JSON.stringify(data);

    xhttp.send("data=" + dataToSend);
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            let response = JSON.parse(this.responseText);
            if (response.success) {
              //  window.location.replace("");
                document.getElementById("success").innerHTML = data.show;
              //  document.write("Success");
              alert('Notification Successfully send');
            }
            if (response.error) {
                document.getElementById("error").innerHTML = response.error;
            }
        }
    };
}


