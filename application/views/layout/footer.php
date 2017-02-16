</div>
<br>
<div class="footer">

<div class="panel panel-default">
  <div class="panel-body">

<?php
$this->benchmark->mark('code_end');
echo "Total Execution Time : " . $this->benchmark->elapsed_time('code_start', 'code_end');
echo "<br>";
echo "Memory Usage : " . $this->benchmark->memory_usage();
echo "<br>";
echo "browser : " . $this->agent->browser();
echo "<br>";
echo "browser Version: " . $this->agent->version();
echo "<br>";
echo "platform: " . $this->agent->platform();
echo "<br>";
echo "full_user_agent_string: " . $_SERVER['HTTP_USER_AGENT'];

?>

</div>
</div>
</div>
</body>
</html>