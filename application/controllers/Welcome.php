<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->model('BookingModel', 'booking');
        $bookings = $this->booking->getBookingDay();

        $calendar = $this->getCalendarDate($bookings);

        $this->load->helper('url');

        $this->load->view('new_calendar', compact('calendar'));
    }

    private function getCalendarDate($bookings)
    {
        $monthInCalendar = ['07', '08', '09'];
        $year = 2020;
        $calendar = [];
        $today = new DateTime("now", new DateTimeZone('Asia/Taipei'));
        $today = $today->format('Y-m-d');

        foreach ($monthInCalendar as $month) {
            $totalDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            $week = 1;

            for ($day = 1; $day <= $totalDays; $day++) {
                $date = "{$year}-{$month}-" . str_pad($day, 2, 0, STR_PAD_LEFT);
                $dayOfWeek = date('w', strtotime($date));
                $dayOfWeek = $dayOfWeek == 0 ? 7 : $dayOfWeek;
                

                if ($day == 1 && $dayOfWeek != 1 || $day == $totalDays && $dayOfWeek != 7) {
                    $filler = $day == 1 ? $dayOfWeek - 1 : 7 - $dayOfWeek;
                    $dayOperator = $day == 1 ? '-' : '+';
                    $fillerCount = 1;

                    while ($day == 1 ? $filler > 0 : $fillerCount <= $filler) {
                        $searchDay = $day == 1 ? $filler : $fillerCount;
                        
                        $fillerDate = date('Y-m-d', strtotime("{$dayOperator}{$searchDay} day", strtotime($date)));
                        $fillerDayOfWeek = date('w', strtotime($fillerDate));
                        $fillerDayOfWeek = $fillerDayOfWeek == 0 ? 7 : $fillerDayOfWeek;
                        $explodedFillerDate = explode('-', $fillerDate);
                        $bookedFiller = array_search($fillerDate, array_column($bookings, 'booking_day')) !== false
                            ? 1 : 0;

                        $calendar[$month][$week][$fillerDayOfWeek] = [
                            'day' => $explodedFillerDate[2],
                            'filler' => 1,
                            'today' => $today == $fillerDate ? 1 : 0,
                            'booked' => $bookedFiller,
                            'date' => $fillerDate,
                        ];

                        if ($day == 1) {
                            $filler--;
                        } else {
                            $fillerCount++;
                        }
                    }
                }

                $booked = array_search($date, array_column($bookings, 'booking_day')) !== false
                    ? 1 : 0;
                $calendar[$month][$week][$dayOfWeek] = [
                    'day' => $day,
                    'filler' => 0,
                    'today' => $today == $date ? 1 : 0,
                    'booked' => $booked,
                    'date' => $date,
                ];

                ksort($calendar[$month][$week]);

                if ($dayOfWeek == 7) {
                    $week++;
                }
            }
        }

        return $calendar;
    }
}
