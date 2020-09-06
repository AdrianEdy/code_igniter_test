<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Room extends CI_Controller
{
    public function bookedAt($day)
    {
        $tempDate = explode('-', $day);
        $rooms = [];

        if (checkdate($tempDate[1], $tempDate[2], $tempDate[0])) {
            $this->load->model('BookingModel', 'booking');
            $bookings = $this->booking->getBookingAt($day);
            
            if (count($bookings) > 0) {
                $this->load->model('RoomModel', 'room');
                $rooms = $this->room->getBookedRoom(array_column($bookings, 'room_id'));
            }
        };
        
        header('Content-Type: application/json');
        echo json_encode([['STATUS' => 200], 'results' => $rooms]);
    }
}
