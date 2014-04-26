<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <title>Bsantana | Portfólio</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="description" content="Programador em WordPress"/>
        <meta name="keywords" content="HTML, CSS, JavaScript, PHP, WordPress"/>
        <meta name="author" content="Valerio Souza"/>
        <link rel="shortcut icon" href="favicon.png"/>

        <link href='http://fonts.googleapis.com/css?family=Armata' rel='stylesheet' type='text/css'/>
        <link href="<?php echo get_stylesheet_directory_uri() . "/css/reset.css";?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo get_stylesheet_directory_uri() . "/css/fonts/stylesheet.css";?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo get_stylesheet_directory_uri() . "/css/site.css";?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo get_stylesheet_directory_uri() . "/css/jquery.lightbox-0.5.css";?>" rel="stylesheet" type="text/css"/>

		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . "/js/jquery-1.7.2.min.js";?>"></script>
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . "/js/modernizr-2.6.2.min.js";?>"></script>
        <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . "/js/code4net.slideshow.js";?>"></script>
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . "/js/pop-up-mask.js";?>"></script>
        <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . "/js/on.scroll.js";?>"></script>
        <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . "/js/ajax.js";?>"></script>
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . "/js/jquery.lightbox-0.5.pack.js";?>"></script>
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . "/js/script.js";?>"></script>
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . "/js/main.js";?>"></script>
		
     	<?php wp_head(); ?>
		<!--[if lt IE 10]>
			<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . "/js/PIE.js"?>"></script>
		<![endif]-->	
    </head>
    <body>
		<div id="mask"></div>
		<table class="doc-loader">
            <tr>
                <td>
                    <img src="<?php echo get_stylesheet_directory_uri() . "/images/doc_loader/loading.gif";?>" alt="loading..." />
                </td>
            </tr>
        </table> 
		<div class="navigation">
			<img src="<?php echo get_stylesheet_directory_uri() . "/images/navigate.png";?>" alt="navigate_img"/>
			<ul>  
				<li>  
					<a href="#take-me-home" class="nav-active rounded"><span>Take Me Home</span></a>  
				</li>  
				<li>  
					<a href="#about" class="rounded"><span>About</span></a>  
				</li>  
				<li>  
					<a href="#services" class="rounded"><span>Services</span></a>    
				</li>  
				<li>  
					<a href="#showcase" class="rounded"><span>Showcase</span></a>    
				</li>
				<li>  
					<a href="#our-team" class="rounded"><span>Our Team</span></a>    
				</li>   
				<li>  
					<a href="#news" class="rounded"><span>News</span></a>  
				</li> 
				<li>  
					<a href="#contact-us" class="rounded"><span>Contact Us</span></a>  
				</li>  
			</ul>  
    	</div>       
		<div id="scrollable">
			<div class="section first-section" id="take-me-home">
				<div class="container">
					<div class="header-wrapper">
						<div class="header">
							<div class="logo logo_header">
								<img class='s' src="<?php echo get_stylesheet_directory_uri() . "/images/logo/b-santana.png";?>" alt="logo" />
							</div>
						</div>
					</div>      
					<div class="galery-wrapper">
						<div class="gallery">
						<?php 
							$args = array(  'post_type' => 'slider',
											'posts_per_page'	=> 3);
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'slider' );
							$imgslider = $image[0];
							?>
							<div class="gallery-slide gallery-slide-first">
								<img src="<?php echo $imgslider; ?>" alt="<?php the_title(); ?>" />
							</div>
							<?php endwhile;?>     
						</div>
					</div>
					<div class="clear"></div> 
					<div id="gallery-nav"></div>             
				</div> 
			</div>
			<div class="section about" id="about">
				<div class="container">
					<div class="arrow 01">
						<img src="<?php echo get_stylesheet_directory_uri() . "/images/arrow/arrow_01.png";?>" alt="arrow_01" />
					</div> 
					<div class="subheader">
						<div class="subheader-icon"></div>
						<div class="subheader-text">
							sobre <span></span>
						</div>
						<div class="subheader-separator"></div>
					</div>         
					<div class="column-455 m-right-70 m-top-50">
						<div class="m-bottom-40 summary">
                        	"Porque WordPress deixou de ser uma plataforma de blogs, pra se tornar o sistema operacional da Internet"
						</div>
						<div class="m-bottom-40 summary-small">
                        	Sed ut perspiciatis unde omnis iste natus error sit voluptatema accusantium terre estere doloremque laudantium, totames remeseo aperiam, eaque ipsa quae ab illo inventore veritatis et quasi. 
						</div>
                	</div>
					<div class="column-455  m-top-50">
						<img src="<?php echo get_stylesheet_directory_uri() . "/images/about/about_image.png";?>" class="m-bottom-50" alt="image_01"/>
                    	
                	</div>
            		<div class="clear"></div>
				</div>                
            </div>
			<div class="section services" id="services">
				<div class="container">
					<div class="arrow 02">
						<img src="<?php echo get_stylesheet_directory_uri() . "/images/arrow/arrow_02.png";?>" alt="arrow_02" />
					</div> 
					<div class="subheader">
						<div class="subheader-icon"></div>
						<div class="subheader-text">
							kung fu <span>What We Do. Our List Of Services.</span>
						</div>
						<div class="subheader-separator"></div>
					</div> 
					<div class="column-640 m-top-50">
						<div class="summary">
							We are a small group of seti per se neque porro quisquam est, quister set dolorem per sei donec nulla est...						
						</div>
					</div>
					<div class="column-300 m-left-40 m-top-50">
						<p>
							Terre estere doloremique sei laudantium, totames remeseo aperiam, eaque ipsa quae ab illo inventore veritatis rete et quasi architecto beataes vitae dicta sunt...
						</p>
					</div>
					<div class="clear"></div>
					<div class="column-455 m-right-70 m-top-70">
						<img src="<?php echo get_stylesheet_directory_uri() . "/images/services/services_image.png";?>" alt="image_02" />
					</div>
					<div class="column-455 m-top-70">
						<ul class="services-list">
							<li>
								<img src="<?php echo get_stylesheet_directory_uri() . "/images/services/services_icon_01.png";?>" alt="icon_01" />
								<span class="service-title">WEB DESIGN</span>
								<p>
									Nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi. Aenean imperdiet. Etiam ultricies nisi vel...
								</p>
							</li>
							<li>
								<img src="<?php echo get_stylesheet_directory_uri() . "/images/services/services_icon_02.png";?>" alt="icon_02" />
								<span class="service-title">DATABASE</span>
								<p>
									Sit dolor amet, fringilla vel, aliquetese nec vulputate eget, arcu. In enim justo, rhoncuse ut imperdiet a, venenatis vitae, justo.
								</p>
							</li>
							<li>
								<img src="<?php echo get_stylesheet_directory_uri() . "/images/services/services_icon_03.png";?>" alt="icon_03" />
								<span class="service-title">Always On Time</span>
								<p>
									Donec justo, fringilla vel, aliquetese nec vulputate eget, arcu. In enim justo, rhoncuse ut imperdiet a, venenatis vitae, lorem ipsum.
								</p>
							</li>
							<li>
								<img src="<?php echo get_stylesheet_directory_uri() . "/images/services/services_icon_04.png";?>" alt="icon_04" />
								<span class="service-title">Photography</span>
								<p>
									Justo, fringilla vel, aliquetese nec vulputate eget, arcu. In enim justo, rhoncuse ut imperdiet a, venenatis vitae, justo donec.
								</p>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="section showcase" id="showcase">
                <div class="container">
					<div class="arrow 03">
						<img src="<?php echo get_stylesheet_directory_uri() . "/images/arrow/arrow_03.png";?>" alt="arrow_03" />
					</div>
					<div class="subheader">
						<div class="subheader-icon"></div>
						<div class="subheader-text">
							portfolio <span></span>
						</div>
						<div class="subheader-separator"></div>
					</div> 
					<div class="column-640 m-top-50">
						<div class="summary">
							Dolor lorem ipsu seti per se neque porro quisquam est, quister set dolorem per sei donec nulla est...						
						</div>
					</div>
					<div class="column-300 m-left-40 m-top-50">
						<p>
							Terre estere doloremique sei laudantium, totames remeseo aperiam, eaque ipsa quae ab illo inventore veritatis rete et quasi architecto beataes vitae dicta sunt...
						</p>
					</div>
					<div class="clear"></div>
					<div class="showcase-sub-container">
					<?php 
							$args = array(  'post_type' => 'portfolio',
											'posts_per_page'	=> 9);
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portfolio' );
							$image2 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
							$imgportfoliosmall = $image[0];
							$imgportfoliolarge = $image2[0];
							$post_counter++; 
							?>
						<div class="pic-frame rounded <?php if($post_counter != 3 && $post_counter != 6 && $post_counter != 9) : echo "nomargin"; endif; ?>">
							<div class="pic">
								<a href="<?php echo $imgportfoliolarge; ?>" title="Lorem Ipsum"><span class="roll"></span><img src="<?php echo $imgportfoliosmall; ?>" alt="<?php the_title(); ?>" /></a>													
							</div>
							<span><?php the_title(); ?></span>
							<p>
								<?php 
									$terms = get_terms("my_taxonomy");
									 $count = count($terms);
									 if ( $count > 0 ){
									    
									     foreach ( $terms as $term ) {
									       echo $term->name ;
									        
									     }
									    
									 }
									?>						
							</p>
						</div>
						<?php endwhile;?> 
					</div>	
				</div>       
            </div>
			<div class="section our-team" id="our-team">
                <div class="container">
					<div class="arrow 04">
						<img src="<?php echo get_stylesheet_directory_uri() . "/images/arrow/arrow_04.png";?>" alt="arrow_04" />
					</div>
					<div class="subheader">
						<div class="subheader-icon"></div>
						<div class="subheader-text">
							kronos team <span>Meet Our Awesome Team.</span>
						</div>
						<div class="subheader-separator"></div>
					</div> 
					<div class="column-640 m-top-50">
						<div class="summary">
							Per se neque porro quisquam est, quister set dolorem per sei donec nulla est seper donec est lorem ipsum...						
						</div>
					</div>
					<div class="column-300 m-left-40 m-top-50">
						<p>
							Terre estere doloremique sei laudantium, totames remeseo aperiam, eaque ipsa quae ab illo inventore veritatis rete et quasi architecto beataes vitae dicta sunt...
						</p>
					</div>
					<div class="clear"></div>
					<div class="column-300 m-top-55 m-right-40">
						<img src="<?php echo get_stylesheet_directory_uri() . "/images/team/team_01.png";?>" class="m-bottom-30" alt="team_01" />
						<div class="team-member-name  m-bottom-10">
        					jane johnson doe
						</div>
						<div class="team-member-position">
							lead designer
						</div>
						<div class="socio">
							<ul>
								<li><a href="#" target="_blank" class="socio_twitter"></a></li>
								<li><a href="#" target="_blank" class="socio_facebook"></a></li>
								<li class="last"><a href="#" target="_blank" class="socio_linkedin"></a></li>
							</ul>
							<div class="clear"></div>
						</div>
						<p>
							 Lorem ipsum doloremique sei laudantium, totames remeseo aperiam, eaque ipsa quae ab illo inventore veritatis rete et quasi architecto beataes vitae dicta sunt.
						</p>
				   </div>
					<div class="column-300 m-top-55 m-right-40">
                    	<img src="<?php echo get_stylesheet_directory_uri() . "/images/team/team_02.png";?>" class="m-bottom-30" alt="team_02" />
						<div class="team-member-name  m-bottom-10">
        					anna jones doe
						</div>
						<div class="team-member-position">
							ceo
						</div>
						<div class="socio">
							<ul>
								<li><a href="#" target="_blank" class="socio_twitter"></a></li>
								<li><a href="#" target="_blank" class="socio_facebook"></a></li>
								<li class="last"><a href="#" target="_blank" class="socio_linkedin"></a></li>
							</ul>
							<div class="clear"></div>
						</div>
						<p>
							 Terre estere doloremique sei laudantium, totames remeseo aperiam, eaque ipsa quae ab illo inventore veritatis rete et quasi architecto beataes vitae dicta sunt.
						</p>
                	</div>
					<div class="column-300 m-top-55">
                    	<img src="<?php echo get_stylesheet_directory_uri() . "/images/team/team_03.png";?>" class="m-bottom-30" alt="team_03" />
						<div class="team-member-name  m-bottom-10">
        					marry jones doe
						</div>
						<div class="team-member-position">
							developer
						</div>
						<div class="socio">
							<ul>
								<li><a href="#" target="_blank" class="socio_twitter"></a></li>
								<li><a href="#" target="_blank" class="socio_facebook"></a></li>
								<li class="last"><a href="#" target="_blank" class="socio_linkedin"></a></li>
							</ul>
							<div class="clear"></div>
						</div>
						<p>
							 Doloremique sei laudantium totames es remeseo aperiam, eaque ipsa quae ab illo inventore veritatis rete et quasi architecto beataes vitae dicta sunt terre estere.
						</p>
                	</div>
				</div>       
            </div>
			<div class="section news" id="news">
                <div class="container">
					<div class="arrow 05">
						<img src="<?php echo get_stylesheet_directory_uri() . "/images/arrow/arrow_05.png";?>" alt="arrow_05" />
					</div>
					<div class="subheader">
						<div class="subheader-icon"></div>
						<div class="subheader-text">
							news <span></span>
						</div>
						<div class="subheader-separator"></div>
					</div> 
					<?php
					$args = array(  'post_type' => 'post',
											'posts_per_page'	=> 6);
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
							$post_counter++; ?>
					<div class="column-300 m-top-50 <?php if($post_counter != 3 && $post_counter != 6) : echo "m-right-40"; endif; ?>">
						<div class="summary m-bottom-30">
							<?php the_title(); ?>
						</div>
						<p>
                        	<?php the_date(); ?>
                    	</p>
						<p>
							<?php echo wp_trim_words( get_the_excerpt(), 15 ); ?>
						</p>
						<a href="<?php the_permalink(); ?>" target="_blank" class="button rounded">leia mais</a>
					</div>
					<?php endwhile;
						//wp_pagenavi(); 
				        wp_reset_query();?>
					<div class="clear"></div>
				</div>       
            </div>
			<div class="section contact-us" id="contact-us">
				<div class="container">
					<div class="arrow 06">
						<img src="<?php echo get_stylesheet_directory_uri() . "/images/arrow/arrow_06.png";?>" alt="arrow_06" />
					</div>
					<div class="subheader">
						<div class="subheader-icon"></div>
						<div class="subheader-text">
							contact <span>Stay In Touch With Us. Don't Spam.</span>
						</div>
						<div class="subheader-separator"></div>
					</div> 
					<div class="column-340  m-top-50 m-right-115 contact-form contact-us-x">
						<div class="column-340">
							<div class="summary m-bottom-40">
								Drop us a line using contact form below
							</div>
							<p class="m-bottom-22">Sed ut perspiciatis unde omnis iste natus error sit voluptatema accusantium terre estere...</p>
						</div>
						<div class="clear"></div>    
						<form id="contact-form" method="post" action="" enctype="application/x-www-form-urlencoded">
							<label for="name">Name *</label>
							<input type="text" id="name" name="contact[name]" class="rounded" />
							<label for="name">E-mail *</label>
							<input type="text" id="email" name="contact[email]" class="rounded" />
							<label for="name">Subject *</label>
							<input type="text" id="subject" name="contact[subject]" class="rounded" />
							<label for="name">Message *</label>
							<textarea id="message" name="contact[message]" cols="42" rows="7" class="rounded"></textarea>
						</form>
						<input type="button" id="submit-mail" class="submit-btn rounded" value="SEND" /> 
						<div id="mail-message">
							<table>
								<tr>
									<td>
										<div id="mail-message-window">
											<div id="mail-message-header"></div>
											<p id="mail-failure">Unable to send your email!</p>
											<p id="invalid-email">Please enter valid email address!</p>
											<p id="empty-field">Please fill out all the fields in order to send us a message.</p>
											<p id="mail-success">Your email has been successfully sent to Kronos&copy;DryThemes!</p>
											<input type="button" id="mail-message-btn" class="mail-message-btn rounded" value="OK" />
										</div>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="column-525 m-top-50">
						<div class="summary m-bottom-40">
							Nullam dictum felis eu pede mollis pretium. Integer tinci...
						</div>
						<p class="m-bottom-22">
							Sed ut perspiciatis unde omnis iste natus error sit voluptatema accusantium terre estere doloremque este laudantium ed ut perspiciatis unde omnis iste. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
						</p> 
						<p>
							Name of the street 123/4
							<br />
							Name of City
							<br />
							Name of Country	
						</p>
						<p>
							Phone: +321 123 456 7
							<br />
							Fax: +321 123 456 7
							<br />
							E-mail: johndoe@yoursitegoeshere.com
							<br />
							Website: www.yoursitegoeshere.com
						</p>
						<div class="socio_contact m-top-50">
							<ul>
								<li><a href="#" target="_blank" class="socio_contact_twitter"></a></li>
								<li><a href="#" target="_blank" class="socio_contact_facebook"></a></li>
								<li><a href="#" target="_blank" class="socio_contact_dribbble"></a></li>
								<li><a href="#" target="_blank" class="socio_contact_behance"></a></li>
								<li class="last"><a href="#" target="_blank" class="socio_contact_flickr"></a></li>
							</ul>
						</div>
					</div>
					<div class="clear"></div>
				</div>
            </div>
			<div class="footer">
				<div class="footer_logo">
					<img src="<?php echo get_stylesheet_directory_uri() . "/images/footer/footer_logo.png";?>" alt="footer_image">
				</div>
                <p class="m-bottom-40">&copy; Copyright 2012 DryThemes - Built with love :)</p>
            </div>                            
		</div> 
		<?php wp_footer(); ?>
    </body>
</html>
