


<footer class="">
    
<?php include './pages/modules/about-me.php'; ?>

</footer>

<?php 
use Utils\ResourcesLoader;     

require_once "./js/base.php";

foreach (ResourcesLoader::resourceLoad(ltrim(preg_replace('/Yoguini_Nana_Shop/', '', $_SERVER['REQUEST_URI']), '/'), ROUTES, 'js') as $file) {
    echo '<script src="./js/' . $file . '"></script>';
}
?>
</body>
</html>