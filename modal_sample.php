     <!--modal-->
        <!-- Modal -->
<div id="myModal<?php echo $id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Book Information</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
                    <label >ISBN</label>
                    <label ><?php echo $isbn ?></label>
                  </div>
                  <div class="form-group">
                    <label>Title :</label>
                    <label><?php echo $title; ?></label>
                  </div>
                   <div class="form-group">
                    <label>Author :</label>
                    <label><?php echo $author; ?></label>
                    </div>
                    <div class="form-group">
                     <label>Publisher Name :</label>
                    <label><?php echo $publishername; ?></label>
                     </div>
                     <div class="form-group">
                     <label>Place of Publication :</label>
                     <label><?php echo $placeofpublication; ?></label>
                     </div>
 
                    <div class="form-group">
                         <label>Year Published</label>
                    <label><?php echo $copy; ?></label>
                        </div>
          <?php 
		if($status == "E"){?>
                    <div class="form-group">
                    <label>Copies :</label>
                    <label><?php echo $copies; ?></label>
                    </div>
                    <div class="form-group">
                     <label>Shelf No :</label>
                    <label><?php echo $shelf; ?></label>
                    </div>
                            <div class="form-group">
                    <label>Copies Borrowed :</label>
                     <label><?php echo $availability; ?></label>
                    </div>
                   
                  </div>
		<div class="modal-footer bg-blue">Existing</div>
		<?php }elseif($status=="L"){
		 ?></div><div class="modal-footer bg-red">Lost</div><?php
		}else{?>
		</div><div class="modal-footer bg-green">Subject For Replacement</div><?php
		}
		?>
        
      
    </div>

  </div>
</div>
            
            <!--./modal-->