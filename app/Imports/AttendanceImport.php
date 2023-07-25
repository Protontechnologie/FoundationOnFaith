<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use App\Models\User;
use App\Models\attenda;
use DateTime;
use DB;

class AttendanceImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
    	$least_limit = 30;
        foreach ($collection as $key => $value) {
        	if ($key > 0) {
        		
	        	$time = new DateTime($value[2]);
				$att_date = $time->format('n/j/Y');
				$att_date = date('Y-m-d' , strtotime($att_date));
				$att_time = $time->format('H:i');
				
				$depart = $value[0];
				$name = $value[1];
				$attend_status = $value[3];
				$emp_id = $value[4];
				
				$find_user = User::where('is_active' ,1)->where('emp_id' , $emp_id)->first();
				
				if ($find_user) {
					$user_time_in = strtotime($find_user->shift_in);
					
					$user_time_out = strtotime($find_user->shift_out);
					if ($attend_status == "C/In" || $attend_status ==  "OverTime In") {
						$startTime = date("H:i", strtotime('+'.$least_limit.' minutes', $user_time_in));
						$attendance = new attenda;
						
						$attendances = attenda::where("emp_id" , $emp_id)->where("time_out" , null)->first();
						if ($attendances) {
							// Check repeated Marked In
							$differ = strtotime($attendances->time_in) - strtotime($att_time);
							// Time Out Missing
							$attendances->time_out = "00:00";
							$attendances->timeout_status = "Time-Out-Missing";
							$attendances->working_hour = "-";
							$attendances->extra = "-";
							if ($differ > 1000) {
								$attendances->save();
							}
						}

						if ($user_time_in >= $att_time || $startTime < $att_time) {
							// Reached Within time
							$user_time_in = date('H:i' , $user_time_in);

							$attendance->emp_id = $emp_id;
							$attendance->day_date = $att_date;
							$attendance->time_in = $att_time;
							$attendance->timein_status = "On-Time";

						}else{
							// Reached Late
							$attendance->emp_id = $emp_id;
							$attendance->day_date = $att_date;
							$attendance->time_in = $att_time;
							$attendance->timein_status = "Late-In";
						}
						$attendance->save();
						
					}elseif ($attend_status == "C/Out") {
						$attendances = attenda::where("emp_id" , $emp_id)->where("time_out" , null)->first();

						if ($attendances) {
							$user_time_out = strtotime($find_user->shift_out);
							$time_in = $attendances->time_in;
							$final = strtotime($att_time) - strtotime($time_in);
							$final = date('H:i' ,$final);
							if ($user_time_out > strtotime($att_time)) {
								// Early Out
								$attendances->time_out = $att_time;
								$attendances->timeout_status = "Early-Out";
								$attendances->working_hour = $final;
								$extra = date("H:i" , strtotime($att_time) - $user_time_out);
								$attendances->extra = $extra;

							}elseif ($user_time_out <= strtotime($att_time)) {
								// On Time
								$attendances->time_out = $att_time;
								$attendances->timeout_status = "On-Time";
								$attendances->working_hour = $final;
								$extra = date("H:i" , strtotime($att_time) - $user_time_out);
								$attendances->extra = $extra;
							}
							$attendances->save();	
						}else{
							// Miss the time in
							$attendance = new attenda;
							$attendance->emp_id = $emp_id;
							$attendance->day_date = $att_date;
							$attendance->time_out = $att_time;
							$attendance->timein_status = "Time-In-Missing";
							$attendance->time_in = "00:00";
							$attendance->timeout_status = "-";
							$attendance->working_hour = "-";
							$attendance->extra = "-";
							$attendance->save();
						}
					}
				}
        	}
        }
    }
}
