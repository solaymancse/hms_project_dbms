<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <nav class="sidebar">
    <div>
      <a href="#" class="logo">ABC HOSPITAL</a>

    </div>


    <div class="menu-content">
      <ul class="menu-items">

        <li class="item">

          <a href="../structure.php">
            <i class="fa-solid fa-gauge fa-beat-fade" style="color: #FFD43B;"></i> &nbsp;
            Dashboard</a>
        </li>

        <li class="item">

          <a href="../notice/all_notice.php">
            <i class="fa-solid fa-flag fa-beat-fade" style="color: #FFD43B;"></i> &nbsp;
            Notice</a>
        </li>

        <li class="item">

          <a href="../department/dep.php">
            <i class="fa-solid fa-building fa-beat-fade" style="color: #FFD43B;"></i> &nbsp;
            Department</a>
        </li>

        <li class="item">
          <div class="submenu-item">
            <span><i class="fa-solid fa-notes-medical fa-beat-fade" style="color: #FFD43B;"></i> &nbsp;
              Human Resource</span>
            <i class="fa-solid fa-chevron-right"></i>
          </div>

          <ul class="menu-items submenu">
            <div class="menu-title">
              <i class="fa-solid fa-chevron-left"></i>
              Human Resource
            </div>
            <li class="item">
              <a href="healthcare_provider.php"><i class="fa-solid fa-user-plus fa-beat-fade" style="color: #FFD43B;"></i> &nbsp;
                All</a>
            </li>
            <li class="item">
              <a href="list_of_doctor.php"><i class="fa-solid fa-user-doctor fa-beat-fade" style="color: #FFD43B;"></i> &nbsp;
                Doctor</a>
            </li>
            <li class="item">
              <a href="list_of_nurse.php"><i class="fa-solid fa-user-nurse fa-beat-fade" style="color: #FFD43B;"></i> &nbsp;
                Nurse</a>
            </li>
          </ul>
        </li>


        <li class="item">
          <div class="submenu-item">
            <span><i class="fa-solid fa-users fa-beat-fade" style="color: #FFD43B;"></i> &nbsp;
              Employee</span>
            <i class="fa-solid fa-chevron-right"></i>
          </div>

          <ul class="menu-items submenu">
            <div class="menu-title">
              <i class="fa-solid fa-chevron-left"></i>
              Employee
            </div>
            <li class="item">
              <a href="../employee/all_employee.php"><i class="fa-solid fa-address-card fa-beat-fade" style="color: #FFD43B;"></i> &nbsp;
                All Employee</a>
            </li>

            <li class="item">
              <a href="../employee/receptionist.php"><i class="fa-solid fa-address-card fa-beat-fade" style="color: #FFD43B;"></i> &nbsp;
                Reseptionist</a>
            </li>

            <li class="item">
              <a href="../employee/accountant.php"><i class="fa-solid fa-file-invoice fa-beat-fade" style="color: #FFD43B;"></i> &nbsp;
                Accountant</a>
            </li>
            <li class="item">
              <a href="../employee/labotorist.php"><i class="fa-solid fa-flask fa-beat-fade" style="color: #FFD43B;"></i> &nbsp;
                Laboratorist</a>
            </li>
          </ul>
        </li>

        <li class="item">
          <a href="../paitient/patient.php"><i class="fa-solid fa-bed-pulse fa-beat-fade" style="color: #FFD43B;"></i> &nbsp;
            Patient</a>
        </li>
        <li class="item">
          <a href="../employee_leave/employee_leave.php"><i class="fa-solid fa-bed-pulse fa-beat-fade" style="color: #FFD43B;"></i> &nbsp;
            Employee Leave</a>
        </li>
        <?php
        // Check if user is logged in
        if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']) {
          echo '
                        <li class="item">
                            <a href="../leave_req/emp_leave_req.php"><i class="fa-solid fa-bed-pulse fa-beat-fade" style="color: #FFD43B;"></i> &nbsp;
                                Leave Request</a>
                        </li>';
        }
        ?>
        <li class="item">
          <a href="../salary/all_salary.php"><i class="fa-solid fa-bed-pulse fa-beat-fade" style="color: #FFD43B;"></i> &nbsp;
            Salary</a>
        </li>
        <li class="item">

          <div class="submenu-item">
            <span><i class="fa-solid fa-users fa-beat-fade" style="color: #FFD43B;"></i> &nbsp;
              Lab Test</span>
            <i class="fa-solid fa-chevron-right"></i>
          </div>

          <ul class="menu-items submenu">
            <div class="menu-title">
              <i class="fa-solid fa-chevron-left"></i>
              Back
            </div>
            <li class="item">
              <a href="../paitient/lab.php"><i class="fa-solid fa-address-card fa-beat-fade" style="color: #FFD43B;"></i> &nbsp;
                New Test</a>
            </li>

            <li class="item">
              <a href="../paitient/category.php"><i class="fa-solid fa-address-card fa-beat-fade" style="color: #FFD43B;"></i> &nbsp;
                Test Category</a>
            </li>
            <?php
            // Check if user is logged in
            if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']) {
              echo '
                        <li class="item">
                            <a href="../paitient/approve_test.php"><i class="fa-solid fa-bed-pulse fa-beat-fade" style="color: #FFD43B;"></i> &nbsp;
                                Pending Reports</a>
                        </li>';
            }
            ?>
          </ul>
        </li>

      </ul>
    </div>
  </nav>


</body>

</html>