<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\ListMedicine;
use App\Models\Schedule;
use App\Models\Register;

class DataFirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ListMedicine::insert([
          [ 'medicine_id' => 1, 'price' => 10000, 'date_buy' => '2019-10-10 00:00:00', 'date_expired' => '2021-10-10 00:00:00', 'information' => 'tes', 'stock' => 100, 'status' => 'available', 'created_at' => Carbon::now() ],
          [ 'medicine_id' => 2, 'price' => 20000, 'date_buy' => '2019-10-10 00:00:00', 'date_expired' => '2021-10-10 00:00:00', 'information' => 'tes', 'stock' => 100, 'status' => 'available', 'created_at' => Carbon::now() ],
          [ 'medicine_id' => 3, 'price' => 20000, 'date_buy' => '2019-10-10 00:00:00', 'date_expired' => '2021-10-10 00:00:00', 'information' => 'tes', 'stock' => 100, 'status' => 'available', 'created_at' => Carbon::now() ],
          [ 'medicine_id' => 4, 'price' => 10000, 'date_buy' => '2019-10-10 00:00:00', 'date_expired' => '2021-10-10 00:00:00', 'information' => 'tes', 'stock' => 100, 'status' => 'available', 'created_at' => Carbon::now() ],
          [ 'medicine_id' => 5, 'price' => 20000, 'date_buy' => '2019-10-10 00:00:00', 'date_expired' => '2021-10-10 00:00:00', 'information' => 'tes', 'stock' => 100, 'status' => 'available', 'created_at' => Carbon::now() ],
          [ 'medicine_id' => 6, 'price' => 20000, 'date_buy' => '2019-10-10 00:00:00', 'date_expired' => '2021-10-10 00:00:00', 'information' => 'tes', 'stock' => 100, 'status' => 'available', 'created_at' => Carbon::now() ],
          [ 'medicine_id' => 7, 'price' => 10000, 'date_buy' => '2019-10-10 00:00:00', 'date_expired' => '2021-10-10 00:00:00', 'information' => 'tes', 'stock' => 100, 'status' => 'available', 'created_at' => Carbon::now() ],
          [ 'medicine_id' => 8, 'price' => 20000, 'date_buy' => '2019-10-10 00:00:00', 'date_expired' => '2021-10-10 00:00:00', 'information' => 'tes', 'stock' => 100, 'status' => 'available', 'created_at' => Carbon::now() ],
          [ 'medicine_id' => 9, 'price' => 20000, 'date_buy' => '2019-10-10 00:00:00', 'date_expired' => '2021-10-10 00:00:00', 'information' => 'tes', 'stock' => 100, 'status' => 'available', 'created_at' => Carbon::now() ],
          [ 'medicine_id' => 10, 'price' => 10000, 'date_buy' => '2019-10-10 00:00:00', 'date_expired' => '2021-10-10 00:00:00', 'information' => 'tes', 'stock' => 100, 'status' => 'available', 'created_at' => Carbon::now() ],
          [ 'medicine_id' => 11, 'price' => 20000, 'date_buy' => '2019-10-10 00:00:00', 'date_expired' => '2021-10-10 00:00:00', 'information' => 'tes', 'stock' => 100, 'status' => 'available', 'created_at' => Carbon::now() ],
          [ 'medicine_id' => 12, 'price' => 20000, 'date_buy' => '2019-10-10 00:00:00', 'date_expired' => '2021-10-10 00:00:00', 'information' => 'tes', 'stock' => 100, 'status' => 'available', 'created_at' => Carbon::now() ],
          [ 'medicine_id' => 13, 'price' => 10000, 'date_buy' => '2019-10-10 00:00:00', 'date_expired' => '2021-10-10 00:00:00', 'information' => 'tes', 'stock' => 100, 'status' => 'available', 'created_at' => Carbon::now() ],
          [ 'medicine_id' => 14, 'price' => 20000, 'date_buy' => '2019-10-10 00:00:00', 'date_expired' => '2021-10-10 00:00:00', 'information' => 'tes', 'stock' => 100, 'status' => 'available', 'created_at' => Carbon::now() ],
          [ 'medicine_id' => 15, 'price' => 20000, 'date_buy' => '2019-10-10 00:00:00', 'date_expired' => '2021-10-10 00:00:00', 'information' => 'tes', 'stock' => 100, 'status' => 'available', 'created_at' => Carbon::now() ],
        ]);

        Schedule::insert([
          [ 'user_id' => 3, 'poly_id' => 1, 'day' => 'Senin', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 4, 'poly_id' => 2, 'day' => 'Senin', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 2, 'poly_id' => 3, 'day' => 'Senin', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 3, 'poly_id' => 1, 'day' => 'Selasa', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 4, 'poly_id' => 2, 'day' => 'Selasa', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 2, 'poly_id' => 3, 'day' => 'Selasa', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 3, 'poly_id' => 1, 'day' => 'Rabu', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 4, 'poly_id' => 2, 'day' => 'Rabu', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 2, 'poly_id' => 3, 'day' => 'Rabu', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 3, 'poly_id' => 1, 'day' => 'Kamis', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 4, 'poly_id' => 2, 'day' => 'Kamis', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 2, 'poly_id' => 3, 'day' => 'Kamis', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 3, 'poly_id' => 1, 'day' => 'Jumat', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 4, 'poly_id' => 2, 'day' => 'Jumat', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 2, 'poly_id' => 3, 'day' => 'Jumat', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 3, 'poly_id' => 1, 'day' => 'Sabtu', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 4, 'poly_id' => 2, 'day' => 'Sabtu', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 2, 'poly_id' => 3, 'day' => 'Sabtu', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 3, 'poly_id' => 1, 'day' => 'Ahad', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 4, 'poly_id' => 2, 'day' => 'Ahad', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 2, 'poly_id' => 2, 'day' => 'Ahad', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 2, 'poly_id' => 3, 'day' => 'Ahad', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
        ]);

        Register::insert([
          [ 'user_id' => 6, 'poly_id' => 1, 'date_check' => '2019-12-15', 'time_check_start' => '07:00:00', 'time_check_end' => '07:10:00', 'status_check' => 'register', 'no_antrian' => 1, 'created_at' => Carbon::now() ],
          [ 'user_id' => 7, 'poly_id' => 2, 'date_check' => '2019-12-15', 'time_check_start' => '07:00:00', 'time_check_end' => '07:10:00', 'status_check' => 'register', 'no_antrian' => 1, 'created_at' => Carbon::now() ],
          [ 'user_id' => 6, 'poly_id' => 2, 'date_check' => '2019-12-15', 'time_check_start' => '07:10:00', 'time_check_end' => '07:20:00', 'status_check' => 'register', 'no_antrian' => 2, 'created_at' => Carbon::now() ],

        ]);
    }
}
