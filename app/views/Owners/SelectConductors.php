<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/owners/SelectConductors.css">


<!-- HTML to display bus list -->
<div id="bus-list">
    <?php foreach ($data['buses'] as $bus): ?>
        <div class="bus bus-<?php echo str_replace(' ', '_', $bus->bus_no); ?>">
            <span class="bus-number"><?php echo $bus->bus_no; ?></span><br>
            <span class="currant-conductor">currant conductor: <?php echo $bus->name ?? 'not assigned'; ?></span><br>
            <span class="bus-model">Bus Model: <?php echo $bus->bus_model; ?></span><br>
            <span class="bus-route">Bus Route: <?php echo $bus->route_num; ?></span>
            <button class="select-btn" onclick="showConductors('<?php echo $bus->bus_no;?>')">Select</button>
            <button class="deselect-btn" onclick="deSelectConductors()">Deselect</button>
        </div>
    <?php endforeach; ?>
</div>

<!-- HTML to display conductor list -->
<div id="conductor-list" style="display:none;">
    <!-- Conductor list will be dynamically populated by JavaScript -->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    var conductors = <?php echo json_encode($data['conductors']); ?>;
</script>

<script src="<?php echo URLROOT; ?>/js/owners/selectConductors.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>