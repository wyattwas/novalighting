<?php
$fixture_id = $_GET['id'];

$db = mysqli_connect('localhost', 'web', 'mysql', 'novalighting')
or die('Error connecting to MySQL server.');
?>
<html class="no-js" lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NovaLighting - Fixture Info</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fixture.css">
    <meta name="description" content="">

    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:image:alt" content="">

    <meta name="theme-color" content="#8820ffff">
</head>
<body>
<nav class="nav" id="nav">
    <a href="index.html">Logo</a>
    <a href="list-fixture.php">Fixture List</a>
    <a href="past-projects.html">Vergangene Projekte</a>
    <a href="https://www.youtube.com/watch?v=5P1qRpmoFp8&list=PL4nNPjb8kva9e8-wQPH9VLNp214bt5O-_" target="_blank">YouTube</a>
    <a href="javascript:void(0);" id="menu-toggle" onclick="togglemenu()">
        <div class="menu-toggle__bar1"></div>
        <div class="menu-toggle__bar2"></div>
        <div class="menu-toggle__bar3"></div>
    </a>
</nav>

<div class="back"><a href="list-fixture.php">< Zurück</a></div>

<div class="main">
    <div class="container">
        <?php
        $query = "SELECT images.url FROM novalighting.images JOIN novalighting.fixture_images fi on images.idimage = fi.idimage WHERE fi.idfixture = '$fixture_id'";

        mysqli_query($db, $query) or die('Error querying database.');

        $result = mysqli_query($db, $query);

        while ($row = mysqli_fetch_array($result)) {
            echo '<div class="mySlides"><img src="' . $row['url'] . '" style="width:100%"></div>';
        }
        ?>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <div class="row">
            <?php
            $query = "SELECT images.url FROM novalighting.images JOIN novalighting.fixture_images fi on images.idimage = fi.idimage WHERE fi.idfixture = '$fixture_id'";

            mysqli_query($db, $query) or die('Error querying database.');

            $result = mysqli_query($db, $query);
            $i = 1;

            while ($row = mysqli_fetch_array($result)) {
                echo '<div class="column"><img class="demo cursor" src="' . $row['url'] . '" style="width:100%" onclick="currentSlide('.$i.')"></div>';
                $i++;
            }
            ?>
        </div>
    </div>

    <?php
    $query = "SELECT * FROM fixtures WHERE idfixture = '$fixture_id'";

    mysqli_query($db, $query) or die('Error querying database.');

    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_array($result)) {
        echo "<div class='title'><div class='name'>".$row['name']."</div><div class='id'>ID: ".$row['idfixture']."</div></div><div class='description'>".$row['info']."</div>";
    }

    mysqli_close($db);
    ?>
</div>

<footer>
    <small>©
        <script>document.write(new Date().getFullYear().toString())</script>
        NovaLighting. All Rights Reserved.</small>
</footer>

<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("demo");
        let captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
    }
</script>

<script>
    function togglemenu() {
        var x = document.getElementById("nav");
        if (x.className === "nav") {
            x.className += " nav--open";
        } else {
            x.className = "nav";
        }
        var element = document.getElementById("menu-toggle");
        element.classList.toggle("menu-toggle--open");
    }
</script>

<script charset="utf-8">var TGSort = window.TGSort || function (n) {
        "use strict";

        function r(n) {
            return n ? n.length : 0
        }

        function t(n, t, e, o = 0) {
            for (e = r(n); o < e; ++o) t(n[o], o)
        }

        function e(n) {
            return n.split("").reverse().join("")
        }

        function o(n) {
            var e = n[0];
            return t(n, function (n) {
                for (; !n.startsWith(e);) e = e.substring(0, r(e) - 1)
            }), r(e)
        }

        function u(n, r, e = []) {
            return t(n, function (n) {
                r(n) && e.push(n)
            }), e
        }

        var a = parseFloat;

        function i(n, r) {
            return function (t) {
                var e = "";
                return t.replace(n, function (n, t, o) {
                    return e = t.replace(r, "") + "." + (o || "").substring(1)
                }), a(e)
            }
        }

        var s = i(/^(?:\s*)([+-]?(?:\d+)(?:,\d{3})*)(\.\d*)?$/g, /,/g),
            c = i(/^(?:\s*)([+-]?(?:\d+)(?:\.\d{3})*)(,\d*)?$/g, /\./g);

        function f(n) {
            var t = a(n);
            return !isNaN(t) && r("" + t) + 1 >= r(n) ? t : NaN
        }

        function d(n) {
            var e = [], o = n;
            return t([f, s, c], function (u) {
                var a = [], i = [];
                t(n, function (n, r) {
                    r = u(n), a.push(r), r || i.push(n)
                }), r(i) < r(o) && (o = i, e = a)
            }), r(u(o, function (n) {
                return n == o[0]
            })) == r(o) ? e : []
        }

        function v(n) {
            if ("TABLE" == n.nodeName) {
                for (var a = function (r) {
                    var e, o, u = [], a = [];
                    return function n(r, e) {
                        e(r), t(r.childNodes, function (r) {
                            n(r, e)
                        })
                    }(n, function (n) {
                        "TR" == (o = n.nodeName) ? (e = [], u.push(e), a.push(n)) : "TD" != o && "TH" != o || e.push(n)
                    }), [u, a]
                }(), i = a[0], s = a[1], c = r(i), f = c > 1 && r(i[0]) < r(i[1]) ? 1 : 0, v = f + 1, p = i[f], h = r(p), l = [], g = [], N = [], m = v; m < c; ++m) {
                    for (var T = 0; T < h; ++T) {
                        r(g) < h && g.push([]);
                        var C = i[m][T], L = C.textContent || C.innerText || "";
                        g[T].push(L.trim())
                    }
                    N.push(m - v)
                }
                t(p, function (n, t) {
                    l[t] = 0;
                    var a = n.classList;
                    a.add("tg-sort-header"), n.addEventListener("click", function () {
                        var n = l[t];
                        !function () {
                            for (var n = 0; n < h; ++n) {
                                var r = p[n].classList;
                                r.remove("tg-sort-asc"), r.remove("tg-sort-desc"), l[n] = 0
                            }
                        }(), (n = 1 == n ? -1 : +!n) && a.add(n > 0 ? "tg-sort-asc" : "tg-sort-desc"), l[t] = n;
                        var i, f = g[t], m = function (r, t) {
                            return n * f[r].localeCompare(f[t]) || n * (r - t)
                        }, T = function (n) {
                            var t = d(n);
                            if (!r(t)) {
                                var u = o(n), a = o(n.map(e));
                                t = d(n.map(function (n) {
                                    return n.substring(u, r(n) - a)
                                }))
                            }
                            return t
                        }(f);
                        (r(T) || r(T = r(u(i = f.map(Date.parse), isNaN)) ? [] : i)) && (m = function (r, t) {
                            var e = T[r], o = T[t], u = isNaN(e), a = isNaN(o);
                            return u && a ? 0 : u ? -n : a ? n : e > o ? n : e < o ? -n : n * (r - t)
                        });
                        var C, L = N.slice();
                        L.sort(m);
                        for (var E = v; E < c; ++E) (C = s[E].parentNode).removeChild(s[E]);
                        for (E = v; E < c; ++E) C.appendChild(s[v + L[E - v]])
                    })
                })
            }
        }

        n.addEventListener("DOMContentLoaded", function () {
            for (var t = n.getElementsByClassName("tg"), e = 0; e < r(t); ++e) try {
                v(t[e])
            } catch (n) {
            }
        })
    }(document)</script>

<script src="js/app.js"></script>

</body>
</html>

