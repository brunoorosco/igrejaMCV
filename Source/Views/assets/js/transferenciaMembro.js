var chkIgreja = document.getElementById("chkIgreja");
var chkCar = document.getElementById("chkCem");


$('#transferMembro').on('change', ':checkbox', function () {
    
    if (chkIgreja.checked) {
        document.getElementById("selIgreja").disabled = false;
    } else {
        document.getElementById("selIgreja").disabled = true;
    }

    
    if (chkCem.checked) {
        document.getElementById("selCem").disabled = false;
    } else {
        document.getElementById("selCem").disabled = true;
    }
});

