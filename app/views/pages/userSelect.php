<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container-user-select">
    <div class="card-user-select">
        <div class="card-header-user-select">
            <h2 class="text-center">Choose Your Role</h2>
        </div>
        <div class="card-body-user-select">
            <div class="form-group-user-select">
                <button onclick="window.location.href = '<?php echo URLROOT; ?>/RegPassengers/login';" class="btn btn-primary btn-user-select btn-block">Registered Passenger</button>
            </div>
            <div class="form-group-user-select">
                <button onclick="window.location.href = '<?php echo URLROOT; ?>/conductor/login';" class="btn btn-primary btn-user-select btn-block">Conductor</button>
            </div>
            <div class="form-group-user-select">
                <button onclick="window.location.href = '<?php echo URLROOT; ?>/scheduler/login';" class="btn btn-primary btn-user-select btn-block">Scheduler</button>
            </div>
            <div class="form-group-user-select">
                <button onclick="window.location.href = '<?php echo URLROOT; ?>/owner/login';" class="btn btn-primary btn-user-select btn-block">Owner</button>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

