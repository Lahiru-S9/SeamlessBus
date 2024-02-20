<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/profile.css">
<div class="container">
    <img src="<?php echo URLROOT; ?>/img/avatar.jpg" alt="avatar Image" />
    <label for="avatar-upload">
        <span class="edit-avatar-button"><br> edit photo</span>
    </label>
    <input type="file" id="avatar-upload" accept="image/*">
</div>
    <h2>Profile Details</h2>
        <div class="profile-info">
            <div class="profile-item">
                <strong>Name:</strong>
                <?php echo $_SESSION['user_name']; ?>
            </div>
            <div class="profile-item">
                <strong>Email:</strong>
                <?php echo $_SESSION['user_email']; ?>
            </div>


<div class="container">
    <div class="profile">
    <div class="profile-editor">
    <h2>Edit Profile</h2>
   <button class="edit-avatar-button">Edit</button>
   
   <form>
        <label for="name">Name</label>
        <input type="text" id="name" name="name"><br>

        <label for="phone no">Phone no</label>
        <input type="text" id="phone no" name="phone no"><br>

        <label for="email">Email</label>
        <input type="email" id="email" name="email"><br>

        <label for="bus number">Bus number/s</label>
        <input type="text" id="bus number" name="bus number"><br>

        <div class="container">
            <h3>Change Password</h3>
    <form action="/action_page.php">
        <label for="usrname">Username</label>
        <input type="text" id="usrname" name="usrname" required><br>

        <label for="oldPassword">Old Password</label>
        <input type="password" id="oldPassword" name="oldPassword" placeholder="Enter the Old Password" required><br>

        <label for="newPassword">New Password</label>
        <input type="password" id="newPassword" name="newPassword" placeholder="Enter the New Password" required><br>

        <label for="confirmPassword">Confirm Password</label>
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Re-enter the New Password" required><br>

        <input type="submit" value="Submit">
    </form>
</div>

        
        
        <button type="submit" class='save-button'>SAVE</button>
    </form> 

   

    </div>
        
            
                 
            
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
