<h1 class="h3 mb-2 text-gray-800">Użytkownicy systemu</h1>

<p class="mb-2">Poniżej znajduje się lista użytkowników pobranych z bazy danych. Do prezentacji tych danych została użyta wtyczka <a target="_blank" href="https://datatables.net">DataTables</a>.</p>

<a href="usersManagement/add" class="btn btn-success btn-icon-split mb-3">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text"><strong>Dodaj</strong> użytkownika</span>   
</a>

<?php //include notifications ?>
<?php include('notifications.php'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista użytkowników</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table responsive table-bordered" id="usersList" width="100%" cellspacing="0">
                <thead class="bg-gray-200">
                    <tr>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                        <th>Adres e-mail</th>
                        <th>Numer telefonu</th>
                        <th>Wiek</th>
                        <th>Akcje</th>
                    </tr>
                </thead>
                <tfoot class="bg-gray-200">
                    <tr>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                        <th>Adres e-mail</th>
                        <th>Numer telefonu</th>
                        <th>Wiek</th>
                        <th>Akcje</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach($usersList as $singleUser): ?>
                        <tr>
                            <td data-order="<?=$singleUser -> userID;?>"><?=$singleUser -> userName;?></td>
                            <td><?=$singleUser -> userSurname;?></td>
                            <td><?=$singleUser -> userEmail;?></td>
                            <td><?=$singleUser -> userPhone;?></td>
                            <td><?=$singleUser -> userAge;?></td>
                            <td>
                                <div class="dropdown mb-4">
                                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Akcja</button>
                                    
                                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton" style="">
                                        <a class="dropdown-item" href="/usersManagement/edit/<?=$singleUser -> userID;?>"><i class="fa fa-pen pr-2"></i> Modyfikuj</a>
                                        <a class="dropdown-item removeUserTrigger" href="#" data-toggle="modal" data-target="#removeUserModal" data-userID="<?=$singleUser -> userID;?>"><i class="fa fa-times pr-2"></i> Usuń</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>