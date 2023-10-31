<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/pages/userSelect.css">

<div class="container-user-select">
    <div class="card-user-select">
        <div class="card-header-user-select">
            <h2 class="text-center">Choose Your Role</h2>
        </div>
        <div class="card-body-user-select">
            <div class="form-group-user-select">
                <button onclick="window.location.href = '<?php echo URLROOT; ?>/GPassengers/register';" class="btn btn-primary btn-user-select btn-block">Passenger</button>
            </div>
            <div class="form-group-user-select">
                <button onclick="window.location.href = '<?php echo URLROOT; ?>/users/register';" class="btn btn-primary btn-user-select btn-block">Conductor</button>
            </div>
            <div class="form-group-user-select">
                <button onclick="window.location.href = '<?php echo URLROOT; ?>/users/register';" class="btn btn-primary btn-user-select btn-block">Scheduler</button>
            </div>
            <div class="form-group-user-select">
                <button onclick="window.location.href = '<?php echo URLROOT; ?>/Owners/register';" class="btn btn-primary btn-user-select btn-block">Owner</button>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

