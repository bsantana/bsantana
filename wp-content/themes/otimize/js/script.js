function Request() {
    try {
        request = new XMLHttpRequest();
    } catch (trymicrosoft) {
        try {
            request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (othermicrosoft) {
            try {
               request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (failed) {
                request = null;
            }
        }
    }
 
    if (request == null)
        console.log("Error creating request object!");
}

function getContactForm() {
    Request();
    var url = "ajax.html";
    request.open("POST", url, true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            if (request.status === 200) {
                var respostaDoServidor = request.responseText;
                alert(respostaDoServidor);
                //console.log(respostaDoServidor);
                Validation();
            }
        }
    }
    request.send(null);
}

function Validation() {
var contact_form = document.querySelectorAll('.form-control');
let is_empty;

contact_form.forEach(function(date) {
    if (date.value == '') {
        is_empty = true;
        date.style.border = '1px solid red';
        date.focus();
        console.log(date)
    } else {
        date.style.border = '1px solid rgb(169, 169, 169)';
    }
});

console.log(is_empty);
}