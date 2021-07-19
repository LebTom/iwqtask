<h1 class="h3 mb-2 text-gray-800">Edycja użytkownika</h1>

<p class="mb-2">Edycja użytkownika spowoduje trwałe zapisanie poniższych danych po ich zatwierdzeniu.</p>

<?php //include cancel operation button ?>
<?php include('cancelOperation.php'); ?>

<div class="card shadow mb-4 mw-s">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Użytkownik <?=$userData -> userName .' '. $userData -> userSurname?></h6>
    </div>
    <div class="card-body">
        <form class="user" method="POST">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="userData-name" name="userData-name" placeholder="Imię" required value="<?=$userData -> userName?>" />
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="userData-surname" name="userData-surname" placeholder="Nazwisko" required value="<?=$userData -> userSurname?>" />
                </div>
            </div>
            <div class="form-group">
                <input type="email" class="form-control form-control-user" id="userData-email" name="userData-email" placeholder="Adres e-mail" required value="<?=$userData -> userEmail?>" />
            </div>
            <div class="form-group row mb-5">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="tel" class="form-control form-control-user" id="userData-phone" name="userData-phone" placeholder="Numer telefonu" maxlength="9" required value="<?=$userData -> userPhone?>" />
                </div>
                <div class="col-sm-6">
                    <input type="number" class="form-control form-control-user" id="userData-age" name="userData-age" placeholder="Wiek" min="1" max="99" maxlength="2" required value="<?=$userData -> userAge?>" />
                </div>
            </div>
            
            <input type="hidden" id="userData-id" name="userData-id" value="<?=$userData -> userID?>" />
            <input type="submit" class="btn btn-primary btn-user btn-block mt-2" id="userData-submit" name="userData-submit" value="Edytuj użytkownika" />
        </form>
    </div>
</div>