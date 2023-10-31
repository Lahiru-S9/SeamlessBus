<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/Owners/bankDetails.css">

<div class="container">
    <img src="<?php echo URLROOT; ?>/img/bus-56580071280-1.png" alt="Background Image" />

    <div class="content">
        <div class="login-title">Bank Details</div>
        <div class="login-subtitle">Enter the bank deatils</div>
        
        <form action="<?php echo URLROOT; ?>/Owners/bankDetails" method="POST">
            <div class="form-group">
                <label for="bank_name">Bank Name:  <sup>*</sup></label>
                <input type="text" class="custom-input <?php echo (!empty($data['bank_details_err'])) ? 'is-invalid' : ''; ?>" name="bank_deatils" value="<?php echo $data['bank_details']; ?>">
                
            </div>
            <div class="form-group">
                <label for="account_no">Account No: <sup>*</sup></label>
                <input type="text" class="custom-input <?php echo (!empty($data['account_no_err'])) ? 'is-invalid' : ''; ?>" name="account_no" value="<?php echo $data['account_no']; ?>">
                
            </div>
            <div class="form-group">
                <label for="bank_branch">Bank Branch: <sup>*</sup></label>
                <input type="text" class="custom-input <?php echo (!empty($data['bank_branch_err'])) ? 'is-invalid' : ''; ?>" name="bank_branch" value="<?php echo $data['bank_branch']; ?>">
                
            </div>
            <div class="form-group">
                <label for="account_holder_name">Account Holder Name: <sup>*</sup></label>
                <input type="text" class="custom-input <?php echo (!empty($data['account_holder_name_err'])) ? 'is-invalid' : ''; ?>" name="account_holder_name" value="<?php echo $data['account_holder_name']; ?>">
                
            </div>

            <div class="form-group">
                
                <input type="submit" value="Add Bank Details" class="btn btn-submit">
            </div>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
