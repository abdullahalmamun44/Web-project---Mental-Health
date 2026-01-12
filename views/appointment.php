<?php
session_start();

if (!isset($_COOKIE['status']) || $_COOKIE['status'] !== 'true') {
    header('location: userlogin.php');
    exit();
}

$username = $_COOKIE['username'] ?? '';
require_once('../models/usermodel.php');
require_once('../models/appointmentmodel.php');
require_once('../models/therapistmodel.php');

$userData = getUserByUsername($username);
if (!$userData) {
    header('location: userlogin.php');
    exit();
}

$appointments = getUserAppointments($username);
$therapists = getAllTherapists();

$error = $_GET['error'] ?? '';
$success = $_GET['success'] ?? '';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Book Appointment - NIRVOY</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        .header {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            color: #333;
            margin: 0;
        }

        .nav-links {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 15px;
            background: #4a90e2;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }

        .btn:hover {
            background: #3a80d2;
        }

        .btn-secondary {
            background: #6c757d;
        }

        .btn-secondary:hover {
            background: #545b62;
        }

        .content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            color: #333;
            margin-top: 0;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: 500;
        }

        .required {
            color: red;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            border: 1px solid #f5c6cb;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            border: 1px solid #c3e6cb;
        }

        .appointment-list {
            max-height: 400px;
            overflow-y: auto;
        }

        .appointment-item {
            padding: 15px;
            border: 1px solid #eee;
            border-radius: 5px;
            margin-bottom: 10px;
            background: #fafafa;
        }

        .appointment-item.pending {
            border-left: 4px solid #ffc107;
        }

        .appointment-item.confirmed {
            border-left: 4px solid #28a745;
        }

        .appointment-item.cancelled {
            border-left: 4px solid #dc3545;
        }

        .appointment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .appointment-date {
            font-weight: bold;
            color: #333;
        }

        .appointment-status {
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-pending {
            background: #ffc107;
            color: #333;
        }

        .status-confirmed {
            background: #28a745;
            color: white;
        }

        .status-cancelled {
            background: #dc3545;
            color: white;
        }

        .appointment-details {
            color: #666;
            font-size: 14px;
        }

        .cancel-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 12px;
            margin-top: 10px;
        }

        .cancel-btn:hover {
            background: #c82333;
        }

        .therapist-info {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
            border-left: 3px solid #4a90e2;
        }

        .therapist-name {
            font-weight: bold;
            color: #333;
        }

        .therapist-specialization {
            color: #666;
            font-size: 13px;
        }

        .therapist-fee {
            color: #28a745;
            font-weight: bold;
            margin-top: 5px;
        }

        .availability-status {
            font-size: 12px;
            margin-top: 5px;
            padding: 8px;
            border-radius: 4px;
            display: none;
        }

        .available {
            color: green;
            background-color: #e7f7e7;
            border: 1px solid #c3e6c3;
        }

        .not-available {
            color: #dc3545;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            font-weight: bold;
        }

        .loading {
            color: #007bff;
            background-color: #e7f3ff;
            border: 1px solid #b8daff;
        }

        @media (max-width: 768px) {
            .content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Book Appointment</h1>
            <div class="nav-links">
                <a href="dashboard.php" class="btn btn-secondary">Dashboard</a>
                <a href="profile.php" class="btn btn-secondary">Profile</a>
                <a href="../controllers/logout.php" class="btn btn-secondary">Logout</a>
            </div>
        </div>

        <?php if ($error): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="success"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>

        <div class="content">
            <div class="card">
                <h2>Book New Appointment</h2>
                <form method="POST" action="../controllers/appointmentController.php" id="appointmentForm"
                    onsubmit="return validateAppointment()">
                    <div class="form-group">
                        <label>Date <span class="required">*</span></label>
                        <input type="date" name="appointment_date" id="appointment_date"
                            min="<?php echo date('Y-m-d'); ?>" required onchange="checkAvailability()">
                        <div id="dateMessage" class="availability-status"></div>
                    </div>

                    <div class="form-group">
                        <label>Time <span class="required">*</span></label>
                        <select name="appointment_time" id="appointment_time" required onchange="checkAvailability()">
                            <option value="">Select Time</option>
                            <option value="09:00">09:00 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="12:00">12:00 PM</option>
                            <option value="14:00">02:00 PM</option>
                            <option value="15:00">03:00 PM</option>
                            <option value="16:00">04:00 PM</option>
                            <option value="17:00">05:00 PM</option>
                        </select>
                        <div id="timeMessage" class="availability-status"></div>
                    </div>

                    <div class="form-group">
                        <label>Service Type <span class="required">*</span></label>
                        <select name="service_type" id="service_type" required>
                            <option value="">Select Service</option>
                            <option value="Consultation">Consultation</option>
                            <option value="Therapy Session">Therapy Session</option>
                            <option value="Follow-up">Follow-up</option>
                            <option value="Emergency">Emergency</option>
                            <option value="Assessment">Assessment</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Therapist <span class="required">*</span></label>
                        <select name="therapist_id" id="therapist_id" required onchange="checkAvailability()">
                            <option value="">Select Therapist</option>
                            <?php foreach ($therapists as $therapist): ?>
                                <option value="<?php echo $therapist['id']; ?>"
                                    data-name="<?php echo htmlspecialchars($therapist['name']); ?>"
                                    data-specialization="<?php echo htmlspecialchars($therapist['specialization']); ?>"
                                    data-fee="<?php echo $therapist['consultation_fee']; ?>">
                                    <?php echo htmlspecialchars($therapist['name']); ?> -
                                    <?php echo htmlspecialchars($therapist['specialization']); ?>
                                    (৳<?php echo $therapist['consultation_fee']; ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div id="therapistMessage" class="availability-status"></div>

                        <div id="therapistDetails" style="margin-top: 10px; display: none;">
                            <div class="therapist-info">
                                <div class="therapist-name" id="selectedTherapistName"></div>
                                <div class="therapist-specialization" id="selectedTherapistSpecialization"></div>
                                <div class="therapist-fee" id="selectedTherapistFee"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Reason for Appointment</label>
                        <textarea name="reason" id="reason" placeholder="Please describe your concerns..."></textarea>
                    </div>

                    <div id="availabilityMessage" class="availability-status" style="margin-bottom: 15px;"></div>

                    <button type="submit" name="submit" class="btn" id="submitBtn">Book Appointment</button>
                </form>
            </div>

            <div class="card">
                <h2>My Appointments</h2>
                <div class="appointment-list">
                    <?php if (empty($appointments)): ?>
                        <p>No appointments booked yet.</p>
                    <?php else: ?>
                        <?php foreach ($appointments as $appointment): ?>
                            <div class="appointment-item <?php echo $appointment['status']; ?>">
                                <div class="appointment-header">
                                    <div class="appointment-date">
                                        <?php echo date('d M Y', strtotime($appointment['appointment_date'])); ?>
                                        at <?php echo $appointment['appointment_time']; ?>
                                    </div>
                                    <span class="appointment-status status-<?php echo $appointment['status']; ?>">
                                        <?php echo ucfirst($appointment['status']); ?>
                                    </span>
                                </div>

                                <div class="appointment-details">
                                    <p><strong>Service:</strong>
                                        <?php echo htmlspecialchars($appointment['service_type']); ?></p>

                                        <?php if ($appointment['therapist_name']): ?>
                                        <div class="therapist-info">
                                            <div class="therapist-name">Dr.
                                                <?php echo htmlspecialchars($appointment['therapist_name']); ?></div>
                                            <?php if ($appointment['specialization']): ?>
                                                <div class="therapist-specialization">
                                                    <?php echo htmlspecialchars($appointment['specialization']); ?></div>
                                            <?php endif; ?>
                                            <?php if ($appointment['consultation_fee']): ?>
                                                <div class="therapist-fee">Fee: ৳<?php echo $appointment['consultation_fee']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($appointment['reason']): ?>
                                        <p><strong>Reason:</strong> <?php echo htmlspecialchars($appointment['reason']); ?></p>
                                    <?php endif; ?>

                                    <p><strong>Booked on:</strong>
                                        <?php echo date('d M Y h:i A', strtotime($appointment['created_at'])); ?></p>
                                </div>

                                <?php if ($appointment['status'] == 'pending'): ?>
                                    <form method="POST" action="../controllers/cancelAppointment.php" style="margin-top: 10px;"
                                        class="cancelForm">
                                        <input type="hidden" name="appointment_id" value="<?php echo $appointment['id']; ?>">
                                        <button type="submit" class="cancel-btn">Cancel Appointment</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="card" style="margin-top: 20px; grid-column: 1 / -1;">
            <h2>Available Therapists</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px;">
                <?php foreach ($therapists as $therapist): ?>
                    <div class="therapist-info" style="border: 1px solid #ddd; padding: 15px;">
                        <div class="therapist-name">Dr. <?php echo htmlspecialchars($therapist['name']); ?></div>
                        <div class="therapist-specialization">
                            <strong>Specialization:</strong>
                            <?php echo htmlspecialchars($therapist['specialization']); ?><br>
                            <strong>Department:</strong> <?php echo htmlspecialchars($therapist['department']); ?><br>
                            <strong>Qualification:</strong> <?php echo htmlspecialchars($therapist['qualification']); ?><br>
                            <strong>Experience:</strong> <?php echo $therapist['experience_years']; ?> years<br>
                            <strong>Available Days:</strong>
                            <?php echo htmlspecialchars($therapist['available_days']); ?><br>
                            <strong>Available Time:</strong> <?php echo htmlspecialchars($therapist['available_time']); ?>
                        </div>
                        <div class="therapist-fee" style="margin-top: 10px;">
                            Consultation Fee: ৳<?php echo $therapist['consultation_fee']; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('therapist_id').addEventListener('change', function () {
            var selectedOption = this.options[this.selectedIndex];
            var therapistDetails = document.getElementById('therapistDetails');

            if (this.value) {
                document.getElementById('selectedTherapistName').innerHTML =
                    'Dr. ' + selectedOption.getAttribute('data-name');
                document.getElementById('selectedTherapistSpecialization').innerHTML =
                    selectedOption.getAttribute('data-specialization');
                document.getElementById('selectedTherapistFee').innerHTML =
                    'Consultation Fee: ৳' + selectedOption.getAttribute('data-fee');
                therapistDetails.style.display = 'block';
            } else {
                therapistDetails.style.display = 'none';
            }
        });

        function checkAvailability() {
            var date = document.getElementById('appointment_date').value;
            var time = document.getElementById('appointment_time').value;
            var therapistId = document.getElementById('therapist_id').value;

            document.getElementById('dateMessage').style.display = 'none';
            document.getElementById('timeMessage').style.display = 'none';
            document.getElementById('therapistMessage').style.display = 'none';
            document.getElementById('availabilityMessage').style.display = 'none';

            document.getElementById('submitBtn').disabled = false;

            if (date && time && therapistId) {

                document.getElementById('availabilityMessage').className = 'availability-status loading';
                document.getElementById('availabilityMessage').innerHTML = 'Checking availability...';
                document.getElementById('availabilityMessage').style.display = 'block';

                var xhr = new XMLHttpRequest();
                xhr.open('POST', '../controllers/checkAppointmentAvailability.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            var response = JSON.parse(xhr.responseText);

                            if (response.success) {
                                if (response.available) {
                                    document.getElementById('availabilityMessage').className = 'availability-status available';
                                    document.getElementById('availabilityMessage').innerHTML = '✓ This time slot is available';
                                    document.getElementById('submitBtn').disabled = false;
                                } else {
                                    document.getElementById('availabilityMessage').className = 'availability-status not-available';
                                    document.getElementById('availabilityMessage').innerHTML = '✗ ' + response.message;
                                    document.getElementById('submitBtn').disabled = true;
                                }
                            } else {
                                document.getElementById('availabilityMessage').className = 'availability-status not-available';
                                document.getElementById('availabilityMessage').innerHTML = 'Error: ' + response.message;
                                document.getElementById('submitBtn').disabled = true;
                            }
                        } else {
                            document.getElementById('availabilityMessage').className = 'availability-status not-available';
                            document.getElementById('availabilityMessage').innerHTML = 'Error checking availability';
                            document.getElementById('submitBtn').disabled = true;
                        }
                    }
                };

                var data = 'date=' + encodeURIComponent(date) +
                    '&time=' + encodeURIComponent(time) +
                    '&therapist_id=' + encodeURIComponent(therapistId);
                xhr.send(data);
            }
        }

        function validateAppointment() {
            var date = document.getElementById('appointment_date').value;
            var time = document.getElementById('appointment_time').value;
            var service = document.getElementById('service_type').value;
            var therapist = document.getElementById('therapist_id').value;

            if (!date || !time || !service || !therapist) {
                alert('Please fill all required fields');
                return false;
            }

            var today = new Date().toISOString().split('T')[0];
            if (date < today) {
                alert('Appointment date cannot be in the past');
                return false;
            }

            var availabilityMessage = document.getElementById('availabilityMessage');
            if (availabilityMessage.style.display == 'block' &&
                availabilityMessage.className.includes('not-available')) {
                alert('Please select an available time slot');
                return false;
            }

            return true;
        }

        document.addEventListener('DOMContentLoaded', function () {
            var cancelForms = document.querySelectorAll('.cancelForm');

            cancelForms.forEach(function (form) {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    if (!confirm('Are you sure you want to cancel this appointment?')) {
                        return;
                    }

                    var formData = new FormData(this);
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', this.action, true);

                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4) {
                            if (xhr.status == 200) {
                                window.location.reload();
                            } else {
                                alert('Error cancelling appointment');
                            }
                        }
                    };

                    xhr.send(formData);
                });
            });
        });
    </script>
</body>

</html>