<div class="info">
    <?php if (!isset($_SESSION['name'])){ ?>
    <p class="txt">To upload picture or to visit gallery, Sign in.</p>
    <p class="txt">If you dont have an account, pass registration.</p>
    <?php } else {?>
    <p class="txt">You are welcome. You are able to upload images or to visit gallery.</p>
	<!-- <p class="txt">Hello, i'm uselles paragraph.</p> -->
    <?php } ?>
</div>