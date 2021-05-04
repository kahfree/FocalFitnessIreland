<div class="container">
    <h1 class="text-center">All Clients</h1>
    <div class="row">
                <?php if (session()->get('success')): ?>
                    <div class="alert alert-success col-md-6 offset-3 text-center" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->get('unsuccessful')): ?>
                    <div class="alert alert-danger col-md-6 offset-3 text-center" role="alert">
                        <?= session()->get('unsuccessful') ?>
                    </div>
                <?php endif; ?>
            <?php
                foreach($clients->getResult() as $row)
                {
                    echo "<div class='col-md-6 mb-2'>";
                    echo '<div class="border p-3 rounded">';
                    echo "<h3><span class='font-weight-bold'>ID: </span> ".$row->ClientID."</h3>";
                    echo "<h3><span class='font-weight-bold'>Name: </span> ".$row->FirstName.' '.$row->LastName."</h3>";
                    echo '<p class="d-inline"><span class="font-weight-bold">Email: </span> '.$row->Email.' </p>';
                    echo '<p>';
                    echo '<a class ="workout-link" href="'.base_url().'/viewClientPosts/'.$row->ClientID.'">';
                    echo '<input type="button" class="btn btn-primary m-1" value="View Posts">';
                    echo '</a>';
                    echo '</p>';
                    echo '</div>';
                    echo '</div>';
                    

                }
            ?>
        </div>
</div> 