<div class="bg-body-tertiary p-5 rounded">
    <h1>Home Page</h1>

    <?php   
    if(isset($_SESSION['home_message'])){
        echo $_SESSION['home_message'];
        unset($_SESSION['home_message']);
    }   
    ?>
</div>
