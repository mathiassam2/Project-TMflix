<?php 
require_once("includes/classes/component.php");
require_once("includes/classes/Operation.php");
require_once("includes/adminNavBar.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Video</title>

    <script src="https://kit.fontawesome.com/9dc5974ddc.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/style/adminStyle.css">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="wrapper">
    
    
    <main class="mainContainer">
        <div class="container text-center">
            

            <div class="d-flex justify-content-center">
                <form action="" method="post" class="w-50">
                    <div class="d-flex justify-content-center">
                        <div class="row py-2">
                            <div class="col colId">
                                <?php inputElement("<i class='fas fa-id-badge'></i>", "ID", "videoid", setIdVideo()); ?>
                            </div>

                            <div class="col">
                                <?php inputElement("<i class='fas fa-tags'></i>", "Video Title", "title", ""); ?>
                            </div>

                            <div class="col2">
                                <a class="btn btn-lg btn-dangers pop" data-toggle="popover" data-htmlcontent='#myPopoverContent'><i class="fas fa-info"></i>
                                </a>

                                <div id="myPopoverContent" hidden>
                                  <strong>Category IDs</strong>
                                  <ul>
                                    <li>1 - Action & Adventure</li>
                                    <li>2 - Classic</li>
                                    <li>3 - Comedies</li>
                                    <li>4 - Dramas</li>
                                    <li>5 - Horror</li>
                                    <li>6 - Romantic</li>
                                    <li>7 - Sci-Fi & Fantasy</li>
                                    <li>8 - Sports</li>
                                    <li>9 - Thrillers</li>
                                    <li>10 - Documentaries</li>
                                    <li>12 - Teen</li>
                                    <li>13 - Children & Family</li>
                                    <li>14 - Anime</li>
                                    <li>15 - Independent</li>
                                    <li>16 - Foreign</li>
                                    <li>17 - Music</li>
                                    <li>18 - Christmas</li>
                                    <li>19 - Others</li>
                                    <li>20 - Cartoon</li>
                                  </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="py-2">
                        <?php inputElement("<i class=\"fas fa-film\"></i>", "Description", "description", ""); ?>
                    </div>

                    <div class="pt-2">
                        <?php inputCategory("<i class=\"fas fa-image\"></i>", "entities/videos/", "filePath", "") ?>
                    </div>

                    <div class="d-flex justify-content-center">
                        <div class="row py-0">
                            <div class="col">
                                <?php inputCategory("<i class=\"fas fa-user-tie\"></i>", "isMovie (1/0)", "isMovie", "") ?>
                            </div>

                            <div class="col">
                                <?php inputCategory("<i class=\"fas fa-user-friends\"></i>", "Release Date", "releaseDate", "") ?>
                            </div>
                        </div>
                    </div>
                    

                    

                    <div class="py-0">
                        <?php inputCategory("<i class=\"fas fa-user-friends\"></i>", "Duration", "duration", "") ?>
                    </div>

                    <div class="py-0">
                        <?php inputCategory("<i class=\"fas fa-user-friends\"></i>", "Series ID", "seriesVideoId", "") ?>
                    </div>

                    <div class="py-0">
                        <?php inputCategory("<i class=\"fas fa-user-friends\"></i>", "Season", "season", "") ?>
                    </div>

                    <div class="pb-2">
                        <?php inputCategory("<i class=\"fas fa-video\"></i>", "Episode", "episode", "") ?>
                    </div>

                    <div class="d-flex justify-content-center">
                        <?php buttonElement("btn-next", "btn btn-dangers", "<i class=\"fas fa-arrow-left\"></i>", "back", "dat-toggle='tooltip' data-placement='bottom' title='Insert TV Series'"); ?>

                        <?php buttonElement("btn-create", "btn btn-success", "<i class=\"fas fa-plus\"></i>", "createVideo", "dat-toggle='tooltip' data-placement='bottom' title='Create'"); ?>

                        <?php buttonElement("btn-read", "btn btn-primary", "<i class=\"fas fa-sync\"></i>", "readVideo", "dat-toggle='tooltip' data-placement='bottom' title='Refresh'"); ?>

                        <?php buttonElement("btn-update", "btn btn-light border", "<i class=\"fas fa-pen-alt\"></i>", "updateVideo", "dat-toggle='tooltip' data-placement='bottom' title='Update'"); ?>

                        <?php buttonElement("btn-delete", "btn btn-dangers", "<i class=\"fas fa-trash-alt\"></i>", "deleteVideo", "dat-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
                    </div>
                    
                </form>
            </div>

            <?php 
                if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                } else {
                    $pageno = 1;
                }
                $no_of_records_per_page = 10;
                $offset = ($pageno-1) * $no_of_records_per_page;
             ?>

            <div class="d-flex table-data justify-content-center">
                <table class="table table-striped table-dark">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Video Title</th>
                            <th>Description</th>
                            <th>File Path</th>
                            <th>isMovie</th>
                            <th>Release Date</th>
                            <th>Duration</th>
                            <th>Series ID</th>
                            <th>Season</th>
                            <th>Episode</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php 
                            
                                // $result = getData();
                                $conn=mysqli_connect("localhost","root","","tmflix");
                                // Check connection
                                if (mysqli_connect_errno()){
                                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                    die();
                                }
                                $total_pages_sql = "SELECT COUNT(*) FROM videos";
                                $resultPage = mysqli_query($conn,$total_pages_sql);
                                $total_rows = mysqli_fetch_array($resultPage)[0];
                                $total_pages = ceil($total_rows / $no_of_records_per_page);

                                $sql = "SELECT * FROM videos LIMIT $offset, $no_of_records_per_page";
                                $res_data = mysqli_query($conn,$sql);

                                if($res_data){
                                    while($row = mysqli_fetch_assoc($res_data)){?>

                                        <tr>
                                            <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                                            <td data-id="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></td>
                                            <td data-id="<?php echo $row['id']; ?>"><?php echo $row['description']; ?></td>
                                            <td data-id="<?php echo $row['id']; ?>"><?php echo $row['filePath']; ?></td>
                                            <td data-id="<?php echo $row['id']; ?>"><?php echo $row['isMovie']; ?></td>
                                            <td data-id="<?php echo $row['id']; ?>"><?php echo $row['releaseDate']; ?></td>
                                            <td data-id="<?php echo $row['id']; ?>"><?php echo $row['duration']; ?></td>
                                            <td data-id="<?php echo $row['id']; ?>"><?php echo $row['entityId']; ?></td>
                                            <td data-id="<?php echo $row['id']; ?>"><?php echo $row['season']; ?></td>
                                            <td data-id="<?php echo $row['id']; ?>"><?php echo $row['episode']; ?></td>
                                            <td><i class="fas fa-edit btnedit video" data-id="<?php echo $row['id']; ?>"></i></td>
                                        </tr>
                                        
                            <?php
                                    }
                                    mysqli_close($conn);
                                }
                            


                        ?>
                    </tbody>
                </table>

            </div>

            <div class="paginationMain">
                <ul class="pagination">
                    <li><a href="?pageno=1">First</a></li>
                    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                    </li>
                    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                    </li>
                    <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                </ul>
            </div>
            
        </div>
    </main>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="includes/classes/main.js"></script>

<script>

    $(function() {
      $('[data-toggle="popover"]').popover({
        html: true,
        content: function() {
          let contentID = $(this).data('htmlcontent');
          return $(contentID).html();
        }
      });
    });
</script>
</body>
</html>