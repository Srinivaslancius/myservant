<?php include_once 'admin_includes/main_header.php'; ?>

<?php  
 if (!isset($_POST['submit']))  {
      //If fail
        echo "fail";
    } else {
    //If success
    $id=1;
    
    $inst_link = $_POST['inst_link'];
    $fb_link = $_POST['fb_link'];
    $twitter_link = $_POST['twitter_link'];
    $gplus_link = $_POST['gplus_link'];    

        $sql = "UPDATE `food_site_settings` SET fb_link='$fb_link', twitter_link='$twitter_link', gplus_link='$gplus_link',inst_link='$inst_link' WHERE id = '$id' ";
            if($conn->query($sql) === TRUE){
               echo "<script type='text/javascript'>window.location='social_networks_links.php?msg=success'</script>";
            } else {
               echo "<script type='text/javascript'>window.location='social_networks_links.php?msg=fail'</script>";
            }
            //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
       
    
}
?>

      <div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Social Network Links</h3>
          </div>
          <div class="panel-body">            
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="post" enctype="multipart/form-data">
                  <?php $getSiteSettings = getAllDataWhere('food_site_settings','id','1'); 
                  $getSiteSettingsData = $getSiteSettings->fetch_assoc(); ?>
      
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Facebook Link</label>
                    <input type="url" name="fb_link" class="form-control" id="form-control-2" placeholder="Facebook Link" data-error="Please enter a valid Facebook Link." value="<?php echo $getSiteSettingsData['fb_link'];?>" required>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Twitter Link</label>
                    <input type="url" name="twitter_link" class="form-control" id="form-control-2" placeholder="Instagram Link" data-error="Please enter a valid Twitter Link." value="<?php echo $getSiteSettingsData['twitter_link'];?>" required>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Instagram Link</label>
                    <input type="url" name="inst_link" class="form-control" id="form-control-2" placeholder="Instagram Link" data-error="Please enter a valid Instagram Link." value="<?php echo $getSiteSettingsData['inst_link'];?>" required>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">G+ Link</label>
                    <input type="url" name="gplus_link" class="form-control" id="form-control-2" placeholder="G+ Link" data-error="Please enter a valid G+ Link." value="<?php echo $getSiteSettingsData['gplus_link'];?>" required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">Submit</button>
                </form>
              </div>
            </div>
            <hr>           
          </div>
        </div>
      </div>
  
<?php include_once 'admin_includes/footer.php'; ?>