<?php 
$current_cat_id = get_queried_object_id();
$taxonomyName = "city";
$term = get_term_by('slug', get_query_var('term'), $taxonomyName);
?>

<?php get_header(); ?>

<?php if(!(int)$term->parent): ?>
  <?php get_template_part('template-parts/taxonomy-city/city'); ?>
<?php else: ?>
  <?php get_template_part('template-parts/taxonomy-city/category'); ?>
<?php endif; ?> 

<?php get_footer(); ?>