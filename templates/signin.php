<?php include('templates/header.php');?>
<div id="page-container">
   <div id="content-wrap">
        <p>Welcome back!</p>
        <form id="idFormLogin" method="POST">
         <label for="email">Email</label>
         <input type="email" name="email">
         <label for="password">Password</label>
         <input type="password" name="password">
         <input type="submit" name="loginSubmit">
        </form>
   </div>
</div>
<?php include('templates/footer.php');?>