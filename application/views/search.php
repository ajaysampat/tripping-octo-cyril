<?php error_reporting(E_ERROR | E_PARSE ); ?>

<!-- SEARCH FORM-->
<div class="row">
    <?php echo form_open(); ?>
    <center>
    <form action ="search.php" method="post" class="navbar-search pull-left">
    <input type="text" class="search-query" name="term" placeholder="Flickr Photo Search">
    <button class="btn">Go</button>
    </form>
    </center>
</div>        
        

<!-- Dynamically Generate Modal using JS -->
<script type="text/javascript">
   $(document).on("click", ".open-AddBookDialog", function () {
     var myPage = $(this).data('page');
     var myURL = $(this).data('url');
     var myOwner = $(this).data('owner');
     var myID = $(this).data('id');
     
     $(".modal-body #page").val( myPage );
     $(".modal-body #url").val( myURL );
     $(".modal-body #owner").val( myOwner );
     $(".modal-body #ID").val( myID );
     
    $('#addBookDialog').modal('show');
   });
</script>

<div class="modal hide fade" id="addBookDialog">
 <div class="modal-header">
    <button class="close" data-dismiss="modal">X</button>
    <h3>Photo Details</h3>
  </div>
    <div class="modal-body">
        <p>Flickr Page: 
        <input type="text" name="page" id="page" size="1000"/>
        </p>
        <p>Image URL: 
        <input type="text" name="url" id="url" value=""/>
        </p>
        <p>Photo Owner: 
        <input type="text" name="owner" id="owner" value=""/>
        </p>
        <p>Photo ID: 
        <input type="text" name="ID" id="ID" value=""/>
        </p>
    </div>
</div>

<!--# The View for displaying results-->
<div class="hero-unit">
<?php
require_once('flickrsearch.php'); 

$term = $_POST['term'];
$Flickr = new Flickr; 
$data = $Flickr->search($term); 
echo'<div class="alert alert-info">';
echo 'Photo\'s that match your tag:  <b>' .$term. '</b>' ;
echo '</div>';

foreach($data['photos']['photo'] as $photo) { 
 
// Image URL:  http://farm{farm-id}.static.flickr.com/{server-id}/{id}_{secret}.jpg     
echo '<a data-target=#addBookDialog data-toggle="modal" data-page="http://www.flickr.com/photos/' . $photo["owner"] . '/' . $photo["id"] . '/" data-url="http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '.jpg" data-owner="'. $photo["owner"] .'" data-id="'. $photo["id"] .'" data-toggle="modal" class="open-AddBookDialog btn" href="#addBookDialog"><img  src="http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '.jpg" border="1" width="150" height="150" /></a>';

}
    ?>

    <div class="pagination">
                   <center><ul>
                    <li><a href="#">Prev</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">Next</a></li>
                  </ul></center>             
   </div></div>


