<?php
	
  $remote_user="root";   //Linux服务器的ssh用户名
  $remote_password="ssh111111";   //Linux服务器的ssh密码
  $connection = ssh2_connect('127.0.0.1',22);  //Linux服务器的IP地址和ssh端口号
  $script='/usr/bin/sqladvisor -h '.$ip.' -u '.$user.' -p '.$pwd.' -P '.$port.' -d '.$db.' -q "'.$multi_sql[$x].'"'; //这些不用改
  ssh2_auth_password($connection,$remote_user,$remote_password);
  $stream = ssh2_exec($connection,$script);
  $errorStream = ssh2_fetch_stream($stream, SSH2_STREAM_STDERR);
  stream_set_blocking($errorStream, true);
  $message=stream_get_contents($errorStream);

?>
