<table border="0">
  <tr>
    <td><?php if ($pageNum_selectVehicles > 0) { // Show if not first page ?>
        <a id="First" href="<?php printf("%s?pageNum_selectVehicles=%d%s", $currentPage, 0, $queryString_selectVehicles); ?>"><img src="../../images/First.gif"></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_selectVehicles > 0) { // Show if not first page ?>
        <a id="Previous" href="<?php printf("%s?pageNum_selectVehicles=%d%s", $currentPage, max(0, $pageNum_selectVehicles - 1), $queryString_selectVehicles); ?>"><img src="../../images/Previous.gif"></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_selectVehicles < $totalPages_selectVehicles) { // Show if not last page ?>
        <a id="Next" href="<?php printf("%s?pageNum_selectVehicles=%d%s", $currentPage, min($totalPages_selectVehicles, $pageNum_selectVehicles + 1), $queryString_selectVehicles); ?>"><img src="../../images/Next.gif"></a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_selectVehicles < $totalPages_selectVehicles) { // Show if not last page ?>
        <a id="Last" href="<?php printf("%s?pageNum_selectVehicles=%d%s", $currentPage, $totalPages_selectVehicles, $queryString_selectVehicles); ?>"><img src="../../images/Last.gif"></a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>