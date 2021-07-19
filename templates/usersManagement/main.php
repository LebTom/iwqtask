<!DOCTYPE html>
<html lang="en">
    <head>
        <?php //include header ?>
        <?php include('includes/header.inc.php'); ?>
    </head>
    <body id="page-top">
        <div id="wrapper">
            <?php //include sidebar ?>
            <?php include('includes/sideBar.inc.php'); ?>

            <div id="content-wrapper" class="d-flex flex-column  animate__animated animate__fadeIn animate__faster">
                <div id="content">
                    <?php //include navbar ?>
                    <?php include('includes/navBar.inc.php'); ?>

                    <div class="container-fluid">
                        <?php //include active template ?>
                        <?php include('templates/usersManagement/'.$activeTemplate.'.php'); ?>
                    </div>
                </div>

                <?php //include footer ?>
                <?php include('includes/footer.inc.php'); ?>
            </div>
        </div>

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <?php //include modals ?>
        <?php include('includes/modals.inc.php'); ?>

        <?php //include javascript ?>
        <?php include('includes/javascript.inc.php'); ?>
    </body>
</html>