<?php if (@$notifySucces != "") { ?>
    <div class="info-success  mb-20"><?= $notifySucces ?></div>
<?php } else if (@$notifyError != "") { ?>
    <div class="error mb-20"><?= $notifyError ?></div>
<?php } else if (@$notifyInfo != "") { ?>
    <div class="info-notification mb-20"><?= $notifyInfo ?></div>
<?php } ?>