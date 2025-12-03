<?php
require 'config/Database.php';

// init db
$dbObj = new Database();
$db = $dbObj->conn;

$page = isset($_GET['page']) ? $_GET['page'] : 'events';

switch ($page) {

    case 'events':
        require 'viewmodels/EventViewModel.php';
        $vm = new EventViewModel($db);
        $vm->handleRequest();             
        include 'views/event_list.php';
        break;

    case 'event_form':
        require 'viewmodels/EventViewModel.php';
        $vm = new EventViewModel($db);
        $vm->handleRequest();
        include 'views/event_form.php';
        break;

    case 'clients':
        require 'viewmodels/ClientViewModel.php';
        $vm = new ClientViewModel($db);
        $vm->handleRequest();
        include 'views/client_list.php';
        break;

    case 'client_form':
        require 'viewmodels/ClientViewModel.php';
        $vm = new ClientViewModel($db);
        $vm->handleRequest();
        include 'views/client_form.php';
        break;

    case 'bookings':
        require 'viewmodels/BookingViewModel.php';
        $vm = new BookingViewModel($db);
        $vm->handleRequest();
        include 'views/booking_list.php';
        break;

    case 'booking_form':
        require 'viewmodels/BookingViewModel.php';
        $vm = new BookingViewModel($db);
        $vm->handleRequest();
        include 'views/booking_form.php';
        break;

    case 'staffs':
        require 'viewmodels/StaffViewModel.php';
        $vm = new StaffViewModel($db);
        $vm->handleRequest();
        include 'views/staff_list.php';
        break;

    case 'staff_form':
        require 'viewmodels/StaffViewModel.php';
        $vm = new StaffViewModel($db);
        $vm->handleRequest();
        include 'views/staff_form.php';
        break;

    default:
        echo 'Page not found';
}
