<?php
require_once 'Channel.class.php';
class BaiDuPush{
	private $apiKey,$secretKey;
	public function __construct($apiKey,$secretKey){
		$this->apiKey=$apiKey;
		$this->secretKey=$secretKey;
	}
	//android发送通知,发送给所有android用户
	public function android_push_notice($title,$description){
		$channel=new Channel($this->apiKey,$this->secretKey);
		$push_type=3;	//3是推送给所有用户
		$message = '{
			"title": "'.$title.'",
			"description": "'.$description.'"
   		 	}';
		$message_key = "msg_key";
		$optional[Channel::MESSAGE_TYPE] = 1;
		$optional[Channel::DEVICE_TYPE]=3;	//3是推送给android设备 
		$result = $channel->pushMessage ( $push_type, $message, $message_key, $optional );
		if($result===false){
			return '推送失败';
		}else{
			return '推送成功';
		}
	}
	//ios发送通知，没能测试,这个地方不知道title和description能不能用，待测试
	public function ios_push_notice($description){
		$channel=new Channel($this->apiKey,$this->secretKey);
		$optional[Channel::MESSAGE_TYPE]=1;
		$optional[Channel::DEVICE_TYPE]=4;		//推送到ios设备
		$message_key="msg_key";
		$push_type=3;	//推送给所有的ios用户
		$message = '{
        "aps":{
            "alert":"'.$description.'",
            "sound":"",
            "badge":1
        }
    	}';
		$result = $channel->pushMessage ( $push_type, $message, $message_key, $optional ) ;
		if($result===false){
			return '推送失败';
		}else{
			return '推送成功';
		}
	}
	
	
	/**
	 * 发送消息，待封装
	 */
	
	
	/**
	 * 发送富媒体信息，百度API未提供接口
	 */
	
	
}