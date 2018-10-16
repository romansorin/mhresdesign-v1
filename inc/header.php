<!-- top part of navbar -->
<nav class="navbar navbar-expand-lg navbar-light d-none d-lg-flex">
    <span class="navbar-brand">Resources for:</span>
    <ul class="navbar-nav navbar-resources"> 
        <li class="nav-item"><a href="/students" class="nav-link hvr-overline-reveal">Students</a></li>
        <li class="nav-item"><a href="/faculty-staff" class="nav-link hvr-overline-reveal">Faculty & Staff</a></li>
        <li class="nav-item"><a href="/parents" class="nav-link hvr-overline-reveal">Parents</a></li>
        <li class="nav-item"><a href="/alumni" class="nav-link hvr-overline-reveal">Alumni</a></li>
    </ul>
    <ul class="nav navbar-nav ml-auto search">
        <div class="search-container">
            <button type="button" class="toggle" onclick="showDiv()"><i class="fa fa-search"></i></button>
            <script>
                function showDiv() {
                    document.getElementById('search-div').style.display = "block";
                }
            </script>
        </div>
    </ul>
    <ul class="nav navbar-nav navbar-extra-resources">
        <li class="nav-item"><a href="/directory">Directory</a></li>
        <li class="nav-item"><a href="/campus">Campus</a></li>
    </ul>
</nav>


<!-- bottom part of navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/index.php" title="Mentor High School Homepage">
        <h1 id="branding-image">Mentor</h1>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-bottom-nav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-reorder"></span>
    </button>
    <div class="collapse navbar-collapse" id="header-bottom-nav">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item ml-auto mr-auto"><a href="/academics" class="nav-link hvr-underline-from-center">Academics</a></li>
            <li class="nav-item ml-auto mr-auto"><a href="/athletics" class="nav-link hvr-underline-from-center">Athletics</a></li>
            <li class="nav-item ml-auto mr-auto"><a href="/music" class="nav-link hvr-underline-from-center">Music</a></li>
            <li class="nav-item ml-auto mr-auto"><a href="/arts-theatre" class="nav-link hvr-underline-from-center">Arts & Theatre</a></li>
            <li class="nav-item ml-auto mr-auto"><a href="/activities" class="nav-link hvr-underline-from-center">Activities</a></li>
            <li class="nav-item ml-auto mr-auto"><a href="/guidance" class="nav-link hvr-underline-from-center">Guidance</a></li>
            <li class="nav-item ml-auto mr-auto"><a href="/about" class="nav-link hvr-underline-from-center">About</a></li>
        </ul>
    </div>
</nav>

<!-- hidden search container -->
<div id="search-div" class="container-fluid" style="display: none;">
    <div class="row" style="height: 100%">
        <!-- this style for buttons https://gyazo.com/83f4a7d25ff7abbda3c0f4c2a3946a25 -->
        <div class="col-md-6" style="border-right: 1px solid #E0E0E0">
            <form class="search-input" action="action_page.php">
                <input type="text" value="Articles, Keywords, Phrases" onfocus="this.value='';" name="search">
                <br>
                <button type="submit">Search Index</button>
            </form>
        </div>
        <div class="col-md-6">
            <form class="search-input" action="action_page.php">
                <input type="text" value="Person or Department" onfocus="this.value='';" name="search">
                <br>
                <button type="submit">Search Directory</button>
            </form>
        </div>
    </div>
</div>

