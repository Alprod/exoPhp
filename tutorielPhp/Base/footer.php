</main>

<footer class="footer mt-auto py-3 bg-light">
	<div class="container">
        <div class="rows">
            <div class="col col-md-4"></div>
            <div class="col col-md-4"></div>
            <div class="col col-md-4 p-3">
                <h5>Navigation</h5>
                <ul class="list-group list-group-flush">
                    <?= nav_menu('link-dark text-decoration-none','list-group-item') ?>
                </ul>
            </div>
        </div>
        <span class="text-dark">© Copyright <?= (new \DateTime())->format('Y') ?> | <a href="/index.php">AlBlog</a> | ®Tout droit reserver.</span>
	</div>
</footer>
<script>if (typeof module === 'object') {window.module = module; module = undefined;}</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="//cdn.amcharts.com/lib/4/core.js"></script>
<script src="//cdn.amcharts.com/lib/4/charts.js"></script>
<script src="//cdn.amcharts.com/lib/4/maps.js"></script>
<script src="/scripts.js"></script>
<script>if (window.module) module = window.module;</script>
</body>
</html>

