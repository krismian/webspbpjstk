<?php $__env->startSection('content'); ?>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#berita">Berita Publik</a> </li>
        <li><a href="#internal">Berita Internal</a></li>
    </ul>
    <div class="tab-content">
        <div id="berita" class="tab-pane fade in active">
            <p>&nbsp;</p>
            <h2>Publik</h2>
        </div>
        <div id="internal" class="tab-pane fade">
            <?php if(Auth::check()): ?>
                <p>Akses granted</p>
            <?php else: ?>
                <p>denied</p>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function(){
            $(".nav-tabs a").click(function(){
                $(this).tab('show');
            });
            $('.nav-tabs a').on('shown.bs.tab', function(event){
                var x = $(event.target).text();         // active tab
                var y = $(event.relatedTarget).text();  // previous tab
                $(".act span").text(x);
                $(".prev span").text(y);
            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>