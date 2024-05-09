function printTable() {
    // Hide all elements except the table
    var elementsToHide = document.querySelectorAll('.container, .button-group, .back-btn');
    elementsToHide.forEach(function(element) {
        element.style.display = 'none';
    });

    // Print the table
    var table = document.querySelector('.returned-books-table');
    table.setAttribute('id', 'print-table');
    window.print();
    table.removeAttribute('id');

    // Show the elements again after printing
    elementsToHide.forEach(function(element) {
        element.style.display = 'block';
    });
}
