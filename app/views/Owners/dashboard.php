<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/owners/dashboard.css">
<div class="container">
    <div class="dashboard-content">
        <h1 class="dashboard-title">What's on your mind?</h1>
        <p class="dashboard-description">Enhancing your Travel Experience</p>
        <?php flash('bus_added'); ?>
    </div>
    <div class="dashboard-actions">
        
        <a href="<?php echo URLROOT?>/Owners/selectConductors" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/cartoon_conductor.png" alt="QR">
            </div>
            <p class="action-label">Select Conductors</p>
        </a>

        <!-- Add more dashboard actions as needed -->
        <a href="<?php echo URLROOT?>/Owners/AddBuses" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/Routines.png" alt="QR">
            </div>
            <p class="action-label">Add Buses</p>
        </a>

        <!-- Add more dashboard actions as needed -->
        <a href="<?php echo URLROOT?>/Owners/profile" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/payment.png" alt="QR">
            </div>
            <p class="action-label">Profile info</p>
        </a>

        <!-- Add more dashboard actions as needed -->
        <a href="<?php echo URLROOT;?>/Owners/seeReports" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/abc.png" alt="QR">
            </div>
            <p class="action-label">See Reports</p>
        </a>
    

        <!--add more dashboard actions as needed -->
        <a href="<?php echo URLROOT?>/Owners/AddFeedback" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC ;">
                <img src="<?php echo URLROOT;?>/img/feedback 02.jpg" alt ="Feedback">
            </div>
            <p class="action-label">Add Feedback</p>
        </a>
    </div>

    <div class = "buses">
        <h2 class="dashboard-title">Your Buses</h2>
        <table>
            <tr>
                <th>Bus No</th>
                <th>bus_model</th>
                <th>seats</th>
                <th>permitid</th>
                <th>ownerid</th>
                <th>seats_per_row</th>
                <th>route</th>
                <th>status</th>
                <th>Actions</th>
            </tr>
            <?php 
                if(empty($data['buses'])){
                    echo "<h3>No buses found</h3>";
                }
                
                else{
            
                    foreach($data['buses'] as $bus) : ?>
                    <tr>
                        <td><?php echo $bus->bus_no; ?></td>
                        <td><?php echo $bus->bus_model; ?></td>
                        <td><?php echo $bus->seats; ?></td>
                        <td><?php echo $bus->permitid; ?></td>
                        <td><?php echo $bus->ownerid; ?></td>
                        <td><?php echo $bus->seats_per_row; ?></td>
                        <td><?php echo $bus->route_num; ?></td>
                        <td><?php echo $bus->status; ?></td>
                        <td> 
                            <form method="post" action="<?php echo URLROOT; ?>/Owners/dashboard">
                                <input type="hidden" name="bus_no" value="<?php echo $bus->bus_no; ?>">
                                <?php
                                // Conditional buttons based on status
                                    switch ($bus->status) {
                                        case "requested":
                                            echo '<input type="hidden" name="action" value="cancel">';
                                            echo '<button type="submit">Cancel</button>';
                                            break;
                                        case "accepted":
                                ?>
                                            <form method="post" action="<?php echo URLROOT; ?>/Owners/dashboard">
                                                <input type="hidden" name="action" value="quit">
                                                <button type="submit">Quit</button>
                                            </form>
                                            <form method="post" action="<?php echo URLROOT; ?>/Owners/dashboard">
                                                <input type="hidden" name="bus_no" value="<?php echo $bus->bus_no; ?>">
                                                <input type="hidden" name="action" value="take_break">
                                                <button type="submit">Take a Break</button>
                                            </form>
                                <?php
                                                break;
                                        case "paused":
                                            echo '<input type="hidden" name="action" value="quit">';
                                            echo '<button type="submit">Quit</button>';
                                            break;
                                        case "on a break":
                                            echo '<input type="hidden" name="action" value="resume">';
                                            echo '<button type="submit">Resume</button>';
                                            break;
                                        case "declined":
                                        case null:
                                            echo '<input type="hidden" name="action" value="request">';
                                            echo '<button type="submit">Request</button>';
                                            break;
                                        default:
                                            // Default action
                                            break;
                                    }
                                ?>
                            </form>
                        </td>
                    </tr>
            <?php
                    endforeach;}
            ?>
            
            
        </table>

        
        
    </div>

    <div class="footer">
            <img src="<?php echo URLROOT; ?>/img/logo_bw.png">
            <div class="footer-subtext">
                Seamless Bus
            </div>
            <div class="footer-text">
                Enhancing your Travel Experience
            </div>

            <div class="social-media-icons">
                <a href="#" class="social-media-icon">
                    <img src="<?php echo URLROOT; ?>/img/Facebook.png" alt="Facebook">
                </a>
                <a href="#" class="social-media-icon">
                    <img src="<?php echo URLROOT; ?>/img/Twitter.png" alt="Twitter">
                </a>
                <a href="#" class="social-media-icon">
                    <img src="<?php echo URLROOT; ?>/img/Instagram.png" alt="Instagram">
                </a>
            </div>
            
            <div class="footer-subtext">
                Developed by CS group 23
            </div>
    </div>

</div>




<?php require APPROOT . '/views/inc/footer.php'; ?>
