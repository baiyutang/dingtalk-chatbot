<?php

namespace DingTalkRobot;

use DingTalkRobot\Messages\BaseMessage;

/**
 * Class ChatBot
 * @package DingTalkRobot
 */
class ChatBot
{
    /**
     * @param BaseMessage $message
     * @param GroupChat $group
     * @return bool|false|string
     */
    public function send($message, $group)
    {
        $data = $message->packageData();
        $url = str_replace('ACCESS_TOKEN', $group->getToken(), Constants::URL);
        return $this->postJson($url, $data);
    }

    /**
     * @param string $url
     * @param array $params
     * @return bool|false|string
     */
    private function postJson($url, $params)
    {
        try {
            $ret = $this->curlJson($url, $params);
        } catch (\Exception $exception) {
            $ret = json_encode(array('errcode' => $exception->getCode(), 'errmsg' => $exception->getMessage()));
        }

        return $ret;
    }

    /**
     * @param $url
     * @param  array $postFields
     * @return bool|string
     * @throws \Exception
     */
    private function curlJson($url, $postFields = array())
    {
        $postFields = json_encode($postFields);
        $header = array(
            "Content-Type: application/json; charset=utf-8",
            "Content-Length:" . strlen($postFields)
        );
        $ch = curl_init();
        if ($ch === false) {
            return false;
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $postFields && curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new \Exception(curl_error($ch), 0);
        } else {
            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode) {
                throw new \Exception($response, $httpStatusCode);
            }
        }
        curl_close($ch);
        return $response;
    }
}
