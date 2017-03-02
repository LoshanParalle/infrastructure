<!DOCTYPE html>
<html>
<head>
	<title>IG Home Page</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-theme.min.css') ?>">
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<style type="text/css">

body,html{
 height:100%;
}

.container{
 min-height:100%;
}

.footer{
 height:40px;
 margin-top:-40px;

</style>

</head>
<body>

<?php
$this->benchmark->mark('code_start');
// Some code happens here
?>

<div class="navbar navbar-default">
	<div class="container">
		<h2><a href="<?php echo base_url() ?>index.php/home/"><span class="glyphicon glyphicon-home"></span></a>&nbsp;IG Management System</h2>
		  <form action ="<?php echo base_url();?>index.php/login" method="POST" class="navbar-form navbar-left">
  <input type="submit" class="btn btn-danger" value="Logout" name="logout">
  </form>
	</div>
</div>

<!-- Trying out a new layout-->
<div class="container">

  <br>

<div class="btn-group btn-group-justified" role="group">
  <div class="btn-group" role="group">
    <a href="<?php echo base_url() ?>index.php/home/" class="btn btn-primary" role="button">Staff</a>
  </div>
  <div class="btn-group" role="group">
    <a href="<?php echo base_url() ?>index.php/emails/" class="btn btn-primary" role="button">Emails</a>
  </div>
  <div class="btn-group" role="group">
  <a href="<?php echo base_url() ?>index.php/department/" class="btn btn-primary" role="button">Departments</a>
  </div>
  <div class="btn-group" role="group">
  <a href="<?php echo base_url() ?>index.php/computers/" class="btn btn-primary" role="button">Computers</a>
  </div>
</div>