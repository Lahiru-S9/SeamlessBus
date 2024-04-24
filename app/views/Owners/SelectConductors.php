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
 <div class = "search-container">
    <input type="text" id="searchInput" onkeypress="filterConductors()" placeholder="Search for conductors...">

</div>
<script>
// JavaScript function to filter the conductor list based on search input
function filterConductors() {
    // Get the search input value
    var input = document.getElementById("searchInput");
    var filter = input.value.toUpperCase();

    // Get the list of conductor elements
    var conductorList = document.getElementById("conductor-list");
    var conductors = conductorList.getElementsByClassName("conductor");

    // Loop through all conductor elements, and hide those that don't match the search query
    for (var i = 0; i < conductors.length; i++) {
        var conductor = conductors[i];
        var name = conductor.getElementsByTagName("span")[0]; // Assuming the name is the first <span> element

        // If the name matches the search query, display the conductor, otherwise hide it
        if (name.innerHTML.toUpperCase().indexOf(filter) > -1) {
            conductor.style.display = "";
        } else {
            conductor.style.display = "none";
        }
    }
}
</script> 


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