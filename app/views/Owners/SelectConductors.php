<?php
// Dummy data for conductors
$conductors = [
    [
        'name' => 'John Doe',
        'age' => 30,
        'experience' => '5 years',
    ],
    [
        'name' => 'Jane Smith',
        'age' => 35,
        'experience' => '8 years',
    ],
    // Add more dummy data as needed
];
?>

<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Owners/SelectConductors.css">
<div class="container">
    <form action="<?php echo URLROOT; ?>/Owners/SelectConductors" method="post">
        <h1>Assign Conductor for Buses</h1>
        <main>
            <div class="search-container">
                <input type="text" placeholder="Search for conductor...">
                <button id="search-btn">Search</button>
            </div>
            <div id="conductor-list">
                <?php foreach ($conductors as $conductor) : ?>
                    <div class="conductor">
                        <span class="conductor-name"><?php echo $conductor['name']; ?></span><br>
                        <span class="conductor-age"><?php echo $conductor['age']; ?> years old</span><br>
                        <span class="conductor-exp"><?php echo $conductor['experience']; ?> of experience</span>
                        <button class="assign-btn">Assign</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
    </form>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
