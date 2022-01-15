<?php
session_start();
?>
<div class ="Loginindex">
    <h4>Login</h4>
    <form action="../Model/Includes/dbconLogin.php" method="post">
        <input type="text" name="uid" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <br>
        <button type="submit" name="submit">Login</button>
    </form>
</div>


<div class ="Regindex">
    <h4>Sing up</h4>
    <form action="../Model/Includes/dbconReg.php" method="post">
        <input type="text" name="uid" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="pwdx2" placeholder="Repeat Password">
        <input type="email" name="email" placeholder="E-mail">
        <br>
        <button type="submit" name="submit">SIGN UP</button>
    </form>
</div>

<div>
<button type="submit" name="submit" action="../../Model/Includes/logoutinc.php">LOGout</button>
</div>
