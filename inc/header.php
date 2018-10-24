<!-- Top part of navbar -->
<div class="fixed-top">
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
                <button type="button" class="toggle" onclick="collapseDiv()"><i class="fa fa-search"></i></button>
                <script>
                    function collapseDiv() {
                        var x = document.getElementById('search-div');
                        if (x.style.display === "none") {
                        x.style.display = "block";
                        } else {
                        x.style.display = "none";
                        }
                    }
                </script>
            </div>
        </ul>
        <ul class="nav navbar-nav navbar-extra-resources">
            <li class="nav-item"><a href="/directory">Directory</a></li>
            <li class="nav-item"><a href="/campus">Campus</a></li>
        </ul>
    </nav>

    <!-- Bottom part of navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/index.php" title="Mentor High School Homepage">
            <h1 id="branding-image">Mentor</h1>
        </a>
        <!-- Mobile version of navigation -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-bottom-nav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-reorder"></span>
        </button>
        <div class="collapse navbar-collapse" id="header-bottom-nav">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item ml-auto mr-auto">
                    <div class="collapsed-search-container">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="search-input" action="action_page.php">
                                    <input type="text" value="Search..." onfocus="this.value='';" name="search">
                                    <div class="row bottom-border">
                                        <br>
                                    </div>
                                    <button type="submit" id="mr-right">Index</button>
                                    <button type="submit">Directory</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item ml-auto mr-auto">
                    <div class="collapse-hide">
                        <div class="row text-center">
                            <div class="grey-divider"><p>Resources for</p></div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-center border-right">
                                <a href="/students" class="nav-link hvr-underline-from-center bottom-border">Students</a>
                                <a href="/faculty-staff" class="nav-link hvr-underline-from-center">Faculty & Staff</a>
                            </div>    
                            <div class="col-6 text-center">
                                <a href="/parents" class="nav-link hvr-underline-from-center bottom-border">Parents</a>
                                <a href="/alumni" class="nav-link hvr-underline-from-center">Alumni</a>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="grey-divider"><p>Sections</p></div>
                        </div>
                    </div>
                </li>
                <div class="bottom-border"></div>
                <li class="nav-item ml-auto mr-auto"><a href="/academics" class="nav-link hvr-underline-from-center">Academics</a></li>
                <div class="bottom-border"></div>
                <li class="nav-item ml-auto mr-auto"><a href="/athletics" class="nav-link hvr-underline-from-center">Athletics</a></li>
                <div class="bottom-border"></div>
                <li class="nav-item ml-auto mr-auto"><a href="/music" class="nav-link hvr-underline-from-center">Music</a></li>
                <div class="bottom-border"></div>
                <li class="nav-item ml-auto mr-auto"><a href="/arts-theatre" class="nav-link hvr-underline-from-center">Arts & Theatre</a></li>
                <div class="bottom-border"></div>
                <li class="nav-item ml-auto mr-auto"><a href="/activities" class="nav-link hvr-underline-from-center">Activities</a></li>
                <div class="bottom-border"></div>
                <li class="nav-item ml-auto mr-auto"><a href="/guidance" class="nav-link hvr-underline-from-center">Guidance</a></li>
                <div class="bottom-border"></div>
                <li class="nav-item ml-auto mr-auto"><a href="/about" class="nav-link hvr-underline-from-center">About</a></li>
            </ul>
            <div class="bg-dark" style="height: 25px;"></div>
        </div>
    </nav>

<!-- Hidden search container -->
<div id="search-div" class="container-fluid" style="display: none;">
    <div class="row" style="height: 100%">
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
</div>