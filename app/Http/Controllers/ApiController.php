<?php
/**
 * Created by PhpStorm.
 * User: julie
 * Date: 20/03/2019
 * Time: 09:45
 */

namespace App\Http\Controllers;


use App\Raspberry;
use App\Record;
use App\Sensor;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class ApiController extends Controller{

    public function ping(Request $request){

        $raspberry = Raspberry::getByAddress($request->get('address'));
        if ($raspberry){
            $response[] = [
                'success' => true,
                'sensors' => $raspberry->sensors,
            ];
            return Response::json($response, 200);
        }
        else{
            $response = [
                'success' => false,
                'messageError' => 'Raspberry not found',
            ];
            return Response::json($response, 401);
        }
    }

    public function postRecord(Request $request){
        $sensor = Sensor::getByAddress($request->get('address'));
        $value = $request->get('value');
        if ($sensor and $value){
            $record = Record::createNow($sensor, $value);
            if ($record->save()){
                $response[] = [
                    'success' => true,
                ];
            }
            else{
                $response[] = [
                    'success' => false,
                    'messageError' => 'Unable to persist in database',
                ];
            }
            return Response::json($response, 200);
        }
        else{
            if ($sensor){
                $response = [
                    'success' => false,
                    'messageError' => 'Value not found',
                ];
            }
            else{
                $response = [
                    'success' => false,
                    'messageError' => 'Sensor not found',
                ];
            }
            return Response::json($response, 401);
        }
    }

}