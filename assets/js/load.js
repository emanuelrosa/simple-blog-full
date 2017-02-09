//Esta função carrega os arquivos javascript
function loadJs(url, callback) {
    var js = document.createElement("script");

    //Verifica se o callback é uma função
    if (typeof callback === "function") {
        var isReady = false;

        //Executa se for carregado no onload ou readystatechange
        var readyExec = function () {
            if (isReady) {
                return;
            }

            //Bloqueia execução repetida do callback
            isReady = true;

            //Chama o callback
            callback();
        };

        js.onload = readyExec;

        /*Internet explorer (http://stackoverflow.com/q/17978255/1518921)*/
        js.onreadystatechange = function () {
            if (js.readyState === "complete" ||
                    js.readyState === "loaded")
            {
                readyExec();
            }
        }
    }

    js.async = true;
    js.src = url;
    document.head.appendChild(js);
}

loadJs("assets/js/jquery-1.11.1.min.js", function() {
    loadJs("assets/js/imagesloaded.pkgd.js");
    loadJs("assets/js/modernizr.custom.js");
    loadJs("assets/js/jquery.sticky.js");
    loadJs("assets/js/smoothscroll.js");
    loadJs("assets/js/jquery.jqpagination.min.js");
    loadJs("assets/js/facebook.js");
    loadJs("assets/js/cssmin.js");
    loadJs("assets/js/bootstrap.min.js");
    loadJs("assets/js/lazyload.js");
    loadJs("assets/js/custom.js");
});