baidupush
=========

百度云推送简单封装ＳＤＫ

对推送消息类型“通知”进行了基于SDK的简单封装，实例化对象后，直接调用方法，传入title和description即可

调用方法：
实例化类BaiDuPush
$bd=new BaiDuPush($apiKey,$secretKey);

调用android推送方法
$bd->android_push_notice($title,$description);

调用ios推送方法（暂未测试该方法）
$bd->ios_push_notice($description);

返回值：
推送成功返回：推送成功
推送失败返回：推送失败

