<?php if (@$notifySucces != "") { ?>
    <div class="notify notify--success mb-20"><?= $notifySucces ?></div>
<?php } else if (@$notifyError != "") { ?>
    <div class="notify notify--error mb-20"><?= $notifyError ?></div>
<?php } else if (@$notifyInfo != "") { ?>
    <div class="notify notify--update mb-20"><?= $notifyInfo ?></div>
<?php } ?>