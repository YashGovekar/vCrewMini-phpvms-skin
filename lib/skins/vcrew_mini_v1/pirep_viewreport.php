<?php
if(isset($_POST['comment'])){
    $comment = $_POST['comment'];
    $pirepid = $_POST['pirepid'];
    $pilotid = $_POST['pilotid'];
    
    PIREPData::addComment($pirepid, $pilotid, $comment);
}
?>
<div class="row">
    <div class="col s12 m6 l6">
      <div id="swipeable-tabs" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="header">PIREP DETAILS : <?php echo $pirep->code.' '.$pirep->flightnum ?></h4>
          <div class="row">
            <div class="col s12">
              <ul id="tabs-swipe-demo" class="tabs">
                <li class="tab col m6"><a href="#test-swipe-1">Logs</a></li>
                <li class="tab col m6"><a class="active" href="#test-swipe-2">Details</a></li>
              </ul>
              <div id="test-swipe-1" class="col s12 carousel carousel-item black-text">
                  <br><br>
                  <div style="max-height:300px; overflow:auto;"  class="container">
                            <?php
                            if($pirep->log != '')   {
                            ?>
                                <p id="log" style="display: none;">
                            <?php
                            }
                            else    {
                                echo '<p>';
                            }
                            ?>
                <div>
                    <?php
                    # Simple, each line of the log ends with *
                    # Just explode and loop.
                    $log = explode('*', $pirep->log);
                    foreach($log as $line)  {
                        echo $line .'<br />';
                    }
                    ?>
            </div>
                  </div>
                  
            <div id="test-swipe-2" class="col s12 carousel carousel-item black-text">
              <div class="container">
                    <br><br>
                        <div class="row">
                                 
                                <div class="col s12 m6 l6">
                                    <p><b>Pilot</b>: 
                                        <?php echo $pirep->firstname.' '.$pirep->lastname;?><br><br>
                                        <b>Departure</b> : <?php echo $pirep->depicao;?><br><br>
                                        <b>Arrival</b> : <?php echo $pirep->arricao;?><br><br>       
                                        <b>Aircraft</b> : <?php echo $pirep->aircraft;?><br><br>
                                        <b>Flight Time</b> :   <?php echo $pirep->flighttime;?> hrs<br><br>
                                        <b>Gross Revenue</b> : <?php echo FinanceData::FormatMoney($pirep->load * $pirep->price);?><br><br>
                                    </p>
                                </div>
                                <div class="col s12 m6 l6">
                                    <p><b>Rank</b>: 
                                        <?php echo Auth::$userinfo->ryash?><br><br>
                                        <b>Landing Rate:</b> : <?php echo $pirep->landingrate;?> FPM<br><br>
                                        <b>PIREP Filed</b> : <?php echo date(DATE_FORMAT, $pirep->submitdate); ?> <br><br>
                                        <b>Last Modified</b> : <?php echo date(DATE_FORMAT, $pirep->modifieddate); ?> <br><br>
                                        <b>Distance </b>: <?php echo $pirep->distance;?> nm<br><br>
                                        <b>Fuel Cost </b>: <?php echo FinanceData::FormatMoney($pirep->fuelused * $pirep->fuelunitcost);?>
                                    </p>
                                </div>
                    </div>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      <div class="card ">
                <div class="card-content black-text">
                     <span class="card-title">Comments</span>
                    <div id="comments" class="block-content">
                                   
                                    
                <?php
                    $pirepid = $pirep->pirepid;
                    $comments = PIREPData::GetComments($pirepid);
                    
                    if($comments)   {
                    echo '
                        <table class="table table-responsive table-hover table-striped">
                        <thead>
                            <tr style="text-align:center">
                                <th>Commenter</th>
                                <th style="text-align:left">Comment</th>
                            </tr>
                        </thead>
                        <tbody>';
                        foreach($comments as $comment)  {
                        ?> 
                            <tr style="text-align:center">
                                <td ><?php echo $comment->firstname . ' ' .$comment->lastname?></td>
                                <td><?php echo $comment->comment?></td>
                            </tr>
                        <?php
                        }
                        echo '
                        </tbody>
                        </table> ';
                    }
                    ?>
                    <br>
                    <?php 
                     $pid = $pirep->pilotid;
                    $pilotaid = Auth::$userinfo->pilotid;
                    if ( $pilotaid == $pid ) { 
                        ?>
                    <form role="form" id="comment-form" method="post">
                    <div class="alert m-alert m-alert--default" role="alert">
                        <div class="input-field col s12">
                            
                            <textarea name="comment" class="materialize-textarea" rows="3" required></textarea>
                            <label for="exampleTextarea">Add Comment</label>
                        </div>
                            <input type="hidden" name="action" value="addcomment">
                            <input type="hidden" name="pirepid" value="<?php echo $pirep->pirepid;?>">
                            <input type="hidden" name="pilotid" value="<?php echo Auth::$userinfo->pilotid;?>">
                            <div class="form-group m-form__group">
                               <button id="submitcomm" class="btn btn-success">Add Comment</button>
                            </div>
                     </div>
                        <?php 
                    } 
                    else { 
                        ?>
                        <h5>This PIREP does not belong to you, hence you cannot comment!</h5>
                        <?php 
                    } 
                    ?>
                    </form>
                </div>
          </div>
        </div>
</div>
    <div class="col s12 m6 l6">
          <div class="card ">
                <div class="card-content black-text">
                    
                      <span class="card-title">Route Details</span>
                      <br>
                    <textarea class="materialize-textarea" readonly ><?php echo $pirep->route ?></textarea>
                      <br><br>
                </div>
                <div id="gmap_basic" class="gmaps"></div>        
                <div id="routemap" style="width: 100%;height:600px"></div>
          </div>
    </div>
     <script>
         
                                        $(document).ready(function(){
  $('#submitcomm').on('click',function(e) { 
      //Don't foget to change the id form
  $.ajax({
      url: '<?php echo url('Pireps/view/'.$pirep->pirepid) ?>', //===PHP file name====
      data:$('#comment-form').serialize(),
      type:'POST',
      success:function(){
        //Success Message == 'Title', 'Message body', Last one leave as it is
	    swal("Comment Posted!", "Comment has been Posted!", "success");
	    $('#comments').load(document.URL + ' #comments');
      }
    });
     e.preventDefault();//This is to Avoid Page Refresh and Fire the Event "Click"
  });
});
                                    </script>
    <script>
$(document).ready(function(){
   $('#dash').removeClass('active');
    $('#pireps').addClass('active');
});
</script>