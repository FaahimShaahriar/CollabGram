function abc() {
    let term = document.getElementById('term').value;
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../controller/searchUserCheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let resultDiv = document.getElementById('result');
            if (this.responseText.includes('No data found')) {
                resultDiv.innerHTML = "<p>No data found</p>";
            } else {
                resultDiv.innerHTML = this.responseText;
            }
        }
    }

    xhttp.send('searchuser=' + term);
}