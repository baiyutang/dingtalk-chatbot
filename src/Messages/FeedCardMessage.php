<?php

namespace DingTalkRobot\Messages;

/**
 * Class FeedCardMessage
 * @package DingTalkRobot\Messages
 */
class FeedCardMessage extends BaseMessage
{
    /**
     * 必填
     * 可多次调用设置多条
     * @see https://open-doc.dingtalk.com/microapp/serverapi2/qf2nxq#-9
     * @param string $title 单条信息文本
     * @param string $messageUrl 点击单条信息到跳转链接
     * @param string $picUrl 单条信息后面图片的URL
     * @return $this
     */
    public function setLink($title, $messageUrl, $picUrl)
    {
        // 只是简单的判断不为空
        if (count(array_filter(func_get_args())) == 3) {
            $this->msgBody['links'][] = array(
                'title' => $title,
                'messageURL' => $messageUrl,
                'picURL' => $picUrl,
            );
        }

        return $this;
    }

    protected function validate()
    {
    }
    /**
     * @return void
     */
    protected function setMsgType()
    {
        $this->msgType = 'feedCard';
    }
}
