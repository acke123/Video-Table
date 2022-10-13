function remove(n) {
    var i = n.parentNode.parentNode.rowIndex;
    document.getElementById("myTable").deleteRow(i);
}