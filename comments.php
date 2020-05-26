<?php
  include_once('include/class.user.php');
  include_once('pagination.php');
  $aginate = new Pagination();
  $user = new User();
  $comments = $aginate->paginate('https://jsonplaceholder.typicode.com/comments?postId='.$_GET['postId'], 'withOutPagination');
  $userDetails = $user->getUserDetails(321321);
  $userType = $userDetails['utype'];
?>

<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div style="width:700px; margin:0 auto;">
<table class="table table-striped table-bordered">
<thead>
<tr>
<th style='width:150px;'>Name</th>
<th style='width:150px;'>Body</th>
</tr>
</thead>
<tbody>
<?php
  foreach($comments['results'] as $comment){
    echo "<tr>
          <td>".$comment->name."</td>
          <td>".$comment->body."</td>";
        "</tr>";
  }
    ?>
</tbody>
</table>
</body>
</html>