<?php 
    $sql_slider=mysqli_query($con,"SELECT * FROM tbl_slider WHERE slider_active='1' ORDER BY slider_id ASC ")
?>

    <section id="slider">
        <div class="aspect-ratio-169">
<?php 
    while($row_slider=mysqli_fetch_array($sql_slider)){
?>
            <img src="images/<?php echo $row_slider['slider_images']?>">
<?php 
}
?>  

        </div>

    </section>
    <section>
        <div class="dot-container">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </section>