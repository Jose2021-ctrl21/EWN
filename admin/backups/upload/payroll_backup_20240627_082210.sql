

CREATE TABLE `_13th_pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_range` varchar(20) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `net_salary` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO _13th_pay VALUES("3","[2024-05-01] - [2024","VC:2024-001","7004.68","2024-05-29");
INSERT INTO _13th_pay VALUES("4","[2024-05-01] - [2024","VC:2024-002","46926.16","2024-05-29");



CREATE TABLE `_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sesh` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO _session VALUES("1","3600");



CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `access_role_1` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `sec_1` text NOT NULL,
  `ans_1` text NOT NULL,
  `sec_2` text NOT NULL,
  `ans_2` text NOT NULL,
  `sec_3` text NOT NULL,
  `ans_3` text NOT NULL,
  `activation` varchar(10) NOT NULL DEFAULT 'Active',
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO admin VALUES("2","admin","admin123","Rona","Espeso","","3","2024-04-04","secq1a","whitey","secq1b","nenita","secq3c","8","Active","0");
INSERT INTO admin VALUES("3","staff","staff123","Pat","Patin","","2","2024-05-11","secq4a","football","secq1b","nenita","secq1c","cavite","Active","0");
INSERT INTO admin VALUES("4","hr","hr123","Sarang","Hae","","2","2024-05-23","","","","","","","Active","0");
INSERT INTO admin VALUES("5","as","as","as","as","","2","2024-05-27","secq1a","as","secq1b","as","secq1c","as","Active","0");
INSERT INTO admin VALUES("6","a","a","a","a","","1","2024-06-26","","","","","","","Active","0");



CREATE TABLE `approval` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(10) DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO approval VALUES("1","pending");
INSERT INTO approval VALUES("2","approve");
INSERT INTO approval VALUES("3","re-check");



CREATE TABLE `ass_sched_fin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ass_employee_id` varchar(50) NOT NULL,
  `ass_employee_id_sc` varchar(20) NOT NULL,
  `ass_name` varchar(50) NOT NULL,
  `ass_position` varchar(50) NOT NULL,
  `ass_meal_allowance` varchar(50) NOT NULL,
  `ass_adjustments` varchar(50) NOT NULL,
  `ass_transpo` varchar(50) NOT NULL,
  `ass_location` varchar(50) NOT NULL,
  `ass_schedule` varchar(50) NOT NULL,
  `computed` int(11) NOT NULL DEFAULT 0,
  `salary_calculation_status` int(11) NOT NULL DEFAULT 0,
  `date_created` varchar(50) NOT NULL,
  `time` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL,
  `pullout_status` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=350 DEFAULT CHARSET=utf8mb4;

INSERT INTO ass_sched_fin VALUES("300","1","VC:2024-001","","8","","","","1","2024-05-01","0","0","05-25-2024","20:05","Sat","0");
INSERT INTO ass_sched_fin VALUES("301","2","VC:2024-002","","9","","","","1","2024-05-01","0","0","05-25-2024","20:05","Sat","0");
INSERT INTO ass_sched_fin VALUES("303","1","VC:2024-001","","8","","","","2","2024-05-02","0","0","05-25-2024","20:06","Sat","0");
INSERT INTO ass_sched_fin VALUES("304","2","VC:2024-002","","9","","","","2","2024-05-02","0","0","05-25-2024","20:06","Sat","0");
INSERT INTO ass_sched_fin VALUES("306","1","VC:2024-001","","8","","","","3","2024-05-03","0","0","05-25-2024","20:06","Sat","0");
INSERT INTO ass_sched_fin VALUES("307","2","VC:2024-002","","9","","","","3","2024-05-03","0","0","05-25-2024","20:06","Sat","0");
INSERT INTO ass_sched_fin VALUES("309","1","VC:2024-001","","8","","","","1","2024-05-14","0","0","05-25-2024","20:06","Sat","0");
INSERT INTO ass_sched_fin VALUES("310","2","VC:2024-002","","9","","","","1","2024-05-14","0","0","05-25-2024","20:06","Sat","0");
INSERT INTO ass_sched_fin VALUES("312","1","VC:2024-001","","8","","","","4","2024-05-16","0","0","05-25-2024","20:09","Sat","0");
INSERT INTO ass_sched_fin VALUES("313","2","VC:2024-002","","9","","","","4","2024-05-16","0","0","05-25-2024","20:09","Sat","0");
INSERT INTO ass_sched_fin VALUES("315","1","VC:2024-001","","8","","","","5","2024-05-17","0","0","05-25-2024","20:09","Sat","0");
INSERT INTO ass_sched_fin VALUES("316","2","VC:2024-002","","9","","","","5","2024-05-17","0","0","05-25-2024","20:09","Sat","0");
INSERT INTO ass_sched_fin VALUES("318","1","VC:2024-001","","8","","","","6","2024-05-29","0","0","05-25-2024","20:09","Sat","0");
INSERT INTO ass_sched_fin VALUES("319","2","VC:2024-002","","9","","","","6","2024-05-29","0","0","05-25-2024","20:09","Sat","0");
INSERT INTO ass_sched_fin VALUES("334","1","VC:2024-001","","8","","","","4","2024-05-18","0","0","05-25-2024","21:04","Sat","0");
INSERT INTO ass_sched_fin VALUES("335","2","VC:2024-002","","9","","","","4","2024-05-18","0","0","05-25-2024","21:04","Sat","0");
INSERT INTO ass_sched_fin VALUES("336","10","VC:2024-003","","9","","","","3","2024-05-03","0","0","05-25-2024","21:04","Sat","0");
INSERT INTO ass_sched_fin VALUES("337","11","VC:2024-004","","8","","","","1","2024-05-01","0","0","05-25-2024","21:17","Sat","0");
INSERT INTO ass_sched_fin VALUES("338","11","VC:2024-004","","8","","","","2","2024-05-02","0","0","05-25-2024","21:18","Sat","0");
INSERT INTO ass_sched_fin VALUES("339","10","VC:2024-003","","9","","","","1","2024-05-01","0","0","05-25-2024","21:20","Sat","0");
INSERT INTO ass_sched_fin VALUES("340","10","VC:2024-003","","9","","","","2","2024-05-02","0","0","05-25-2024","21:21","Sat","0");
INSERT INTO ass_sched_fin VALUES("341","11","VC:2024-004","","8","","","","3","2024-05-03","0","0","05-25-2024","21:22","Sat","0");
INSERT INTO ass_sched_fin VALUES("342","10","VC:2024-003","","9","","","","4","2024-05-16","0","0","05-25-2024","21:23","Sat","0");
INSERT INTO ass_sched_fin VALUES("343","11","VC:2024-004","","8","","","","4","2024-05-16","0","0","05-25-2024","21:23","Sat","0");
INSERT INTO ass_sched_fin VALUES("344","10","VC:2024-003","","9","","","","5","2024-05-17","0","0","05-25-2024","21:23","Sat","0");
INSERT INTO ass_sched_fin VALUES("345","11","VC:2024-004","","8","","","","5","2024-05-17","0","0","05-25-2024","21:23","Sat","0");
INSERT INTO ass_sched_fin VALUES("346","10","VC:2024-003","","9","","","","4","2024-05-18","0","0","05-25-2024","21:24","Sat","0");
INSERT INTO ass_sched_fin VALUES("347","11","VC:2024-004","","8","","","","4","2024-05-18","0","0","05-25-2024","21:24","Sat","0");
INSERT INTO ass_sched_fin VALUES("348","1","VC:2024-001","","8","123","123","23","1","2024-06-26","0","0","06-26-2024","09:34","Wed","0");
INSERT INTO ass_sched_fin VALUES("349","1","VC:2024-001","","8","343","343","","2","2024-06-27","0","0","06-26-2024","09:35","Wed","0");



CREATE TABLE `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `status` int(1) NOT NULL,
  `time_out` time NOT NULL,
  `num_hr` double NOT NULL,
  `adjustments` varchar(50) NOT NULL,
  `meal_allowance` varchar(50) NOT NULL,
  `transportation` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

INSERT INTO attendance VALUES("112","VC:2024-001","2024-05-01","22:17:30","0","00:00:00","0","","","");
INSERT INTO attendance VALUES("113","VC:2024-002","2024-05-01","22:17:45","0","00:00:00","0","","","");
INSERT INTO attendance VALUES("114","VC:2024-001","2024-05-02","22:21:07","0","00:00:00","0","","","");
INSERT INTO attendance VALUES("115","VC:2024-002","2024-05-02","22:21:19","0","00:00:00","0","","","");
INSERT INTO attendance VALUES("116","VC:2024-001","2024-05-03","22:21:55","0","00:00:00","0","","","");
INSERT INTO attendance VALUES("117","VC:2024-003","2024-05-03","22:22:02","0","00:00:00","0","","","");
INSERT INTO attendance VALUES("118","VC:2024-002","2024-05-03","22:26:06","0","00:00:00","0","","","");
INSERT INTO attendance VALUES("119","VC:2024-001","2024-05-14","22:27:02","0","00:00:00","0","","","");
INSERT INTO attendance VALUES("120","VC:2024-002","2024-05-14","22:27:11","0","00:00:00","0","","","");
INSERT INTO attendance VALUES("121","VC:2024-001","2024-05-16","22:27:29","0","00:00:00","0","","","");
INSERT INTO attendance VALUES("122","VC:2024-001","2024-05-17","22:27:34","0","00:00:00","0","","","");
INSERT INTO attendance VALUES("123","VC:2024-001","2024-05-18","22:27:47","0","00:00:00","0","","","");



CREATE TABLE `audit_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_and_time` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=366 DEFAULT CHARSET=utf8mb4;

INSERT INTO audit_logs VALUES("1","2024-05-02 12:40:56","admin","Employee added by: admin. Name: Sandara th. ID: 5");
INSERT INTO audit_logs VALUES("2","2024-05-02 13:08:32","admin","Deduction edited by user: admin. Description: Pagibig. employeer: 200. employee: 200.");
INSERT INTO audit_logs VALUES("3","2024-05-03 12:09:24","admin","Employee membership edited by: admin. Employee id: 2");
INSERT INTO audit_logs VALUES("4","2024-05-03 16:02:06","admin","Employee archive by: admin. Employee id: 1");
INSERT INTO audit_logs VALUES("5","2024-05-03 16:03:07","admin","Employee archive by: admin. Employee id: 2");
INSERT INTO audit_logs VALUES("6","2024-05-03 16:04:50","admin","Employee archive by: admin. Employee id: 1");
INSERT INTO audit_logs VALUES("7","2024-05-03 16:25:59","admin","Employee restored by: admin. Employee id: 1");
INSERT INTO audit_logs VALUES("8","2024-05-03 16:26:05","admin","Employee archive by: admin. Employee id: 1");
INSERT INTO audit_logs VALUES("9","2024-05-03 16:26:13","admin","Employee restored by: admin. Employee id: 1");
INSERT INTO audit_logs VALUES("10","2024-05-03 16:27:29","admin","Employee archive by: admin. Employee id: 1");
INSERT INTO audit_logs VALUES("11","2024-05-03 18:20:18","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("12","2024-05-03 18:46:05","staff","Password updated by: staff. Name: staff staff");
INSERT INTO audit_logs VALUES("13","2024-05-03 18:46:11","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("14","2024-05-03 18:46:30","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("15","2024-05-03 22:15:38","admin","Position variable deleted by: admin. Position: . Salary: . Position id: 4");
INSERT INTO audit_logs VALUES("16","2024-05-03 22:52:41","admin","Wage edited by user: admin. id: 1  Wage: 700");
INSERT INTO audit_logs VALUES("17","2024-05-03 22:52:50","admin","Wage edited by user: admin. id: 1  Wage: 800");
INSERT INTO audit_logs VALUES("18","2024-05-03 22:52:56","admin","Wage edited by user: admin. id: 1  Wage: 600");
INSERT INTO audit_logs VALUES("19","2024-05-03 22:53:05","admin","Wage edited by user: admin. id: 1  Wage: 500");
INSERT INTO audit_logs VALUES("20","2024-05-04 01:16:49","admin","Row in employee financial list variable deleted by: admin. Row in employee financial list: . Salary:");
INSERT INTO audit_logs VALUES("21","2024-05-04 14:46:44","admin","Employee restored by: admin. Employee id: 1");
INSERT INTO audit_logs VALUES("22","2024-05-04 15:11:03","admin","Employee added by: admin. Name: Sandara th. ID: 5");
INSERT INTO audit_logs VALUES("23","2024-05-05 12:00:25","admin","Employee archive by: admin. Employee id: 5");
INSERT INTO audit_logs VALUES("24","2024-05-05 12:07:27","admin","Deduction added by user: admin. Description: . Amount: .");
INSERT INTO audit_logs VALUES("25","2024-05-05 12:07:30","admin","Deduction added by user: admin. Description: . Amount: .");
INSERT INTO audit_logs VALUES("26","2024-05-05 12:07:31","admin","Deduction added by user: admin. Description: . Amount: .");
INSERT INTO audit_logs VALUES("27","2024-05-05 12:07:33","admin","Deduction added by user: admin. Description: . Amount: .");
INSERT INTO audit_logs VALUES("28","2024-05-05 23:10:34","admin","Row in employee financial list variable deleted by: admin. Row in employee financial list: . Salary:");
INSERT INTO audit_logs VALUES("29","2024-05-05 23:10:37","admin","Row in employee financial list variable deleted by: admin. Row in employee financial list: . Salary:");
INSERT INTO audit_logs VALUES("30","2024-05-05 23:10:39","admin","Row in employee financial list variable deleted by: admin. Row in employee financial list: . Salary:");
INSERT INTO audit_logs VALUES("31","2024-05-05 23:35:59","admin","Deduction edited by user: admin. Description: PhilHealth. employeer: 0.095. employee: .04.");
INSERT INTO audit_logs VALUES("32","2024-05-05 23:37:55","admin","Deduction edited by user: admin. Description: TIN. employeer: 0.095. employee: .40.");
INSERT INTO audit_logs VALUES("33","2024-05-05 23:39:41","admin","Row in employee financial list variable deleted by: admin. Row in employee financial list: . Salary:");
INSERT INTO audit_logs VALUES("34","2024-05-05 23:39:43","admin","Row in employee financial list variable deleted by: admin. Row in employee financial list: . Salary:");
INSERT INTO audit_logs VALUES("35","2024-05-05 23:39:45","admin","Row in employee financial list variable deleted by: admin. Row in employee financial list: . Salary:");
INSERT INTO audit_logs VALUES("36","2024-05-05 23:40:48","admin","Deduction added by user: admin. Description: . Amount: .");
INSERT INTO audit_logs VALUES("37","2024-05-05 23:40:50","admin","Deduction added by user: admin. Description: . Amount: .");
INSERT INTO audit_logs VALUES("38","2024-05-05 23:40:52","admin","Deduction added by user: admin. Description: . Amount: .");
INSERT INTO audit_logs VALUES("39","2024-05-05 23:57:01","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("40","2024-05-05 23:58:54","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("41","2024-05-06 00:01:23","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("42","2024-05-06 00:01:46","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("43","2024-05-06 00:05:51","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("44","2024-05-06 00:06:05","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("45","2024-05-06 00:06:24","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("46","2024-05-06 00:12:33","staff","Password updated by: staff. Name: staff staff");
INSERT INTO audit_logs VALUES("47","2024-05-06 00:12:38","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("48","2024-05-06 00:17:43","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("49","2024-05-06 00:18:05","staff","Password updated by: staff. Name: staff staff");
INSERT INTO audit_logs VALUES("50","2024-05-06 00:18:53","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("51","2024-05-06 00:20:44","staff","Password updated by: staff. Name: staff staff");
INSERT INTO audit_logs VALUES("52","2024-05-06 00:20:49","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("53","2024-05-06 00:21:04","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("54","2024-05-06 01:27:14","admin","Employee added by: admin. Employee id: VC:2024-004. Employee name: Juan Delacruz");
INSERT INTO audit_logs VALUES("55","2024-05-06 01:28:19","admin","Employee membership edited by: admin. Employee id: 6");
INSERT INTO audit_logs VALUES("56","2024-05-06 02:09:01","admin","Employee added by: admin. Name: Dommaraju  Gukesh. ID: 4");
INSERT INTO audit_logs VALUES("57","2024-05-06 02:09:20","admin","Employee added by: admin. Name: Garry Casparov. ID: 2");
INSERT INTO audit_logs VALUES("58","2024-05-06 02:09:37","admin","Employee added by: admin. Name: Welsy So. ID: 1");
INSERT INTO audit_logs VALUES("59","2024-05-06 04:05:56","admin","Employee added by: admin. Employee id: VC:2024-005. Employee name: dfsd fsdf");
INSERT INTO audit_logs VALUES("60","2024-05-06 11:27:43","admin","Employee added by: admin. Employee id: VC:2024-006. Employee name: zdgh ghrtht");
INSERT INTO audit_logs VALUES("61","2024-05-06 11:44:56","admin","Employee added by: admin. Employee id: VC:2024-005. Employee name: rthrthrt hrthr");
INSERT INTO audit_logs VALUES("62","2024-05-06 12:36:47","admin","Employee archive by: admin. Employee id: 6");
INSERT INTO audit_logs VALUES("63","2024-05-06 12:37:04","admin","Employee restored by: admin. Employee id: 6");
INSERT INTO audit_logs VALUES("64","2024-05-06 12:53:31","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("65","2024-05-06 12:54:52","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("66","2024-05-06 12:55:11","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("67","2024-05-06 12:55:52","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("68","2024-05-06 12:56:40","staff","Password updated by: staff. Name: staff staff");
INSERT INTO audit_logs VALUES("69","2024-05-06 12:56:45","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("70","2024-05-06 12:57:15","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("71","2024-05-06 13:13:36","admin","Employee added by: admin. Name: Garry Casparov. ID: 2");
INSERT INTO audit_logs VALUES("72","2024-05-06 13:13:41","admin","Employee added by: admin. Name: Dommaraju  Gukesh. ID: 4");
INSERT INTO audit_logs VALUES("73","2024-05-06 13:13:50","admin","Employee added by: admin. Name: rthrthrt hrthr. ID: 9");
INSERT INTO audit_logs VALUES("74","2024-05-06 14:31:01","admin","Deduction added by user: admin. Description: . Amount: .");
INSERT INTO audit_logs VALUES("75","2024-05-06 16:56:58","admin","Employee archive by: admin. Employee id: 9");
INSERT INTO audit_logs VALUES("76","2024-05-06 16:57:05","admin","Employee archive by: admin. Employee id: 6");
INSERT INTO audit_logs VALUES("77","2024-05-06 22:05:13","","User logged out: ");
INSERT INTO audit_logs VALUES("78","2024-05-07 02:27:15","","User logged out: ");
INSERT INTO audit_logs VALUES("79","2024-05-07 15:05:53","admin","Employee added by: admin. Name: Dommaraju  Gukesh. ID: 4");
INSERT INTO audit_logs VALUES("80","2024-05-07 15:06:01","admin","Employee added by: admin. Name: Dommaraju  Gukesh. ID: 4");
INSERT INTO audit_logs VALUES("81","2024-05-07 15:25:06","admin","Position variable added by: admin. Position: tecgg. Salary: 100");
INSERT INTO audit_logs VALUES("82","2024-05-07 15:25:09","admin","Position variable deleted by: admin. Position: . Salary: . Position id: 6");
INSERT INTO audit_logs VALUES("83","2024-05-08 12:36:03","admin","Position variable added by: admin. Position: technician. Salary: 600");
INSERT INTO audit_logs VALUES("84","2024-05-08 12:36:16","admin","Position variable deleted by: admin. Position: . Salary: . Position id: 7");
INSERT INTO audit_logs VALUES("85","2024-05-08 12:57:48","","User logged out: ");
INSERT INTO audit_logs VALUES("86","2024-05-08 13:00:35","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("87","2024-05-08 13:49:28","","User logged out: ");
INSERT INTO audit_logs VALUES("88","2024-05-08 13:49:40","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("89","2024-05-08 14:48:04","admin","Deduction added by user: admin. Description: . Amount: .");
INSERT INTO audit_logs VALUES("90","2024-05-08 16:20:17","admin","Password updated by: admin. Name: Rona Espeso");
INSERT INTO audit_logs VALUES("91","2024-05-08 16:20:38","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("92","2024-05-08 21:04:49","admin","Deduction added by user: admin. Description: . Amount: .");
INSERT INTO audit_logs VALUES("93","2024-05-08 21:07:44","admin","Deduction added by user: admin. Description: . Amount: .");
INSERT INTO audit_logs VALUES("94","2024-05-09 00:05:40","admin","Deduction added by user: admin. Description: . Amount: .");
INSERT INTO audit_logs VALUES("95","2024-05-09 00:05:42","admin","Deduction added by user: admin. Description: . Amount: .");
INSERT INTO audit_logs VALUES("96","2024-05-09 20:15:53","admin","Position variable edited by: admin. Position: . Salary: ");
INSERT INTO audit_logs VALUES("97","2024-05-09 20:18:05","admin","Payslip variable edited by: admin. Payslip: . Salary: ");
INSERT INTO audit_logs VALUES("98","2024-05-09 20:18:11","admin","Payslip variable edited by: admin. Payslip: . Salary: ");
INSERT INTO audit_logs VALUES("99","2024-05-09 20:18:26","admin","Payslip variable edited by: admin. Payslip: . Salary: ");
INSERT INTO audit_logs VALUES("100","2024-05-09 20:18:36","admin","Payslip variable edited by: admin. Payslip: . Salary: ");
INSERT INTO audit_logs VALUES("101","2024-05-09 21:01:31","admin","Payslip variable edited by: admin. Payslip: . Salary: ");
INSERT INTO audit_logs VALUES("102","2024-05-09 21:22:52","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("103","2024-05-09 21:38:13","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("104","2024-05-09 21:57:00","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("105","2024-05-09 21:57:32","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("106","2024-05-09 21:57:38","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("107","2024-05-09 21:57:43","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("108","2024-05-09 21:58:53","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("109","2024-05-09 21:58:54","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("110","2024-05-09 21:58:55","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("111","2024-05-09 21:58:55","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("112","2024-05-09 21:58:59","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("113","2024-05-09 22:03:38","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("114","2024-05-09 22:03:39","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("115","2024-05-09 22:03:39","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("116","2024-05-09 22:03:40","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("117","2024-05-09 22:03:45","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("118","2024-05-09 22:05:53","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("119","2024-05-09 22:06:05","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("120","2024-05-09 22:06:06","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("121","2024-05-09 22:06:07","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("122","2024-05-09 22:06:07","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("123","2024-05-09 23:00:47","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("124","2024-05-09 23:00:59","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("125","2024-05-09 23:01:09","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("126","2024-05-09 23:46:48","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("127","2024-05-09 23:46:49","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("128","2024-05-09 23:46:50","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("129","2024-05-09 23:46:51","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("130","2024-05-09 23:46:51","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("131","2024-05-09 23:47:04","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("132","2024-05-09 23:48:08","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("133","2024-05-10 00:01:37","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("134","2024-05-11 12:40:11","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("135","2024-05-11 13:57:23","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("136","2024-05-11 14:33:06","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("137","2024-05-11 16:02:55","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("138","2024-05-11 16:08:11","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("139","2024-05-11 16:38:43","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("140","2024-05-11 16:39:26","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("141","2024-05-11 16:39:39","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("142","2024-05-11 17:08:09","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("143","2024-05-11 17:08:57","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("144","2024-05-11 17:15:53","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("145","2024-05-11 17:16:52","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("146","2024-05-11 17:33:22","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("147","2024-05-11 17:39:07","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("148","2024-05-11 17:40:06","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("149","2024-05-11 17:43:59","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("150","2024-05-11 17:45:10","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("151","2024-05-11 17:54:49","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("152","2024-05-11 17:55:31","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("153","2024-05-11 17:57:50","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("154","2024-05-11 18:02:00","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("155","2024-05-11 18:02:22","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("156","2024-05-11 18:02:26","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("157","2024-05-12 15:07:15","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("158","2024-05-12 15:23:53","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("159","2024-05-12 22:13:08","admin","Position variable edited by: admin. Position: Technician. Salary: 312.50");
INSERT INTO audit_logs VALUES("160","2024-05-12 22:13:14","admin","Position variable edited by: admin. Position: Vaccinator. Salary: 312.50");
INSERT INTO audit_logs VALUES("161","2024-05-12 23:11:53","admin","base_pay variable added by: admin. Basepay: 3750");
INSERT INTO audit_logs VALUES("162","2024-05-12 23:12:16","admin","base_pay variable added by: admin. Basepay: 6500");
INSERT INTO audit_logs VALUES("163","2024-05-12 23:12:28","admin","base_pay variable added by: admin. Basepay: 7500");
INSERT INTO audit_logs VALUES("164","2024-05-12 23:12:39","admin","base_pay variable added by: admin. Basepay: 8500");
INSERT INTO audit_logs VALUES("165","2024-05-12 23:24:52","admin","base_pay variable edited by: admin. base_pay: . Salary: ");
INSERT INTO audit_logs VALUES("166","2024-05-12 23:25:01","admin","base_pay variable edited by: admin. base_pay: . Salary: ");
INSERT INTO audit_logs VALUES("167","2024-05-12 23:25:03","admin","base_pay variable edited by: admin. base_pay: . Salary: ");
INSERT INTO audit_logs VALUES("168","2024-05-12 23:26:54","admin","base_pay variable edited by: admin. base_pay: 4573865756. id: 1");
INSERT INTO audit_logs VALUES("169","2024-05-12 23:27:00","admin","base_pay variable edited by: admin. base_pay: 3750. id: 1");
INSERT INTO audit_logs VALUES("170","2024-05-12 23:32:17","admin","base_pay variable deleted by: admin.  base_pay id: 4");
INSERT INTO audit_logs VALUES("171","2024-05-12 23:33:39","admin","base_pay variable deleted by: admin.  base_pay id: 4");
INSERT INTO audit_logs VALUES("172","2024-05-12 23:33:46","admin","base_pay variable added by: admin. Basepay: 8500");
INSERT INTO audit_logs VALUES("173","2024-05-13 00:58:06","admin","Position variable added by: admin. Position: technician. Salary: 312.50");
INSERT INTO audit_logs VALUES("174","2024-05-13 00:58:13","admin","Position variable deleted by: admin. Position: . Salary: . Position id: ");
INSERT INTO audit_logs VALUES("175","2024-05-13 00:58:15","admin","Position variable deleted by: admin. Position: . Salary: . Position id: ");
INSERT INTO audit_logs VALUES("176","2024-05-13 01:02:48","admin","Position variable deleted by: admin. Position: . Salary: . Position id: ");
INSERT INTO audit_logs VALUES("177","2024-05-13 01:07:37","admin","Position variable deleted by: admin. Position: . Salary: . Position id: 3");
INSERT INTO audit_logs VALUES("178","2024-05-13 01:07:40","admin","Position variable deleted by: admin. Position: . Salary: . Position id: 1");
INSERT INTO audit_logs VALUES("179","2024-05-13 01:08:52","admin","Position variable added by: admin. Position: vaccinator. Salary: 312.50");
INSERT INTO audit_logs VALUES("180","2024-05-13 01:09:08","admin","Position variable edited by: admin. Position: Technician. Salary: 312.5");
INSERT INTO audit_logs VALUES("181","2024-05-13 01:58:43","admin","base_pay variable edited by: admin. base_pay: . id: 1");
INSERT INTO audit_logs VALUES("182","2024-05-13 02:00:25","admin","base_pay variable edited by: admin. base_pay: . id: 1");
INSERT INTO audit_logs VALUES("183","2024-05-13 02:03:33","admin","base_pay variable edited by: admin. base_pay: 312.50. id: ");
INSERT INTO audit_logs VALUES("184","2024-05-13 02:04:14","admin","base_pay variable edited by: admin. base_pay: . id: 1");
INSERT INTO audit_logs VALUES("185","2024-05-13 02:05:17","admin","base_pay variable edited by: admin. base_pay: 312.50. id: ");
INSERT INTO audit_logs VALUES("186","2024-05-13 02:05:20","admin","base_pay variable edited by: admin. base_pay: . id: 1");
INSERT INTO audit_logs VALUES("187","2024-05-13 02:09:25","admin","base_pay variable edited by: admin. base_pay: 312.50. id: ");
INSERT INTO audit_logs VALUES("188","2024-05-13 02:14:01","admin","base_pay variable edited by: admin. base_pay: 3750. id: ");
INSERT INTO audit_logs VALUES("189","2024-05-13 02:33:04","admin","Employee added by: admin. Name: Dommaraju  Gukesh. ID: 4");
INSERT INTO audit_logs VALUES("190","2024-05-13 02:33:13","admin","Employee added by: admin. Name: Garry Casparov. ID: 2");
INSERT INTO audit_logs VALUES("191","2024-05-13 02:33:17","admin","Employee added by: admin. Name: Welsy So. ID: 1");
INSERT INTO audit_logs VALUES("192","2024-05-13 03:26:03","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("193","2024-05-13 09:35:43","admin","Position variable added by: admin. Position: tech. Salary: 791.6666666666666");
INSERT INTO audit_logs VALUES("194","2024-05-13 09:47:40","admin","Position variable edited by: admin. Position: vaccinator. Salary: 708.33");
INSERT INTO audit_logs VALUES("195","2024-05-13 09:47:56","admin","Position variable edited by: admin. Position: Technician. Salary: 312.50");
INSERT INTO audit_logs VALUES("196","2024-05-13 10:05:32","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("197","2024-05-13 10:09:02","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("198","2024-05-13 10:09:51","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("199","2024-05-13 10:10:02","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("200","2024-05-13 10:10:36","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("201","2024-05-13 10:10:43","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("202","2024-05-13 12:51:33","admin","Position variable added by: admin. Position: fdgdfg. Salary: 4713.75");
INSERT INTO audit_logs VALUES("203","2024-05-13 12:53:26","admin","Position variable edited by: admin. Position: tech. Salary: 791.67");
INSERT INTO audit_logs VALUES("204","2024-05-13 12:53:30","admin","Position variable edited by: admin. Position: vaccinator. Salary: 708.33");
INSERT INTO audit_logs VALUES("205","2024-05-13 12:53:33","admin","Position variable edited by: admin. Position: Technician. Salary: 312.5");
INSERT INTO audit_logs VALUES("206","2024-05-13 12:53:36","admin","Position variable deleted by: admin. Position: . Salary: . Position id: 11");
INSERT INTO audit_logs VALUES("207","2024-05-13 14:23:51","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("208","2024-05-13 14:24:40","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("209","2024-05-13 14:29:39","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("210","2024-05-13 14:30:57","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("211","2024-05-13 14:32:28","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("212","2024-05-13 14:32:48","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("213","2024-05-13 14:33:15","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("214","2024-05-13 20:31:02","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("215","2024-05-13 20:31:12","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("216","2024-05-14 00:32:17","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("217","2024-05-14 01:06:44","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("218","2024-05-14 16:30:59","admin","Deduction added by user: admin. Description: . Amount: .");
INSERT INTO audit_logs VALUES("219","2024-05-14 16:33:50","admin","Deduction added by user: admin. Description: . Amount: .");
INSERT INTO audit_logs VALUES("220","2024-05-14 18:29:20","admin","Deduction added by user: admin. Description: . Amount: .");
INSERT INTO audit_logs VALUES("221","2024-05-14 18:29:22","admin","Deduction added by user: admin. Description: . Amount: .");
INSERT INTO audit_logs VALUES("222","2024-05-14 18:29:24","admin","Deduction added by user: admin. Description: . Amount: .");
INSERT INTO audit_logs VALUES("223","2024-05-14 19:43:15","admin","Employee added by: admin. Name: Jhen Bacho. ID: 4");
INSERT INTO audit_logs VALUES("224","2024-05-14 19:44:37","admin","Employee added by: admin. Name: Genielyn Gonzales. ID: 2");
INSERT INTO audit_logs VALUES("225","2024-05-23 20:07:39","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("226","2024-05-23 20:08:34","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("227","2024-05-23 20:16:17","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("228","2024-05-23 20:16:25","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("229","2024-05-23 20:18:58","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("230","2024-05-23 20:19:09","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("231","2024-05-23 20:20:40","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("232","2024-05-23 20:26:34","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("233","2024-05-23 20:46:31","hr","User logged out: hr");
INSERT INTO audit_logs VALUES("234","2024-05-23 20:46:59","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("235","2024-05-23 20:48:33","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("236","2024-05-23 20:50:09","hr","User logged out: hr");
INSERT INTO audit_logs VALUES("237","2024-05-23 20:50:47","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("238","2024-05-23 20:50:59","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("239","2024-05-23 23:23:55","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("240","2024-05-23 23:24:09","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("241","2024-05-24 00:18:13","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("242","2024-05-24 00:18:35","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("243","2024-05-25 21:49:16","admin","Position variable edited by: admin. Position: Technician. Salary: 308.33");
INSERT INTO audit_logs VALUES("244","2024-05-25 21:58:51","admin","Wage edited by user: admin. id: 1  Wage: 500");
INSERT INTO audit_logs VALUES("245","2024-05-25 22:03:35","admin","Deduction edited by user: admin. Description: PhilHealth. employeer: 0.095. employee: .025.");
INSERT INTO audit_logs VALUES("246","2024-05-25 22:03:43","admin","Deduction edited by user: admin. Description: PhilHealth. employeer: 0.025. employee: .025.");
INSERT INTO audit_logs VALUES("247","2024-05-25 22:42:18","admin","Position variable edited by: admin. Position: Technician. Salary: 625.00");
INSERT INTO audit_logs VALUES("248","2024-05-25 22:46:52","admin","Position variable deleted by: admin. Position: . Salary: . Position id: 10");
INSERT INTO audit_logs VALUES("249","2024-05-26 02:23:35","admin","Employee added by: admin. Name: Jhen Bacho. ID: 1");
INSERT INTO audit_logs VALUES("250","2024-05-26 02:44:27","admin","Employee added by: admin. Name: Genielyn Gonzales. ID: 2");
INSERT INTO audit_logs VALUES("251","2024-05-26 02:44:36","admin","Employee added by: admin. Name: Jhen Bacho. ID: 1");
INSERT INTO audit_logs VALUES("252","2024-05-26 02:53:34","admin","Employee added by: admin. Employee id: VC:2024-003. Employee name: Juan Delacruz");
INSERT INTO audit_logs VALUES("253","2024-05-26 02:54:41","admin","Employee photo edited by: admin. Photo: profile.jpg");
INSERT INTO audit_logs VALUES("254","2024-05-26 02:54:50","admin","Employee photo edited by: admin. Photo: profile.jpg");
INSERT INTO audit_logs VALUES("255","2024-05-26 02:55:00","admin","Employee photo edited by: admin. Photo: profile.jpg");
INSERT INTO audit_logs VALUES("256","2024-05-26 03:16:53","admin","Employee added by: admin. Employee id: VC:2024-004. Employee name: Pedro Penduko");
INSERT INTO audit_logs VALUES("257","2024-05-26 04:01:54","admin","Employee archive by: admin. Employee id: 10");
INSERT INTO audit_logs VALUES("258","2024-05-26 04:43:14","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("259","2024-05-26 04:43:36","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("260","2024-05-26 04:43:39","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("261","2024-05-26 04:43:40","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("262","2024-05-26 04:43:41","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("263","2024-05-26 04:43:43","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("264","2024-05-26 04:43:45","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("265","2024-05-26 04:44:25","admin","Payslip variable edited by: admin. Employee: VC:2024-002.");
INSERT INTO audit_logs VALUES("266","2024-05-26 04:45:53","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("267","2024-05-26 04:47:23","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("268","2024-05-26 04:47:25","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("269","2024-05-26 04:47:26","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("270","2024-05-26 04:52:10","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("271","2024-05-26 04:52:32","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("272","2024-05-26 05:25:59","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("273","2024-05-26 05:26:00","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("274","2024-05-26 13:34:22","admin","Position variable added by: admin. Province: . Municipality: dfgdf");
INSERT INTO audit_logs VALUES("275","2024-05-26 13:56:55","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("276","2024-05-26 14:26:08","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("277","2024-05-26 14:36:56","hr","User logged out: hr");
INSERT INTO audit_logs VALUES("278","2024-05-26 14:38:03","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("279","2024-05-26 14:40:50","hr","User logged out: hr");
INSERT INTO audit_logs VALUES("280","2024-05-26 14:47:05","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("281","2024-05-26 14:54:08","hr","User logged out: hr");
INSERT INTO audit_logs VALUES("282","2024-05-26 14:54:24","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("283","2024-05-26 14:54:36","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("284","2024-05-26 15:00:59","hr","User logged out: hr");
INSERT INTO audit_logs VALUES("285","2024-05-26 15:01:08","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("286","2024-05-26 15:01:20","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("287","2024-05-26 15:02:11","hr","User logged out: hr");
INSERT INTO audit_logs VALUES("288","2024-05-26 15:02:37","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("289","2024-05-26 18:14:10","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("290","2024-05-26 18:18:28","hr","User logged out: hr");
INSERT INTO audit_logs VALUES("291","2024-05-27 20:41:24","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("292","2024-05-27 20:43:22","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("293","2024-05-27 22:16:12","admin","Employee archive by: admin. Employee id: 11");
INSERT INTO audit_logs VALUES("294","2024-05-27 23:53:50","admin","Employee added by: admin. Employee id: VC:2024-005. Employee name: erge erg");
INSERT INTO audit_logs VALUES("295","2024-05-27 23:54:41","admin","Employee archive by: admin. Employee id: 12");
INSERT INTO audit_logs VALUES("296","2024-05-27 23:54:47","admin","Employee restored by: admin. Employee id: 12");
INSERT INTO audit_logs VALUES("297","2024-05-28 00:05:38","admin","Employee added by: admin. Name: Jhen Bacho. ID: 1");
INSERT INTO audit_logs VALUES("298","2024-05-28 00:05:51","admin","Employee added by: admin. Name: Genielyn Gonzales. ID: 2");
INSERT INTO audit_logs VALUES("299","2024-05-28 00:08:03","admin","Employee added by: admin. Name: Jhen Bacho. ID: 1");
INSERT INTO audit_logs VALUES("300","2024-05-28 00:08:09","admin","Employee added by: admin. Name: erge erg. ID: 12");
INSERT INTO audit_logs VALUES("301","2024-05-28 00:08:14","admin","Employee added by: admin. Name: Genielyn Gonzales. ID: 2");
INSERT INTO audit_logs VALUES("302","2024-05-28 00:08:19","admin","Employee added by: admin. Name: Jhen Bacho. ID: 1");
INSERT INTO audit_logs VALUES("303","2024-05-27 10:06:18","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("304","2024-05-27 10:16:32","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("305","2024-05-27 10:17:22","as","User logged out: as");
INSERT INTO audit_logs VALUES("306","2024-05-29 11:05:39","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("307","2024-05-29 11:06:29","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("308","2024-05-29 11:06:35","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("309","2024-05-29 11:13:04","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("310","2024-05-29 11:27:12","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("311","2024-05-29 11:27:57","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("312","2024-05-29 11:35:20","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("313","2024-05-29 11:35:22","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("314","2024-05-29 11:37:44","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("315","2024-05-29 11:37:48","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("316","2024-05-29 11:37:52","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("317","2024-05-29 11:45:10","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("318","2024-05-29 11:45:19","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("319","2024-05-29 11:49:35","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("320","2024-05-29 11:49:42","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("321","2024-05-29 12:10:27","admin","Payslip variable edited by: admin. Employee: VC:2024-001.");
INSERT INTO audit_logs VALUES("322","2024-05-29 19:23:00","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("323","2024-05-30 19:20:58","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("324","2024-05-30 19:40:13","admin","Deduction edited by user: admin. Description: SSS. employeer: 0.095. employee: 0.045.");
INSERT INTO audit_logs VALUES("325","2024-05-30 23:21:48","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("326","2024-05-31 11:30:49","admin","Employee archive by: admin. Employee id: 12");
INSERT INTO audit_logs VALUES("327","2024-05-31 12:47:04","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("328","2024-05-31 13:52:13","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("329","2024-05-31 13:54:13","hr","User logged out: hr");
INSERT INTO audit_logs VALUES("330","2024-06-24 10:09:46","admin","Employee added by: admin. Name: Genielyn Gonzales. ID: 2");
INSERT INTO audit_logs VALUES("331","2024-06-24 10:14:32","admin","Employee added by: admin. Name: Genielyn Gonzales. ID: 2");
INSERT INTO audit_logs VALUES("332","2024-06-24 10:38:01","admin","Employee added by: admin. Employee id: VC:2024-006. Employee name: rg erg");
INSERT INTO audit_logs VALUES("333","2024-06-24 10:38:36","admin","Employee added by: admin. Name: rg erg. ID: 13");
INSERT INTO audit_logs VALUES("334","2024-06-24 20:40:32","admin","Position variable added by: admin. Province: 0128. Municipality: 012802");
INSERT INTO audit_logs VALUES("335","2024-06-24 20:42:04","admin","Position variable added by: admin. Province: 0128. Municipality: 012802");
INSERT INTO audit_logs VALUES("336","2024-06-24 20:42:43","admin","Position variable added by: admin. Province: 0209. Municipality: 020906");
INSERT INTO audit_logs VALUES("337","2024-06-24 20:49:53","admin","Position variable added by: admin. Province: 0133. Municipality: 013302");
INSERT INTO audit_logs VALUES("338","2024-06-24 20:53:38","admin","Position variable added by: admin. Province: 0129. Municipality: 012911");
INSERT INTO audit_logs VALUES("339","2024-06-24 20:56:13","admin","Position variable added by: admin. Province: 0209. Municipality: SABTANG");
INSERT INTO audit_logs VALUES("340","2024-06-24 21:04:30","admin","Position variable added by: admin. Province: PANGASINAN. Municipality: BALUNGAO");
INSERT INTO audit_logs VALUES("341","2024-06-24 21:07:11","admin","Position variable added by: admin. Province: LA UNION. Municipality: Bauang");
INSERT INTO audit_logs VALUES("342","2024-06-24 21:07:23","admin","Position variable added by: admin. Province: TARLAC. Municipality: La Paz");
INSERT INTO audit_logs VALUES("343","2024-06-24 21:12:51","admin","Position variable added by: admin. Province: BATAAN. Municipality: Mariveles");
INSERT INTO audit_logs VALUES("344","2024-06-24 21:13:13","admin","Position variable added by: admin. Province: PANGASINAN. Municipality: SUAL");
INSERT INTO audit_logs VALUES("345","2024-06-24 21:15:02","admin","Position variable added by: admin. Province: Pangasinan. Municipality: Balungao");
INSERT INTO audit_logs VALUES("346","2024-06-24 21:32:37","admin","Position variable added by: admin. Province: Batanes. Municipality: Itbayat");
INSERT INTO audit_logs VALUES("347","2024-06-24 21:34:29","admin","Position variable added by: admin. Province: Dinagat Islands. Municipality: Loreto");
INSERT INTO audit_logs VALUES("348","2024-06-25 14:56:52","admin","Position variable added by: admin. Province: . Municipality: ");
INSERT INTO audit_logs VALUES("349","2024-06-25 14:57:14","admin","Position variable added by: admin. Province: La Union. Municipality: Bacnotan");
INSERT INTO audit_logs VALUES("350","2024-06-25 15:29:45","admin","Position variable added by: admin. Province: Cagayan. Municipality: Aparri");
INSERT INTO audit_logs VALUES("351","2024-06-25 18:34:00","admin","Employee added by: admin. Name: rg erg. ID: 13");
INSERT INTO audit_logs VALUES("352","2024-06-25 21:50:21","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("353","2024-06-26 12:58:04","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("354","2024-06-26 16:12:26","admin","Employee photo edited by: admin. Photo: 13999067.jpg");
INSERT INTO audit_logs VALUES("355","2024-06-26 16:22:59","admin","Employee photo edited by: admin. Photo: 13999067.jpg");
INSERT INTO audit_logs VALUES("356","2024-06-26 16:23:09","admin","Employee photo edited by: admin. Photo: top-10-the-most-beautiful-japanese-actresses.jpg");
INSERT INTO audit_logs VALUES("357","2024-06-26 16:28:16","admin","Employee photo edited by: admin. Photo: Cyclic-RedunDancy-Check-1.png");
INSERT INTO audit_logs VALUES("358","2024-06-26 22:34:40","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("359","2024-06-26 23:00:14","a","User logged out: a");
INSERT INTO audit_logs VALUES("360","2024-06-26 23:02:41","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("361","2024-06-26 23:04:16","a","User logged out: a");
INSERT INTO audit_logs VALUES("362","2024-06-27 13:08:49","admin","User logged out: admin");
INSERT INTO audit_logs VALUES("363","2024-06-27 13:09:14","staff","User logged out: staff");
INSERT INTO audit_logs VALUES("364","2024-06-27 14:04:02","admin","Reimbursement edited by: admin. id: 122. Meal allowance: 108 adjustment: 36 Transportation: 95 ");
INSERT INTO audit_logs VALUES("365","2024-06-27 14:11:14","admin","Payroll created by: admin. Cutoff: 1. Date range: [2024-05-01] - [2024-05-15]");



CREATE TABLE `base_pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `base_pay` varchar(11) NOT NULL,
  `active` varchar(5) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO base_pay VALUES("1","3750","yes");
INSERT INTO base_pay VALUES("2","6500","no");
INSERT INTO base_pay VALUES("3","7500","no");
INSERT INTO base_pay VALUES("5","8500","no");



CREATE TABLE `cashadvance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` varchar(11) NOT NULL,
  `pay_per_cut_off` varchar(11) NOT NULL,
  `number_of_cutoffs` varchar(11) NOT NULL,
  `balance` varchar(11) NOT NULL,
  `empid` varchar(11) NOT NULL,
  `employee_id` varchar(11) NOT NULL,
  `date_advance` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4;

INSERT INTO cashadvance VALUES("86","5000","","","5000","","VC:2024-002","2024-05-27");
INSERT INTO cashadvance VALUES("87","5000","500","","5000","","VC:2024-002","2024-05-27");
INSERT INTO cashadvance VALUES("88","5000","500","","4500","","VC:2024-002","2024-05-27");
INSERT INTO cashadvance VALUES("89","5000","500","","4000","","VC:2024-002","2024-05-27");
INSERT INTO cashadvance VALUES("90","5000","500","","3500","","VC:2024-002","2024-05-27");
INSERT INTO cashadvance VALUES("91","5000","500","","3000","","VC:2024-002","2024-05-28");
INSERT INTO cashadvance VALUES("92","5000","500","","2500","","VC:2024-002","2024-05-27");
INSERT INTO cashadvance VALUES("93","5000","500","","2000","","VC:2024-002","2024-05-27");
INSERT INTO cashadvance VALUES("94","5000","500","","1500","","VC:2024-002","2024-05-27");
INSERT INTO cashadvance VALUES("95","5000","500","","1000","","VC:2024-002","2024-05-27");
INSERT INTO cashadvance VALUES("96","5000","500","","500","","VC:2024-002","2024-05-27");
INSERT INTO cashadvance VALUES("97","5000","500","","0","","VC:2024-002","2024-05-27");
INSERT INTO cashadvance VALUES("98","2000","","","2000","","VC:2024-002","2024-06-27");
INSERT INTO cashadvance VALUES("99","2343","","5","2343","","VC:2024-002","2024-06-27");
INSERT INTO cashadvance VALUES("100","50000","","8","50000","","VC:2024-002","2024-06-27");
INSERT INTO cashadvance VALUES("101","1","","1","1","","VC:2024-002","2024-06-27");
INSERT INTO cashadvance VALUES("102","4","","1","4","","VC:2024-002","2024-06-27");
INSERT INTO cashadvance VALUES("103","104","","1","104","","VC:2024-002","2024-06-27");
INSERT INTO cashadvance VALUES("104","204","","6","204","","VC:2024-002","2024-06-27");
INSERT INTO cashadvance VALUES("105","205","","7","205","","VC:2024-002","2024-06-27");
INSERT INTO cashadvance VALUES("106","206","","8","206","","VC:2024-002","2024-06-27");
INSERT INTO cashadvance VALUES("107","506","0","9","506","","VC:2024-002","2024-06-27");
INSERT INTO cashadvance VALUES("108","606","60.6","10","606","","VC:2024-002","2024-06-27");
INSERT INTO cashadvance VALUES("109","606","60.6","9","545.4","","VC:2024-002","2024-06-27");
INSERT INTO cashadvance VALUES("110","606","60.6","8","484.8","","VC:2024-002","2024-06-27");



CREATE TABLE `cashadvance_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(100) NOT NULL,
  `loan` varchar(100) NOT NULL,
  `paid` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

INSERT INTO cashadvance_history VALUES("37","VC:2024-001","5000","500","4500","2024-05-13");
INSERT INTO cashadvance_history VALUES("38","VC:2024-002","0","0","0","2024-05-13");
INSERT INTO cashadvance_history VALUES("39","VC:2024-003","0","0","0","2024-05-13");
INSERT INTO cashadvance_history VALUES("40","VC:2024-003","10000","5000","5000","2024-05-25");
INSERT INTO cashadvance_history VALUES("41","VC:2024-003","10000","5000","5000","2024-05-25");



CREATE TABLE `deductions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `employeer_contribution` varchar(20) NOT NULL,
  `employee_contribution` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO deductions VALUES("1","SSS","0.095","0.045");
INSERT INTO deductions VALUES("2","Pagibig","200","200");
INSERT INTO deductions VALUES("3","PhilHealth","0.025",".025");



CREATE TABLE `employee_financial_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reimbursement_proof` text NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `base_pay` varchar(11) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `leave_credits` varchar(11) NOT NULL,
  `meal_allowance` varchar(20) NOT NULL,
  `meal_allowance_additional` varchar(12) NOT NULL,
  `incentives_value` varchar(20) NOT NULL,
  `adjustments` varchar(20) NOT NULL,
  `adjustments_additional` varchar(12) NOT NULL,
  `transportation` varchar(20) NOT NULL,
  `transportation_additional` varchar(12) NOT NULL,
  `sss_employeer` varchar(20) NOT NULL,
  `sss_emp` varchar(20) NOT NULL,
  `philhealth_employeer` varchar(20) NOT NULL,
  `philhealth_emp` varchar(20) NOT NULL,
  `pagibig_employeer` varchar(20) NOT NULL,
  `pagibig_emp` varchar(20) NOT NULL,
  `tin_employeer` varchar(20) NOT NULL,
  `tin_emp` varchar(20) NOT NULL,
  `location_id` varchar(50) NOT NULL,
  `ass_sched_fin_date` varchar(20) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4;

INSERT INTO employee_financial_list VALUES("112","","VC:2024-001","2024-05-01","7500","625","5","150","","600","50","","20","","0.095","0.045","0.025",".025","200","200","","","1","05-25-2024","0");
INSERT INTO employee_financial_list VALUES("113","","VC:2024-002","2024-05-01","8500","708.33","5","150","","600","50","","50","","0.095","0.045","0.025",".025","200","200","","","1","05-25-2024","0");
INSERT INTO employee_financial_list VALUES("114","","VC:2024-001","2024-05-02","7500","625","5","150","","684.68","50","","50","","0.095","0.045","0.025",".025","200","200","","","2","05-25-2024","0");
INSERT INTO employee_financial_list VALUES("115","","VC:2024-002","2024-05-02","8500","708.33","5","150","","684.68","50","","50","","0.095","0.045","0.025",".025","200","200","","","2","05-25-2024","0");
INSERT INTO employee_financial_list VALUES("116","","VC:2024-001","2024-05-03","7500","625","5","150","","630","20","","50","","0.095","0.045","0.025",".025","200","200","","","3","05-25-2024","0");
INSERT INTO employee_financial_list VALUES("117","","VC:2024-002","2024-05-03","8500","708.33","5","150","","630","100","","50","","0.095","0.045","0.025",".025","200","200","","","3","05-25-2024","0");
INSERT INTO employee_financial_list VALUES("118","","VC:2024-001","2024-05-14","7500","625","5","150","","600","50","","50","","0.095","0.045","0.025",".025","200","200","","","1","05-25-2024","0");
INSERT INTO employee_financial_list VALUES("119","","VC:2024-002","2024-05-14","8500","708.33","5","150","","600","100","","50","","0.095","0.045","0.025",".025","200","200","","","1","05-25-2024","0");
INSERT INTO employee_financial_list VALUES("120","Cyclic-RedunDancy-Check-1.png","VC:2024-001","2024-05-16","7500","625","5","150","","468.46","50","","40","","0.095","0.045","0.025",".025","200","200","","","4","05-25-2024","0");
INSERT INTO employee_financial_list VALUES("121","top-10-the-most-beautiful-japanese-actresses.jpg","VC:2024-001","2024-05-17","7500","625","5","150","","197.94","50","","50","","0.095","0.045","0.025",".025","200","200","","","5","05-25-2024","0");
INSERT INTO employee_financial_list VALUES("122","13999067.jpg","VC:2024-001","2024-05-18","7500","625","5","108","50","468.46","36","2","95","50","0.095","0.045","0.025",".025","200","200","","","4","05-25-2024","0");



CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(15) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `birthdate` date NOT NULL,
  `bloodtype` varchar(5) NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `position_id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `fb` varchar(50) NOT NULL,
  `civil_status` varchar(50) NOT NULL,
  `sss` varchar(50) NOT NULL,
  `sss_deduction` varchar(11) DEFAULT NULL,
  `tin_deduction` varchar(11) DEFAULT NULL,
  `philhealth_deduction` varchar(11) DEFAULT NULL,
  `pagibig_deduction` varchar(11) DEFAULT NULL,
  `tin` varchar(50) NOT NULL,
  `pagibig` varchar(50) NOT NULL,
  `philhealth` varchar(50) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `contact_person_address` varchar(100) NOT NULL,
  `contact_person_number` varchar(50) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_services` varchar(50) NOT NULL,
  `bank_account` varchar(50) NOT NULL,
  `gcash` varchar(50) NOT NULL,
  `archive` varchar(20) NOT NULL DEFAULT 'no',
  `assigned_status` varchar(2) NOT NULL DEFAULT '0',
  `reg_rel_id` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO employees VALUES("1","VC:2024-001","Jhen","Bacho","Wes","USA","2024-04-19","AB+","09648569565","Male","8","profile.jpg","2024-04-20","wesley@gmail.com","wesley_wes","Single","9875485748458","1","","3","2","","","659856526365","Fabiano Caruana","USA","09864587586","UnionBank","Savings","369875468523","09658425625","no","0","2");
INSERT INTO employees VALUES("2","VC:2024-002","Genielyn","Gonzales","Genielyn","Russia","2024-04-10","AB+","09658462535","Male","9","profile.jpg","2024-04-20","garry@gmail.com","garry","Married","6859756845111","1","","3","2","546875486111","365245857111","655874512111","Hansmoke Niemann","Ambot","09874565854","Maybank Philippines","Checking","987546213584","09854875154","no","0","2");
INSERT INTO employees VALUES("10","VC:2024-003","Juan","Delacruz","juan","Kawit","1999-06-16","B+","03695855566","Male","9","profile.jpg","2024-05-26","juan@gmail.com","juan","Married","","","","","","","","","Alice","Cavite City","09856558545","RCBC","Savings","326566565999","06598889956","yes","0","0");
INSERT INTO employees VALUES("11","VC:2024-004","Pedro","Penduko","Pedro","Tejero","1999-06-16","B","09656565626","Female","8","profile.jpg","2024-05-26","pedro@gmail.com","peterpan","Married","","","","","","","","","Paul ","Kawit","09865656566","China Bank","Checking","656565659965","09865656266","yes","0","0");
INSERT INTO employees VALUES("12","VC:2024-005","erge","erg","erg","ergerg","2024-05-22","B","45345454545","Male","8","","2024-05-27","dfg@gmail.com","ergerg","Single","","","","","","","","","456456456","hrthrthrth","54665465644","RCBC","Checking","456456456666","54645654666","yes","0","2");
INSERT INTO employees VALUES("13","VC:2024-006","rg","erg","erg","egferwg","2024-06-14","A+","45454555555","Male","8","top-10-the-most-beautiful-japanese-actresses.jpg","2024-06-24","er@gmail.com","reg","Single","4565656546","1","","3","2","411111111111","111111111111","111111111111","rdfgjgj","tyjrj","56456453454","RCBC","Savings","453454545455","43534545447","no","0","2");



CREATE TABLE `income_tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(20) NOT NULL,
  `first_bracket` varchar(15) NOT NULL,
  `second_bracket` varchar(15) NOT NULL,
  `tax_rate` varchar(5) DEFAULT NULL,
  `gross-income` varchar(11) NOT NULL,
  `tax-rate` varchar(11) NOT NULL,
  `income-tax` varchar(11) NOT NULL,
  `calculation_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO income_tax VALUES("1","","0","250000","0","","","","");
INSERT INTO income_tax VALUES("2","","250000","400000",".15","","","","");
INSERT INTO income_tax VALUES("4","","400000","800000",".20","","","","");
INSERT INTO income_tax VALUES("5","","800000","2000000",".25","","","","");
INSERT INTO income_tax VALUES("6","","2000000","8000000",".30","","","","");
INSERT INTO income_tax VALUES("7","","8000000","Above",".35","","","","");



CREATE TABLE `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `incentives` varchar(11) NOT NULL,
  `doc` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `location_archive` varchar(3) NOT NULL DEFAULT 'no',
  `date` varchar(50) NOT NULL DEFAULT '2024-04-19',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

INSERT INTO location VALUES("1","Cavite","Kawit",".02","30000","1","no","2024-06-26");
INSERT INTO location VALUES("2","Indang","Cavite",".02","34234","1","no","2024-06-26");
INSERT INTO location VALUES("3","Cavite","Wealth core",".03","21000","1","no","2024-06-26");
INSERT INTO location VALUES("4","Manila","Bulacan",".02","23423","1","no","2024-06-26");
INSERT INTO location VALUES("5","Cavite","Danson",".02","9897","1","no","2024-06-26");
INSERT INTO location VALUES("6","Antipolo","rizal",".02","32000","1","no","2024-06-26");
INSERT INTO location VALUES("7","Cabiao","Laguna",".02","31123","1","no","2024-06-26");
INSERT INTO location VALUES("48","Cagayan","Aparri","345","345","1","yes","2024-06-26");



CREATE TABLE `payroll_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payroll_number` varchar(100) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `date_range` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `meal_allowance` varchar(50) NOT NULL,
  `incentives` varchar(50) NOT NULL,
  `adjustments` varchar(50) NOT NULL,
  `transportation` varchar(50) NOT NULL,
  `sss` varchar(20) NOT NULL,
  `sss_employeer` varchar(11) NOT NULL,
  `pagibig` varchar(20) NOT NULL,
  `pagibig_employeer` varchar(11) NOT NULL,
  `tin` varchar(20) NOT NULL,
  `tin_employeer` varchar(11) NOT NULL,
  `philhealth` varchar(20) NOT NULL,
  `philhealth_employeer` varchar(11) NOT NULL,
  `cashadvance` varchar(11) NOT NULL,
  `pay_per_cut_off` varchar(11) NOT NULL,
  `cashadvance_balance` varchar(11) NOT NULL,
  `total_deduction` varchar(20) NOT NULL,
  `_13th` varchar(11) NOT NULL,
  `bonus` varchar(11) NOT NULL,
  `gross` varchar(20) NOT NULL,
  `net_salary` varchar(20) NOT NULL,
  `net_salary_after` varchar(20) NOT NULL,
  `num_days_work` varchar(20) NOT NULL,
  `workdays_total` varchar(11) NOT NULL,
  `num_of_absent` varchar(11) NOT NULL,
  `remaining_credits` varchar(11) NOT NULL,
  `created_on` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=281 DEFAULT CHARSET=utf8mb4;

INSERT INTO payroll_employee VALUES("279","","VC:2024-001","[2024-05-01] - [2024-05-15]","3750","600","2514.68","170","170","0","337.5","200","200","0","","0","7500","0","0","0","200","","","7204.68","7004.68","","4","4","0","5","2024-06-27","1");
INSERT INTO payroll_employee VALUES("280","","VC:2024-002","[2024-05-01] - [2024-05-15]","4250","600","2514.68","300","200","0","382.5","200","200","0","","0","8500","606","60.6","484.8","260.6","","","7864.68","7604.08","","4","4","0","5","2024-06-27","1");



CREATE TABLE `payroll_summary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_range` varchar(100) NOT NULL,
  `num_work_days` varchar(11) NOT NULL,
  `total_deduction` varchar(15) NOT NULL,
  `gross` varchar(15) NOT NULL,
  `net_salary` varchar(15) NOT NULL,
  `created_on` varchar(100) NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(150) NOT NULL,
  `base_pay` varchar(11) NOT NULL,
  `leave_credits` varchar(11) NOT NULL,
  `rate` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO position VALUES("8","Technician","7500","5","625");
INSERT INTO position VALUES("9","vaccinator","8500","5","708.33");



CREATE TABLE `reg_rel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO reg_rel VALUES("1","Regular");
INSERT INTO reg_rel VALUES("2","Reliever");



CREATE TABLE `salary_calculation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_hatch` varchar(20) NOT NULL,
  `total_doc` varchar(50) NOT NULL,
  `incentives` varchar(50) NOT NULL,
  `incentives_value` varchar(20) NOT NULL,
  `xtmeal_allowance` varchar(20) NOT NULL,
  `meal_allowance` varchar(20) NOT NULL,
  `crew` varchar(20) NOT NULL,
  `total_cost` varchar(20) NOT NULL,
  `location_id` int(11) NOT NULL,
  `salary_calculation_status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `salary_computed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_created` varchar(20) NOT NULL,
  `date_from` varchar(20) NOT NULL,
  `date_to` varchar(20) NOT NULL,
  `com_doc` varchar(20) NOT NULL,
  `com_incentives` varchar(20) NOT NULL,
  `com_incentives_value` varchar(20) NOT NULL,
  `com_xtmeal_allowance` varchar(20) NOT NULL,
  `com_meal_allowance` varchar(20) NOT NULL,
  `com_crew` varchar(20) NOT NULL,
  `com_total_cost` varchar(20) NOT NULL,
  `location_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `day` varchar(20) NOT NULL,
  `day_value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO schedules VALUES("1","16:00:00","16:00:00","monday","1");
INSERT INTO schedules VALUES("2","16:00:00","16:00:00","tuesday","2");
INSERT INTO schedules VALUES("3","16:00:00","16:00:00","thursday","3");
INSERT INTO schedules VALUES("4","16:00:00","16:00:00","wednesday","4");
INSERT INTO schedules VALUES("5","16:00:00","16:00:00","friday","5");
INSERT INTO schedules VALUES("6","16:00:00","16:00:00","saturday","6");



CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_role_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_on` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO staff VALUES("1","staff","staff","staff","1111","2","8190c5ae-738d-4a5a-bb23-9298ec066a76(1).jpg","2024-04-03");



CREATE TABLE `system_lock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12347 DEFAULT CHARSET=utf8mb4;

INSERT INTO system_lock VALUES("12345","off");



CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `access_role` varchar(20) NOT NULL,
  `sec_1` varchar(100) NOT NULL,
  `ans_1` varchar(100) NOT NULL,
  `sec_2` varchar(100) NOT NULL,
  `ans_2` varchar(100) NOT NULL,
  `sec_3` varchar(100) NOT NULL,
  `ans_3` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO user VALUES("1","admin","secq1a","whitey","secq1b","nenita","secq3c","8");
INSERT INTO user VALUES("2","staff","","","","","","");
INSERT INTO user VALUES("3","super admin","","","","","","");



CREATE TABLE `wage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `current_wage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO wage VALUES("1","500");

