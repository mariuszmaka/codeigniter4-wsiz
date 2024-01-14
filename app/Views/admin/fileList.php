<table class="table">
    <thead>
    <tr>
        <th scope="col">Nazwa</th>
        <th scope="col">Kiedy dodano</th>
    </tr>
    </thead>
<tbody>

<?php

foreach(array_reverse($files) as $file){
    echo '<tr><td>'.$file.'</td><td>'.date('Y-m-d H:i:s', intval(substr( $file,0,10))).'</td></tr>';
}
?>

</tbody>
</table>
