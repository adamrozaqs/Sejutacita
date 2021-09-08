<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssessmentController extends Controller
{
    public function get_all()
    {
        $message = "Data Assesment berhasil dipanggil";
        $status = "success";
        $data = [];

        $assessment_section = DB::select("select * from assessment_section");

        for ($i = 0; $i < count($assessment_section); $i++) {
            $options = $this->get_option($assessment_section[$i]->id);
            shuffle($options);
            $data_assesment_section['label'] = $assessment_section[$i]->label;
            $data_assesment_section['option'] = $options;
            array_push($data, $data_assesment_section);
        }

        $results['message'] = $message;
        $results['status'] = $status;
        $results['data'] = $data;
        return $results;
    }

    private function get_option($id_section)
    {
        $result = array();
        for ($ii = 1; $ii <= 10; $ii++) {
            $data = DB::select("select label from assessments where section_id = $id_section and `group` = $ii order by 'persona_id' DESC, `group`");
            $options = array();
            foreach ($data as $value) {
                array_push($options, $value->label);
            }
            array_push($result, $options);
        }
        return $result;
    }

    public function predict(Request $request)
    {
        $result['message'] = "Persona berhasil diprediksi";
        $result['status'] = "success";
        $uuid = $request->id;
        $dataInput = $request['data'];
        $answer[1] = $dataInput[0]["answer"];
        $answer[2] = $dataInput[1]["answer"];
        $answer[3] = $dataInput[2]["answer"];
        $answer[4] = $dataInput[3]["answer"];
        // 2nd Way
        $arr_answer = array_merge($answer[1], $answer[2], $answer[3], $answer[4]);
        $calc = array_count_values($arr_answer);
        $result['data']['most_answer'] = array_search(max($calc), $calc);
        switch ($result['data']['most_answer']) {
            case 'A':
                $result['data']['persona'] = 'Sanguins';
                $result['data']['id_persona'] = 1;
                break;
            case 'B':
                $result['data']['persona'] = 'Kolerik';
                $result['data']['id_persona'] = 3;
                break;
            case 'C':
                $result['data']['persona'] = 'Melankolis';
                $result['data']['id_persona'] = 4;
                break;
            case 'D':
                $result['data']['persona'] = 'Pelgmatis';
                $result['data']['id_persona'] = 2;
                break;

            default:
                $result['data']['persona'] = 'NONE';
                $result['data']['id_persona'] = 0;
                break;
        }
        return $result;
    }
}
