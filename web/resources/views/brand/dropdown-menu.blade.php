<style>
.topnav{display: none;}
.topnav {overflow: hidden;background-color: #f5f5f5;margin-bottom: -14px;}
.topnav a {float: left;display: block;color: #000;text-align: center;padding: 7px 16px;text-decoration: none;font-weight: 500;line-height: 40px;letter-spacing: 1.4px;font-size: 0.8125em;}
/* .active {background-color: #4CAF50;color: white;} */
.topnav .icon {display: none;}
/* .topnav a:hover, .dropdown:hover .dropbtn {border-bottom: 3px solid #e32119;} */

@media screen and (max-width: 640px) {
.topnav{display: block;}
  .topnav a:not(:first-child), .dropdown .dropbtn {display: none;}
  .topnav a.icon {float: right;display: block;}
  .topnav.mobile {position: relative;}
  .topnav.mobile .icon {position: absolute;right: 0;top: 0;}
  .topnav.mobile a {float: none;display: block;text-align: left;}
}
</style>

<script>
function myFunction() {
  var x = document.getElementById("Topnav");
  if (x.className === "topnav") {
    x.className += " mobile";
  } else {
    x.className = "topnav";
  }
}
</script>
