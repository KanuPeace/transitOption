@livewireStyles
 <!-- Bootstrap Core Css -->
 <link href="{{ $admin_source }}/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
 <link rel="stylesheet" href="{{ $web_source }}/css/theme-pink.css" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="{{ $web_source }}/css/jquery-ui.theme.css" />
<link rel="stylesheet" href="{{ $web_source }}/css/style.css" />
<link rel="stylesheet" href="{{ $web_source }}/css/animate.css" />
<link rel="stylesheet" href="{{ $web_source }}/css/icons.css" />
<link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700|Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="images/favicon.ico" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Jquery Toast css -->
<link href="{{asset('toast')}}/jquery.toast.min.css" rel="stylesheet" type="text/css" />
<style>
    .main{
        margin-top: 70px;
    }
    .alert-danger{
        color: white;
        background: red;
        width: 100%;
        padding: 10px;
        /* margin-bottom: 10px; */
    }

    .auth_form .sidebar{
        background-color: white;
        background-size: 100%;
    }
    
    .auth_form .head-title{
        padding: 10px;
        font-size: 25px;
        font-weight: bold;
    }
    
    .selected_reg{
        border-color: #2FF06A;
        color: #2FF06A;
        border-style: solid;
        border-width: 2px;
    }
    
    .msg_area{
        font-weight: bold;
    }
    
    label {
        color: #191F26;
        font-size: 13px;
        text-transform:capitalize;
        padding: 0 0 5px 1px;
        text-align:left;
        float:left;
    }

/* auth */



    /* Profile */


    body{
    /* background: -webkit-linear-gradient(left, #95bd9f, #ffff); */
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
    
    </style>