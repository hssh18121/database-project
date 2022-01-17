<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="https://site.aace.org/wp-content/uploads/2018/04/Book-Icon.png" type="image/x-icon"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <title>Bookly Online Shop</title>

        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- custom main css file link  -->
        <link rel="stylesheet" href="./assets/css/main.css">

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    </head>
    <!-- header section starts  -->
    <header class="header">
    
        <div class="header-1">
    
            <a href="index.php" class="logo"> <i class="fas fa-book"></i> bookly </a>
    
            <form action="" class="search-form">
                <input type="search" name="" placeholder="search here..." id="search-box">
                <label for="search-box" class="fas fa-search"></label>
            </form>
    
            <div class="icons">
                <div id="search-btn" class="fas fa-search"></div>
        
        <!-- KIEM TRA DANG NHAP -->
        <?php
        $total_quantity=0;
        session_start();
        include './connect_db.php';
        include './function.php';
        if (empty($_SESSION['current_user'])) { 
            unset($_SESSION['cart']);   // xoa phien gio hang vua nap len csdl di
          ?>
                <a href="login.php" id="login-btn" class="fas fa-user" style="font-size: 15px;">Đăng nhập/Đăng ký</a>

       <!-- NEU NHU DANG NHAP THANH CONG -->
       <?php
        } else {
            $currentUser = $_SESSION['current_user'];
        ?>
            <ul class="user_navbar">
                <li><a href="uif_favorite.php" class="fas fa-heart"></a></li>
                <li><a href="cart.php" class="fas fa-shopping-cart"></a></li>
                <?php
                if(isset($_SESSION['cart'])){
                     foreach ($_SESSION["cart"] as $id => $quantity) {
                        $total_quantity += $quantity;
                    }
                }    
                ?>
                <span class="item-count" style="" id="quantity"><?=$total_quantity?></span>
                
                                        
                <li><a href="#" class="avatar"><img src="./<?= isset($currentUser['avatar']) ? $currentUser['avatar'] : "assets/image/user/user.png"?>" alt="" style="width: 40px;height:40px;border-radius: 100%;"></a></li>
                <li id="has_subnav">
                    <?= $currentUser['first_name']?>
                    <?= $currentUser['last_name']?> 
                    <ul class="sub_user_nav hidden">
                        <li><a href="uif_profile.php" style="font-size: 13px;" >Cập nhật thông tin</a></li>
                        <li><a href="#" style="font-size: 13px;" >Lịch sử mua hàng</a></li>
                        <li><a href="#" style="font-size: 13px;" >Sản phẩm yêu thích</a></li>
                        <li><a href="change_password.php" style="font-size: 13px;" >Đổi mật khẩu</a></li>
                        <li><a href="logout.php" style="font-size: 13px;" >Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>

        <?php } ?>  <!-- end else -->
            </div>          <!-- end icon -->
    
        </div>
    
        <div class="header-2">
            <nav class="navbar">
                <?php 
                // var_dump($currentUser['username']);exit;
                if( !empty($_SESSION['current_user']) &&  $currentUser['username'] == 'admin') { 
                ?>
                <a href="./admin/index.php" class="nav_link">Admin</a>
                <?php } ?>
                <a href="index.php" class="nav_link">Trang chủ</a>
                <a href="book.php" class="nav_link">Cửa hàng</a>
                <a href="blogs.php" class="nav_link">Bài viết</a>
                <a href="contact.php" class="nav_link">Liên hệ</a>
                <a href="uif_profile.php" class="nav_link">Cập nhật thông tin</a>
                <a href="#" class="nav_link">Đăng xuất</a>
            </nav>
        </div>
    
    </header>
    <!-- header section ends -->

    <!-- bottom navbar : responsive cho mobile -->
    <nav class="bottom-navbar">
    <?php 
        // var_dump($currentUser['username']);exit;
        if( !empty($_SESSION['current_user']) &&  $currentUser['username'] == 'admin') { 
        ?>
        <a href="./admin/index.php" class="fas fa-user-cog"></a>
        <?php } ?>
        <a href="index.php" class="fas fa-home"></a>
        <a href="book.php" class="fas fa-book"></a>
        <a href="uif_profile.php" class="fas fa-user"></a>
        <a href="blogs.php" class="fas fa-blog"></a>
        <a href="contact.php" class="fas fa-envelope-square"></a>
    </nav>


<style> 
    .header-1 {
        display: flex; 
        align-items: center;
    }

    .user_navbar {
        display: flex; 
        align-items: center;
    }

    .item-count {
        display: flex;
        width: 20px;
        height: 20px;
        font-size: 12px;
        font-weight: 600;
        align-items: center;
        justify-content: center;
        padding: 5px;
        color:aliceblue;
        background-color:red;
        border-radius:100%;
        margin-top: 25px;
    }
</style>







    <!-- login form                             TAM THOI CHUA LAM 
    <div class="login-form-container">
    
        <div id="close-login-btn" class="fas fa-times"></div>
    
        <form action="">
            <h3>sign in</h3>
            <span>username</span>
            <input type="email" name="" class="box" placeholder="enter your email" id="">
            <span>password</span>
            <input type="password" name="" class="box" placeholder="enter your password" id="">
            <div class="checkbox">
                <input type="checkbox" name="" id="remember-me">
                <label for="remember-me"> remember me</label>
            </div>
            <input type="submit" value="sign in" class="button">
            <p>forget password ? <a href="#">click here</a></p>
            <p>don't have an account ? <a href="#">create one</a></p>
        </form>
    
    </div>-->