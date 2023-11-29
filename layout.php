<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
<style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .slide{
            height: 100%;
            width: 20%;
            position: absolute;
            background-color: white;
            transition: 0.5s ease;
            transform: translate(-300px);
        }
        h2{
            color: black;
            font-weight: 800;
            text-align: right;
            padding: 10px 0;
            padding-right: 30px;
            pointer-events: none;
        }
        li{
            border-radius: 8px; 
            border: 1px solid #fff;
        }
        ul li{
            border: 1px solid #fff;
            list-style: none;
            padding-top: 10px;
            padding-left: 10px;
            padding-right: 10px;
            border-radius: 8px; 
        }
        a{
            color: black;
            font-weight: 500;
            padding: 15px 0;
            display: block;
            text-decoration: none;
            background-color: silver;
        }
        input[type="checkbox"]{
            visibility: hidden;
            display: none;
        }
        .toggle{
            position: absolute;
            height: 30px;
            width: 40px;
            z-index: 1;
            cursor: pointer;
            border-radius: 5px;
            top: 80px;
            left: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        .toggle .common{
            position: absolute;
            height: 2px;
            width: 30px;
            background-color: #800ff8;
            border-radius: 50px;
            transition: 0.3s ease;
        }
        .toggle .top_line{
            top: 30%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
        .toggle .middle_line{
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
        .toggle .bottom_line{
            top: 70%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
        input:checked ~ .toggle .top_line{
            left: 8px;
            top: 14px;
            width: 30px;
            transform: rotate(45deg);
        }
        input:checked ~ .toggle .bottom_line{
            left: 8px;
            top: 14px;
            width: 30px;
            transform: rotate(-45deg);
        }
        input:checked ~ .toggle .middle_line{
            opacity: 0;
            transform: translateX(20px);
        }
        input:checked ~ .slide{
            transform: translate(0);
        }
        @media(max-width: 800px) {
            .slide{
            height: 100%;
            width: 40%;
        }
        .toggle{
            top: 100px;
        }
            
        }
        @media(max-width: 500px) {
            .slide{
            height: 100%;
            width: 40%;
        }
        .toggle{
            top: 120px;
            
        }
}
@media(max-width: 400px) {
            .slide{
            height: 105%;
            width: 40%;
        }
        .toggle{
            top: 155px;
            
        }
    }
</style>
<header>
        <h1>PERSONAL FINANCE MANAGE APPLICATION</h1>
</header>
    <label>
        <input type="checkbox">
        <div class="toggle">
            <span class="top_line common"></span>
            <span class="middle_line common"></span>
            <span class="bottom_line common"></span>
        </div>
        <div class="slide">
            <h2>Menu</h2>
        <ul>
            <li><a href="home.php"><i class="fa-solid fa-home"></i> Home</a></li>
            <li><a href="income.php"><i class="fa-solid fa-sack-dollar"></i> Income</a></li>
            <li><a href="budget.php"><i class="fa-solid fa-file-invoice"></i> Budjet</a></li>
            <li><a href="expenditure.php"><i class="fa-solid fa-receipt"></i> Expenditure</a></li>
            <li><a href="incomeSum.php"><i class="fa-solid fa-coins"></i> Income Report</a></li>
            <li><a href="expenditureSum.php"><i class="fa-solid fa-comments-dollar"></i> Expenditure Report</a></li>
            <li><a href="summary.php"><i class="fa-solid fa-chart-simple"></i> Summary</a></li>
            
            <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>

        </ul>
    </div>
</label>
