<div class="container">
<?php 
use App\Helpers\HelperTable;
$session = session();
if($session->get('loggedIn')){
        echo "<h1>Welcome home ".$session->get('firstname');
        echo '<div class="col-md-12 mx-auto">
                <img src="assets\images\heroImageWithText.png" style="width:100%;">
            </div>';
}
      else
        redirect()->to(base_url() + '/')


?>
</div>