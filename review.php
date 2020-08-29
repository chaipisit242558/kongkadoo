  <?php
include 'header.php';
include_once 'config.php';

// $search = "%.$_POST['search'].%";
if (isset($_POST['search'])) {
    $search = '%' . $_POST['search'] . '%';
    $sql = 'SELECT * FROM review  WHERE (topic LIKE"' . $search . '") or (content LIKE "' . $search . '") ORDER BY idreview desc';

} else {
    $sql = 'SELECT * FROM review  order by idreview desc';
}
$result = mysql_query($sql) or die(mysql_error());
$i = 1;

?>

  <p></P>
  <div class="container">
      <div class="row">
          <div class=col-4></div>
          <div class=col-6>
              <form id="formsearch" name="formsearch" method="post" action="review.php"
                  class="form-inline my-4 my-lg-0">

                  <!-- <div align="center" class="input-box" checkfield="#iddepartment" checkrule="number" checkerror="number only!!!"> -->
                  <!-- <div align="center" class="input-box" checkfield="#topic" > -->

                  <input name="search" type="text" id="search" class="form-control mr-sm-2" placeholder="ค้นหารีวิว" />
                  <!-- <input type="submit" name="Submit" class="btn btn-primary" value="ค้นหา" onclick="javascript: return aw_check('#form1');"/> -->
                  <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fa fa-search"
                          aria-hidden="true"></i>ค้นหา</button>

                  <!-- <span class="check"></span>
          <span class="error"></span> -->
                  <!-- </div> -->
              </form>
          </div>
      </div>
  </div>


  <hr width="60%" />
  <p>&nbsp;</p>
  <!-- </div> -->
  <H3 align="center" class="style2">รายการข้อมูลรีวิว</H3>

  <div class="container">
      <div class="row">
          <div class="col">

              <table class="table table-striped  table-hover">
                  <thead class="thead">
                      <tr class="table-primary">
                          <th scope="col" width="5%">ลำดับ</th>
                          <th scope="col" width="15%">หัวข้อรีวิว</th>
                          <th scope="col" width="35%">เนื้อหารีวิว</th>
                          <th scope="col" width="5%">รูปภาพ</th>
                          <th scope="col" width="5%">ผู้รีวิว</th>
                          <th scope="col" width="10%">วันเวลา</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
while ($row = mysql_fetch_assoc($result)) {

    echo "<tr>";
    echo "<td width='5%'><div align='center'>" . $i . "</div></td>";
    echo "<td width='15%'><a href='manage_comment.php?idreview=" . $row['idreview'] . "'>" . $row['topic'] . "</a></div></td>";
    echo "<td width='35%'><a href='manage_comment.php?idreview=" . $row['idreview'] . "'>" . $row['content'] . "</a></td>";
    echo "<td><a href='manage_comment.php?idreview=" . $row['idreview'] . "'><img width='100' height='100'  src=" . 'Image/' . $row['pic'] . ">" . "</a></td>";
    echo "<td><div >" . $row['idmember'] . "</div></td>";
    echo "<td><div >" . $row['datetime'] . "</div></td>";
    echo "</tr>";
    $i++;
}

$num = mysql_num_rows($result);
if ($num == 0) {
    echo "ไม่พบข้อมูล";
}

?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>


  <?php
mysql_free_result($result);
mysql_close($conn);
include 'footer.php';?>