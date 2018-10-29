<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '/srv/http/inc/includes.php'; ?>
    <link rel="stylesheet" href="/css/activities.css">
    <title>Activity | Mentor High School</title>
    <meta name="description" content="This is a description">
</head>

<body>
    <div class="push-down"></div>
    <?php include '/srv/http/inc/header.php' ?>
    <div class="container-fluid no-padding">
        <div class="row">
            <div class="col-md-12 no-padding img-top">
                <img class="d-block w-100 img-fit" src="#" alt="Photos will go here">
                <div class="img-text-overlay">
                    <a href="/activities"><h6>Activities</h6></a>
                    <h1>Activity</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container no-padding" id="local-nav-menu">
        <div id="local-nav-menu-wrapper">
            <div class="row"><h4 id="local-nav-menu-header">More Information</h4></div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="local-nav-menu-list">
                        <div class="dropdown">
                            <li class="local-nav-menu-item">Dropdown</li>
                            <div class="dropdown-content">
                                <a href="http://example.com">Link link link link</a>
                                <a href="http://example.com">Link link link link</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <li class="local-nav-menu-item">Dropdown</li>
                            <div class="dropdown-content">
                                <a href="http://example.com">Link 1</a>
                                <a href="http://example.com">Link 2</a>
                            </div>
                        </div>
                        <a href="https://example.com"><li class="local-nav-menu-item">Link</li></a>
                        <a href="https://example.com"><li class="local-nav-menu-item">Link</li></a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container no-padding">
        <div class="row no-padding" id="activity-content">
            <div class="col-md-12 no-padding" id="main-activity-content">
                <h2>Information</h2>
		        <p>Put text here</p>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="article-container">
        <div class="container no-padding">
            <div class="row">
                <div class="col-md-6 no-padding">
                    <figure class="article-img" style="margin-left: 0px;">
                        <a href="#"><img class="img-fit" src="#" alt="test"></a>
                    </figure>
                </div>
                <div class="col-md-6 no-padding">
                    <div class="content mr-left">
                        <h3 class="article-title">Title</h3>
                        <p class="article-desc">Put text here</p>
                        <p class="article-link"><a href="#">Article link</a></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 no-padding">
                    <div class="content">
                        <h3 class="article-title">Title</h3>
                        <p class="article-desc">Put text here</p>
                        <p class="article-link"><a href="#">Article link</a></p>
                    </div>
                </div>
                <div class="col-md-6 no-padding">
                    <figure class="article-img mr-left">
                        <a href="#"><img class="img-fit" src="#" alt="test"></a>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <?php include '/srv/http/inc/footer.php'; ?>
</body>

</html>
