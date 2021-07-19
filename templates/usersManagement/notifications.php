<?php if(!empty($notificationData)){ ?>
    <div class="card border-left-<?=end($notificationData)?> shadow h-100 py-2 mb-3 notificationCard animate__animated animate__bounceInLeft">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-<?=end($notificationData)?> text-uppercase mb-1">
                        POWIADOMIENIE</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?=reset($notificationData)?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-info-circle fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
<?php } ?>