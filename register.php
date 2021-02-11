


<?php include('templates/header.php');?>
<div id="page-container">
   <div id="content-wrap">
        <p>Welcome!</p>
        <form id="idFormRegister" method="POST">
         <label for="name">Name</label>
         <input type="text" name="name">
         <label for="email">Email</label>
         <input type="email" name="email">
         <label for="password">Password</label>
         <input type="password" name="password">
         <input type="submit" name="registerSubmit">
        </form>
   </div>
</div>
<?php include('templates/footer.php');?>