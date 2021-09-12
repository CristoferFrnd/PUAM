<!DOCTYPE html>
<html lang="en">

<body>
    <form method="post" action="../helpers/claseRegistro.php" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="image" />
        <input type="submit" name="submit" value="registrar" />
    </form>

</body>
<?php
include_once 'layouts/footer.php';
?>

</html>