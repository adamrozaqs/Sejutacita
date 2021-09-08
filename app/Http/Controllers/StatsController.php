<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function monthly_complete(Request $request)
    {
        $tableTarget = "targets";
        $date = new DateTime();
        $now_month = $date->format('Y-m');
        $week1 = "";
        $week1_total = "";
        $week2 = "";
        $week2_total = "";
        $week3 = "";
        $week3_total = "";
        $week4 = "";
        $week4_total = "";
        $week = [];
        $total = [];
        for ($i = 1; $i <= 31; $i++) {
            // first week 1 - 9
            if ($i < 9) {
                $week1 .= "created_at LIKE '$now_month-0$i%' AND deleted_at IS NULL AND status = 1 or ";
                $week1_total .= "created_at LIKE '$now_month-0$i%' AND deleted_at IS NULL or ";
            }
            if ($i == 9) {
                $week1 .= "created_at LIKE '$now_month-0$i%'  AND deleted_at IS NULL AND status = 1";
                $week1_total .= "created_at LIKE '$now_month-0$i%' AND deleted_at IS NULL ";
            }
            // second week 10 - 16
            if (9 < $i && $i < 16) {
                $week2 .= "created_at LIKE '$now_month-$i%' AND deleted_at IS NULL AND status = 1 or ";
                $week2_total .= "created_at LIKE '$now_month-$i%' AND deleted_at IS NULL or ";
            }
            if (9 < $i && $i == 16) {
                $week2 .= "created_at LIKE '$now_month-$i%' AND deleted_at IS NULL AND status = 1 ";
                $week2_total .= "created_at LIKE '$now_month-$i%' AND deleted_at IS NULL ";
            }
            // third week 17 - 23
            if (16 < $i && $i < 23) {
                $week3 .= "created_at LIKE '$now_month-$i%' AND deleted_at IS NULL AND status = 1 or ";
                $week3_total .= "created_at LIKE '$now_month-$i%' AND deleted_at IS NULL or ";
            }
            if (16 < $i && $i == 23) {
                $week3 .= "created_at LIKE '$now_month-$i%' AND deleted_at IS NULL AND status = 1 ";
                $week3_total .= "created_at LIKE '$now_month-$i%' AND deleted_at IS NULL ";
            }
            // fourth week 24 - 31
            if (23 < $i && $i < 31) {
                $week4 .= "created_at LIKE '$now_month-$i%' AND deleted_at IS NULL AND status = 1 or ";
                $week4_total .= "created_at LIKE '$now_month-$i%' AND deleted_at IS NULL or ";
            }
            if (23 < $i && $i == 31) {
                $week4 .= "created_at LIKE '$now_month-$i%' AND deleted_at IS NULL AND status = 1 ";
                $week4_total .= "created_at LIKE '$now_month-$i%' AND deleted_at IS NULL ";
            }
        }
        for ($jj = 1; $jj <= 4; $jj++) {
            if ($jj == 1) {
                $query = $week1;
                $query_total = $week1_total;
            }
            if ($jj == 2) {
                $query = $week2;
                $query_total = $week2_total;
            }
            if ($jj == 3) {
                $query = $week3;
                $query_total = $week3_total;
            }
            if ($jj == 4) {
                $query = $week4;
                $query_total = $week4_total;
            }
            $week["week$jj"] = DB::select("select count(*) jumlah from $tableTarget where user_id = '$request->uuid' AND $query")[0]->jumlah;
            $total["week$jj"] = DB::select("select count(*) jumlah from $tableTarget where user_id = '$request->uuid' AND $query_total")[0]->jumlah;
        }
        $result['targets_weekly_complete'] = $week;
        $result['targets_weekly_total'] = $total;

        if (empty($result)) {
            return response()->json([
                'message' => 'Data Kosong',
                'status' => true,
                'code' => 204,
                'data' => $result
            ], 204);
        }
        return response()->json([
            'message' => 'Data Monthly complete berhasil dipanggil',
            'status' => true,
            'code' => 200,
            'data' => $result
        ], 200);
    }

    public function monthly_summary(Request $request)
    {
        $tableTarget = "targets";
        $date = new DateTime();
        $now_month = $date->format('Y-m');
        $result['count_complete'] = DB::select("select count(*) jumlah from $tableTarget where user_id = '$request->uuid' AND deleted_at IS NULL AND status = 1 AND created_at LIKE '$now_month%'")[0]->jumlah;
        $result['count_total'] = DB::select("select count(*) jumlah from $tableTarget where user_id = '$request->uuid' AND deleted_at IS NULL AND created_at LIKE '$now_month%'")[0]->jumlah;

        if (empty($result)) {
            return response()->json([
                'message' => 'Data Kosong',
                'status' => true,
                'code' => 204,
                'data' => $result
            ], 204);
        }
        return response()->json([
            'message' => 'Data Monthly summary berhasil dipanggil',
            'status' => true,
            'code' => 200,
            'data' => $result
        ], 200);
    }
}
