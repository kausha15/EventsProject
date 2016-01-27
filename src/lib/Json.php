<?php


namespace lib;

!defined('JSON_STATUS_SUCCESS') ? define('JSON_STATUS_SUCCESS', 'success') : null;
!defined('JSON_STATUS_ERROR') ? define('JSON_STATUS_ERROR', 'error') : null;
!defined('JSON_STATUS_INFO') ? define('JSON_STATUS_INFO', 'info') : null;
!defined('JSON_STATUS_WARNING') ? define('JSON_STATUS_WARNING', 'warning') : null;

class JsonException extends \Exception
{
}

class Json
{

    protected $status;
    protected $message;
    protected $data;
    protected $start_time;
    protected $statusCode;

    private $json = array();

    public function __construct($status = null, $message = null, $data = array(), $statusCode = -1)
    {
        $this->setStatus($status);
        $this->setMessage($message);
        $this->setData($data);
        $this->setStatusCode($statusCode);
        $this->start_time = $this->microtime_float();

    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @param int $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }


    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        if (in_array($status, array(JSON_STATUS_SUCCESS, JSON_STATUS_ERROR, JSON_STATUS_INFO, JSON_STATUS_WARNING))) {
            $this->status = $status;
        } else {
            throw new JsonException("Invalid Status type provided for Json Class :
                use any one of constants JSON_STATUS_SUCCESS, JSON_STATUS_ERROR, JSON_STATUS_INFO, JSON_STATUS_WARNING");
        }

    }

    public function addData($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function add_data($key, $value)
    {
        $this->addData($key, $value);
    }

    public function getData()
    {
        return $this->data;
    }

    /**
     * Priority : 'high', 'medium', 'low,
     */
    public function setPriority($priority)
    {
        $this->addData('priority', strtolower($priority));
    }

    public function send()
    {
        $end_time = $this->microtime_float();
        $json = array(
            'status' => isset($this->status) ? $this->status : null,
            'message' => isset($this->message) ? $this->message : null,
            'data' => isset($this->data) ? $this->data : array(),
            'perf' => ($end_time - $this->start_time),
            'statusCode' => $this->statusCode

        );

        header('Content-type: application/json');
        echo json_encode($json);
    }

    public function getJson()
    {
        $end_time = $this->microtime_float();
        $json = array(
            'status' => isset($this->status) ? $this->status : null,
            'message' => isset($this->message) ? $this->message : null,
            'data' => isset($this->data) ? $this->data : array(),
            'perf' => ($end_time - $this->start_time),
            'statusCode' => $this->statusCode
        );

        return $json;
    }

    /**
     * @param $result
     * @param bool|false $isOnlyFirst
     * @return array (associative array if $isOnlyFirst is true)
     */
    public function result_to_array($result, $isOnlyFirst = false)
    {
        $data = array();
        if (is_resource($result)) {
            while ($row = mysql_fetch_assoc($result)) {
                $data[] = $row;
            }

            mysql_free_result($result);

            if ($isOnlyFirst && is_array($data) AND count($data) > 0) {
                $data = $data[0];
            }
        }

        return $data;
    }

    function microtime_float()
    {

        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);

    }

}