<?php
$errors=array();
$name="";
$email="";
$password="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    require_once("config.php");
    require_once("connetiondb.php");
    require_once dirname(__FILE__)."/lib/validation.php";

    if(isset($_POST["Name"]))
    {
        $name=$_POST["Name"];
    }
    if(isset($_POST["Email"]))
    {
        $email=$_POST["Email"];
    }
    if(isset($_POST["Password"]))
    {
        $password=$_POST["Password"];
    }
    if(empty($name))
    {
        $errors["name"] = "Поле <b>Ім'я</b> є обов'язковим!";
    }
    if(!isEmailValid($email))
    {
        $errors["email"] = "Поле <b>Пошта</b> введено не коректно!";
    }

    if (strlen($_POST["Password"]) <= '8') {
        $errors["password"] = "Your Password Must Contain At Least 8 Characters!";
    }
    else if(!preg_match("#[0-9]+#",$password)) {
        $errors["password"] = "Your Password Must Contain At Least 1 Number!";
    }
    else if(!preg_match("#[A-Z]+#",$password)) {
        $errors["password"] = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    else if(!preg_match("#[a-z]+#",$password)) {
        $errors["password"] = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
    else if (preg_match('@\W@', $password))
    {
        $errors["password"] = "Your Password Must Contain At Least 1 Special Characters!";
    }


}
?>

<?php
require_once "_header.php";
?>
<div class="row">
    <div class="col-md-12">
        <h2>Додати користувача</h2>
    </div>
</div>


<hr/>
<div class="row">
    <div class="col-md-12">
        <form action="addUser.php" method="post">

            <div class="form-group">
                <label for="Name">Ім'я</label>
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" value="<?php echo $name; ?>"
                               class="form-control"
                               name="Name" id="Name">
                    </div>
                    <div class="col-md-4">
                        <?php
                        if(isset($errors["name"]))
                        {
                            echo "<span style='color:red;'>".$errors["name"]."</span>";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="Email">Пошта</label>
                <div class="row">
                    <div class="col-md-8">
                        <input type="Email" value="<?php echo $email; ?>""
                               class="form-control"
                               name="Email" id="Email">
                    </div>
                    <div class="col-md-4">
                        <?php
                        if(isset($errors["email"]))
                        {
                            echo "<span style='color:red;'>".$errors["email"]."</span>";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <div class="row">
                    <div class="col-md-8">
                        <input id="phone" type="text" class="form-control" >
                    </div>
                    <div class="col-md-4">
                        <?php
                        if(isset($error["Phone"])){
                            echo "<span style='color:red'>".$error["Phone"]."</span>";
                        }
                        ?>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="Password">Пароль</label>
                <div class="row">
                    <div class="col-md-8">
                        <input type="password"
                               class="form-control"
                               name="Password" id="Password">
                    </div>
                    <div class="col-md-4">
                        <?php
                        if(isset($errors["password"]))
                        {
                            echo "<span style='color:red;'>".$errors["password"]."</span>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="pic">Фото</label>
                <input type="file" name="pic" id="pic">
            </div>
            <input type="submit" value="Додати" class="btn btn-success">
        </form>
    </div>
</div>

<?php
require_once "_footer.php";
?>
