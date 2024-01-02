var emailError = true;

function validate() {
  
  
    let name = document.getElementById("name").value;
    let phone = document.getElementById("phone").value;
    let evntdesc=document.getElementById("evntdesc").value;
    let esd=document.getElementById("esd").value;
    let eed=document.getElementById("eed").value;
    let el=document.getElementById("el").value;
    document.getElementById("error").innerHTML = "";
    let error = "";
    if (!name) {
        error += "Please enter campaign name<br>";
    }
    if (!phone) {
        error += "Please enter campaign sponsor <br>";
    }
    if (!evntdesc) {
        error += "Please enter description <br>";
    }
    if (!esd) {
        error += "Please enter start date <br>";
    }
    if (!eed) {
        error += "Please enter end date <br>";
    }
    if (!el) {
        error += "Please enter location <br>";
    }
    
    
    if (error) {
        document.getElementById("error").innerHTML = error;
    } else {
        register(name, phone, evntdesc, esd, eed, el);
    }
}

function register(name, phone, evntdesc, esd, eed, el) {
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../controller/eventControl.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let data = {
        name: name,
        phone: phone,
        evntdesc: evntdesc,
        esd: esd,
        eed: eed,
        el: el,
     
        show : 'success'
    };
    let dataToSend = JSON.stringify(data);

    xhttp.send("data=" + dataToSend);
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            let response = JSON.parse(this.responseText);
            if (response.success) {
              //  window.location.replace("");
                document.getElementById("error").innerHTML = data.show;
              //  document.write("Success");
              alert('success');
            }
            if (response.error) {
                document.getElementById("error").innerHTML = response.error;
            }
        }
    };
}


