<?php
// Include your database connection code here

// Replace these with your actual database credentials
$hostname = "localhost";
$username = "root";
$password = "";
$database = "eventfinal";

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize and validate input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Process User Registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    $email = sanitize_input($_POST["email"]);
    $password = sanitize_input($_POST["password"]);
    $confirm_password = sanitize_input($_POST["confirm_password"]);
    $first_name = sanitize_input($_POST["first_name"]);
    $last_name = sanitize_input($_POST["last_name"]);
    $address = sanitize_input($_POST["address"]);
    $date_of_birth = sanitize_input($_POST["date_of_birth"]);
    $city = sanitize_input($_POST["city"]);
    $state = sanitize_input($_POST["state"]);
    $event_date = sanitize_input($_POST["event_date"]);
    $timing = sanitize_input($_POST["timing"]);
    $event_type = sanitize_input($_POST["event_type"]);
    $hall_type = sanitize_input($_POST["hall_type"]);
    $hall_capacity = sanitize_input($_POST["hall_capacity"]);
  
    $contact_number = sanitize_input($_POST["contact_number"]);


    // SQL query for user registration
    $sql = "INSERT INTO registrations (email, password, confirm_password, first_name, last_name, address, date_of_birth, city, state,event_date, timing, event_type, hall_type, hall_capacity, contact_number)
            VALUES ('$email', '$password', '$confirm_password', '$first_name', '$last_name', '$address', '$date_of_birth', '$city', '$state','$event_date', '$timing','$event_type', '$hall_type', '$hall_capacity', '$contact_number')";

    if ($conn->query($sql) === TRUE) {
        // No need to echo anything here
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


// Process Event Form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["event_code"])) {
    $event_code = sanitize_input($_POST["event_code"]);
    $user_id = sanitize_input($_POST["user_id"]);
    $event_type_event = sanitize_input($_POST["event_type_event"]);
    $event_date = sanitize_input($_POST["event_date"]);
    $hall_capacity_event = sanitize_input($_POST["hall_capacity_event"]);
    $hall_type_event = sanitize_input($_POST["hall_type_event"]);
    $event_timing = sanitize_input($_POST["event_timing"]);
    $num_of_suppliers = sanitize_input($_POST["num_of_suppliers"]);
    $supplier_name = sanitize_input($_POST["supplier_name"]);

    // SQL query for event
    $sql = "INSERT INTO event (event_code, user_id, event_type, event_date, capacity_of_hall, hall_type, event_timing, number_of_suppliers, supplier_name)
            VALUES ('$event_code', '$user_id', '$event_type_event', '$event_date', '$hall_capacity_event', '$hall_type_event', '$event_timing', '$num_of_suppliers', '$supplier_name')";

if ($conn->query($sql) === TRUE) {
    // Respond with a success status (no need to echo anything here)
    http_response_code(200);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    // Respond with an error status
    http_response_code(500);
}
}

// Process Feedback Form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["feedback_email"])) {
    $feedback_email = sanitize_input($_POST["feedback_email"]);
    $feedback_text = sanitize_input($_POST["feedback_text"]);
    $rating = sanitize_input($_POST["rating"]);

    // SQL query for feedback
    $sql = "INSERT INTO feedback (email, feedback, rating)
            VALUES ('$feedback_email', '$feedback_text', '$rating')";
if ($conn->query($sql) === TRUE) {
    // Respond with a success status (no need to echo anything here)
    http_response_code(200);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    // Respond with an error status
    http_response_code(500);
}
}
// Process Order Form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["order_number"])) {
    $order_number = sanitize_input($_POST["order_number"]);
    $email_order = sanitize_input($_POST["email_order"]);
    $event_code_order = sanitize_input($_POST["event_code_order"]);

    // SQL query for order
    $sql = "INSERT INTO order_table (order_number, email, event_code)
            VALUES ('$order_number', '$email_order', '$event_code_order')";

if ($conn->query($sql) === TRUE) {
    // Respond with a success status (no need to echo anything here)
    http_response_code(200);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    // Respond with an error status
    http_response_code(500);
}
}

// Process Bill Form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["bill_number"])) {
    $bill_number = sanitize_input($_POST["bill_number"]);
    $order_number_bill = sanitize_input($_POST["order_number_bill"]);
    $email_bill = sanitize_input($_POST["email_bill"]);
    $amount_bill = sanitize_input($_POST["amount_bill"]);
    $tax = sanitize_input($_POST["tax"]);
    $final_amount = sanitize_input($_POST["final_amount"]);
    $bill_date = sanitize_input($_POST["bill_date"]);

    // SQL query for bill
    $sql = "INSERT INTO bill (bill_number, order_number, email, amount, tax, final_amount, bill_date)
            VALUES ('$bill_number', '$order_number_bill', '$email_bill', '$amount_bill', '$tax', '$final_amount', '$bill_date')";

   
if ($conn->query($sql) === TRUE) {
    // Respond with a success status (no need to echo anything here)
    http_response_code(200);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    // Respond with an error status
    http_response_code(500);
}
}



    
// Close the database connection
$conn->close();
?>