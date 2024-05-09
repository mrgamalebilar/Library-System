function showBorrowOptions(bookId) {
  const actionButtons = document.getElementById(`actionButtons_${bookId}`);
  if (actionButtons) {
      actionButtons.style.display = 'block';
  }
}

function borrowBook(bookId) {
  const studentNo = prompt("Enter student number:");


  const borrowingData = {
      bookId: bookId,
      studentNo: studentNo,
      // Add more data if required for the borrowing process
  };

  fetch('borrow.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json'
      },
      body: JSON.stringify(borrowingData)
  })
  .then(response => {
      if (response.ok) {
          return response.json();
      }
      throw new Error('Borrowing failed');
  })
  .then(data => {
      // Handle success response from the backend
      alert("Book borrowed successfully!");
  })
  .catch(error => {
      console.error('Borrowing error:', error);
      alert("Failed to borrow the book. Please try again.");
  });
}

function cancelSelection(bookId) {
  const actionButtons = document.getElementById(`actionButtons_${bookId}`);
  if (actionButtons) {
      actionButtons.style.display = 'none';
  }
}
