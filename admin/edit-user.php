<?php 
    include 'partials/header.php';

    if(isset($_GET['id'])) {
        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM users WHERE id=$id";
        $result = mysqli_query($connection, $query);
        $user = mysqli_fetch_assoc($result);
    } else {
        header('location: ' . ROOT_URL . 'admin/manage-users.php');
        die();
    }
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Update User</h2>
        <div class="alert__message error">
            <p>This is an error message</p>
        </div>
        <form action="<?= ROOT_URL ?>admin/edit-user-logic.php" enctype="multipart/form-data" method="POST">
            <input type="hidden" value="<?= $user['id'] ?>" name="id" placeholder="Id">
            <input type="text" value="<?= $user['firstname'] ?>" name="firstname" placeholder="First Name">
            <input type="text" value="<?= $user['lastname'] ?>" name="lastname" placeholder="Last Name">
            <select name="userrole" id="">
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            <button class="btn" type="submit" name="submit">
                Update User
            </button>
        </form>
    </div>
</section>

<?php 
    include '../partials/footer.php';
?>