<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Owners/SelectConductor.css">

<div class="container">
    <img src="<?php echo URLROOT; ?>/img/selectconductor.jpg" alt="Background Image" />

    <div class="content">
        <div class="login-title">Select Conductor</div>
        <div class="login-subtitle">Choose a conductor for your bus</div>

        <!-- Search Bar -->
        <input type="text" id="conductor-search" placeholder="Search Conductors">

        <!-- Conductor List -->
        <div class="conductor-list">
            <!-- Individual Conductor -->
            <div class="conductor-item" onclick="selectConductor('ABC')">
                <img src="<?php echo URLROOT; ?>/img/conductor.jpg" alt="Conductor Image">
                <p>Conductor Name 1</p>
                <button>Select</button>
            </div>
            <div class="conductor-item" onclick="selectConductor('DEF')">
                <img src="<?php echo URLROOT; ?>/img/conductor.jpg" alt="Conductor Image">
                <p>Conductor Name 2</p>
                <button>Select</button>
            </div>
            <div class="conductor-item" onclick="selectConductor('GHI')">
                <img src="<?php echo URLROOT; ?>/img/conductor.jpg" alt="Conductor Image">
                <p>Conductor Name 3</p>
                <button>Select</button>
            </div>
            <div class="conductor-item" onclick="selectConductor('JKL')">
                <img src="<?php echo URLROOT; ?>/img/conductor.jpg" alt="Conductor Image">
                <p>Conductor Name 4</p>
                <button>Select</button>
            </div>




            

        </div>

        <!-- Selected Conductor Details -->
        <div class="selected-conductor-details">
            <h2>Selected Conductor</h2>
            <img src="<?php echo URLROOT; ?>/img/selected_conductor.jpg" alt="Selected Conductor Image">
            <p id="selected-conductor-name">Conductor Name: ABC</p>
            <p id="selected-conductor-id">Conductor ID: CON123</p>
            <p id="selected-conductor-contact">Contact: +123456789</p>
        </div>
    </div>
</div>

<script>
    function selectConductor(conductorName) {
        // Display an alert with the selected conductor's name
        alert('Selected Conductor: ' + conductorName);

        // You can also update the selected conductor details section dynamically
        document.getElementById('selected-conductor-name').innerText = 'Conductor Name: ' + conductorName;
        // Update other details accordingly
    }
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>
