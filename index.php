<?php
    // get the current time and date
    $time = date(DATE_RFC2822);
    // get client IP address
    $ip_address = $_SERVER['REMOTE_ADDR'];
    // get client hostname
    $hostname = gethostbyaddr($ip_address);
    // get information about the operating system PHP is running on
    $info = php_uname ();

    // specify the log file path
    $log_file  = "data.log";
    // set the string to write
    $contents = $time . "\t" . $ip_address . "\t" . $hostname . "\t" . $info . "\n";
    // write the data to a log file
    file_put_contents($log_file, $contents, FILE_APPEND | LOCK_EX);
?>



<!DOCTYPE html>
<html lang="en-GB">
<!--
-----BEGIN PGP SIGNED MESSAGE-----
Hash: SHA512

This page content is PGP-signed until the final "END PGP SIGNATURE" line.

Because why not?!

Read more about this at https://www.charliejonas.co.uk/pgp/

You can verify this page by running `curl http://www.isitpantoyet.co.uk | gpg`
or by copying-and-pasting the source code into PGP or something similar.

The page should be signed by the following PGP key:

pub 4096R/22707ACC 2015-08-24 [expires: 2020-01-01]
Key fingerprint = 99E8 D0A4 7676 A198 448B A239 1608 A2A1 2270 7ACC
uid Charlie Jonas <charlie@charliejonas.co.uk>
uid Charlie Jonas <chtj2@srcf.net>
uid Charlie Jonas <charlie.jonas@icloud.com>
uid Charlie Jonas <chtj2@cam.ac.uk>
uid Charlie Jonas <charlie.jonas@live.com>
sub 4096R/F54FA4F7 2015-08-24 [expires: 2020-01-02]

- -->
	<head>
		<!-- Import stylesheet -->
		<link type="text/css" href="styles.css" rel="stylesheet" />

		<!-- Set meta data -->
		<meta charset="UTF-8"/>
		<meta name="description" content="Is it Panto yet?">
		<meta name="keywords" content="Cambridge, University, CUADC, Footlights, Panto, Pantomime, Rumplestiltskin">
		<meta name="author" content="CUADC/Footlights">

		<!-- Set favicon and page title -->
		<link rel="icon" type="image/png" href="favicon.png" />
		<title>Is it Panto yet?</title>

        <!-- Website designed by Charlie Jonas <charlie@charliejonas.co.uk> on behalf of CUADC/Footlights Pantomime 2016: Rumpelstiltskin -->
        <!-- With thanks to Jack Rowan -->
        <!-- With additional thanks to Stumo -->
        <!-- Phrasing corrected by Harry Stockwell -->
	</head>
    <body>
        <article>
            <h1>
                <!--  some clever PHP goes here to work out what we should say             -->
                <!--  but if you're reading this client-side you won't be able to see it!  -->
                <?php
                    $openingDate = strtotime("November 23, 2016 7:45 PM");
                    $closingDate = strtotime("December 3, 2016 9:30 PM");
                    switch($_GET['forceDate']) {
                        case '1':
                            // opening and closing dates in future
                            $openingDate = time() + 1;
                            $closingDate = time() + 1;
                            break;

                        case '2':
                            // opening date in past, closing date in future
                            $openingDate = time() - 1;
                            $closingDate = time() + 1;
                            break;

                        case '3':
                            // opening and closing dates in past
                            $openingDate = time() - 1;
                            $closingDate = time() - 1;
                            break;

                        default:
                            // do nothing dates are already correct
                            break;
                    }
                    if ($openingDate - time() > 0) {
                        echo "Oh no, it isn't!";
                    }
                    else {
                        if ($closingDate - time() > 0) {
                            echo "Oh yes, it is!";
                        }
                        else {
                            echo "It's behind you!";
                        }
                    }
                ?>

            </h1>
        </article>
        <footer>
            <h3><a href="https://www.adctheatre.com/rumpelstiltskin">adctheatre.com/rumpelstiltskin</a></h3>
        </footer>
    </body>
<!--

-----BEGIN PGP SIGNATURE-----

<?php
if ($openingDate - time() > 0) {
    echo "iQIcBAEBCgAGBQJYNFceAAoJEBYIoqEicHrM8FYP/j4jErqTyL5dgsS8e6CJil6l
LK/ggwZVzoW0MjZnrIISEHQNJQV4XGKkZFWU3xi2WGaCPji4ik6tTVwh4qAEP9sk
PiF79Us7tISH7732q213j5YHxUNY/gg/AEc62QZOz9AD+FzENtXwUIxmQDGtT2Oh
tEet29ROqsE0U7bQVQZZLDwNNBCUh66+UMjHZtii655gF0ZPPFfPA+9DMmCoSrEm
cK05jH4ccpPXeq/lZvKIStWfTBXHagndzfumXLJ6S1lGPxJ3dis+AAN5vAg7Oh9T
A7zo2BQpytyDCtmpoYfT1coK+v7LoXql+jXLbpMyMl2mvJttGWAyjNYAFUtJtlYn
M+G4uHRnsn9TGFhRG+ELSu4Bwb6y+/mR7WGorCTZISa0UkqfoJnR3VzWoioPItVY
S3864AQ2xvDiw+b3NZypIPaAvBL/v7ACVUe/XE6BNHaW8HUogkEXholIY8iTCPaj
RuDk3qidk1NUiyAp6crBOVOXkDFRrqf6v4W43hhmBKnBfyTwEkJZdJg/MiYZWpyW
vCC+SNF2TamoEwA5B8qvWfA57mr3DACP41FcGv6MIGaB2CshwJj4wYJjlYhUnzbP
y3Y5hZiNgzp2tC+TxA8nz1kUiEUPIs98Zi3HGKwySrvk5INuEK9k0KCHOmc73dHz
b4s9LvLfVrvUl/XmFEs2
=9FMI";
}
else {
    if ($closingDate - time() > 0) {
        echo "iQIcBAEBCgAGBQJYNFd+AAoJEBYIoqEicHrMd7YP/0IO5vs8j7SZuuUsRvbuUvkd
1QV28gq4p3XxOcyfTA2BBTMlwh/MBL4Si1P/ykTUpoYSeVOormxkTkJR6kKZOXyh
wI3S/JaZrAu5+kBKuy7Isdc8imBOYNMFx6712lvIcJ8yHkv9ajEhhUX9HxVr9OVo
YfMDw0SGvOMC+BbLAPmm9vPwYy++cCEgwePU6YCrX7lR4N0f/wjcgdNB/lCgZJwA
y2NNK5tekKAzm1jTz349CceJ7nJRJi1QO8bEUhxMqyl87gutLW9hJkcxeg2CcMP4
1enZ8VSYCg5O1YX5F6eIgWn6qoKRU27MTM0eQQwXcVOQMIEXnhRuE7IUcGLlujqg
Tms5LsOD6Bktx5Ut11XD9Pvd9yBoTxJubYd0SF+BA+B9wIv1dyX5J2Lp6/ImGPG5
r86hcesE0KYINYoe1h6rnhF9PdNqq43HkJ63QAOnkI5su8H41DhL+1CsoE5NZZgJ
2QNmGc8WLt1gJ2i+nY8F2q8uhv5kyEaMTHcIKrfA22Mol4SmDmiAWXsKVL2z8Cyj
nSyqVTlNPnPn9SqtBJprbXJrKRirXgfTqAu8mF25umSEE/TMNEOd9P/dzfiKcRuA
3XMSw6U1VInXlEaz+y9B/iv1Ib5EYEpLJksWihrFXQk3h9az4y2SxFO/K5SyvRr8
1QAYVt/VHQbP0UryP3aE
=ktBs";
    }
    else {
        echo "iQIcBAEBCgAGBQJYNFejAAoJEBYIoqEicHrMzgYP/0Spam/KuQAi6qVEINYxHjH7
+V3yIWlR9Mbc+yenNsfLyHQjgx1DCEe+HdMde/bJ7GsU3lbR6KN0WY55b3ToIfCU
oAzLEnkiDXB31C7EyyZUThgTN/REahV/5h+KBhKZB7lMn/K4dkNiDdcCsY8FNFnG
gzfmOfOHLm78Tny7nepys1cnLo29uVJgxsQcqIJNerracatPFwgvi0qSm4TX9VYc
ZWanITZ6xl/hZbV18cEa0zkMdP1DGp0hkimS6hhtVz56IQy0GHjtic2DBGhEMk/E
ll+QxGpOsDeVlZqa2fbdYwlw7KKhXjfrYoY3970mo2ERZ6juPdVqEs6IsBkhthdW
aNmwEvveSpJQer78BkXJWfD13/wgIWdQMg6y5dg91T4LxOcsxqPOBXNgW3vYpIJY
/WIsgZn/8BN8zSN5liAsoAdGitpBz5Uz4poGigTog942z+EcKpYmrkMQ2YuRU232
Szre3sc/8nPZ0mctyU4Htr8waoSOwLrF6IE+7mcbZ/LObYy0qi0c+PV3W6QQuztv
KDEUAED+EK+FTUxq6p7RhHYOSf9Vj7kSc0GvcvLohyU8lleDa2bGJCXcQyTnpTI5
E1j5HkR1spcSiBQVNuB3P3eDPr4nVY8ZACVc2jfDgt1nRmGjQMP0wfBTKb6Um4Tk
mdM1240NsjGOwgdo6jKu
=Tasd";
    }
}
?>

-----END PGP SIGNATURE-----
-->
</html>
