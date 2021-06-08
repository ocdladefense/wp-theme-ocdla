<style>
    .primary {
        border: #50668F;
    }

    .primary {
        color: #FFFFFF;
    }

    .primary,
    .primary:hover,
    .primary:focus {
        background-color: #50668F;
    }

    .primary {
        background-color: #0070d2;
        color: white;
        transition: all 0.1s;
        border: 1px solid transparent;
        text-decoration: none;
        border-radius: 4px;
        padding: 9px;
        margin: 10px;
    }
</style>


<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage wireframe
 * @since 1.0
 * @version 1.0
 */

$committees = get_committees_array();

get_header(); ?>

<div class="page-wrap wrap">
    <?php get_sidebar('left'); ?>
    <div id="primary" class="basic-page content-area">
        <main id="main" class="site-main" role="main">
            <br />

            <style type="text/css">
                .table-headers {
                    display: none;
                }

                #intro {
                    font-size: 18px;
                }

                h1 {
                    padding-left: 12px;
                    text-transform: uppercase;
                    letter-spacing: 0.14em;
                    font-size: 1.0em;
                }

                h3 {
                    color: #bf9500;
                }

                #email {
                    color: rgba(0, 0, 139, 0.8);
                    font-weight: bold;
                }

                #name {
                    color: grey;
                }

                #city {
                    color: #53638c;
                    font-weight: 600;
                }

                p {
                    word-wrap: break-word;
                }

                @media screen and (min-width: 800px) {
                    .table-headers {
                        display: table-row;
                    }
                }
            </style>

            <?php $separator = "<span style='color: #bf9500; font-weight: bold;'> | </span>"; ?>

            <div>
                <h1 class="text-muted ml-5 mt-5 font-weight-bold">Committees & Task Forces</h1>
            </div>

            <div class="row">
                <div id="intro" class="col-md-5 ml-5 mt-3 mb-5 text-muted">
                    <p style="padding-left: 12px;">OCDLA committees are volunteer driven and are open to interested
                        members. Contact
                        the committee chairs below if you would like to become involved.
                    </p>
                </div>
            </div>

            <?php if (!isset($committees) || (isset($committees) && count($committees) < 1)) : ?>
                <ul class="table-row">
                    <li>There are no committees to display.</li>
                </ul>

            <?php else : ?>

                <?php foreach ($committees as $committee) : ?>

                    <a href="http://sf/page?data=<?php echo $committee["Name"]; ?>">
                        <h3 class="ml-5" style="padding-left: 12px;"><?php print $committee["Name"]; ?></h3>
                    </a>
                    <div class="w-auto ml-5 mt-3 mb-5 mr-5">

                        <?php $members = $committee["members"]; ?>
                        <?php foreach ($members as $member) : ?>

                            <span style="padding-left: 12px;">
                                <a href="https://members.ocdla.org/directory/member/<?php print $member["Id"]; ?>" target="_blank" id="name">
                                    <?php print $member["Name"] . $separator; ?>
                                </a>
                            </span>
                            <span style="font-weight:<?php print hasPosition($member) ? "bold" : ""; ?>;">
                                <?php substr($member["Role"], -4) != "mber" ? print $member["Role"] . $separator : ""; ?>
                            </span>
                            <span id="city">
                                <?php $member["City"] != null ? print $member["City"] . $separator : ""; ?>
                            </span>
                            <span>
                                <?php $email = $member["Email"]; ?>
                                <?php echo "<a href='mailto:$email' id='email'>Email</a>"; ?>
                            </span>
                            <br>

                        <?php endforeach; ?>

                    </div>

                <?php endforeach; ?>
            <?php endif; ?>

            <?php
            /*while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			*/
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->
    <?php get_sidebar('right'); ?>
</div><!-- .wrap -->

<?php
get_footer();
