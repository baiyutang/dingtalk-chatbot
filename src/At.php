<?php

namespace DingTalkRobot;

/**
 * Class At
 * @package DingTalkRobot
 */
class At
{
    /**
     * @var array
     */
    private $data = array();

    /**
     * 选填
     * 被@人的手机号(在content里添加@人的手机号)
     * 可链式调用设置多个
     * @param $mobile
     * @return $this
     */
    public function setMobile($mobile)
    {
        if ($mobile) {
            $this->data['atMobiles'][] = $mobile;
        }

        return $this;
    }

    /**
     * 选填
     * 设置 @ 所有人时，@ 单独手机号会失效
     * @param bool $isAtAll @所有人时：true，否则为：false
     * @return $this
     */
    public function setAtAll($isAtAll)
    {
        $this->data['isAtAll'] = (bool)$isAtAll;

        return $this;
    }

    /**
     * @return array 获取设置的 @ 数据
     */
    public function get()
    {
        return $this->data;
    }
}
