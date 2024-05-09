document.addEventListener('DOMContentLoaded', function() {
    // Check for barcode scanner input on page load
    checkBarcodeScannerInput();
});

function checkBarcodeScannerInput() {
    document.addEventListener('keypress', function(event) {
        const barcode = event.key;

        // Check if the input is from the barcode scanner (you might need to adjust this logic based on your scanner)
        if (barcode && barcode.length > 0) {
            sendDataToServer(barcode);
        }
    });
}

function sendDataToServer(barcode) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'barcode.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            const resultDiv = document.getElementById('result');
            resultDiv.innerHTML = xhr.responseText;
        }
    };
    xhr.send('barcode=' + barcode);
}
