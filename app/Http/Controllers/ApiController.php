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

    public function isOnline(Request $request){
        $raspberry = Raspberry::getByAddress($request->get('address'));
        if ($raspberry){
            $response = [
                'success' => true,
                'online' => $raspberry->state,
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

    public function getSensors(Request $request){
        $raspberry = Raspberry::getByAddress($request->get('address'));
        if (!$raspberry){
            $response = [
                'success' => false,
                'messageError' => 'Raspberry not found',
            ];
            return Response::json($response, 401);
        }
        else{
            if (!$raspberry->state){
                $response = [
                    'success' => false,
                    'messageError' => 'Raspberry is offline',
                ];
                return Response::json($response, 401);
            }
            $response = $this->makeSensorsResponse($raspberry);
            return Response::json($response, 200);
        }
    }

    public function postRecords(Request $request){
        $data = $request->get('data');
        $response = null;
        foreach ($data as $dataSensor){
            $sensor = Sensor::getByAddress($dataSensor['address']);
            $value = $dataSensor['value'];
            if ($sensor and $value){
                if (!$sensor->raspberry->state){
                    $response = [
                        'success' => false,
                        'messageError' => 'Raspberry is offline',
                    ];
                    return Response::json($response, 401);
                }
                else{
                    $record = Record::createNow($sensor, $value);
                    if ($record->save()){
                        $response = [
                            'success' => true,
                        ];
                    }
                    else{
                        $response = [
                            'success' => false,
                            'messageError' => 'Unable to persist in database',
                        ];
                    }
                }
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
        return Response::json($response, 200);
    }

    private function makeSensorsResponse($raspberry){
        $sensors = $raspberry->sensors;
        foreach ($sensors as $sensor){
            $sensor->lastRecord = $sensor->lastRecord()->pluck('recorded_at')->last();
        }
        $sensors = $sensors->map(function ($sensor) {
            return collect($sensor->toArray())
                ->only(['address', 'refreshInterval', 'lastRecord'])
                ->all();
        });
        $response = [
            'success' => true,
            'sensors' => $sensors,
        ];
        return $response;
    }

}
