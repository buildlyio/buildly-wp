<?php
$getPage = $_GET['page'];
$isPremiumInfo = (B2S_PLUGIN_USER_VERSION == 0) ? 'b2s-btn-disabled' : '';
?>
<!--Navbar Start-->
<div class="col-md-12 pull-left b2s-post-menu del-padding-left">
    <a class="btn btn-<?php echo ($getPage == 'blog2social-post') ? 'primary' : 'link'; ?> b2s-post-btn b2s-post-all" href="admin.php?page=blog2social-post"><?php _e('All Blog Posts', 'blog2social') ?></a>
    <a class="btn btn-<?php echo ($getPage == 'blog2social-approve') ? 'primary' : 'link'; ?> b2s-post-btn b2s-post-approve" href="admin.php?page=blog2social-approve"><?php _e('Instant Sharing', 'blog2social') ?></a>
    <a class="btn btn-<?php echo ($getPage == 'blog2social-draft-post') ? 'primary' : 'link'; ?> b2s-post-btn b2s-post-draft-post" href="admin.php?page=blog2social-draft-post"><?php _e('Drafts', 'blog2social') ?> <?php echo ( ($getPage != 'blog2social-draft-post') ? '<span class="label label-success">' . __("NEW", "blog2social") . '</span>' : '' ); ?></a>
    <a class="btn btn-<?php echo ($getPage == 'blog2social-sched') ? 'primary' : 'link'; ?> b2s-post-btn b2s-post-sched" href="admin.php?page=blog2social-sched"><?php _e('Scheduled Posts', 'blog2social') ?> <?php echo (!empty($isPremiumInfo) ? '<span class="label label-success">' . __("PREMIUM", "blog2social") . '</span>' : '' ); ?>  </a>
    <?php if ($getPage != "blog2social") { ?>
        <a class="btn btn-<?php echo ($getPage == 'blog2social-publish') ? 'primary' : 'link'; ?> b2s-post-btn b2s-post-publish" href="admin.php?page=blog2social-publish"><?php _e('Shared Posts', 'blog2social') ?></a>
        <a class="btn btn-<?php echo ($getPage == 'blog2social-notice') ? 'primary' : 'link'; ?> b2s-post-btn b2s-post-notice" href="admin.php?page=blog2social-notice"><?php _e('Notifications', 'blog2social') ?></a>
        <a class="btn btn-<?php echo ($getPage == 'blog2social-calendar') ? 'primary' : 'link'; ?> b2s-post-btn" href="admin.php?page=blog2social-calendar"><?php _e('Calendar', 'blog2social') ?> <?php echo (!empty($isPremiumInfo) ? '<span class="label label-success">' . __("PREMIUM", "blog2social") . '</span>' : '' ); ?>  </a>
        <a class="btn btn-<?php echo ($getPage == 'blog2social-curation') ? 'primary' : 'link'; ?> b2s-post-btn" href="admin.php?page=blog2social-curation"><?php _e('Content Curation', 'blog2social'); ?></a>
    <?php } ?>
</div>
<hr class="pull-left">

<?php if ($getPage != 'blog2social-curation') { ?>
    <div class="hidden-lg hidden-md hidden-sm filterShow"><a href="#" onclick="showFilter('show');return false;"><i class="glyphicon glyphicon-chevron-down"></i><?php _e('filter', 'blog2social') ?></a></div>
    <div class="hidden-lg hidden-md hidden-sm filterHide"><a href="#" onclick="showFilter('hide');return false;"><i class="glyphicon glyphicon-chevron-up"></i><?php _e('filter', 'blog2social') ?></a></div>
    <!--Navbar Ende-->
<?php } 