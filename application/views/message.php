<?php if ($this->session->has_userdata('error')) { ?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
<i class="icon fa fa-check"></i><?php $this->session->flashdata('error'); ?>
</div>
<?php } ?>