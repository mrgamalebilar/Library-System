<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Guide</title>
    <link rel="stylesheet" href="css/style_guide.css"> <!-- Link to the new CSS file -->
</head>
<body>
    <div class="container">
    <button onclick="window.location.href = 'home.php';">Back to Home</button>

        <h1>User Guide</h1>
        <p>Welcome to the system! Below are the procedures and guides on how to use it:</p>
        
        <!-- Add back button -->
        
        <h2>Getting Started</h2>
        <ol>
            <li>Log in to the system using your username and password.</li>
            <li>If you don't have an account, please contact the administrator to create one for you.</li>
        </ol>
        
        <h2>Navigation</h2>
        <p>The system consists of the following main sections:</p>
        <ul>
            <li><strong>Home:</strong> This is the landing page of the system.</li>
            <li><strong>Accounts:</strong> Option in creating an admin, staff, faculty_visitor, and student acccounts.</li>
            <li><strong>Dashboard:</strong> View and manage all report created.</li>
            <li><strong>Home:</strong> This is the landing page of the system.</li>
            <li><strong>Attendance:</strong> Scan for attendance of every student entered the library.</li>
            <li><strong>Book:</strong> Creating book data and borrowing books.</li>
            <li><strong>Transaction:</strong> Option in returning book data and viewing, managing penalty records.</li>
            <li><strong>Penalty Data:</strong> View and manage penalty records here.</li>
            <li><strong>Reports:</strong> Access various reports related to data being recorded and created.</li>
            <!-- Add more sections as needed -->
        </ul>
        
        <h2>Using Penalty Data Section</h2>
        <p>In the "Penalty Data" section, you can perform the following actions:</p>
        <ol>
            <li>Select a ban duration from the dropdown to automatically delete penalty records older than the specified duration.</li>
            <li>View the penalty records table, which includes details such as student ID, name, book details, and status.</li>
            <li>Delete individual penalty records by clicking the "Delete" button.</li>
        </ol>
        
        <h2>Additional Help</h2>
        <p>If you encounter any issues or need further assistance, please contact the system administrator.</p>
    </div>
</body>
</html>
