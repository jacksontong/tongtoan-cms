<!DOCTYPE html>
<html lang="en">
<head>
<meta charset='utf-8' />
<link href="<?php echo site_url('public/admin/css/style2.css') ?>" rel="stylesheet" type="text/css" />
<title><?php echo $titlePage; ?></title>
</head>

<body>
	<?php $this->load->view($module.'/top'); ?>
    <?php $this->load->view($module.'/menu'); ?>
    <div id="main">
    	
        <div id="info">
	     <?php $this->load->view($loadPage); ?>
        </div>
    </div>
    <?php $this->load->view($module.'/bottom'); ?>
</body>
</html>
