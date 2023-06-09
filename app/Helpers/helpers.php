<?php

namespace App\Helpers;

use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Helper
{
    public static function getRoomType($id)
    {
        $data = collect();
        $rooms = Room::where('hotel_id', '=', $id)->get();
        foreach ($rooms as $room ) {
            if ($room->capacity == 1 && !$data->contains('Single room')) {
                $data->push('Single room');
            } if ($room->capacity == 2 && !$data->contains('Double room')) {
                $data->push('Double room');
            } if ($room->capacity == 3 && !$data->contains('Triple room')) {
                $data->push('Triple room');
            } if ($room->capacity == 4 && !$data->contains('Room for more than three persons')) {
                $data->push('Room for more than three persons');
            }
        }
        return $data;
    }
    public static function numberOfRooms($id)
    {
        $number = Room::where('hotel_id', '=', $id)->count();
        return $number;
    }

    public static function showRoomPrice($id)
    {
        $roomPrices = Room::select('price')->where('hotel_id', '=', $id)->orderBy('price', 'asc')->get();

        $min = $roomPrices->first();
        $max = $roomPrices->last();

        $minPrice = $min ? $min->price : null;
        $maxPrice = $max ? $max->price : null;

        return [$minPrice, $maxPrice];
    }

    public static function convertToDirhame($price)
    {
        $price_dirhame = "Dh. " . number_format($price, 0, '', ' ');
        return $price_dirhame;
    }

    public static function convertWithoutDirhame($price)
    {
        $price_dirhame = number_format($price, 0, '', ' ');
        return $price_dirhame;
    }

    public static function thisMonth()
    {
        return Carbon::parse(Carbon::now())->format('m');
    }

    public static function thisYear()
    {
        return Carbon::parse(Carbon::now())->format('Y');
    }

    public static function dateDayFormat($date)
    {
        return Carbon::parse($date)->isoFormat('dddd, D MMM YYYY');
    }

    public static function dateFormat($date)
    {
        return Carbon::parse($date)->isoFormat('D MMM YYYY');
    }

    public static function dateFormatTime($date)
    {
        return Carbon::parse($date)->isoFormat('D MMM YYYY H:m:s');
    }

    public static function dateFormatTimeNoYear($date)
    {
        return Carbon::parse($date)->isoFormat('D MMM, hh:mm a');
    }

    public static function getDateDifference($check_in, $check_out)
    {
        $check_in = strtotime($check_in);
        $check_out = strtotime($check_out);
        $date_difference = $check_out - $check_in;
        $date_difference = round($date_difference / (60 * 60 * 24));
        return $date_difference;
    }

    public static function plural($value, $count)
    {
        return Str::plural($value, $count);
    }

    public static function getColorByDay($day)
    {
        $color = '';
        if ($day == 1) {
            $color = 'bg-danger';
        } else if ($day > 1 && $day < 4) {
            $color = 'bg-warning';
        } else {
            $color = 'bg-success';
        }
        return $color;
    }

    public static function getTotalPayment($day, $price)
    {
        return $day * ($price * 50 / 100);
    }
}
