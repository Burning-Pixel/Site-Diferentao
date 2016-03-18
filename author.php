<?php get_header(); ?><div id="content">

<?php
    if(get_query_var('author_name')):
    $curauth = get_userdatabylogin (get_query_var('author_name'));
    else:
    $curauth = get_userdata(get_query_var('author'));
    endif;
?>

    <div>
<?php echo get_avatar( $curauth->ID , 80 ); ?>

<h4><a href="<?php echo $curauth->user_url; ?>">
<?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></a></h4>

<p><?php echo $curauth->description; ?></p>
</div>

<div>
<h4><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>
<hr/>
</div>