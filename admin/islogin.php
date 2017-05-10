<?php
//Start the session 用于判断是否登录
session_start();
if (!(isset($_SESSION['username'])) || empty($_SESSION['username'])) {
    echo "<p style='width: 1200px; text-align: center; font-size: 18px; margin: 50px auto;'>
    	你还没有登录，不允许直接操作后台，2s后跳转到登录页面
    	<script>setTimeout(function(){window.location.href='../login.php'},2000)</script>
    	</p>";
}
?>