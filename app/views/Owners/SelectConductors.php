<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Owners/selectConductor.css">

<div class="container">
    <h1>Select Conductor</h1>
    <div class="search-bar">
        <input type="text" id="conductor-search" placeholder="Search for a conductor...">
    </div>
    <div class="conductor-list">
        <?php foreach ($data['conductors'] as $conductor) : ?>
            <div class="conductor-item">
                <img src="<?php echo $conductor->profile_image; ?>" alt="Conductor Image">
                <h2><?php echo $conductor->name; ?></h2>
                <p>Mobile: <?php echo $conductor->mobile; ?></p>
                <p>Address: <?php echo $conductor->address; ?></p>
                <button class="select-btn" data-conductor-id="<?php echo $conductor->id; ?>">Select</button>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="<?php echo URLROOT; ?>/js/Owners/selectConductors.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>
