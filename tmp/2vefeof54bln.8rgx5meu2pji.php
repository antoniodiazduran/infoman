<form method="POST" action="<?= $BASE.'/query' ?>">
 <?php if ($SESSION['roles']=='Admin'): ?>
  BP: <input type="text" name="bpidf" id="bpidf" value="<?= $bpidf ?>">
 <?php endif; ?>
  Status: <select name="postatus" id="postatus">
    <option>
    <option value="Approved" <?= $postatus=='Approved'?' selected':'' ?>>Approved
    <option value="Closed" <?= $postatus=='Closed'?' selected':'' ?>>Closed
    <option value="Created" <?= $postatus=='Created'?' selected':'' ?>>Created
    <option value="In Process" <?= $postatus=='In Process'?' selected':'' ?>>In Process
    <option value="Modified" <?= $postatus=='Modified'?' selected':'' ?>>Modified
    <option value="Sent" <?= $postatus=='Sent'?' selected':'' ?>>Sent
  </select>
  Max Rows: <select name="offset" id="offset">
    <option value="25" <?= $offset==25?' selected':'' ?> >25
    <option value="50" <?= $offset==50?' selected':'' ?> >50
    <option value="100" <?= $offset==100?' selected':'' ?> >100
    <option value="200" <?= $offset==200?' selected':'' ?> >200
    <option value="300" <?= $offset==300?' selected':'' ?> >300
    <option value="400" <?= $offset==400?' selected':'' ?> >400
    <option value="500" <?= $offset==500?' selected':'' ?> >500
  </select>
  <button type="submit" name="mode" id="mode"> Search</button> 
  <input type="button" id="btnExport" value="Export XLS">
</form>

<div class="table-responsive" id="dvData">

        <table  class="table table-condensed">
           <thead>
           <tr>
               <th scope="col">Order Date</th>
               <th scope="col">Purchase Order</th>
	       <th scope="col">PO Status</th>
               <th scope="col">Position</th>
           </tr>
           </thead>
       
           <tbody>
           <?php foreach (($po?:[]) as $rows): ?>
               <tr>
                   <td><?= substr($rows['OrderDate'],0,10) ?></td>
                   <td><a href="/query/po/<?= trim($rows['PurchaseOrder']) ?>" target="<?= trim($rows['PurchaseOrder']) ?>"><?= trim($rows['PurchaseOrder']) ?></a></td>
                   <td><?= trim($rows['POStatus']) ?></td>
                   <td><?= trim($rows['Position']) ?></td>
               </tr>
           <?php endforeach; ?>
           </tbody>
       
        </table>
       </div>
<script>

$(document).ready(function(){
  $("#btnExport").click(function(e) {
    window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#dvData').html()) );
    e.preventDefault();
  })
});

</script>