<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/Owners/AddFeedback.css">
<div class="container">
<img src="<?php echo URLROOT; ?>/img/fb.jpg" alt="feedback Image" />




        <div class="feedback">
        <form action="<?php echo URLROOT; ?>/Owners/AddFeedback" method="post">
       <h2>FEEDBACK FOR US</h2><br>
        <p>We would like your feedback to improve our website.</p><br>
        <?php flash('feedback_success'); ?>
        <?php flash('feedback_error'); ?>
        <div class="emoticons">
            <div class="heartface">
            <input type="radio" id="feedback" name="feedback" value="Very Happy">
  <label for="veryhappy"><p style="font-size:30px">&#128525;</p></label>
               </div>

            <div class="smileface">
            <input type="radio" id="feedback" name="feedback" value="Happy">
  <label for="happy"><p style="font-size:30px">&#128516;</p></label>
             </div>

            <div class="NEUTRALFACE">
            <input type="radio" id="feedback" name="feedback" value="Neutral">
  <label for="neutralface"><p style="font-size:30px">&#128528;</p></label>
               
            </div>
            <div class="EXPRESSIONLESSFACE">
            <input type="radio" id="feedback" name="feedback" value="Expressionless">
  <label for="expressionless"><p style="font-size:30px">&#128529;</p></label>
               
             </div>
            <div class="ANGRYFACE">
            <input type="radio" id="feedback" name="feedback" value="Angry">
  <label for="angry"><p style="font-size:30px">&#128544;</p></label>
                
           </div>
          
        </div>
        
       <br> <label for="feedback-category">What is your opinion of this page?</label>
        <select id="feedback-category" name ="feedback-category">
            <option value="suggestion">Suggestion</option>
            <option value="not-right">Something is not quite right</option>
            <option value="compliment">Compliment</option>
        </select>
        <br>
        <textarea id="feedback-text" name="feeback-text" placeholder="I cannot find the contact page."></textarea>
        <button id="send-feedback">Send</button>
        </form>    
    </div>

   



</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>

    