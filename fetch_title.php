<?php  
 $connect = mysqli_connect("localhost", "root", "", "admin_opac");  
 $output = '';  
 $sql = "SELECT * FROM books WHERE title LIKE '%".$_POST["search"]."%'";  
 $result = mysqli_query($connect, $sql);  
 if(mysqli_num_rows($result) > 0)  
 {  
      $output .= '<h4 align="center">Search Result</h4>';  
      $output .= '<div class="table-responsive">  
                          <table class="table table-bordered table-stripped table-responsive">  
                               <tr>  
                                    <th>ISBN</th>  
                                    <th>Book Title</th>  
                                    <th>Author</th>  
                                    <th>Subject</th>  
                                    <th>Category</th>  
                                    <th>Shelf No</th>
                                    <th>Status</th>
                               </tr>';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                    <td>'.$row["isbn"].'</td>  
                     <td>'.$row["title"].'</td>  
                     <td>'.$row["author"].'</td>  
                     <td>'.$row["subject"].'</td>  
                     <td>'.$row["section"].'</td>  
                     <td>'.$row["shelf_no"].'</td>
                     <td>'.$row["status"].'</td>
                </tr>  
           ';  
      }  
      echo $output;  
 }  
 else  
 {  
      echo 'Data Not Found';  
 }  
 ?>  