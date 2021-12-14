<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="description" content="AG Modern Admin Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./Backend/Src/Icons/rfc-logo.jpg"/>
    <link rel="stylesheet" href="./Frontend/Pluggins/Bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="./Frontend/Pluggins/awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="./Frontend/Pluggins/awesome/css/all.min.css"/>
    <script src="./Frontend/Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="./Frontend/Scripts/root.js"></script>
    <script src="./Frontend/Pluggins/Jquery/popper.min.js"></script>
    <script src="./Frontend/Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <script src="./Frontend/Pluggins/awesome/js/all.min.js"></script>
    <script src="./Frontend/Pluggins/awesome/js/fontawesome.min.js"></script>
    <style>
        .container-fluid {
            overflow-y: auto;
            overflow-x: hidden;
            height: auto;
            min-height: 50rem;
            padding: 0;
            display: flex;
            flex-flow: column;
            justify-content: center;
            justify-items: center;
            align-items: stretch;
            align-content: space-between;
        }

        #menu {
            display: grid;
            margin-top: 1.5rem;
            grid-template-columns: auto auto auto auto auto;
            justify-content: center;
            justify-items: center;
            grid-column-gap: 1.2rem;
        }

        .dropdown .btn {
            border: 2px solid orangered;
            border-radius: 1.5rem;
            background-color: transparent;
            color: white;
            padding: 0.4rem 3rem;
        }

        .carousel {
            margin-top: 1rem;

        }

        .dropdown .btn:active,
        .dropdown .btn:focus,
        .dropdown .btn:hover {
            outline: none !important;
            appearance: none !important;
            box-shadow: none !important;
        }

        .dropdown .btn:focus,
        .dropdown .btn:hover {
            color: orangered;
            border-color: white;
        }

        #header {
            background-color: black;
            height: auto;
            width: 100vw;
            margin: 0 auto;
            display: flex;
            flex-flow: column;
            justify-content: center;
            justify-items: center;
            align-items: center;
            align-content: center;

        }

        #header-top-row {
            width: 100vw;
            display: grid;
            grid-template-columns: 10vw 80vw 8vw;
            justify-content: space-evenly;
            justify-items: center;
            align-items: baseline;
            margin-block: 1rem;


        }

        #logo {
            width: auto;
            color: white;
            text-decoration: none;
            font-family: 'Lucida Grande', 'Lucida Sans Unicode', arial, sans-serif;
            border-radius: 1.5rem;
            padding-block: 0.3rem;
            padding-inline: 1.1rem;
            text-align: center;
            border: 2px groove white;
            cursor: pointer;
            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        #logo:hover {
            opacity: 0.9;
            cursor: pointer;
            transition: opacity 0.2s;

        }

        #login:hover {
            color: white;
            cursor: pointer;
        }

        #login-option {
            position: absolute;
            top: 5rem;
            right: 0.8rem;
            z-index: 9999;
            background-color: white;
            width: 9rem;
            height: 5rem;
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: stretch;
            color: black;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;

        }

        #login-option a {
            text-decoration: none;
            font-family: 'Lucida Grande', 'Lucida Sans Unicode', arial, sans-serif;
            width: 100%;
            height: 50%;
            text-align: center;
            line-height: 2rem;

        }

        #login-option a:link {
            color: black;
            text-decoration: none;
        }

        #login-option a:visited {
            color: black;
            text-decoration: none;
        }

        #login-option a:hover {
            background-color: black;
            color: white;
            cursor: pointer;
        }

        #login-option a:active {
            color: black;
            text-decoration: none;
        }

        #login-option a:first-of-type {
            border-bottom: 2px solid #ccc;
        }

        #login-option a:last-of-type {
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        #main {
            width: 100vw;
            height: auto;
            background-color: whitesmoke;
            padding: 3rem;
        }

        .contents {
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
            word-wrap: break-word;
            font-size-adjust: inherit;
            margin-block: 5rem;
        }

        .contents img {
            display: block;
            object-fit: contain;
            max-width: 20rem;
            height: 25;
            max-height: 30rem;
        }

        #footer {
            background-color: #0d152a;
            width: 100vw;
            height: 10rem;
        }

        .carousel-inner img {
            width: 100%;
            height: 100%;

        }

        .carousel .carousel-inner {
            height: 90vh;
        }

        .dropdown-menu {
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
            border: 2px solid orangered;
        }

        .dropdown-menu .dropdown-item {
            color: black;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: orangered;
            color: white;
            border-block: 2px solid black;
            font-weight: bold;
        }


        @media screen and (max-width: 576px) {
            .container-fluid {
                display: flex;
                flex-flow: column nowrap;
                justify-content: center;
                align-content: space-evenly;
                align-items: center;

            }

            #header {
                display: flex;
                flex-flow: column;
                justify-content: center;
                align-content: space-evenly;
                width: 100vw;

            }

            #header-top-row {
                width: 100%;
                display: flex;
                flex-flow: column;
                justify-content: center;
                align-items: center;
                align-content: space-evenly;
                margin-top: 1rem;
            }

            #login {
                margin-bottom: 1rem;
            }

            #menu {
                width: 100vw;
                display: flex;
                flex-flow: column nowrap;
                justify-content: center;
                align-content: space-between;
                padding: 10px;
                margin-block: 0.3rem;
            }

            .dropdown .btn {
                width: 100%;
                margin-block: 0.3rem;

            }

            .carousel {
                width: 100vw;
                height: auto;
            }

            .carousel img {
                display: block;
                object-fit: cover;
                margin: 0 auto;

            }

        }

    </style>

</head>

<body>

<div class="container-fluid">
    <div id="header">
        <div id="header-top-row"><a href="#" id="logo">AG MODERN</a>
            <div class="col-12" id="menu">
                <div class="dropdown">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                        Our School
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Department</a>
                        <a class="dropdown-item" href="#">Events</a>
                        <a class="dropdown-item" href="#">About</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                        E-Library
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Read Books</a>
                        <a class="dropdown-item" href="./Frontend/eLibrary/addBooks.php">Upload Books</a>
                        <a class="dropdown-item" href="#">Place Request</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                        School Fees
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Make Payment</a>
                        <a class="dropdown-item" href="#">Payment Complaint</a>
                        <a class="dropdown-item" href="#">About School Fees</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                        Admission
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="./Frontend/Users/students/index.php">Apply</a>
                        <a class="dropdown-item" href="#">Print Admission Letter</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                        Result
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="./Frontend/Result/students/index.php">Check Result</a>
                    </div>
                </div>

            </div>

            <a id="login"><i class="fas fa-user fa-1x"></i></a>
            <div id="login-option">
                <a class="">Profile</a>
                <a class="" href="./Frontend/Access/index.php">Login</a>
            </div>

        </div>


        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./Backend/Src/images/background%207.jpg" alt="Los Angeles" width="1100" height="500">
                    <div class="carousel-caption">
                        <h3>Los Angeles</h3>
                        <p>We had such a great time in LA!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./Backend/Src/images/background%2010.jpg" alt="Chicago" width="1100" height="500">
                    <div class="carousel-caption">
                        <h3>Chicago</h3>
                        <p>Thank you, Chicago!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./Backend/Src/images/background%209.jpg" alt="New York" width="1100" height="500">
                    <div class="carousel-caption">
                        <h3>New York</h3>
                        <p>We love the Big Apple!</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>


    </div>


    <div id="main">
        <p class="contents"><img src="Backend/Src/images/a%20(1).jpg" align="left" alt="first">All rights reserved. No
            portion of this book may be reproduced, stored in a retrieval system, or transmitted in any form or by any
            means— electronic, mechanical, photocopy, recording, scanning, or other— except for brief quotations in
            critical reviews or articles, without the prior written permission of the publisher.
            Published in Nashville, Tennessee, by Thomas Nelson. Thomas Nelson is a trademark of Thomas Nelson, Inc.
            Thomas Nelson, Inc., titles may be purchased in bulk for educational, business, fund-raising, or sales
            promotional use. For information, please e-mail SpecialMarkets@ThomasNelson.com.
            Unless otherwise noted, Scripture quotations are taken from HOLY BIBLE: NEW INTERNATIONAL VERSION®. © 1973,
            1978, 1984 by
            International Bible Society. Used by permission of Zondervan Publishing
            House. All rights reserved.
            Scripture quotations marked amp are from the amplified bible: old testament. ©1962, 1964 by Zondervan (used
            by permission); and from the amplified bible: new testament. © 1958 by the Lockman Foundation (used by
            permission).
            Scripture quotations marked msg are from The Message by Eugene H. Peterson. © 1993, 1994, 1995, 1996, 2000.
            Used by permission of NavPress Publishing Group. All rights reserved.
            Scripture quotations marked nasb are from NEW AMERICAN STANDARD BIBLE®, © The Lockman Foundation 1960, 1962,
            1963, 1968, 1971, 1972, 1973, 1975, 1977, 1995. Used by permission.
            Scripture quotations marked nlt are from Holy Bible, New Living Translation. © 1996. Used by permission of
            Tyndale House Publishers, Inc., Wheaton, Illinois 60189. All rights reserved.
            Scripture quotations marked tniv are from HOLY BIBLE, TODAY’S NEW INTERNATIONAL VERSION® TNIV® Copyright ©
            2001, 2005
            by Biblica®. All rights reserved worldwide.
        </p>


        <p class="contents"><img src="Backend/Src/images/a%20(2).jpg" align="right" alt="second">All rights reserved. No
            portion of this book may be reproduced, stored in a retrieval system, or transmitted in any form or by any
            means— electronic, mechanical, photocopy, recording, scanning, or other— except for brief quotations in
            critical reviews or articles, without the prior written permission of the publisher.
            Published in Nashville, Tennessee, by Thomas Nelson. Thomas Nelson is a trademark of Thomas Nelson, Inc.
            Thomas Nelson, Inc., titles may be purchased in bulk for educational, business, fund-raising, or sales
            promotional use. For information, please e-mail SpecialMarkets@ThomasNelson.com.
            Unless otherwise noted, Scripture quotations are taken from HOLY BIBLE: NEW INTERNATIONAL VERSION®. © 1973,
            1978, 1984 by
            International Bible Society. Used by permission of Zondervan Publishing
            House. All rights reserved.
            Scripture quotations marked amp are from the amplified bible: old testament. ©1962, 1964 by Zondervan (used
            by permission); and from the amplified bible: new testament. © 1958 by the Lockman Foundation (used by
            permission).
            Scripture quotations marked msg are from The Message by Eugene H. Peterson. © 1993, 1994, 1995, 1996, 2000.
            Used by permission of NavPress Publishing Group. All rights reserved.
            Scripture quotations marked nasb are from NEW AMERICAN STANDARD BIBLE®, © The Lockman Foundation 1960, 1962,
            1963, 1968, 1971, 1972, 1973, 1975, 1977, 1995. Used by permission.
            Scripture quotations marked nlt are from Holy Bible, New Living Translation. © 1996. Used by permission of
            Tyndale House Publishers, Inc., Wheaton, Illinois 60189. All rights reserved.
            Scripture quotations marked tniv are from HOLY BIBLE, TODAY’S NEW INTERNATIONAL VERSION® TNIV® Copyright ©
            2001, 2005
            by Biblica®. All rights reserved worldwide.
        </p>


        <p class="contents"><img src="Backend/Src/images/a%20(3).jpg" align="left" alt="third">All rights reserved. No
            portion of this book may be reproduced, stored in a retrieval system, or transmitted in any form or by any
            means— electronic, mechanical, photocopy, recording, scanning, or other— except for brief quotations in
            critical reviews or articles, without the prior written permission of the publisher.
            Published in Nashville, Tennessee, by Thomas Nelson. Thomas Nelson is a trademark of Thomas Nelson, Inc.
            Thomas Nelson, Inc., titles may be purchased in bulk for educational, business, fund-raising, or sales
            promotional use. For information, please e-mail SpecialMarkets@ThomasNelson.com.
            Unless otherwise noted, Scripture quotations are taken from HOLY BIBLE: NEW INTERNATIONAL VERSION®. © 1973,
            1978, 1984 by
            International Bible Society. Used by permission of Zondervan Publishing
            House. All rights reserved.
            Scripture quotations marked amp are from the amplified bible: old testament. ©1962, 1964 by Zondervan (used
            by permission); and from the amplified bible: new testament. © 1958 by the Lockman Foundation (used by
            permission).
            Scripture quotations marked msg are from The Message by Eugene H. Peterson. © 1993, 1994, 1995, 1996, 2000.
            Used by permission of NavPress Publishing Group. All rights reserved.
            Scripture quotations marked nasb are from NEW AMERICAN STANDARD BIBLE®, © The Lockman Foundation 1960, 1962,
            1963, 1968, 1971, 1972, 1973, 1975, 1977, 1995. Used by permission.
            Scripture quotations marked nlt are from Holy Bible, New Living Translation. © 1996. Used by permission of
            Tyndale House Publishers, Inc., Wheaton, Illinois 60189. All rights reserved.
            Scripture quotations marked tniv are from HOLY BIBLE, TODAY’S NEW INTERNATIONAL VERSION® TNIV® Copyright ©
            2001, 2005
            by Biblica®. All rights reserved worldwide.
        </p>
        <p class="contents"><img src="Backend/Src/images/a%20(4).jpg" align="right" alt="last">All rights reserved. No
            portion of this book may be reproduced, stored in a retrieval system, or transmitted in any form or by any
            means— electronic, mechanical, photocopy, recording, scanning, or other— except for brief quotations in
            critical reviews or articles, without the prior written permission of the publisher.
            Published in Nashville, Tennessee, by Thomas Nelson. Thomas Nelson is a trademark of Thomas Nelson, Inc.
            Thomas Nelson, Inc., titles may be purchased in bulk for educational, business, fund-raising, or sales
            promotional use. For information, please e-mail SpecialMarkets@ThomasNelson.com.
            Unless otherwise noted, Scripture quotations are taken from HOLY BIBLE: NEW INTERNATIONAL VERSION®. © 1973,
            1978, 1984 by
            International Bible Society. Used by permission of Zondervan Publishing
            House. All rights reserved.
            Scripture quotations marked amp are from the amplified bible: old testament. ©1962, 1964 by Zondervan (used
            by permission); and from the amplified bible: new testament. © 1958 by the Lockman Foundation (used by
            permission).
            Scripture quotations marked msg are from The Message by Eugene H. Peterson. © 1993, 1994, 1995, 1996, 2000.
            Used by permission of NavPress Publishing Group. All rights reserved.
            Scripture quotations marked nasb are from NEW AMERICAN STANDARD BIBLE®, © The Lockman Foundation 1960, 1962,
            1963, 1968, 1971, 1972, 1973, 1975, 1977, 1995. Used by permission.
            Scripture quotations marked nlt are from Holy Bible, New Living Translation. © 1996. Used by permission of
            Tyndale House Publishers, Inc., Wheaton, Illinois 60189. All rights reserved.
            Scripture quotations marked tniv are from HOLY BIBLE, TODAY’S NEW INTERNATIONAL VERSION® TNIV® Copyright ©
            2001, 2005
            by Biblica®. All rights reserved worldwide.
        </p>

    </div>
    <div id="footer"></div>
</div>
</body>

</html>
