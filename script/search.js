function search() {
    let input, filter, table, tr, nameFiled, i, txtValue, durationField, durationValue, count = 0;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        nameFiled = tr[i].getElementsByTagName("td")[0];
        durationField = tr[i].getElementsByTagName("td")[3];
        if (nameFiled) {
            txtValue = nameFiled.textContent || nameFiled.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                count = 0
            } else {
                count += 1;
            }
        }
        if (durationField) {
            durationValue = durationField.textContent || durationField.innerText;
            if (durationValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                count = 0
            } else {
                count += 1;
            }
        }
        if (count > 1) {
            tr[i].style.display = "none";
        }
    }
}