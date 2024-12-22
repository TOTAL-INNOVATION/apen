<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<!-- If you delete this meta tag, Half Life 3 will never be released. -->
<meta name="viewport" content="width=device-width" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>{{ $title }}</title>

<style>
    /* -------------------------------------
  GLOBAL
------------------------------------- */
    * {
        margin: 0;
        padding: 0;
    }

    * {
        font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
    }

    img {
        max-width: 100%;
    }

    .logo {
        width: 150px;
    }

    .collapse {
        margin: 0;
        padding: 0;
    }

    body {
        -webkit-font-smoothing: antialiased;
        -webkit-text-size-adjust: none;
        width: 100% !important;
        height: 100%;
        color: #1a171b;
    }


    /* -------------------------------------
  ELEMENTS
------------------------------------- */

    .btn {
        text-decoration: none;
        color: #FFFFFF;
        background-color: #00a754;
        padding: 10px 16px;
        font-weight: 600;
        margin: auto;
        text-align: center;
        cursor: pointer;
        display: inline-block;
    }


    /* -------------------------------------
  TYPOGRAPHY
------------------------------------- */
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
        line-height: 1.1;
        margin-bottom: 15px;
        color: #000;
    }

    h1 small,
    h2 small,
    h3 small,
    h4 small,
    h5 small,
    h6 small {
        font-size: 60%;
        color: #aeb4ac;
        line-height: 0;
        text-transform: none;
    }

    h1 {
        font-weight: 900;
        font-size: 40px;
    }

    .collapse {
        margin: 0 !important;
    }

    p,
    ul {
        margin-bottom: 10px;
        font-weight: normal;
        font-size: 14px;
        line-height: 1.6;
    }

    p.lead {
        font-size: 17px;
    }

    p.last {
        margin-bottom: 0px;
    }

    ul li {
        margin-left: 5px;
        list-style-position: inside;
    }

    table.body-wrap {
        width: 98%;
        margin-left: auto;
        margin-right: auto;
    }

    /* ---------------------------------------------------
  RESPONSIVENESS
  Nuke it from orbit. It's the only way to be sure.
------------------------------------------------------ */

    /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
    .container {
        display: block !important;
        max-width: 600px !important;
        margin: 0 auto !important;
        padding: 1rem;
        border: 1px solid #e4e4e4;
        /* makes it centered */
        clear: both !important;
    }

    /* This should also be a block element, so that it will fill 100% of the .container */
    .content {
        padding: 15px;
        max-width: 600px;
        margin: 0 auto;
        display: block;
    }

    /* Let's make sure tables in the content area are 100% wide */
    .content table {
        width: 100%;
    }


    /* Odds and ends */
    .column {
        width: 300px;
        float: left;
    }

    .column tr td {
        padding: 15px;
    }

    .column-wrap {
        padding: 0 !important;
        margin: 0 auto;
        max-width: 600px !important;
    }

    .column table {
        width: 100%;
    }

    .social .column {
        width: 280px;
        min-width: 279px;
        float: left;
    }

    /* Be sure to place a .clear element after each set of columns, just to be safe */
    .clear {
        display: block;
        clear: both;
    }

        /*UTILITIES*/

        .w-fit {
        width: fit-content;
    }

    .my-4 {
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    .my-6 {
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .my-8 {
        margin-top: 2rem;
        margin-bottom: 2rem;
    }

    .mb-2 {
        margin-bottom: 8px;
    }

    .mx-auto {
        margin-left: auto;
        margin-right: auto;
    }

    .text-center {
        text-align: center;
    }


    /* -------------------------------------------
  PHONE
  For clients that support media queries.
  Nothing fancy.
-------------------------------------------- */
    @media only screen and (max-width: 600px) {

        .container {
            padding: .5rem;
        }

        p.lead {
            font-size: 15px;
        }

        .btn {
            font-weight: 500;
        }

        h1 {
            font-size: 32px;
        }

        div[class="column"] {
            width: auto !important;
            float: none !important;
        }

        table.social div[class="column"] {
            width: auto !important;
        }


        .logo {
            width: 100px;
        }

    }
</style>
</head>

<body bgcolor="#F8F8F8" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">

	{{ $slot }}

</body>
</html>
