<?php
$errors=array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    require_once("config.php");
    require_once("connetiondb.php");

    $email="";
    $password="";
    if(isset($_POST["Email"]))
    {
        $email=$_POST["Email"];
    }
    if(isset($_POST["Password"]))
    {
        $password=$_POST["Password"];
    }
    if($auth->auth($email,$password))
    {
        header("Location: index.php");
        exit;
    }
    else{
        $errors["error"]="Дані вказані не коректно";
    }

}
?>

<?php
require_once "_header.php";
?>
<div class="row">
    <div class="col-md-12">
        <h2>Вхід на сайт</h2>
    </div>
</div>

<?php
if(isset($errors["error"]))
    echo "<h3>".$errors["error"]."</h3>";
?>

<hr/>
<div class="row">
    <div class="col-md-12">
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="Email">Пошта</label>
                <div class="row">
                    <div class="col-md-8">
                        <input type="Email" value=""
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
            <input type="submit" value="Ввійти" class="btn btn-success">
        </form>
    </div>
</div>

<?php
require_once "_footer.php";
?>