<?php

// Load Requirements
include 'include/requirements.php';

use Aws\S3\S3Client;

// Load main page header
include 'include/main_header.php';

?>

<section id="hero_section" class="top_cont_outer">
    <div class="hero_wrapper">
        <div class="container">
            <div class="hero_section">
                <div class="row">
                    <div class="col-lg-5 col-sm-7">
                        <div class="top_left_cont zoomIn wow animated">
                            <h2>For <strong>all</strong> your promotional needs!</h2>
                            <p>We specialise in all the stages of production and the promotion and marketing of a release, with our consultancy services provided to numerous international clientèle. Offering <strong>Label Management</strong>, as well as <strong>Publishing</strong>, <strong>Radio & Podcast Syndication</strong>. We are <strong>highly experienced</strong> professionals, working in the music consultancy and promotion field for over a decade.</p>
                            <a href="#service" class="read_more2">Read more</a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-sm-5">
                        <img src="/img/main_device_image.png" class="zoomIn wow animated" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="aboutUs">
    <div class="inner_wrapper">
        <div class="container">
            <h2>About Us</h2>
            <div class="inner_section">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
                        <img src="/img/about-img.jpg" class="img-circle delay-03s animated wow zoomIn" alt="">
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
                        <div class="delay-01s animated fadeInDown wow animated">

                        <?php
                        $stmt = $db->query("SELECT COUNT(*) as count FROM promodata");
                        $getnumcount = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

                        $stmt = $db->query("SELECT COUNT(*) as count FROM reactiondata WHERE reaction_reacted='1'");
                        $getnumreact = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

                        $getnumcount = number_format($getnumcount);
                        $getnumreact = number_format($getnumreact);
                        ?>

                        <div class="new-line">
                            <h3 class="animated fadeInUp wow">
                                <span class="fa-stack fa-3x">
                                    <i class="fa-regular fa-circle fa-stack-2x" style="color: #000000;"></i>
                                    <strong class="fa-stack-1x calendar-text"><?php echo $getnumreact; ?></strong>
                                </span>
                                <strong class="red-text">Promo Feedbacks Received</strong>
                            </h3>
                        </div>
                        <div class="new-line">
                            <h3 class="animated fadeInUp wow">
                                <span class="fa-stack fa-3x">
                                    <i class="fa-regular fa-circle fa-stack-2x" style="color: #000000;"></i>
                                    <strong class="fa-stack-1x calendar-text"><?php echo $getnumcount; ?></strong>
                                </span>
                                <strong class="red-text">Campaigns Sent</strong>
                            </h3>
                        </div>

                        <br>
                        <h3>Getting your music heard is of the utmost importance...</h3><br>
                        <p>At Promo Delivery, we realise the value of your music is of great importance, and that it requires the best promotion strategy and care on completion, and that's where we can help! Whether you are a long established major imprint wanting your next track to reach every commercial magazine, radio station and licensee out there, to the smallest independent artist wanting help to break your new release with underground credibility, we are there for you!</p>
                        <br>
                        <p>Using our in-house, custom-built & efficient promo system, we can tailor a campaign to deliver internationally to those who it suits within minutes of receiving the brief. Ensuring we maintain a certain standard, we only deliver to leading national and international recipients, who actively promote your music. Recent campaigns have had success on Radio 1, 2FM, Sunshine Live, A State Of Trance, Kiss FM, Mixmag, DJ Magazine, Digitally Imported and many more!<br><br><strong>No campaign is too big or too small for us to undertake,</strong> and we pride ourselves in delivering <strong>value for money!</strong></p>
                        </div>
                        <div class="work_bottom">
                            <span>Want to know more...?</span>
                            <a href="#contact" class="contact_btn">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="service">
    <div class="container">
        <h2>Services</h2>
        <div class="service_wrapper">
            <div class="row">
                <div class="col-lg-4">
                    <div class="service_block">
                        <div class="service_icon delay-03s animated wow zoomIn">
                            <span><i class="fa fa-headphones fa-2xl"></i></span>
                        </div>
                        <h3 class="animated fadeInUp wow">PR Servicing</h3>
                        <p class="animated fadeInDown wow">We can tailor a list of suitable recipients for a campaign, ensuring the right and necessary people will receive your music!</p>
                    </div>
                </div>
                <div class="col-lg-4 borderLeft">
                    <div class="service_block">
                        <div class="service_icon icon2 delay-03s animated wow zoomIn">
                            <span><i class="fa fa-music"></i></span>
                        </div>
                        <h3 class="animated fadeInUp wow">Radio Syndication</h3>
                        <p class="animated fadeInDown wow">If you run a podcast or radio show, we can help you with syndication with the help of media partners, creating global awareness!</p>
                    </div>
                </div>
                <div class="col-lg-4 borderLeft">
                    <div class="service_block">
                        <div class="service_icon icon3 delay-03s animated wow zoomIn">
                            <span><i class="fa-solid fa-volume-up"></i></span>
                        </div>
                        <h3 class="animated fadeInUp wow">Publishing</h3>
                        <p class="animated fadeInDown wow">We offer favourable publishing agreements to writers, with us actively seeking sync opportunities to get the best from your music!</p>
                    </div>
                </div>
            </div>
            <div class="row borderTop">
                <div class="col-lg-4 mrgTop">
                    <div class="service_block">
                        <div class="service_icon delay-03s animated wow zoomIn">
                            <span><i class="fa-solid fa-download"></i></span>
                        </div>
                        <h3 class="animated fadeInUp wow">Dashboard</h3>
                        <p class="animated fadeInDown wow">A system for recipients to log in and check all the tracks waiting for them and to browse with ease, never miss a promo again!</p>
                    </div>
                </div>
                <div class="col-lg-4 borderLeft mrgTop">
                    <div class="service_block">
                        <div class="service_icon icon2 delay-03s animated wow zoomIn">
                            <span><i class="fa-solid fa-envelope"></i></span>
                        </div>
                        <h3 class="animated fadeInUp wow">Feedback</h3>
                        <p class="animated fadeInDown wow">Instantaneous and automated feedback from the second a campaign is sent, notifying you if a recipient has checked, left feedback or your promo address bounced!</p>
                    </div>
                </div>
                <div class="col-lg-4 borderLeft mrgTop">
                    <div class="service_block">
                        <div class="service_icon icon3 delay-03s animated wow zoomIn">
                            <span><i class="fa-solid fa-users"></i></span>
                        </div>
                        <h3 class="animated fadeInUp wow">Label Management</h3>
                        <p class="animated fadeInDown wow">Providing all the steps from drawing up contracts, finding suitable remix artists and development, to securing distribution, licensing, marketing and royalty management.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="recentcampaigns" class="content">
    <div class="container portfolio_title">
        <div class="service_wrapper">
            <div class="section-title">
                <h2>Recent Campaigns</h2>
            </div>
        </div>
    </div>
    <div class="portfolio-top"></div>
    <div class="container">
        <div class="service_wrapper">
            <div class="promo-grid">
                <?php
                $stmt = $db->query("SELECT * FROM promodata ORDER BY promo_ID DESC LIMIT 42");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $artlink = 'https://d1c6pzqf7c2xtl.cloudfront.net/artwork/' . $row['promo_artwork'];
                    echo "<img src='{$artlink}' alt='...' class='img-rounded'>";
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php

include 'include/main_footer.php';

?>