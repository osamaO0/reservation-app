<?php

namespace  App\Traits;


trait ApiTrait
{

    public function errorField($field)
    {
        $massage = __($field . ' required');
        return response()->json([
            "msg"    => $massage,
            "status" => false
        ]);
    }
    public function errorMessage($massage, $code, $errCode = null)
    {
        return response()->json([
            "msg"           => __($massage),
            "status"        => false,
            "code"          => $code,
        ], ($errCode) ? $errCode : $code);
    }

    public function Unauthorised()
    {
        return response()->json([
            "msg"           => __("Access denied! you don't have the correct access rights"),
            "status"        => false,
            "code"          => 403,
        ],403);
    }
    public function SuccessMessage($massage)
    {
        return response()->json([
            "msg"           => __($massage),
            "status"        => true,
            "code"          => 200
        ]);
    }
    public function deleted()
    {
        return response()->json([
            "msg"           => __('Record has been deleted'),
            "status"        => true,
            "code"          => 200
        ]);
    }
    public function notFound()
    {
        return response()->json([
            "msg"           => __('Record not found'),
            "status"        => false,
            "code"          => 404
        ]);
    }
    public function returnSuccess($msg = "")
    {
        return response()->json([
            'status' => true,
            "msg" => $msg,
            "code" => 200
        ]);
    }
    public function returnData($key, $value, $msg = "", $statusCode = 200, array $extra = [])
    {
        $data = [
            'data' => $value
        ];
        if (!empty($extra)) {
            foreach ($extra as $key => $value) {
                $data[$key] = $value;
            }
        }
        $data['msg'] = $msg;
        $data['status'] = true;
        $data['code'] = $statusCode;
        return response()->json($data, $statusCode);
    }


    public function paginatedResult($query, $perPage = 10)
    {
        return $query->paginate($perPage);
    }


    public function returnFailData($key, $value, $msg = "", array $extra = [])
    {
        $data = [
            $key => $value,
            'status' => false,
            "msg" => $msg
        ];
        if (!empty($extra)) {
            foreach ($extra as $key => $value) {
                $data[$key] = $value;
            }
        }
        return response()->json($data);
    }
}
