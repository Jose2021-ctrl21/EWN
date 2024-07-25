<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Dashboard</li>
        <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="header">Attendance</li>
        <li><a href="attendance.php"><i class="fa fa-calendar"></i> <span>Attendance</span></a></li>
        <li class="header">Employee management</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Employees</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="employee.php"><i class="fa fa-circle-o"></i> Employee List</a></li> 
            <li><a href="schedule_employee.php"><i class="fa fa-circle-o"></i> <span>Assignment</span></a></li>
            <li><a href="archive.php"><i class="fa fa-circle-o"></i> <span>Archive list</span></a></li>
            <li><a href="reimbursement.php"><i class="fa fa-circle-o"></i> <span>Reimbursement</span></a></li>
              <!-- <li><a href="account_employee.php"><i class="fa fa-circle-o"></i> <span>Employee acount</span></a></li> -->
              <!-- <li><a href="membership_ids.php"><i class="fa fa-circle-o"></i> <span>Employee IDs</span></a></li> -->
              <!-- <li><a href="overtime.php"><i class="fa fa-circle-o"></i> Overtime</a></li> -->
              <!-- <li><a href="cashadvance.php"><i class="fa fa-circle-o"></i> Cash advance</a></li> -->
              <!-- <li><a href="contact_person.php"><i class="fa fa-circle-o"></i> <span>Contact person</span></a></li> -->
          </ul>
        </li>
           <!-- EMPLOYEE LOANS AND ADVANCES -->
           <li class="header">Employee cash advances</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span> Cash advances</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="cashadvance.php"><i class="fa fa-circle-o"></i> Cash advance</a></li>
            <!-- <li><a href="cashadvance_history.php"><i class="fa fa-circle-o"></i> Cash advance history</a></li> -->
          </ul>
        </li>
        <!-- EXPENSE MANAGEMENT -->
        <li class="header">Lists of expenses</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Lists of expenses</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="payroll.php"><i class="fa fa-files-o"></i> <span>Payroll</span></a></li> -->
            <?php if($_SESSION['access_role_1']==1 || $_SESSION['access_role_1']==3){?>
            <li><a href="salary_calculation.php"><i class="fa fa-file-text"></i>List of finances</a></li>
            <?php } ?>
            <!-- <li><a href="salary_computed.php"><i class="fa fa-file-text"></i>Salary calculation</a></li> -->
          </ul>
        </li>
         <!-- PAYROLL -->
         <li class="header">Payroll</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-credit-card"></i>
            <span>Payroll</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="financial_statement.php"><i class="fa fa-circle-o"></i> <span>Payroll</span></a></li>
            <!-- <li><a href="payroll.php"><i class="fa fa-circle-o"></i> <span>Payslip</span></a></li> -->
          </ul>
        </li>


        <!-- MAINTENANCE -->
        <?php if($_SESSION['access_role_1']==1 || $_SESSION['access_role_1']==3){?>
        <li class="header">Maintenance</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i>
            <span>Variables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="position.php"><i class="fa fa-circle-o"></i> Positions</a></li>
          <li><a href="vax_location.php"><i class="fa fa-circle-o"></i> Vaccination location</a></li>
          <!-- <li><a href="schedule.php"><i class="fa fa-circle-o"></i> Schedules</a></li> -->
          <li><a href="deduction.php"><i class="fa fa-circle-o"></i> Deduction</a></li>
          <li><a href="archive_vax_location.php"><i class="fa fa-circle-o"></i>Archive variable</a></li>
          <!-- <li><a href="base_pay.php"><i class="fa fa-circle-o"></i> Base pay</a></li> -->
          </ul>
        </li>
        <?php } ?>
        <!-- SYSTEM SETTING -->
        <li class="header">System setting</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i>
            <span>System setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="audit_logs.php"><i class="fa fa-circle-o"></i> Audit trails</a></li>
                  <!-- Account management -->
                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-user-plus"></i>
                      <span>Accounts management</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <?php if($_SESSION['access_role_1']==1 || $_SESSION['access_role_1']==3){?>
                        <!-- ADMIN -->
                        <li class="treeview">
                          <a href="#">
                            <i class="fa fa-file-text"></i>
                            <span>Users</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <li><a href="users.php"><i class="fa fa-circle-o"></i>Users</a></li>
                            <li><a href="admin_create_sec.php"><i class="fa fa-circle-o"></i>Security question</a></li>
                          </ul>
                        </li>
                        <?php }else{?>
                        <!-- STAFF -->
                        <li class="treeview">
                          <a href="#">
                            <i class="fa fa-file-text"></i>
                            <span>Users</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <li><a href="users.php"><i class="fa fa-circle-o"></i>User</a></li>
                            <li><a href="admin_create_sec.php"><i class="fa fa-circle-o"></i>Security question</a></li>
                          </ul>
                        </li>
                        <?php }?>
                    </ul>
                  </li>
                  <?php if($_SESSION['access_role_1']==1 || $_SESSION['access_role_1']==3):?>
                    <!-- BACKUP AND RESTORE -->
                    <li class="treeview">
                      <a href="#">
                        <i class="fa fa-file-text"></i>
                        <span>Backup  and restore</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="database_backup.php"><i class="fa fa-circle-o"></i> Backup</a></li>
                          <li><a href="database_restore.php"><i class="fa fa-circle-o"></i> Restore</a></li>
                      </ul>
                    </li>
                  <?php endif; ?>

            <?php if($_SESSION['access_role_1']==1 || $_SESSION['access_role_1']==3){?>
            <!-- <li><a href="session_config.php"><i class="fa fa-circle-o"></i>Session time</a></li> -->
            <?php } ?>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <?php
  include "profile_modal.php";
  ?>



