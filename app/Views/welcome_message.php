<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h3>Offer Form</h3>
    <?php 
    $session = \Config\Services::session();
    if ($session->getFlashdata('success')) {
    ?>
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong><?php echo $session->getFlashdata('success'); ?></strong>
        </div>
    <?php } ?>

    <?php $validation = \Config\Services::validation(); ?>
    <form action="<?php echo base_url(); ?>offer/store" method="post">
      <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo set_value('title') ?>">
        <!-- Error -->
        <?php if($validation->getError('title')) {?>
            <div class='alert alert-danger mt-2'>
              <?php echo $error = $validation->getError('title'); ?>
            </div>
        <?php }?>
      </div>
       
      <div class="form-group">
        <label>Coupon</label>
        <input type="text" name="coupon" class="form-control" value="<?php echo set_value('coupon') ?>">
        <!-- Error -->
        <?php if($validation->getError('coupon')) {?>
            <div class='alert alert-danger mt-2'>
              <?php echo $error = $validation->getError('coupon'); ?>
            </div>
        <?php }?>
      </div>
      <div class="form-group">
        <label>Expiry Date</label>
        <input type="date" name="expiry_date" class="form-control" value="<?php echo set_value('expiry_date') ?>">
        <!-- Error -->
        <?php if($validation->getError('expiry_date')) {?>
            <div class='alert alert-danger mt-2'>
              <?php echo $error = $validation->getError('expiry_date'); ?>
            </div>
        <?php }?>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
      </div>
    </form>
</div>

</body>
</html>
