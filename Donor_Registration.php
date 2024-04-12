<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank - Donor Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #9c0404;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%239c0404' width='18px' height='18px'%3E%3Cpath d='M7 10l5 5 5-5H7z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 8px top 50%;
            background-size: 18px;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #9c0404;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #7a0202;
        }

        #otherMedicalCondition {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Donor Registration</h2>
        <form action="../actions/register_donor_action.php" method="POST">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="FirstName" required>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="LastName" required>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="Gender" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label for="bloodGroup">Blood Group:</label>
            <select id="bloodGroup" name="BloodGroup" required>
                <option value="">Select Blood Group</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>

            <label for="contactNumber">Contact Number:</label>
            <input type="tel" id="contactNumber" name="ContactNumber" required>

            <label for="medicalConditions">Medical Conditions:</label>
            <select id="medicalConditions" name="MedicalHistory" required>
                <option value="">Select Medical Condition</option>
                <option value="None">None</option>
                <option value="Hypertension">Hypertension</option>
                <option value="Diabetes">Diabetes</option>
                <option value="Asthma">Asthma</option>
                <option value="Aids">Aids</option>
                <option value="Other">Other (Please specify)</option>
            </select>

            <textarea id="otherMedicalCondition" name="otherMedicalCondition" rows="4" placeholder="Enter other medical condition (if applicable)"></textarea>

            <input type="submit" value="Submit" name="submit">
        </form>
    </div>

    <script>
        document.getElementById("medicalConditions").addEventListener("change", function() {
            var otherMedicalCondition = document.getElementById("otherMedicalCondition");
            if (this.value === "Other") {
                otherMedicalCondition.style.display = "block";
                otherMedicalCondition.setAttribute("required", "required");
            } else {
                otherMedicalCondition.style.display = "none";
                otherMedicalCondition.removeAttribute("required");
            }
        });
    </script>
</body>
</html>
