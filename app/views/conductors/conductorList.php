<!-- app/views/conductors/conductorList.php -->

<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/conductors/conductorList.css">

<div class="container">
    <h1>Conductor List</h1>

    <!-- Search Bar -->
    <form id="conductor-search-form">
        <input type="text" id="conductor-search" placeholder="Search by name">
        <button type="button" onclick="searchConductors()">Search</button>
    </form>

    <div class="conductor-list">
        <?php foreach ($data['conductors'] as $conductor) : ?>
            <div class="conductor-item">
                <img src="<?php echo $conductor->profile_image; ?>" alt="Conductor Image">
                <h2><?php echo $conductor->name; ?></h2>
                <p>Mobile No: <?php echo $conductor->mobile; ?></p>
                <p>Address: <?php echo $conductor->address; ?></p>
                <button class="select-btn" data-conductor-id="<?php echo $conductor->id; ?>">Select</button>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="<?php echo URLROOT; ?>/js/conductors/conductorList.js"></script>
<script>
    function searchConductors() {
        // Implement search logic here
        var searchInput = document.getElementById('conductor-search').value.toLowerCase();
        var conductorItems = document.querySelectorAll('.conductor-item');

        conductorItems.forEach(function (item) {
            var conductorName = item.querySelector('h2').innerText.toLowerCase();

            if (conductorName.includes(searchInput)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>
