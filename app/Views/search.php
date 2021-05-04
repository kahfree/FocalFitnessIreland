<div class="container">
  <div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
    <h1 class="col-12 text-center">Search</h1>
    <h3 class="col-12 text-center"><small>Want to know if we have a specific exercise in our database? Search for it here!</small></h3>
    <form class="d-flex input-group w-50 offset-3 mb-4 mt-4" action="<?php echo base_url();?>/search" method="post">
        <input
          type="search"
          class="form-control"
          placeholder="Exercise name"
          aria-label="Search"
          name="key"
          value="<?= set_value('key',$key) ?>"
        />
        <button
          class="btn btn-outline-primary"
          type="submit"
          data-mdb-ripple-color="dark"
        >
          Search
        </button>
      </form>
      <table class="table table-hover">
      <thead>
        <tr>
          <th>Exercise ID</th>
          <th>Exercise Name</th>
          <th>Gif Path</th>
          <th>Needs Equipment</th>
        </tr>
      </thead>
      <tbody id="output">
        <?php 
          foreach($result as $exercise){
            echo "<tr>
                      <td>".$exercise->ExerciseID."</td>
                      <td>".$exercise->ExName."</td>
                      <td>".$exercise->ExGifPath."</td>
                      <td>".$exercise->ExNeedsEquipment."</td>
                  </tr>";
          }
        ?>
      </tbody>
    </table>
    </div>
    <div class="col-sm-3">
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#search").keyup(function(){
      var searchkey = $('#search').val();
      console.log(searchkey);
      $.ajax({
        type:'POST',
        url:window.location.href,
        data:{
          name: searchkey,
        },
        success:function(data){
          $("#output").html(data).show();
        }
      });
    });
  });

 // console.log(window.location.href);
</script>
