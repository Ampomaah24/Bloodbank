<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #9c0404;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #9c0404;
        }
        .add-button {
            background-color: #9c0404;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        .add-button:hover {
            background-color: #7a0202;
        }
        .form-container {
            margin-bottom: 20px;
        }
        .form-container h3 {
            color: #9c0404;
            margin-bottom: 10px;
        }
        label {
            font-weight: bold;
            color: #333;
        }
        input[type="text"],
        input[type="date"],
        input[type="time"] {
            width: 100%;
            padding: 8px;
            margin: 6px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #9c0404;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #7a0202;
        }
    </style>
</head>
<body>
 

        <div class="container">
        <h2>Drive Management</h2>

        <div class="form-container">
            <h3>Add Drive</h3>
            <form action="../actions/add_drive_action.php" method="POST" onsubmit="return validateForm()">
                <label for="driveName">Drive Name:</label>
                <input type="text" id="driveName" name="driveName" required>

                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>

                <label for="date">Date:</label>
                <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" required>

                <label for="startTime">Start Time:</label>
                <input type="time" id="startTime" name="startTime" required>

                <label for="endTime">End Time:</label>
                <input type="time" id="endTime" name="endTime" required>

                <input type="submit" value="Add Drive">
            </form>
        </div>
    </div>

    <script>
        function validateForm() {
            var date = document.getElementById("date").value;
            var currentDate = new Date();
            var selectedDate = new Date(date);

            if (selectedDate <= currentDate) {
                alert("Please select a future date.");
                return false;
            }

            var startTime = document.getElementById("startTime").value;
            var endTime = document.getElementById("endTime").value;

            if (startTime >= endTime) {
                alert("Start time must be before end time.");
                return false;
            }

            return true; 
        }
    </script>
</body>
</html>