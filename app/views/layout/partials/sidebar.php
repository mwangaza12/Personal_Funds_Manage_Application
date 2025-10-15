<!-- Font Awesome -->
<linkrel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>

<style>
/* ===== Base Reset ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    background-color: #f4f7fa;
    color: #333;
}

/* ===== Header ===== */
header {
    background-color: #4a90e2;
    color: white;
    text-align: center;
    padding: 15px;
    font-size: 1.5rem;
    font-weight: 600;
    letter-spacing: 1px;
    position: sticky;
    top: 0;
    z-index: 2;
}

/* ===== Sidebar ===== */
.slide {
    height: 100%;
    width: 250px;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #ffffff;
    transition: 0.4s ease;
    transform: translateX(-260px);
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    z-index: 1;
    padding-top: 80px;
}

h2 {
    color: #4a90e2;
    font-weight: 700;
    text-align: center;
    margin-bottom: 20px;
    pointer-events: none;
}

ul {
    list-style: none;
    padding: 0 15px;
}

ul li {
    
}

ul li a {
    display: flex;
    align-items: center;
    gap: 12px;
    color: #333;
    font-weight: 500;
    text-decoration: none;
    background-color: #f1f1f1;
    padding: 12px 16px;
    border-radius: 8px;
    transition: all 0.3s ease;
}

ul li a:hover {
    background-color: #4a90e2;
    color: #fff;
}

ul li a i {
    width: 20px;
    text-align: center;
}

/* ===== Toggle Button ===== */
input[type="checkbox"] {
    display: none;
}

.toggle {
    position: fixed;
    top: 25px;
    left: 20px;
    height: 35px;
    width: 40px;
    cursor: pointer;
    background-color: #fff;
    border-radius: 5px;
    z-index: 3;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
}

.toggle .common {
    position: absolute;
    height: 3px;
    width: 25px;
    background-color: #4a90e2;
    border-radius: 50px;
    transition: all 0.3s ease;
}

.toggle .top_line {
    top: 30%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.toggle .middle_line {
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.toggle .bottom_line {
    top: 70%;
    left: 50%;
    transform: translate(-50%, -50%);
}

input:checked ~ .toggle .top_line {
    transform: translate(-50%, -50%) rotate(45deg);
}

input:checked ~ .toggle .middle_line {
    opacity: 0;
}

input:checked ~ .toggle .bottom_line {
    transform: translate(-50%, -50%) rotate(-45deg);
}

input:checked ~ .slide {
    transform: translateX(0);
}

/* ===== Content shift ===== */
input:checked ~ main {
    margin-left: 250px;
    transition: margin-left 0.4s ease;
}

/* ===== Responsive ===== */
@media (max-width: 768px) {
    .slide {
        width: 70%;
        transform: translateX(-100%);
    }

    input:checked ~ .slide {
        transform: translateX(0);
    }

    input:checked ~ main {
        margin-left: 0;
    }
}
</style>

<header>PERSONAL FINANCE MANAGER</header>

<input type="checkbox" id="menu-toggle" />
<label for="menu-toggle" class="toggle">
    <span class="top_line common"></span>
    <span class="middle_line common"></span>
    <span class="bottom_line common"></span>
</label>

<nav class="slide">
    <h2>Menu</h2>
    <ul>
        <li><a href="/home"><i class="fa-solid fa-home"></i> Home</a></li>
        <li><a href="/income"><i class="fa-solid fa-sack-dollar"></i> Income</a></li>
        <li><a href="/budget"><i class="fa-solid fa-file-invoice"></i> Budget</a></li>
        <li><a href="/expenditure"><i class="fa-solid fa-receipt"></i> Expenditure</a></li>
        <li><a href="/income/report"><i class="fa-solid fa-coins"></i> Income Report</a></li>
        <li><a href="/expenditure/report"><i class="fa-solid fa-comments-dollar"></i> Expenditure Report</a></li>
        <li><a href="/summary"><i class="fa-solid fa-chart-simple"></i> Summary</a></li>
        <li><a href="/logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
    </ul>
</nav>
